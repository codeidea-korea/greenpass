<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Mail;
use App\Mail\BranchAcceptMail;

class BuyerController extends Controller
{    
    //    발주처 등록
    public function addBuyer(Request $request)
    {
        $id = $request->post('id');
        $pw = $request->post('pw');
        $companyAddress1 = $request->post('companyAddress1', '');
        $companyAddress2 = $request->post('companyAddress2', '');
        $companyAddress3 = $request->post('companyAddress3', '');
        $gpsX = $request->post('gpsX'); // googleMap 연동 정보
        $gpsY = $request->post('gpsY'); // googleMap 연동 정보
        $name = $request->post('name'); // director_name
        $depth1 = $request->post('depth1');
        $depth2 = $request->post('depth2');
        $depth3 = $request->post('depth3'); 
        $type = $request->post('type'); // partner_type
        $code = $request->post('code'); // partner_type

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        /*
        if (empty($id) || empty($pw) || empty($businessNo) || empty($businessFilePath) 
            || empty($companyName) || empty($partnerName) || empty($companyPhoneNo) 
            || empty($companyAddress) || empty($partnerPhoneNo)) {
            return $result;
        }
        */

        $adminUser = DB::table("partner")->where([
            ['partner_id', '=', $id]
        ])->first();

        if (! empty($adminUser)) {
            $result['ment'] = '이미 가입신청된 아이디입니다.';
            return $result;
        }
        if (! empty($pw)) {
            $pw = base64_encode(hash('sha256', $pw, true));
        }

        DB::table('partner')->insertGetId(
            [
                'partner_id' => $id
                , 'partner_type' => $type
                , 'language_code' => $code
                , 'partner_password' => $pw
                , 'company_address1' => $companyAddress1
                , 'company_address2' => $companyAddress2
                , 'company_address3' => $companyAddress3
                , 'gps_x' => $gpsX
                , 'gps_y' => $gpsY
            ]
        );
        $adminUser = DB::table("partner")->where([
            ['partner_id', '=', $id]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '디비 오류';
            return $result;
        }
        DB::table('partner_buyer')->insertGetId(
            [
                'partner_seqno' => $adminUser->partner_seqno
                , 'status' => 'I'
                , 'buyer_name' => ''
                , 'director_name' => $name
                , 'depth1' => $depth1
                , 'depth2' => $depth2
                , 'depth3' => $depth3
            ]
        );
        // 메일 전송
        $details = [
            'title' => '[GREENPASS] 발주처 가입을 위해 추가정보를 입력하여주세요.',
            'body' => $name.'님, 발주처 가입을 위한 기반 정보가 입력되었습니다. 추가 정보를 입력하시면 가입이 완료됩니다. <br><a href="https://greenpass.codeidea.io/admin/additional-info?key='.
                $id.'">추가 정보 입력</a></br>'
        ];
        Mail::to($adminUser->partner_id)->send(new BranchAcceptMail($details));

        $result['ment'] = '신청되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
    //    발주처 수정
    public function modifyBranch(Request $request)
    {
        $id = $request->post('id');
        $pw = $request->post('pw');
        $companyAddress1 = $request->post('companyAddress1', '');
        $companyAddress2 = $request->post('companyAddress2', '');
        $companyAddress3 = $request->post('companyAddress3', '');
        $gpsX = $request->post('gpsX'); // googleMap 연동 정보
        $gpsY = $request->post('gpsY'); // googleMap 연동 정보
        $name = $request->post('name'); // director_name
        $depth1 = $request->post('depth1');
        $depth2 = $request->post('depth2');
        $depth3 = $request->post('depth3'); 
        $type = $request->post('type'); // partner_type

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        /*
        if (empty($id) || empty($pw) || empty($businessNo) || empty($businessFilePath) 
            || empty($companyName) || empty($partnerName) || empty($companyPhoneNo) 
            || empty($companyAddress) || empty($partnerPhoneNo)) {
            return $result;
        }
        */

        $adminUser = DB::table("partner")->where([
            ['partner_id', '=', $id]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '존재하지 않는 아이디입니다.';
            return $result;
        }
        if (! empty($pw)) {
            $pw = base64_encode(hash('sha256', $pw, true));
        }
        
        DB::table('partner')->where('partner_seqno', '=', $adminUser->partner_seqno)->update(
            [
                'partner_id' => $id
                , 'partner_type' => $type
                , 'language_code' => $code
                , 'partner_password' => $pw
                , 'company_address1' => $companyAddress1
                , 'company_address2' => $companyAddress2
                , 'company_address3' => $companyAddress3
                , 'gps_x' => $gpsX
                , 'gps_y' => $gpsY
            ]
        );
        DB::table('partner_buyer')->where('partner_seqno', '=', $adminUser->partner_seqno)->update(
            [
                'partner_seqno' => $adminUser->partner_seqno
                , 'status' => 'A'
                , 'buyer_name' => ''
                , 'director_name' => $name
                , 'depth1' => $depth1
                , 'depth2' => $depth2
                , 'depth3' => $depth3
            ]
        );
        // 메일 전송
        $details = [
            'title' => '[GREENPASS] 발주처 가입이 완료되었습니다.',
            'body' => $name.'님, 발주처 가입이 완료되었습니다.'
        ];
        Mail::to($adminUser->partner_id)->send(new BranchAcceptMail($details));

        $result['ment'] = '가입완료 되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
    //    발주처 검색
    public function getBuyers(Request $request)
    {
        $pageNo = $request->get('pageNo', 1);
        $pageSize = $request->get('pageSize', 10);

        $result = [];
        $result['ment'] = '검색 정보를 입력해주세요.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        $buyers = DB::table("partner_buyer")
            ->leftJoin('partner', 'partner.partner_seqno', '=', 'partner_buyer.partner_seqno')
            ->select('partner_buyer.*', 'partner.partner_id', 'partner.partner_type')
            ->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->orderByDesc('create_dt')->get();

        $totCnt = DB::table("partner_buyer")->count();
        
        $result['data'] = ['auth' => $buyers, 'totCnt' => $totCnt];
        $result['ment'] = '성공';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }
    //    발주처 검색 (단건)
    public function getBuyer(Request $request)
    {
        $buyerNo = $request->get('buyerNo', 0);

        $result = [];
        $result['ment'] = '검색 정보를 입력해주세요.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        if($buyerNo <= 0) {
            return $result;
        }

        $companyInfo = DB::table("partner")->where([
                ['partner_seqno', '=', $buyerNo]
            ])->first();

        if (empty($companyInfo)) {
            return $result;
        }
        $companyInfo->partner_password = '';
        if($companyInfo->partner_type == 'BR'){
            return $result;
        }
        // 발주처의 경우
        $department = DB::table("partner_buyer")->where([
            ['partner_seqno', '=', $companyInfo->partner_seqno]
        ])->first();

        if (empty($department)) {
            return $result;
        }
        
        $result['data'] = ['companyInfo' => $companyInfo, 'department' => $department];
        $result['ment'] = '성공';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }
}
