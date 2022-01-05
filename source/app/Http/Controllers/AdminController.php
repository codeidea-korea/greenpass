<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordMail;

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
        Mail::to($adminUser->partner_id)->send(new PasswordMail($details));

        $result['ment'] = '메일로 내용이 전달되었습니다.';
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

    //    (
    //    전체/branch 일일 인증 횟수
    //    전체/branch 누적 이용자수
    //    전체/branch 시간별 인증 횟수 (24시간)
    //    전체/branch 월별 인증 횟수 (1년)
    //    전체/branch 최신순 인증 20건
    //    )
    public function mainByBranch(Request $request)
    {
        $result['ment'] = '수정되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
    public function mainByStaff(Request $request)
    {
        $result['ment'] = '수정되었습니다.';
        $result['code'] = 'SC-002';
        $result['result'] = true;

        return $result;
    }
}
