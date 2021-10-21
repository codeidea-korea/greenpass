<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PartnerExport implements FromArray
{
    public static $id = 0;

    public function array(): array
    {
        $guides = DB::table("partners")->where('used_yn', '=', 1)->orderBy('create_dt', 'desc')->get();
        $num = 1;
        $sheet = [];

        // 아이디	구분	기관명	사업자번호	대표자명	우편번호	주소	상세주소	연락처	팩스번호	이메일	담당자명	홈페지URL
        array_push($sheet, [
            'No', '아이디', '구분', '기관명', '사업자번호', '대표자명', '우편번호', '주소', '상세주소', '연락처', '팩스번호', '이메일', '담당자명', '홈페이지URL', '어드민 로고'
        ]);

        foreach($guides as $g) {
            array_push($sheet, [
                $num, $g->admin_user_id, $g->partner_type, $g->partner_name, $g->partner_no, $g->user_name
                , $g->user_address1, $g->user_address2, $g->user_address3, $g->user_phone, $g->fax, $g->email, $g->partner_url, $g->logo_url
            ]);
        }

        return $sheet;
    }
}