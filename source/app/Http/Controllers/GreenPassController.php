<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\UsersImport;
use App\Models\UsersExport;

class GreenPassController extends Controller
{
    public function gpslist(Request $request)
    {
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $user_key = $request->get('user_key');
        $result = [];
        $result['result'] = false;

        if (empty($latitude) || empty($longitude)) {
            $result['ment'] = '현재 위치 좌표가 확인되지 않습니다. 잠시 후 다시 시도해주세요.';
            return $result;
        }

//        $gpslist = DB::table("partner_auth")->offset(0)->limit(20)->orderBy('order', 'asc')->orderBy('partner_auth_seqno', 'desc')->orderBy('location_name', 'asc')->get();
        $gpslist = DB::table("partner_auth")
            ->select(DB::raw('CASE WHEN (location_x is null OR location_y is null OR location_x < 0 OR location_y < 0) 
                                        THEN 3400000000.0
                                        ELSE (POW((location_x-'.((float)$latitude).'), 2) + POW((location_y-'.((float)$longitude).'), 2)) END
                                as distance
                               , partner_auth_seqno, admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img'))
            ->offset(0)->limit(20)->orderBy('distance', 'asc')->orderBy('partner_auth_seqno', 'desc')->orderBy('location_name', 'asc')->get();
        
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
}
