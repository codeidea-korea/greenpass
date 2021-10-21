<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersImport implements ToCollection
{
    public static $id = 0;

    function getStatusType($code){
        switch($code){
            case '미인증': return 'C';
            case '검사 대기': return 'D';
            case '검사 진행중': return 'E';
            case '검사 완료': return 'F';
            case '검사취소': return 'G';
            case '배송처리': return 'H';
            default : return 'C';
        }
    }
    function getSendType($code){
        switch($code){
            case '미확정': return 0;
            case '발송확정': return 1;
            case '발송취소': return 2;
            default : return 0;
        }
    }

    public function collection(Collection $rows)
    {
        $inxPt = -1;
        if (empty($id)) {
            //
        }else{
            $partner = DB::table("partners")->where('partner_name', '=', self::$id)->first();
            $id = $partner->partner_name;
        }

        foreach($rows as $s) {
            $inxPt = $inxPt + 1;

            if($inxPt == 0) continue;

            DB::table('user_info')->insertGetId(
                [
                    'partner_name' => empty($id) ? $s[10] : $partner->partner_name
                    , 'user_name' => $s[1]
                    , 'user_birthday' => $s[2]
                    , 'user_phone' => $s[3]
                    , 'user_address1' => $s[4]
                    , 'user_address2' => $s[5]
                    , 'user_address3' => $s[6]
                    , 'user_round' => $s[7]
                    , 'exam_status' => $this->getStatusType($s[8])
                    , 'send_yn' => $this->getSendType($s[9])
                    , 'reservation_dt' => $s[11]
                    , 'exam_seqno' => 1
                ]
            );
            $user = DB::table("user_info")
                ->where([
                    ['partner_name', '=', empty($id) ? $s[10] : $partner->partner_name]
                    , ['user_birthday', '=', $s[2]]
                    , ['user_phone', '=', $s[3]]
                    , ['exam_status', '=', $this->getStatusType($s[8])]
                ])
                ->orderBy('create_dt', 'DESC')
                ->first();

            DB::table('exam_mpg_user')->insertGetId(
                [
                    'exam_seqno' => 1
                    , 'user_seqno' => $user->user_seqno
                ]
            );
        }
    }
}