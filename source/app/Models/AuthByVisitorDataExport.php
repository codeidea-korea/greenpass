<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuthByVisitorDataExport implements FromArray
{
    public static $startDt = '';
    public static $endDt = '';
    public static $visitorNo = '';

    private function getAuthType($type){
        if($type == 'G') return "GPS";
        if($type == 'N') return "NFC";
        if($type == 'B') return "BEACON";
        return "-";
    }
    public function array(): array
    {
        $where = [];
        if(! empty(self::$startDt) && self::$startDt != ''){
            array_push($where, ['user_auth_hst.create_dt', '>', self::$startDt]);
        }
        if(! empty(self::$endDt) && self::$endDt != ''){
            array_push($where, ['user_auth_hst.create_dt', '<', self::$endDt]);
        }
        if(! empty(self::$visitorNo) && self::$visitorNo != ''){
            array_push($where, ['user_phone', 'like', '%'.self::$visitorNo.'%']);
        }

        $auths = DB::table("user_auth_hst")
            ->join('user_info', 'user_info.user_seqno', '=', 'user_auth_hst.user_seqno')
            ->leftJoin('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
            ->select('user_auth_hst.location_name'
                , 'user_auth_hst.partner_auth_seqno'
                , 'partner.company_address1'
                , 'user_info.user_phone'
                , 'user_info.sns_mail'
                , 'user_info.user_seqno'
                , 'user_auth_hst.auth_type'
                , 'user_info.create_dt')
            ->where($where)
            ->orderByDesc('partner_auth_seqno')->get();

        $num = 1;
        $sheet = [];

        array_push($sheet, [
            'No', '휴대폰번호(사용자식별자)', '방문지(상호)', '주소', '인증방식', '인증일시'
        ]);

        foreach($auths as $g) {
            array_push($sheet, [
                $num, 
                $g->user_phone . '(' . $g->user_seqno . ')', 
                $g->location_name, 
                $g->company_address1, 
                getAuthType($g->auth_type), 
                $g->create_dt
            ]);
            $num += 1;
        }

        return $sheet;
    }
}