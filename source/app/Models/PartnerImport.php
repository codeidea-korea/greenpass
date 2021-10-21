<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PartnerImport implements ToCollection
{
    public static $id = 0;

    public function collection(Collection $rows)
    {
        $inxPt = -1;

        foreach($rows as $s) {
            $inxPt = $inxPt + 1;

            if($inxPt == 0) continue;

            // 아이디	구분	기관명	사업자번호	대표자명	우편번호	주소	상세주소	연락처	팩스번호	이메일	담당자명	홈페지URL
            DB::table('partners')->insertGetId(
                [
                    'partner_name' => $s[3]
                    , 'partner_type' => $s[2]
                    , 'user_name' => $s[5]
                    , 'user_phone' => $s[9]
                    , 'user_address1' => $s[6]
                    , 'user_address2' => $s[7]
                    , 'user_address3' => $s[8]
                    , 'partner_url' => $s[13]
                    , 'partner_no' => $s[4]
                    , 'admin_user_id' => $s[1]
                    , 'fax' => $s[10]
                    , 'email' => $s[11]
                    , 'logo_url' => $s[14]
                    , 'used_yn' => 1
                ]
            );
        }
    }
}