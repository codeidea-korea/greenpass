<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AuthByApproveBranchExport implements FromArray
{
    public static $startDt = '';
    public static $endDt = '';
    public static $branchName = '';

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
            array_push($where, ['user_auth_hst.location_name', 'like', self::$branchName]);
        }

        $auths = DB::table("user_auth_hst")
            ->leftJoin('partner', 'partner.partner_auth_seqno', '=', 'user_auth_hst.partner_auth_seqno')
            ->select('user_auth_hst.location_name'
                , 'partner.company_address1'
                , 'user_auth_hst.partner_auth_seqno'
                , DB::raw('count(*) as authCnt')
                , DB::raw('count(*) as visitCnt'))
            ->where($where)
            ->groupBy('user_auth_hst.partner_auth_seqno', 'user_auth_hst.location_name', 'partner.company_address1')
            ->orderByDesc('partner_auth_seqno')->get();

        $num = 1;
        $sheet = [];

        array_push($sheet, [
            'No', '상호', '주소', '인증횟수', '실방문자'
        ]);

        foreach($auths as $g) {
            array_push($sheet, [
                $num, 
                $g->location_name, 
                $g->company_address1, 
                $g->authCnt, 
                $g->visitCnt
            ]);
            $num += 1;
        }

        return $sheet;
    }
}