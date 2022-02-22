<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuthSmsController extends Controller
{
    public function index(Request $request)
    {
        $pageNo = $request->post('pageNo', 1);
        $pageSize = $request->post('pageSize', 10);

        $partner = DB::table("send_sms_auth_hst")->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->get();

        return $partner;
    }
    public function send(Request $request)
    {
        $phoneNo = $request->post('phoneNo', '');
        $user_birth = $request->post('user_birth', '');

        $result = [];
        $result['ment'] = '실패';
        $result['result'] = false;

        if (empty($phoneNo)) {
            $result['ment'] = '전화번호를 입력해주세요.';
            return $result;
        }

        $auth_code = random_int(1000, 9999);
//        $sender = "01054405414";                    //필수입력
        $sender = "15886306";                    //필수입력

        $id = DB::table('send_sms_auth_hst')->insertGetId(
            [
                'sender_phone' => $sender
                , 'receive_phone' => $phoneNo
                , 'user_birthday' => $user_birth
                , 'auth_code' => $auth_code
            ]
        );

        /* 예약 API 사용시 여기서부터 삭제후 이용 하시기 바랍니다. */
        $ch = curl_init();
        /* 여기서부터 수정해주시기 바랍니다. */
        $title = "그린패스 본인인증입니다.";
        $message = '안녕하세요. 그린패스 입니다. 인증번호는 [$NOTE1] 입니다.';             //필수입력
        $username = "codeidea";                //필수입력
        $key = "mUJrCPVuyMOq02W";           //필수입력

        //수신자 정보 추가 - 필수 입력(주소록 미사용시), 치환문자 미사용시 치환문자 데이터를 입력하지 않고 사용할수 있습니다.
        //치환문자 미사용시 "{"mobile":"01000000001"} 번호만 입력 해주시기 바랍니다.
        $receiver = '{"mobile":"' .$phoneNo. '","note1":"' .$auth_code. '","note2":"","note3":"","note4":"","note5":""}';
        $receiver = '['.$receiver.']';

        // 예약발송 정보 추가
        $sms_type = 'NORMAL'; // NORMAL - 즉시발송 / ONETIME - 1회예약 / WEEKLY - 매주정기예약 / MONTHLY - 매월정기예약
        $start_reserve_time = date('Y-m-d H:i:s'); //  발송하고자 하는 시간(시,분단위까지만 가능) (동일한 예약 시간으로는 200회 이상 API 호출을 할 수 없습니다.)
        $end_reserve_time = date('Y-m-d H:i:s'); //  발송이 끝나는 시간 1회 예약일 경우 $start_reserve_time = $end_reserve_time
        // WEEKLY | MONTHLY 일 경우에 시작 시간부터 끝나는 시간까지 발송되는 횟수 Ex) type = WEEKLY, start_reserve_time = '2017-05-17 13:00:00', end_reserve_time = '2017-05-24 13:00:00' 이면 remained_count = 2 로 되어야 합니다.
        $remained_count = 1;
        // 예약 수정/취소 API는 소스 하단을 참고 해주시기 바랍니다.

        // 실제 발송성공실패 여부를 받기 원하실 경우 아래 주석을 해제하신 후, 사이트에 등록한 URL 번호를 입력해 주시기 바랍니다.
        $return_url_yn = TRUE;        //return_url 사용시 필수 입력
        $return_url = 1;

        /* 여기까지 수정해주시기 바랍니다. */
        $message = str_replace(' ', ' ', $message);  //유니코드 공백문자 치환

        // 첨부파일이 있을 시 아래 주석을 해제하고 첨부하실 파일의 URL을 입력하여 주시기 바랍니다.
        // jpg파일당 300kb 제한 3개까지 가능합니다.
        //$file[] = array('attc' => 'https://directsend.co.kr/jpgimg1.jpg');
        //$file[] = array('attc' => 'https://directsend.co.kr/jpgimg2.jpg');
        //$file[] = array('attc' => 'https://directsend.co.kr/jpgimg3.jpg');
        //$attaches = json_encode($file);

        $postvars = '"title":"'.$title.'"';
        $postvars = $postvars.', "message":"'.$message.'"';
        $postvars = $postvars.', "sender":"'.$sender.'"';
        $postvars = $postvars.', "username":"'.$username.'"';
        $postvars = $postvars.', "receiver":'.$receiver.'';
        //$postvars = $postvars.', "address_books":"'.$address_books.'"';       //주소록 사용할 경우 주석 해제
        $postvars = $postvars.', "return_url_yn":'.$return_url_yn;       // return_url이 있는 경우 주석해제 바랍니다.
        $postvars = $postvars.', "return_url":'.$return_url;       // return_url이 있는 경우 주석해제 바랍니다.
        //$postvars = $postvars.', "attaches":'.$attaches;   //첨부파일이 있는 경우 주석해제 바랍니다.
        $postvars = $postvars.', "key":"'.$key.'"';
        $postvars = '{'.$postvars.'}';      //JSON 데이터

        $url = "https://directsend.co.kr/index.php/api_v2/sms_change_word";         //URL

        //헤더정보
        $headers = array("cache-control: no-cache","content-type: application/json; charset=utf-8");

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $response = json_decode($response);

        /*
            * response 성공
            * {"status":0}
            * 성공 코드번호 (성공코드는 다이렉트센드 DB서버에 정상수신됨을 뜻하며 발송성공(실패)의 결과는 발송완료 이후 확인 가능합니다.)
            *
            * 잘못된 번호가 포함된 경우
            * {"status":0, "msg":"유효하지 않는 번호를 제외하고 발송 완료 하였습니다.", "msg_detail":"error mobile : 01000000001aa, 010112"}
            * 성공 코드번호 (성공코드는 다이렉트센드 DB서버에 정상수신됨을 뜻하며 발송성공(실패)의 결과는 발송완료 이후 확인 가능합니다.), 내용, 잘못된 데이터
            *
        */
        /*
            status code
            0   : 정상발송 (성공코드는 다이렉트센드 DB서버에 정상수신됨을 뜻하며 발송성공(실패)의 결과는 발송완료 이후 확인 가능합니다.)
            100 : POST validation 실패
            101 : sender 유효한 번호가 아님
            102 : receiver 유효한 번호가 아님
            103 : api key or user is invalid
            104 : recipient count = 0
            105 : message length = 0
            106 : message validation 실패
            107 : 이미지 업로드 실패
            108 : 이미지 갯수 초과
            109 : return_url이 없음
            110 : 이미지 용량 300kb 초과
            111 : 이미지 확장자 오류
            112 : euckr 인코딩 에러 발생
            113 : utf-8 인코딩 에러 발생
            114 : 예약정보가 유효하지 않습니다.
            200 : 동일 예약시간으로는 200회 이상 API 호출을 할 수 없습니다.
            201 : 분당 300회 이상 API 호출을 할 수 없습니다.
            205 : 잔액부족
            999 : Internal Error.
        */

        //curl 에러 확인
        if(curl_errno($ch)){
            $result['ment'] = curl_error($ch);
            return $result;
        }else{
            if($response->status != '0')
            {
                $result['ment'] = $response->msg;
                return $result;
            }
            if(!empty($response->msg))
            {
                $result['ment'] = $response->msg;
                return $result;
            }
        }
        curl_close ($ch);
        $result['result'] = true;
        $result['ment'] = '성공';
//        $result['auth_code'] = $auth_code;
        $result['response'] = json_encode($response);

        return $result; // $auth_code;
    }

    public function saveSmsHistory(Request $request){
        $sms_id = $request->post('sms_id', '');
        $Callee = $request->post('Callee', '');
        $ResultCode = $request->post('ResultCode', '');
        $Result = $request->post('Result', 'failure');
        $Success = $request->post('Success', '0');
        $Failed = $request->post('Failed', '0');
        $SendTime = $request->post('SendTime', '');

        // ResultCode - 100 : 발송대기 / 0 : 성공 / 2,5,7 : 네트워크에러 / 3 : 메시지 포맷에러 / 4 :잘못된번호 / 6 : 음영지역 / 9 : 수신거부 / 15 : 중복번호 / 1,8,10,11,12,13,14,99기타
        $id = DB::table('if_send_sms_hst')->insertGetId(
            [
                'sms_id' => (int)($sms_id)
                , 'callee' => $Callee
                , 'result_code' => $ResultCode
                , 'result' => $Result
                , 'success_code' => (int)($Success)
                , 'failed_code' => (int)($Failed)
                , 'send_time' => $SendTime
            ]
        );

        return response()->json([
            'sms_id' => $sms_id
            , 'callee' => $Callee
            , 'result_code' => $ResultCode
            , 'result' => $Result
            , 'success_code' => $Success
            , 'failed_code' => $Failed
            , 'send_time' => $SendTime
        ]);
    }

    public function check(Request $request)
    {
        $phoneNo = $request->get('phoneNo', '');
        $auth_code = $request->get('auth_code', '');
        $id = $request->get('id', '');
        $lan = $request->post('lan', '');
        $result = [];
        
        if (empty($phoneNo)) {
            $result['ment'] = '전화번호를 입력해주세요.';
            return $result;
        }
        if (empty($id)) {
            $result['ment'] = '생년월일을 입력 하여 주세요.';
            return $result;
        }

        $auth = DB::table("send_sms_auth_hst")->where([
            ['receive_phone', '=', $phoneNo]
            , ['auth_code', '=', $auth_code]
            ])->orderBy('create_dt', 'desc')->first();
        
        $userInfo = DB::table('user_info')->where([
            ['user_phone', '=', $phoneNo]
            , ['user_birthday', '=', $id]
        ])->first();

        $result['result'] = true;
        $result['ment'] = '성공';

        if(empty($userInfo)){
            if(empty($lan) || $lan == '') {
                $lan = 'ko';
            }
            $key = DB::table('user_info')->insertGetId(
                [
                    'user_birthday' => $id
                    , 'user_phone' => $phoneNo
                    , 'lan' => $lan
                ]
            );
            $userInfo = DB::table('user_info')->where([
                ['user_phone', '=', $phoneNo]
                , ['user_birthday', '=', $id]
            ])->first();
            $result['user_key'] = $userInfo->user_seqno;
        } else {
            $result['user_key'] = $userInfo->user_seqno;
            if(! empty($lan) && $lan != '') {
                DB::table('user_info')->where([
                    ['user_seqno', '=', $userInfo->user_seqno]
                ])->update(
                    [
                        'lan' => $lan
                    ]
                );
            }
        }
        $result['data'] = $auth;
        $userInfo->lan = $lan;
        $result['userInfo'] = $userInfo;

        return response()->json($result);
    }
}
