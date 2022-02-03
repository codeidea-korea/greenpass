<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Mail\BranchAcceptMail;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $id = $request->post('id');
        $pw = $request->post('pw');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-001';
        $result['result'] = false;

        if (empty($id) || empty($pw)) {
            return $result;
        }
        $pw = base64_encode(hash('sha256', $pw, true));

        $adminUser = DB::table("partner")->where([
            ['partner_id', '=', $id]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '등록되지 않은 계정 정보입니다.';
            return $result;
        }

        if ($adminUser->partner_password != $pw) {
            $result['ment'] = '아이디와 비밀번호가 일치하지 않습니다. 입력 정보를 다시 한번 확인해주세요.';
            $result['code'] = 'ERR-002';
            return $result;
        }

        // 가맹점인 경우
        if($adminUser->partner_type == 'BR'){
            $branch = DB::table("partner_branch")->where([
                ['partner_seqno', '=', $adminUser->partner_seqno]
            ])->first();

            if (empty($branch)) {
                return $result;
            }
            if($branch->status == 'I') {
                $result['ment'] = '아직 승인되지 않았습니다.';
                $result['code'] = 'ERR-002';
                return $result;
            }
            if($branch->status == 'N') {
                $result['ment'] = '해당 계정은 사용이 반려되었습니다. 다른 계정을 사용 신청하여 주세요.';
                $result['code'] = 'ERR-003';
                return $result;
            }
            $result['detailInfo'] = $branch;
        }
        // 발주처의 경우
        if($adminUser->partner_type == 'BG' || $adminUser->partner_type == 'BL'){
            $department = DB::table("partner_buyer")->where([
                ['partner_seqno', '=', $adminUser->partner_seqno]
            ])->first();

            if (empty($department)) {
                return $result;
            }
            if($branch->status == 'I') {
                $result['ment'] = '아직 상세 정보를 입력하지 않았습니다.';
                $result['code'] = 'ERR-004';
                return $result;
            }
            $result['detailInfo'] = $department;
        }
        
        $adminUser->partner_password = '';
        $result['userInfo'] = $adminUser;
        $result['result'] = true;

        return $result;
    }

    public function findPassword(Request $request)
    {
        $id = $request->post('id');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-001';
        $result['result'] = false;

        if (empty($id)) {
            return $result;
        }

        $adminUser = DB::table("partner")->where([
            ['partner_id', '=', $id]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '등록되지 않은 아이디입니다. 입력 정보를 다시 한번 확인해주세요.';
            return $result;
        }
        // 가맹점인 경우
        if($adminUser->partner_type == 'BR'){
            $branch = DB::table("partner_branch")->where([
                ['partner_seqno', '=', $adminUser->partner_seqno]
            ])->first();

            if (empty($branch)) {
                return $result;
            }
            if($branch->status == 'I') {
                $result['ment'] = '아직 승인되지 않았습니다.';
                $result['code'] = 'ERR-002';
                return $result;
            }
            if($branch->status == 'N') {
                $result['ment'] = '해당 계정은 사용이 반려되었습니다. 다른 계정을 사용 신청하여 주세요.';
                $result['code'] = 'ERR-003';
                return $result;
            }
            $result['detailInfo'] = $branch;
        }
        // 발주처의 경우
        if($adminUser->partner_type == 'BG' || $adminUser->partner_type == 'BL'){
            $department = DB::table("partner_buyer")->where([
                ['partner_seqno', '=', $adminUser->partner_seqno]
            ])->first();

            if (empty($department)) {
                return $result;
            }
            if($branch->status == 'I') {
                $result['ment'] = '아직 상세 정보를 입력하지 않았습니다.';
                $result['code'] = 'ERR-004';
                return $result;
            }
            $result['detailInfo'] = $department;
        }
        
        $adminUser->partner_password = '';
        $result['userInfo'] = $adminUser;

        // 임시 비밀번호 생성
        $randomNum = mt_rand(10000000, 99999999);
        $pw = base64_encode(hash('sha256', $randomNum, true));

        DB::table('partner')->where('partner_seqno', '=', $adminUser->partner_seqno)->update(
            [
                'partner_password' => $pw
            ]
        );
        // 메일 전송
        $details = [
            'title' => '[GREENPASS] 비밀번호 재발급 안내입니다.',
            'body' => '귀하의 비밀번호는 ['. $randomNum .'] 로 변경되었습니다.'
        ];
        Mail::to($adminUser->partner_id)->send(new BranchAcceptMail($details));

        $result['ment'] = '메일로 내용이 전달되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }

    // 비밀번호 일치 여부 확인
    public function checkPassword(Request $request)
    {
        $bno = $request->post('bno');
        $password = $request->post('password');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-001';
        $result['result'] = false;

        if (empty($bno) || empty($password)) {
            return $result;
        }

        $adminUser = DB::table("partner")->where([
            ['partner_seqno', '=', $bno]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '등록되지 않은 아이디입니다. 입력 정보를 다시 한번 확인해주세요.';
            return $result;
        }
        $password = base64_encode(hash('sha256', $password, true));

        if ($adminUser->partner_password != $password) {
            $result['ment'] = '비밀번호가 일치하지 않습니다. 입력 정보를 다시 한번 확인해주세요.';
            return $result;
        }

        $result['ment'] = '비밀번호 검증 완료';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }

    //    관리자 언어 관리
    public function configureLanguage(Request $request)
    {
        $id = $request->post('id');
        $code = $request->post('code');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-005';
        $result['result'] = false;

        if (empty($id) || empty($code)) {
            return $result;
        }

        $adminUser = DB::table("partner")->where([
            ['partner_id', '=', $id]
        ])->first();

        if (empty($adminUser)) {
            return $result;
        }
        DB::table('partner')->where('partner_seqno', '=', $adminUser->partner_seqno)->update(
            [
                'language_code' => $code
            ]
        );

        $result['ment'] = '수정되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }

    public function mainByBranch(Request $request)
    {        
        $bno = $request->post('bno');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-001';
        $result['result'] = false;

        if (empty($bno)) {
            return $result;
        }
        $adminUser = DB::table("partner")->where([
            ['partner_seqno', '=', $bno]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '인증된 사용자만 조회가 가능합니다.';
            return $result;
        }
        $branchInfo = DB::table("partner_branch")->where([
            ['partner_seqno', '=', $bno]
        ])->first();

        $diLoc = $branchInfo->company_name;
        $data = [];

        // 실시간 일일 인증 횟수 (소속)
        $startDay = date("Y-m-d", time());
        $endDay = '9999-12-31 23:59:59';
        $data['auth_daily'] = $this->getAuthByRequestCnt('', '', '', $startDay, $endDay, $adminUser->partner_auth_seqno);
        // 일일 방문 횟수 (소속)
        $data['auth_visit'] = $this->getAuthCountByRequest('', '', '', $startDay, $endDay, 0, 0, 999999);
        // 실시간 인증 횟수 일간 시간별 데이터
        $startDay = date("Y-m-d", strtotime('-12 hours'));
        $data['auth_hourly_list'] = $this->getAuthByRequests('', '', '', $startDay, $endDay, 'D');
        // 월별 인증 횟수 (과거 12달)
        $startDay = date("Y-m-d", strtotime('-11 month'));
        $data['auth_monthly_list'] = $this->getAuthByRequests('', '', '', $startDay, $endDay, 'Y');
        // 실시간 인증 리스트
        $data['auth_list'] = $this->getRecentAuthByRequest('', '', '', $startDay, $endDay, $adminUser->partner_auth_seqno);
        $data['auth_tit'] = $diLoc;

        $result['data'] = $data;
        $result['ment'] = '조회 성공';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
    public function mainByStaff(Request $request)
    {
        $bno = $request->post('bno');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-001';
        $result['result'] = false;

        if (empty($bno)) {
            return $result;
        }
        $adminUser = DB::table("partner")->where([
            ['partner_seqno', '=', $bno]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '인증된 사용자만 조회가 가능합니다.';
            return $result;
        }
        $buyerInfo = DB::table("partner_buyer")->where([
            ['partner_seqno', '=', $bno]
        ])->first();

        // 위치 기준 명칭 <- AM 전역기준, BG 국가, BL 지역
        if($adminUser->partner_type == 'AM') {
            $diLoc = '전역';
            $buyerInfo->depth1 = null;
            $buyerInfo->depth2 = null;
            $buyerInfo->depth3 = null;
        } else if($adminUser->partner_type != 'BR') {
            $diLoc = '전역';

            if($adminUser->partner_type == 'BG') {
                $diLoc = $buyerInfo->depth1;

                $buyerInfo->depth2 = null;
                $buyerInfo->depth3 = null;
            } else if($adminUser->partner_type == 'BL') {
                $diLoc = $buyerInfo->depth1 . ' ' . $buyerInfo->depth2 . ' ' . $buyerInfo->depth3;
            }
        }
        $data = [];

        $startDay = date("Y-m-d", time());
        $endDay = '9999-12-31 23:59:59';
        // 실시간 일일 인증 횟수 (소속)
        $data['auth_daily'] = $this->getAuthByRequestCnt($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, $startDay, $endDay);
        // 누적 이용자수 (소속)
        $data['acc_user'] = $this->getAuthByRegUserCnt('2000-01-01 00:00:00', $endDay);
        // 실시간 인증 횟수 일간 시간별 데이터
        $startDay = date("Y-m-d", strtotime('-12 hours'));
        $data['auth_hourly_list'] = $this->getAuthByRequests($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, $startDay, $endDay, 'D');
        // 월별 인증 횟수 (과거 12달)
        $startDay = date("Y-m-d", strtotime('-11 month'));
        $data['auth_monthly_list'] = $this->getAuthByRequests($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, $startDay, $endDay, 'Y');
        // 지역별/인증방식 그래프
        $data['auth_type'] = $this->getAuthTypeByRequest($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, $startDay, $endDay, 0);
        // 이용자 연령 <- 알수없음
        // 이용자별 인증 횟수 분포 <- 예시 10회 미만 이용자수가 몇명인가
        $data['auth_period_10'] = $this->getAuthCountByRequest($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, '2000-01-01 00:00:00', $endDay, 0, 0, 10);
        $data['auth_period_20'] = $this->getAuthCountByRequest($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, '2000-01-01 00:00:00', $endDay, 0, 10, 20);
        $data['auth_period_30'] = $this->getAuthCountByRequest($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, '2000-01-01 00:00:00', $endDay, 0, 20, 30);
        $data['auth_period_40'] = $this->getAuthCountByRequest($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, '2000-01-01 00:00:00', $endDay, 0, 30, 40);
        $data['auth_period_50'] = $this->getAuthCountByRequest($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, '2000-01-01 00:00:00', $endDay, 0, 40, 50);
        $data['auth_period_n'] = $this->getAuthCountByRequest($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, '2000-01-01 00:00:00', $endDay, 0, 50, 999999);
        // 실시간 인증 리스트
        $data['auth_list'] = $this->getRecentAuthByRequest($buyerInfo->depth1, $buyerInfo->depth2, $buyerInfo->depth3, $startDay, $endDay, 0);
        $data['auth_tit'] = $diLoc;

        $result['data'] = $data;
        $result['ment'] = '조회 성공';
        $result['code'] = 'SC-002';
        $result['result'] = true;
        
        return $result;
    }


    // 인증 통계 > 가입자수
    public function getAuthByRegUsers($depth1, $depth2, $depth3, $startDay, $endDay, $each){
        $where = [];
        // 가입 고객에게 집 주소 입력이 없으므로 의미 없음

        if(! empty($startDay)){
            array_push($where, ['create_dt', '>=', $startDay]);
        }
        if(! empty($endDay)){
            array_push($where, ['create_dt', '<=', $endDay]);
        }
        $groupBy = "";

        if(! empty($each)){
            if($each == 'D') {
                // 일 기준 -> 시간별
                $groupBy = "DATE_FORMAT(create_dt, '%Y%m%d%H')";
            } else if($each == 'M') {
                // 월 기준 -> 일별
                $groupBy = "DATE_FORMAT(create_dt, '%Y%m%d')";
            } else if($each == 'Y' || $each == 'A') {
                // 연 기준 -> 월별
                $groupBy = "DATE_FORMAT(create_dt, '%Y%m')";
            }
        }
        
        $auths = DB::table("user_info")
            ->select(DB::raw($groupBy . ' as targetTerms')
                , DB::raw('count(*) as cnt'))
            ->where($where)
            ->groupBy('targetTerms')->get();

        return $auths;
    }
    // 인증 통계 > 가맹점수 partner create_dt 
    public function getAuthByBranchs($depth1, $depth2, $depth3, $startDay, $endDay, $each){
        $where = [];

        // 승인된 가맹점만
        array_push($where, ['partner_type', '=', 'BR']);
        array_push($where, ['partner_auth_seqno', '>', 0]);

        if(! empty($depth1)){
            array_push($where, ['company_address1', 'like', '%'.$depth1.'%']);
        }
        if(! empty($depth2)){
            array_push($where, ['company_address1', 'like', '%'.$depth2.'%']);
        }
        if(! empty($depth3)){
            array_push($where, ['company_address1', 'like', '%'.$depth3.'%']);
        }
        if(! empty($startDay)){
            array_push($where, ['create_dt', '>=', $startDay]);
        }
        if(! empty($endDay)){
            array_push($where, ['create_dt', '<=', $endDay]);
        }
        $groupBy = "";

        if(! empty($each)){
            if($each == 'D') {
                // 일 기준 -> 시간별
                $groupBy = "DATE_FORMAT(create_dt, '%Y%m%d%H')";
            } else if($each == 'M') {
                // 월 기준 -> 일별
                $groupBy = "DATE_FORMAT(create_dt, '%Y%m%d')";
            } else if($each == 'Y' || $each == 'A') {
                // 연 기준 -> 월별
                $groupBy = "DATE_FORMAT(create_dt, '%Y%m')";
            }
        }
        
        $auths = DB::table("partner")
            ->select(DB::raw($groupBy . ' as targetTerms')
                , DB::raw('count(*) as cnt'))
            ->where($where)
            ->groupBy('targetTerms')->get();

        return $auths;
    }
    // 인증 통계 > 인증횟수 user_auth_hst create_dt 
    public function getAuthByRequests($depth1, $depth2, $depth3, $startDay, $endDay, $each){
        $where = [];

        if(! empty($depth1) && $depth1 != ''){
            array_push($where, ['company_address1', 'like', '%'.$depth1.'%']);
        }
        if(! empty($depth2) && $depth2 != ''){
            array_push($where, ['company_address1', 'like', '%'.$depth2.'%']);
        }
        if(! empty($depth3) && $depth3 != ''){
            array_push($where, ['company_address1', 'like', '%'.$depth3.'%']);
        }
        if(! empty($startDay) && $startDay != ''){
            array_push($where, ['user_auth_hst.create_dt', '>=', $startDay]);
        }
        if(! empty($endDay) && $endDay != ''){
            array_push($where, ['user_auth_hst.create_dt', '<=', $endDay]);
        }
        $groupBy = "";

        if(! empty($each)){
            if($each == 'D') {
                // 일 기준 -> 시간별
                $groupBy = "DATE_FORMAT(user_auth_hst.create_dt, '%Y%m%d%H')";
            } else if($each == 'M') {
                // 월 기준 -> 일별
                $groupBy = "DATE_FORMAT(user_auth_hst.create_dt, '%Y%m%d')";
            } else if($each == 'Y' || $each == 'A') {
                // 연 기준 -> 월별
                $groupBy = "DATE_FORMAT(user_auth_hst.create_dt, '%Y%m')";
            }
        }
        
        $auths = DB::table("user_auth_hst")
            ->join('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
            ->select(DB::raw($groupBy . ' as targetTerms')
                , DB::raw('count(*) as cnt'))
            ->where($where)
            ->groupBy('targetTerms')->get();

        return $auths;
    }




    // 누적 가입수
    public function getAuthByRegUserCnt($startDay, $endDay){
        $where = [];

        if(! empty($startDay)){
            array_push($where, ['create_dt', '>=', $startDay]);
        }
        if(! empty($endDay)){
            array_push($where, ['create_dt', '<=', $endDay]);
        }        
        $auths = DB::table("user_info")
            ->where($where)->count();

        return $auths;
    }
    // 누적 인증 횟수
    public function getAuthByRequestCnt($depth1, $depth2, $depth3, $startDay, $endDay){
        $where = [];

        if(! empty($depth1)){
            array_push($where, ['company_address1', 'like', '%'.$depth1.'%']);
        }
        if(! empty($depth2)){
            array_push($where, ['company_address1', 'like', '%'.$depth2.'%']);
        }
        if(! empty($depth3)){
            array_push($where, ['company_address1', 'like', '%'.$depth3.'%']);
        }
        if(! empty($startDay)){
            array_push($where, ['user_auth_hst.create_dt', '>=', $startDay]);
        }
        if(! empty($endDay)){
            array_push($where, ['user_auth_hst.create_dt', '<=', $endDay]);
        }
        
        $auths = DB::table("user_auth_hst")
            ->join('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
            ->where($where)->count();

        return $auths;
    }
    // 지역별/인증방식 그래프
    public function getAuthTypeByRequest($depth1, $depth2, $depth3, $startDay, $endDay, $partner_auth_seqno){
        $where = [];
        $pageSize = 20;
        $pageNo = 1;

        if(! empty($depth1)){
            array_push($where, ['company_address1', 'like', '%'.$depth1.'%']);
        }
        if(! empty($depth2)){
            array_push($where, ['company_address1', 'like', '%'.$depth2.'%']);
        }
        if(! empty($depth3)){
            array_push($where, ['company_address1', 'like', '%'.$depth3.'%']);
        }
        if(! empty($startDay)){
            array_push($where, ['user_auth_hst.create_dt', '>=', $startDay]);
        }
        if(! empty($endDay)){
            array_push($where, ['user_auth_hst.create_dt', '<=', $endDay]);
        }
        if(! empty($partner_auth_seqno)){
            array_push($where, ['user_auth_hst.partner_auth_seqno', '<=', $partner_auth_seqno]);
        }
        
        $auths = DB::table("user_auth_hst")
            ->join('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
            ->select('auth_type'
                , DB::raw('count(*) as cnt'))
            ->where($where)->groupBy('auth_type')->get();

        return $auths;
    }
    // 이용자별 인증 횟수 분포 <- 예시 10회 미만 이용자수가 몇명인가
    public function getAuthCountByRequest($depth1, $depth2, $depth3, $startDay, $endDay, $partner_auth_seqno, $min, $max){
        $where = [];
        $pageSize = 20;
        $pageNo = 1;

        if(! empty($depth1)){
            array_push($where, ['company_address1', 'like', '%'.$depth1.'%']);
        }
        if(! empty($depth2)){
            array_push($where, ['company_address1', 'like', '%'.$depth2.'%']);
        }
        if(! empty($depth3)){
            array_push($where, ['company_address1', 'like', '%'.$depth3.'%']);
        }
        if(! empty($startDay)){
            array_push($where, ['user_auth_hst.create_dt', '>=', $startDay]);
        }
        if(! empty($endDay)){
            array_push($where, ['user_auth_hst.create_dt', '<=', $endDay]);
        }
        if(! empty($partner_auth_seqno) && $partner_auth_seqno > 0){
            array_push($where, ['user_auth_hst.partner_auth_seqno', '<=', $partner_auth_seqno]);
        }
        
        $auths = DB::table("user_auth_hst")
            ->join('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
            ->select('user_seqno')
            ->where($where)->groupBy('user_seqno')
            ->having('user_seqno', '>', $min)->having('user_seqno', '<', $max)->count();

        return $auths;
    }
    // 실시간 인증 리스트
    public function getRecentAuthByRequest($depth1, $depth2, $depth3, $startDay, $endDay, $partner_auth_seqno){
        $where = [];
        $pageSize = 20;
        $pageNo = 1;

        if(! empty($depth1)){
            array_push($where, ['company_address1', 'like', '%'.$depth1.'%']);
        }
        if(! empty($depth2)){
            array_push($where, ['company_address1', 'like', '%'.$depth2.'%']);
        }
        if(! empty($depth3)){
            array_push($where, ['company_address1', 'like', '%'.$depth3.'%']);
        }
        if(! empty($startDay)){
            array_push($where, ['user_auth_hst.create_dt', '>=', $startDay]);
        }
        if(! empty($endDay)){
            array_push($where, ['user_auth_hst.create_dt', '<=', $endDay]);
        }
        if(! empty($partner_auth_seqno)){
            array_push($where, ['user_auth_hst.partner_auth_seqno', '<=', $partner_auth_seqno]);
        }
        
        $auths = DB::table("user_auth_hst")
            ->join('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
            ->leftJoin('user_info', 'user_info.user_seqno', '=', 'user_auth_hst.user_seqno')
            ->where($where)->orderByDesc('user_auth_hst.create_dt')
            ->offset(($pageSize * ($pageNo-1)))->limit($pageSize)->get();

        return $auths;
    }




    // 인증 통계
    public function getAuthGraph(Request $request)
    {
        $type = $request->post('type'); // 통계 유형 (가입자수/가맹점수/인증횟수)
        // 지역 (계정 유형에 따른) 국가발주처 > 자신의 국가 지역 선택/ 지역은 자기 하위 지역
        $depth1 = $request->post('depth1'); 
        $depth2 = $request->post('depth2'); 
        $depth3 = $request->post('depth3'); 
        $startDay = $request->post('startDay'); 
        $endDay = $request->post('endDay'); 
        $each = $request->post('each', 'A'); // 단위 일/월/년/누적 D/M/Y/A
        $id = $request->post('id');

        $result = [];
        $result['ment'] = '입력정보가 잘못되었습니다.';
        $result['code'] = 'ERR-001';
        $result['result'] = false;

        if (empty($id) || empty($type) || empty($each)) {
            return $result;
        }

        $adminUser = DB::table("partner")->where([
            ['partner_seqno', '=', $id]
        ])->first();

        if (empty($adminUser)) {
            $result['ment'] = '인증된 사용자만 조회가 가능합니다.';
            return $result;
        }
        // TODO: 권한제어는 제거함.

        if($type == 'U') {
            $result['data'] = $this->getAuthByRegUsers($depth1, $depth2, $depth3, $startDay, $endDay, $each);
        } else if($type == 'B') {
            $result['data'] = $this->getAuthByBranchs($depth1, $depth2, $depth3, $startDay, $endDay, $each);
        } else if($type == 'R') {
            $result['data'] = $this->getAuthByRequests($depth1, $depth2, $depth3, $startDay, $endDay, $each);
        }

        $result['ment'] = '조회 성공';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
}
