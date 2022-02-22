<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuthGraphExport implements FromArray
{
    public static $startDay = '';
    public static $endDay = '';
    public static $type = 'R';
    public static $depth1 = '';
    public static $depth2 = '';
    public static $depth3 = '';
    public static $each = '';
    
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

    public function array(): array
    {
        $auths = [];
        $tit = '인증횟수';

        if(self::$type == 'U') {
            $auths = $this->getAuthByRegUsers(self::$depth1, self::$depth2, self::$depth3, self::$startDay, self::$endDay, self::$each);
            $tit = '가입자수';
        } else if(self::$type == 'B') {
            $auths = $this->getAuthByBranchs(self::$depth1, self::$depth2, self::$depth3, self::$startDay, self::$endDay, self::$each);
            $tit = '가맹점수';
        } else if(self::$type == 'R') {
            $auths = $this->getAuthByRequests(self::$depth1, self::$depth2, self::$depth3, self::$startDay, self::$endDay, self::$each);
            $tit = '인증횟수';
        }

        $num = 1;
        $sheet = [];

        array_push($sheet, [
            'No', '기준기간', $tit
        ]);

        foreach($auths as $g) {
            array_push($sheet, [
                $num, 
                $g->targetTerms, 
                $g->cnt
            ]);
            $num += 1;
        }

        return $sheet;
    }
}