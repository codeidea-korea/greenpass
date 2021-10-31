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

class UserController extends Controller
{
    public function user(Request $request)
    {
        $id = $request->get('id');

        if (empty($id)) {
            return back()->withErrors('정보를 입력해주세요.')->withInput($request->input());
        }

        $user = DB::table("user_info")->where('user_seqno', '=', $id)->first();

        return response()->json($user);
    }
    
    public function auth_add(Request $request)
    {
        $user_key = $request->post('user_key', '');
        $auth_type = $request->post('auth_type', '');
        $partner_auth_seqno = $request->post('partner_auth_seqno', '');
        
        $location_x = $request->post('location_x', '');
        $location_y = $request->post('location_y', '');
        $location_name = $request->post('location_name', '');
        $location_sub_name = $request->post('location_sub_name', '');

        $result = [];
        $result['ment'] = '실패';
        $result['result'] = false;

        if (empty($auth_type)) {
            $result['ment'] = '인증방식을 선택해주세요. (GPS, NFC, 비콘)';
            return $result;
        }
        if (empty($user_key)) {
            $result['ment'] = '로그인이 만료되었습니다. 다시 로그인하여 주세요.';
            return $result;
        }

        $id = DB::table('user_auth_hst')->insertGetId(
            [
                'user_seqno' => $user_key
                , 'auth_type' => $auth_type
                , 'partner_auth_seqno' => $partner_auth_seqno
                , 'location_x' => $location_x
                , 'location_y' => $location_y
                , 'location_name' => $location_name
                , 'location_sub_name' => $location_sub_name
                , 'create_dt' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s', time()) . ' +9 hours')) 
                , 'update_dt' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s', time()) . ' +9 hours')) 
            ]
        );
        $result['ment'] = '성공';
        $result['result'] = true;
        $result['data'] = $id;

        return $result;
    }
    public function auth_remove(Request $request)
    {
        $user_key = $request->post('user_key', '');

        $result = [];
        $result['ment'] = '실패';
        $result['result'] = false;

        if (empty($user_key)) {
            $result['ment'] = '로그인이 만료되었습니다. 다시 로그인하여 주세요.';
            return $result;
        }

        $result['data'] = DB::table("user_auth_hst")->where('user_seqno', '=', $user_key)->orderBy('user_auth_hst_seqno', 'desc')->first();

        if(!empty($result['data'])) {
            DB::table("user_auth_hst")->where('user_auth_hst_seqno', '=', $result['data']->user_auth_hst_seqno)->delete();
        }
        $result['ment'] = '성공';
        $result['result'] = true;

        return $result;
    }
    
    public function favorit_toggle(Request $request)
    {
        $user_key = $request->post('user_key', '');
        $partner_auth_seqno = $request->post('partner_auth_seqno', '');

        $result = [];
        $result['ment'] = '실패';
        $result['result'] = false;

        if (empty($partner_auth_seqno)) {
            $result['ment'] = '지점을 선택해주세요.';
            return $result;
        }
        if (empty($user_key)) {
            $result['ment'] = '로그인이 만료되었습니다. 다시 로그인하여 주세요.';
            return $result;
        }

        $user_favorite = DB::table('user_favorite')->where(
            [
                'user_seqno' => $user_key
                , 'partner_auth_seqno' => $partner_auth_seqno
            ]
        )->first();

        if(empty($user_favorite)) {
            $id = DB::table('user_favorite')->insertGetId(
                [
                    'user_seqno' => $user_key
                    , 'partner_auth_seqno' => $partner_auth_seqno
                ]
            );
            $id = 'I';
        } else {
            $id = DB::table('user_favorite')->where(
                [
                    'user_seqno' => $user_key
                    , 'partner_auth_seqno' => $partner_auth_seqno
                ]
            )->delete();
            $id = 'D';
        }

        $result['ment'] = '성공';
        $result['result'] = true;
        $result['data'] = $id;

        return $result;
    }

    public function auth_list(Request $request)
    {
        $user_key = $request->post('user_key', '');
        $auth_type = $request->post('auth_type', '');
        $pageNo = $request->get('pageNo', 1);
        $pageSize = $request->get('pageSize', 10);

        $result = [];
        $result['ment'] = '실패';
        $result['result'] = false;

        $where = [];

        if(!empty($user_key)) {
            array_push($where, ['user_seqno', '=', $user_key]);
        }
        if(!empty($auth_type)) {
            array_push($where, ['auth_type', '=', $auth_type]);
        }

        $result['ment'] = '성공';
        $result['result'] = true;
        // location_img
        $result['data'] = DB::table("user_auth_hst")->where($where)->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->orderBy('user_auth_hst_seqno', 'desc')->get();
        
        for($inx = 0; $inx < count($result['data']); $inx++){

            $gpslist = DB::table("partner_auth")->where([
                ['partner_auth_seqno', '=', $result['data'][$inx]->partner_auth_seqno]
            ])->first();
                        
            $result['data'][$inx]->location_img = $gpslist->location_img;
            
            $cntFavorite = DB::table('user_favorite')->where(
                [
                    'user_seqno' => $user_key
                    , 'partner_auth_seqno' => $result['data'][$inx]->partner_auth_seqno
                ]
            )->count();
            $result['data'][$inx]->isfavorite = $cntFavorite;
            
//            $result['data'][$inx]->create_dt = date('Y-m-d H:i:s', strtotime($result['data'][$inx]->create_dt . ' +9 hours'));
        }
        $result['totCnt'] = DB::table("user_auth_hst")->where($where)->count();

        return $result;
    }

    public function sns_login(Request $request)
    {
        $type = $request->post('type');
        $id = $request->post('id');

        $result = [];
        $result['ment'] = '실패';
        $result['result'] = false;

        if (empty($type)) {
            $result['ment'] = '정보가 없습니다. 다시 로그인하여 주세요.';
            return $result;
        }
        if (empty($id)) {
            $result['ment'] = '정보가 없습니다. 다시 로그인하여 주세요.';
            return $result;
        }

        $where = [];
        switch ($type) {
            case 'G':
                $where = ['sns_google', '=', $id];
            break;
            case 'A':
                $where = ['sns_apple', '=', $id];
            break;
            case 'N':
                $where = ['sns_naver', '=', $id];
            break;
            case 'K':
                $where = ['sns_kakao', '=', $id];
            break;
            default:
                $result['ment'] = '정보가 없습니다. 다시 로그인하여 주세요.';
                return $result;
        }

        $userInfo = DB::table("user_info")->where([$where])->first();
        if(empty($userInfo)){
            $insert = [];

            switch ($type) {
                case 'G':
                    $insert = ['sns_google' => $id];
                break;
                case 'A':
                    $insert = ['sns_apple' => $id];
                break;
                case 'N':
                    $insert = ['sns_naver' => $id];
                break;
                case 'K':
                    $insert = ['sns_kakao' => $id];
                break;
                default:
                    $result['ment'] = '정보가 없습니다. 다시 로그인하여 주세요.';
                    return $result;
            }

            $key = DB::table('user_info')->insertGetId(
                $insert
            );
            $userInfo = DB::table('user_info')->where([
                $where
            ])->first();
            $result['user_key'] = $userInfo->user_seqno;
        } else {
            $result['user_key'] = $userInfo->user_seqno;
        }
        $result['result'] = true;
        $result['ment'] = '성공';
        $result['data'] = $userInfo;

        return $result;
    }
}
