<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class GreenPassController extends Controller
{
    public function gpslist(Request $request)
    {
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $user_key = $request->get('user_key');
        $language_code = $request->get('language_code', '');

        $pageNo = $request->get('pageNo', 1);
        $pageSize = $request->get('pageSize', 10);

        $result = [];
        $result['result'] = false;

        if (empty($latitude) || empty($longitude)) {
            $result['ment'] = '현재 위치 좌표가 확인되지 않습니다. 잠시 후 다시 시도해주세요.';
            return $result;
        }
        $where = [];
        if(! empty($language_code) && $language_code != ''){
            array_push($where, ['partner_auth.language_code', '=', $language_code]);
        }

//        $gpslist = DB::table("partner_auth")->offset(0)->limit(20)->orderBy('order', 'asc')->orderBy('partner_auth_seqno', 'desc')->orderBy('location_name', 'asc')->get();
        $gpslist = DB::table("partner_auth")
            ->select(DB::raw('CASE WHEN (location_x is null OR location_y is null OR location_x < 0 OR location_y < 0) 
                                        THEN 3400000000.0
                                        ELSE (POW((location_x-'.((float)$latitude).'), 2) + POW((location_y-'.((float)$longitude).'), 2)) END
                                as distance
                               , partner_auth_seqno, admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img'))
//            ->offset(0)->limit(20)
            ->where($where)
            ->orderBy('distance', 'asc')->orderBy('partner_auth_seqno', 'desc')->orderBy('location_name', 'asc')
            ->offset($pageSize * ($pageNo - 1))->limit($pageSize)
            ->get();
        
        $result['data'] = $gpslist;
        
        for($inx = 0; $inx < count($result['data']); $inx++){            
            $cntFavorite = DB::table('user_favorite')->where(
                [
                    'user_seqno' => $user_key
                    , 'partner_auth_seqno' => $result['data'][$inx]->partner_auth_seqno
                ]
            )->count();
            $result['data'][$inx]->isfavorite = $cntFavorite;
        }

        $result['ment'] = '성공';
        $result['result'] = true;

        return $result;
    }

    public function getPartnerMaplist(Request $request)
    {
        $result = [];
        $result['result'] = false;

        $partnerMap = DB::table("partner_auth")
            ->leftJoin('partner', 'partner.partner_auth_seqno', '=', 'partner_auth.partner_auth_seqno')
            ->select('partner.*', 'partner_auth.location_x', 'partner_auth.location_y', 'partner_auth.location_name', 'partner_auth.location_sub_name'
                , 'partner_auth.location_img')
            ->orderBy('partner.partner_seqno', 'desc')->get();
        
        $result['data'] = $partnerMap;
        $toDay = date("Y-m-d", time());
        
        for($inx = 0; $inx < count($result['data']); $inx++){            
            // 마커 눌렀을때 인증 리스트 10개정도 (뿌려주는 것은 2-3개)
            $recentUserAuths = DB::table('user_auth_hst')->where(
                [
                    'partner_auth_seqno' => $result['data'][$inx]->partner_auth_seqno
                ]
            )->orderBy('user_auth_hst_seqno', 'desc')->offset(0)->limit(10)->get();
            $result['data'][$inx]->recentUserAuths = $recentUserAuths;
            // 일 인증 횟수
            $toDayUserAuthCnt = DB::table('user_auth_hst')
            ->leftJoin('user_info', 'user_info.user_seqno', '=', 'user_auth_hst.user_seqno')
            ->where([
                ['partner_auth_seqno', '=', $result['data'][$inx]->partner_auth_seqno],
                ['user_auth_hst.create_dt', '>=', $toDay]
            ])->count();
            $result['data'][$inx]->toDayUserAuthCnt = $toDayUserAuthCnt;
        }

        $result['ment'] = '성공';
        $result['result'] = true;

        return $result;
    }
}
