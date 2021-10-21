<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GuidesImport implements ToCollection
{
    public static $id = 0;

    public function collection(Collection $rows)
    {
        $inxPt = -1;
        DB::table("result_guide")->where('exam_grp_seqno', '=', self::$id)->delete();

        foreach($rows as $s) {
            $inxPt = $inxPt + 1;

            if($inxPt == 0) continue;

            $id = DB::table('result_guide')->insertGetId(
                [
                    'required_ment1' => $s[1]
                    , 'required_ment2' => $s[2]
                    , 'required_ment3' => $s[3]
                    , 'title' => $s[4] . ''
                    , 'contents' => $s[5] . ''
                    , 'exam_grp_seqno' => self::$id
                    , 'detail_no' => $inxPt
                ]
            );
        }
    }
}