<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersExport implements FromArray
{
    public static $id = 0;

    function getStatusType($code){
        switch($code){
            case 'C': return '미인증';
            case 'D': return '검사 대기';
            case 'E': return '검사 진행중';
            case 'F': return '검사 완료';
            case 'G': return '검사취소';
            case 'H': return '배송처리';
            default : return '';
        }
    }
    function getSendType($code){
        switch($code){
            case 0: return '미확정';
            case 1: return '발송확정';
            case 2: return '발송취소';
            default : return '';
        }
    }
    public function array(): array
    {
        if (empty($id)) {
            $guides = DB::table("user_info")->orderBy('create_dt', 'desc')->get();
        }else{
            $guides = DB::table("user_info")->where('partner_name', '=', self::$id)->orderBy('create_dt', 'desc')->get();
        }
        $num = 1;
        $sheet = [];

        array_push($sheet, [
            'No', '성명', '생년월일', '휴대전화', '우편번호', '주소', '상세 주소', '회차', '시험 상태', '발송 여부', '기관명', '진료일시'
        ]);

        foreach($guides as $g) {
            array_push($sheet, [
                $num, $g->user_name, $g->user_birthday, $g->user_phone, $g->user_address1, $g->user_address2, $g->user_address3
                , $g->user_round, $this->getStatusType($g->exam_status), $this->getSendType($g->send_yn), $g->partner_name, $g->reservation_dt
            ]);
        }

        return $sheet;
    }
}