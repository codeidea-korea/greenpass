<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminImport implements ToCollection
{
    public static $id = 0;

    function getAdminType($code){
        switch($code){
            case '시스템 관리자': return 'A';
            case '병원 직원/관계자': return 'B';
            case '병원 원장님': return 'C';
            default : return 'D';
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

            DB::table('admin_user')->insertGetId(
                [
                    'admin_user_name' => $s[4]
                    , 'admin_user_phone' => $s[5]
                    , 'admin_user_email' => $s[6]
                    , 'admin_user_id' => $s[3]
                    , 'password' => $s[7]
                    , 'admin_type' => $this->getAdminType($s[2])
                    , 'partner_name' => empty($id) ? $s[1] : $partner->partner_name
                ]
            );
        }
    }
}