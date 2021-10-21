<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminExport implements FromArray
{
    public static $id = 0;

    function getAdminType($code){
        switch($code){
            case 'A': return '시스템 관리자';
            case 'B': return '병원 직원/관계자';
            case 'C': return '병원 원장님';
            default : return 'D';
        }
    }
    public function array(): array
    {
        if (empty($id)) {
            $guides = DB::table("admin_user")->orderBy('create_dt', 'desc')->get();
        }else{
            $guides = DB::table("admin_user")->where('partner_name', '=', self::$id)->orderBy('create_dt', 'desc')->get();
        }
        $num = 1;
        $sheet = [];

        array_push($sheet, [
            'No', '기관명', '관리자 구분', '관리자 아이디', '관리자 이름', '관리자 전화번호', '관리자 이메일', '비밀번호'
        ]);

        foreach($guides as $g) {
            array_push($sheet, [
                $num, $g->partner_name, $this->getAdminType($g->admin_type), $g->admin_user_id, $g->admin_user_name
                , $g->admin_user_phone, $g->admin_user_email, $g->password
            ]);
        }

        return $sheet;
    }
}