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

class BranchController extends Controller
{
    // branch 이메일 중복확인 
    public function isDuplicatedId(Request $request)
    {
        $id = $request->get('id');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        if (empty($id)) {
            return $result;
        }

        $adminUser = DB::table("partner")->where([
            ['partner_id', '=', $id]
        ])->first();

        if (!empty($adminUser)) {
            $result['ment'] = '이미 가입된 아이디입니다.';
            return $result;
        }
        $result['ment'] = '등록되지 않은 아이디입니다. 신청을 진행해주세요.';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }
    //    branch 사업증 업로드 (jpg)
    public function uploadCompanyNumber(Request $request)
    {
        $path = $request->upload->store('company_numbers');

        $result['ment'] = '업로드 성공';
        $result['code'] = 'SC-001';
        $result['path'] = '/' . $path;
        $result['result'] = true;

        return $result;
    }
    
    //    branch 등록
    public function addBranch(Request $request)
    {
        $id = $request->post('id', '아이디 미등록 지점');
        $pw = $request->post('pw', '');
        $businessNo = $request->post('businessNo');
        $businessFilePath = $request->post('businessFilePath');
        $companyName = $request->post('companyName');
        $partnerName = $request->post('partnerName');
        $companyPhoneNo = $request->post('companyPhoneNo');
        $companyAddress1 = $request->post('companyAddress1', '');
        $companyAddress2 = $request->post('companyAddress2', '');
        $companyAddress3 = $request->post('companyAddress3', '');
        $gpsX = $request->post('gpsX'); // googleMap 연동 정보
        $gpsY = $request->post('gpsY'); // googleMap 연동 정보
        $partnerPhoneNo = $request->post('partnerPhoneNo');
        $code = $request->post('code');

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

        if(empty($id) || $id == '아이디 미등록 지점') {
            $pw = '1q2w3e4r!';
            $partnerSeq = DB::table('partner')->insertGetId(
                [
                    'partner_id' => $id
                    , 'partner_type' => 'BR'
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
                ['partner_seqno', '=', $partnerSeq]
            ])->first();
        } else {
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
                    , 'partner_type' => 'BR'
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
        }

        if (empty($adminUser)) {
            $result['ment'] = '디비 오류';
            return $result;
        }
        
        DB::table('partner_branch')->insertGetId(
            [
                'partner_seqno' => $adminUser->partner_seqno
                , 'status' => 'I'
                , 'business_registration_no' => $businessNo
                , 'business_registration_file' => $businessFilePath
                , 'company_name' => $companyName
                , 'company_phone' => $companyPhoneNo
                , 'partner_name' => $partnerName
                , 'partner_phone' => $partnerPhoneNo
            ]
        );

        if(empty($id) || $id == '아이디 미등록 지점') {
        } else {
            // 메일 전송
            if (! empty($pw)) {
                $pw = base64_encode(hash('sha256', $pw, true));
            }
            $details = [
                'title' => '[GREENPASS] 가맹점 가입 신청이 되었습니다.',
                'body' => $companyName.'님, 가맹점 가입 신청이 되었습니다.'
                    . (empty($pw) 
                        ? ' 추가 정보를 입력하시면 가입이 마무리됩니다. <br><a href="https://greenpass.codeidea.io/admin/branch-new?key='. $id.'">추가 정보 입력</a></br>'
                        : '')
            ];
            Mail::to($adminUser->partner_id)->send(new BranchAcceptMail($details));
        }

        $result['ment'] = '신청되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
    //    branch 비밀번호 확인
    public function confirmPasswordByAdmin(Request $request)
    {
        $branchNo = $request->post('branchNo');
        $pw = $request->post('pw');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        if (empty($branchNo) || empty($pw)) {
            return $result;
        }
        $adminUser = DB::table("partner")->where([
            ['partner_seqno', '=', $branchNo]
        ])->first();

        if (empty($adminUser)) {
            return $result;
        }
        $pw = base64_encode(hash('sha256', $pw, true));

        if ($adminUser->partner_password != $pw) {
            $result['ment'] = '비밀번호가 일치하지 않습니다. 확인 후 입력해주세요.';
            return $result;
        }

        $result['ment'] = '확인되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
    //    branch 수정
    public function modifyBranch(Request $request)
    {
        $branchNo = $request->post('branchNo');
        $companyName = $request->post('companyName');
        $businessNo = $request->post('businessNo');
        $businessFilePath = $request->post('businessFilePath');
        $partnerName = $request->post('partnerName');
        $companyPhoneNo = $request->post('companyPhoneNo');
        $companyAddress1 = $request->post('companyAddress1', '');
        $companyAddress2 = $request->post('companyAddress2', '');
        $companyAddress3 = $request->post('companyAddress3', '');
        $gpsX = $request->post('gpsX', ''); // googleMap 연동 정보
        $gpsY = $request->post('gpsY', ''); // googleMap 연동 정보
        $partnerPhoneNo = $request->post('partnerPhoneNo');
        $code = $request->post('code', 'KR');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        /*
        if (empty($id) || empty($branchNo) || empty($businessNo) || empty($businessFilePath) 
            || empty($companyName) || empty($partnerName) || empty($companyPhoneNo) 
            || empty($companyAddress) || empty($partnerPhoneNo)) {
            return $result;
        }
        */

        $adminUser = DB::table("partner")->where([
            ['partner_seqno', '=', $branchNo]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '존재하지 않는 아이디입니다.';
            return $result;
        }
        if (! empty($pw)) {
            $pw = base64_encode(hash('sha256', $pw, true));
        } else {
            $pw = $adminUser->partner_password;
        }

        DB::table('partner')->where('partner_seqno', '=', $adminUser->partner_seqno)->update(
            [
                'partner_type' => 'BR'
                , 'language_code' => $code
                , 'partner_password' => $pw
                , 'company_address1' => $companyAddress1
                , 'company_address2' => $companyAddress2
                , 'company_address3' => $companyAddress3
                , 'gps_x' => $gpsX
                , 'gps_y' => $gpsY
            ]
        );

        DB::table('partner_branch')->where('partner_seqno', '=', $adminUser->partner_seqno)->update(
            [
                'partner_seqno' => $adminUser->partner_seqno
                , 'status' => 'A'
                , 'business_registration_no' => $businessNo
                , 'business_registration_file' => $businessFilePath
                , 'company_name' => $companyName
                , 'company_phone' => $companyPhoneNo
                , 'partner_name' => $partnerName
                , 'partner_phone' => $partnerPhoneNo
            ]
        );

        if($adminUser->partner_auth_seqno > 0) {
            DB::table('partner_auth')->where('partner_auth_seqno', '=', $adminUser->partner_auth_seqno)->update(
                [
                    'language_code' => $code
                ]
            );
        }

        $result['ment'] = '신청되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
    //    branch 상호명 검색(다건)
    public function getAuthByBranchs(Request $request)
    {
        $searchType = $request->get('type', 'A');

        $startDt = $request->get('startDt');
        $endDt = $request->get('endDt');
        $branchName = $request->get('branchName');
        $visitorNo = $request->get('visitorNo');
        $pageNo = $request->get('pageNo', 1);
        $pageSize = $request->get('pageSize', 10);

        $result = [];
        $result['ment'] = '검색 정보를 입력해주세요.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        $where = [];
        if(! empty($startDt)){
            array_push($where, ['user_auth_hst.create_dt', '>', str_replace('.', '-', $startDt)]);
        }
        if(! empty($endDt)){
            array_push($where, ['user_auth_hst.create_dt', '<', str_replace('.', '-', $endDt)]);
        }
        if(! empty($branchName)){
            array_push($where, ['user_auth_hst.location_name', 'like', $branchName]);
        }
        if($searchType == 'V'){
            array_push($where, ['user_phone', 'like', '%'.$visitorNo.'%']);

            $auths = DB::table("user_auth_hst")
                ->join('user_info', 'user_info.user_seqno', '=', 'user_auth_hst.user_seqno')
                ->leftJoin('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
                ->select('user_auth_hst.location_name'
                    , 'partner.partner_seqno'
                    , 'user_auth_hst.partner_auth_seqno'
                    , 'partner.company_address1'
                    , 'user_info.user_phone'
                    , 'user_info.sns_mail'
                    , 'user_info.user_seqno'
                    , 'user_auth_hst.auth_type'
                    , 'user_info.create_dt')
                ->where($where)
                ->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->orderByDesc('partner_auth_seqno')->get();

            $totCnt = DB::table("user_auth_hst")
                ->join('user_info', 'user_info.user_seqno', '=', 'user_auth_hst.user_seqno')
                ->leftJoin('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
                ->select('user_auth_hst.location_name'
                    , 'partner.partner_seqno'
                    , 'user_auth_hst.partner_auth_seqno'
                    , 'partner.company_address1'
                    , 'user_info.user_phone'
                    , 'user_info.sns_mail'
                    , 'user_info.user_seqno'
                    , 'user_auth_hst.auth_type'
                    , 'user_info.create_dt')
                ->where($where)->count();
            $result['data'] = ['auth' => $auths, 'totCnt' => $totCnt];
        } else {
            $where2 = [];
            if(! empty($branchName)){
                array_push($where2, ['partner_branch.company_name', 'like', $branchName]);
            }
            $auths = DB::table("partner_branch")
                ->join('partner', 'partner_branch.partner_seqno', '=', 'partner.partner_seqno')
                ->where($where2)
                ->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->orderByDesc('partner_auth_seqno')->get();
            
            for($inx = 0; $inx < count($auths); $inx++){
                $where3 = [];
                if(! empty($startDt)){
                    array_push($where3, ['create_dt', '>=', str_replace('.', '-', $startDt)]);
                }
                if(! empty($endDt)){
                    array_push($where3, ['create_dt', '<=', str_replace('.', '-', $endDt)]);
                }
                array_push($where3, ['partner_auth_seqno', '=', $auths[$inx]->partner_auth_seqno]);

                $authCnt = DB::table("user_auth_hst")
                    ->where($where3)->count();
                $auths[$inx]->authCnt = $authCnt;

                $visitCnt = DB::table("user_auth_hst")
                    ->where($where3)->groupBy('user_seqno')->count();
                $auths[$inx]->visitCnt = $visitCnt;
            }
            $totCnt = DB::table("partner_branch")
                ->join('partner', 'partner_branch.partner_seqno', '=', 'partner.partner_seqno')
                ->where($where2)->count();

            $result['data'] = ['auth' => $auths, 'totCnt' => $totCnt];
        }
        
        $result['ment'] = '성공';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }
    //    branch 상호명 검색 > 인증 이력 출력
    public function getAuthByBranch(Request $request)
    {
        $startDt = $request->get('startDt');
        $endDt = $request->get('endDt');
        $branchNo = $request->get('branchNo', 0);
        $visitorNo = $request->get('visitorNo', 0);
        $pageNo = $request->get('pageNo', 1);
        $pageSize = $request->get('pageSize', 10);

        $result = [];
        $result['ment'] = '검색 정보를 입력해주세요.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        /*
        if ((empty($startDt) && empty($endDt)) && empty($branchNo)) {
            return $result;
        }
        */
        $where = [];
        if(! empty($startDt)){
            array_push($where, ['user_auth_hst.create_dt', '>', str_replace('.', '-', $startDt)]);
        }
        if(! empty($endDt)){
            array_push($where, ['user_auth_hst.create_dt', '<', str_replace('.', '-', $endDt)]);
        }
        if($branchNo > 0){
            array_push($where, ['user_auth_hst.partner_auth_seqno', '=', $branchNo]);
        }
        if($visitorNo > 0){
            $userInfo = DB::table("user_info")->where([
                    ['user_phone', '=', $visitorNo]
                ])->first();
    
            if (empty($userInfo)) {
                return $result;
            }
            array_push($where, ['user_auth_hst.user_seqno', '=', $userInfo->user_seqno]);
        }

        $companyInfo = null;
        if($branchNo > 0) {
            $companyInfo = DB::table("partner")->where([
                    ['partner_auth_seqno', '=', $branchNo]
                ])->first();
    
            if (empty($companyInfo)) {
                return $result;
            }
            $companyInfo->partner_password = '';
            // 가맹점인 경우
            if($companyInfo->partner_type == 'BR'){
                $branch = DB::table("partner_branch")->where([
                    ['partner_seqno', '=', $companyInfo->partner_seqno]
                ])->first();
    
                if (empty($branch)) {
                    return $result;
                }
                $result['detailInfo'] = $branch;
            }
            // 발주처의 경우
            if($companyInfo->partner_type == 'BG' || $companyInfo->partner_type == 'BL'){
                $department = DB::table("partner_buyer")->where([
                    ['partner_seqno', '=', $companyInfo->partner_seqno]
                ])->first();
    
                if (empty($department)) {
                    return $result;
                }
                $result['detailInfo'] = $department;
            }
        }
        $visitorInfo = null;
        if($visitorNo > 0) {
            $visitorInfo = DB::table("user_info")->where([
                    ['user_phone', '=', $visitorNo]
                ])->first();
    
            if (empty($visitorInfo)) {
                return $result;
            }
            $result['countAuth'] = DB::table("user_auth_hst")->where([
                    ['user_seqno', '=', $visitorInfo->user_seqno]
                ])->count();
        }

        $auths = DB::table("user_auth_hst")
            ->leftJoin('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
            ->select('user_seqno'
                , 'partner_seqno'
                , DB::raw('count(*) as authCnt')
                , DB::raw('count(*) as visitCnt'))
            ->where($where)
            ->groupBy('partner_seqno', 'user_seqno')
            ->first();

        $authDetail = DB::table("user_auth_hst")
            ->leftJoin('user_info', 'user_info.user_seqno', '=', 'user_auth_hst.user_seqno')
            ->select('user_info.user_phone', 'user_info.sns_mail', 'user_auth_hst.location_name', 'user_auth_hst.auth_type', 'user_auth_hst.create_dt')
            ->where($where)->orderByDesc('create_dt')
            ->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->get();

        $totCnt = DB::table("user_auth_hst")
            ->leftJoin('user_info', 'user_info.user_seqno', '=', 'user_auth_hst.user_seqno')
            ->select('user_info.user_phone', 'user_info.sns_mail', 'user_auth_hst.auth_type', 'user_auth_hst.create_dt')
            ->where($where)->count();
        
        $result['data'] = ['auth' => $auths, 'authDetail' => $authDetail, 'totCnt' => $totCnt, 'companyInfo' => $companyInfo
            , 'visitorInfo' => $visitorInfo];
        $result['ment'] = '성공';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }

    //    branch 승인 리스트 조회
    public function getBranchs(Request $request)
    {
        $branchName = $request->get('branchName');
        $status = $request->get('status');
        $pageNo = $request->get('pageNo', 1);
        $pageSize = $request->get('pageSize', 10);

        $result = [];
        $result['ment'] = '검색 정보를 입력해주세요.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        $where = [];
        if(! empty($branchName)){
            array_push($where, ['company_name', 'like', $branchName]);
        }
        if(! empty($status)){
            array_push($where, ['status', '=', $status]);
        }

        $branches = DB::table("partner_branch")
            ->leftJoin('partner', 'partner.partner_seqno', '=', 'partner_branch.partner_seqno')
            ->select('partner_branch.*', 'partner.language_code', 'partner.partner_auth_seqno', 'partner.partner_id', 'partner.company_address1'
                , 'partner.company_address2', 'partner.company_address3')
            ->where($where)
            ->orderByDesc('create_dt')
            ->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->get();

        $totCnt = DB::table("partner_branch")
            ->select('partner_branch.*', 'partner.language_code', 'partner.partner_auth_seqno', 'partner.partner_id', 'partner.company_address1'
                , 'partner.company_address2', 'partner.company_address3')
            ->where($where)->count();
        
        $result['data'] = ['branches' => $branches, 'totCnt' => $totCnt];
        $result['ment'] = '성공';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }
    //    branch 승인 조회 (단건)
    public function getBranch(Request $request)
    {
        $branchNo = $request->get('branchNo');

        $result = [];
        $result['ment'] = '검색 정보를 입력해주세요.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        $where = [];
        if(empty($branchNo)){
            return $result;
        }

        $branchInfo = DB::table("partner_branch")
            ->where([
                ['partner_seqno', '=', $branchNo]
            ])->first();
        $partnerInfo = DB::table("partner")
            ->where([
                ['partner_seqno', '=', $branchNo]
            ])->first();
        
        $result['data'] = ['branchInfo' => $branchInfo, 'partnerInfo' => $partnerInfo];
        $result['ment'] = '성공';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }
    //    branch 반려 처리
    public function deniedBranch(Request $request)
    {
        $branchNo = $request->post('branchNo');
        $cause = $request->post('cause'); // status_content

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-001';
        $result['result'] = false;

        $where = [];
        if(empty($branchNo)){
            return $result;
        }

        $partnerInfo = DB::table("partner")
            ->where([
                ['partner_seqno', '=', $branchNo]
            ])->first();
        if (empty($partnerInfo)) {
            return $result;
        }
        $branchInfo = DB::table("partner_branch")
            ->where([
                ['partner_seqno', '=', $branchNo]
            ])->first();
        if (empty($branchInfo)) {
            return $result;
        }
        if ($branchInfo->status != 'I') {
            $result['ment'] = '신청 상태의 가맹점만 처리가 가능합니다.';
            return $result;
        }

        DB::table('partner_branch')->where('partner_seqno', '=', $branchNo)->update(
            [
                'status' => 'N'
                , 'status_content' => $cause
            ]
        );
        if(empty($partnerInfo->partner_id) || $partnerInfo->partner_id == '아이디 미등록 지점') {
        } else {
            // 메일 전송
            $details = [
                'title' => '[GREENPASS] 가맹점 승인 신청 결과 안내입니다.',
                'body' => '죄송하지만, 신청하신 내용은 반려되었습니다.<p>' . $cause . '</p>'
            ];
            Mail::to($partnerInfo->partner_id)->send(new BranchAcceptMail($details));
        }
        
        $result['data'] = ['branchInfo' => $branchInfo, 'partnerInfo' => $partnerInfo];
        $result['ment'] = '성공';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }
    //    branch 승인 처리
    public function apploveBranch(Request $request)
    {
        $adminNo = $request->post('adminNo', 1);
        $branchNo = $request->post('branchNo');
        $cause = $request->post('cause'); // status_content

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-001';
        $result['result'] = false;

        $where = [];
        if(empty($branchNo)){
            return $result;
        }

        $partnerInfo = DB::table("partner")
            ->where([
                ['partner_seqno', '=', $branchNo]
            ])->first();
        if (empty($partnerInfo)) {
            return $result;
        }
        $branchInfo = DB::table("partner_branch")
            ->where([
                ['partner_seqno', '=', $branchNo]
            ])->first();
        if (empty($branchInfo)) {
            return $result;
        }
        if ($branchInfo->status == 'A') {
            $result['ment'] = '이미 승인되어 있습니다.';
            return $result;
        }

        DB::table('partner_branch')->where('partner_seqno', '=', $branchNo)->update(
            [
                'status' => 'A'
                , 'status_content' => $cause
            ]
        );
        $partner_auth_seqno = DB::table('partner_auth')->insertGetId(
            [
                'admin_seqno' => $adminNo
                , 'gps_used' => 1
                , 'beacon_used' => 1
                , 'nfc_used' => 1
                , 'language_code' => $partnerInfo->language_code
                , 'location_x' => $partnerInfo->gps_x
                , 'location_y' => $partnerInfo->gps_y 
                , 'location_name' => $branchInfo->company_name
                , 'location_sub_name' => $branchInfo->company_name
                , 'location_img' => $branchInfo->business_registration_file // '/user/img/icon-certify-mini.png'
            ]
        );

        DB::table('partner')->where('partner_seqno', '=', $branchNo)->update(
            [
                'partner_auth_seqno' => $partner_auth_seqno
            ]
        );

        if(empty($partnerInfo->partner_id) || $partnerInfo->partner_id == '아이디 미등록 지점') {
        } else {
            // 메일 전송
            $details = [
                'title' => '[GREENPASS] 가맹점 승인 신청 결과 안내입니다.',
                'body' => '신청하신 내용이 승인되었습니다.<p>' . $cause . '</p>'
            ];
            Mail::to($partnerInfo->partner_id)->send(new BranchAcceptMail($details));
        }
        
        $result['data'] = ['branchInfo' => $branchInfo, 'partnerInfo' => $partnerInfo];
        $result['ment'] = '성공';
        $result['code'] = 'SC-001';
        $result['result'] = true;

        return $result;
    }
    //    전체/branch 시간별 가입자수/가맹점수/인증횟수/엑셀다운로드+이미지다운로드
    //    branch 조회 (단건/다건)
}
