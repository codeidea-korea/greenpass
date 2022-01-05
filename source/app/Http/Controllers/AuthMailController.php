<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordMail;

class AuthMailController extends Controller
{
    public function index(Request $request)
    {
        $pageNo = $request->post('pageNo', 1);
        $pageSize = $request->post('pageSize', 10);

        $partner = DB::table("send_mail_auth_hst")->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->get();

        return $partner;
    }
    public function send(Request $request)
    {
        $mail = $request->post('mail', '');
        $user_birth = $request->post('user_birth', '');

        $result = [];
        $result['ment'] = '실패';
        $result['result'] = false;

        if (empty($mail)) {
            $result['ment'] = '메일을 입력해주세요.';
            return $result;
        }

        $auth_code = random_int(100000, 999999);

        $id = DB::table('send_mail_auth_hst')->insertGetId(
            [
                'receive_mail' => $mail
                , 'user_birthday' => $user_birth
                , 'auth_code' => $auth_code
            ]
        );
        // 메일 전송
        $details = [
            'code' => $auth_code
        ];
        Mail::to($mail)->send(new PasswordMail($details));

        $result['result'] = true;
        $result['ment'] = '성공';

        return $result; // $auth_code;
    }

    public function check(Request $request)
    {
        $mail = $request->get('mail', '');
        $auth_code = $request->get('auth_code', '');
        $user_birth = $request->get('user_birth', '');
        $result = [];
        
        if (empty($mail)) {
            $result['ment'] = '메일을 입력해주세요.';
            return $result;
        }
        if (empty($user_birth)) {
            $result['ment'] = '생년월일을 입력 하여 주세요.';
            return $result;
        }

        $auth = DB::table("send_mail_auth_hst")->where([
            ['receive_mail', '=', $mail]
            , ['auth_code', '=', $auth_code]
            , ['user_birthday', '=', $user_birth]
            ])->orderBy('create_dt', 'desc')->first();
        
        $userInfo = DB::table('user_info')->where([
            ['sns_mail', '=', $mail]
            , ['user_birthday', '=', $user_birth]
        ])->first();

        $result['result'] = true;
        $result['ment'] = '성공';

        if(empty($userInfo)){
            $key = DB::table('user_info')->insertGetId(
                [
                    'user_birthday' => $user_birth
                    , 'sns_mail' => $mail
                ]
            );
            $userInfo = DB::table('user_info')->where([
                ['sns_mail', '=', $mail]
                , ['user_birthday', '=', $user_birth]
            ])->first();
            $result['user_key'] = $userInfo->user_seqno;
        } else {
            $result['user_key'] = $userInfo->user_seqno;
        }
        $result['data'] = $auth;

        return response()->json($result);
    }
}
