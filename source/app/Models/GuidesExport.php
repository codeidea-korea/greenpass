<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GuidesExport implements FromArray
{
    public static $id = 0;

    public function array(): array
    {
        $guides = DB::table("result_guide")->where('exam_grp_seqno', '=', self::$id)->get();
        $num = 1;
        $sheet = [];

        if(self::$id == 2){
            array_push($sheet, [
                'No', '직무요구', '직무자율', '직무불안정', '종합소견 제목', '종합소견 내용'
            ]);
        }
        if(self::$id == 3){
            array_push($sheet, [
                'No', '관계갈등', '조직체계', '부상부적절', '종합소견 제목', '종합소견 내용'
            ]);
        }
        if(self::$id == 4){
            array_push($sheet, [
                'No', '스트레스', '외상후스트레스장애', '불면증', '종합소견 제목', '종합소견 내용'
            ]);
        }
        if(self::$id == 5){
            array_push($sheet, [
                'No', '우울증', '조울증', '자살', '종합소견 제목', '종합소견 내용'
            ]);
        }
        if(self::$id == 6){
            array_push($sheet, [
                'No', '불안장애', '공황장애', '광장공포증', '종합소견 제목', '종합소견 내용'
            ]);
        }
        if(self::$id == 7){
            array_push($sheet, [
                'No', '알코올사용장애', '담배사용장애', '도박중독', '종합소견 제목', '종합소견 내용'
            ]);
        }
        if(self::$id == 8){
            array_push($sheet, [
                'No', '사회불안장애', '신체증상장애', '정신증', '종합소견 제목', '종합소견 내용'
            ]);
        }
        if(self::$id > 9){
            array_push($sheet, [
                'No', '조건1', '조건2', '조건3', '종합소견 제목', '종합소견 내용'
            ]);
        }

        foreach($guides as $g) {
            array_push($sheet, [
                $num, $g->required_ment1, $g->required_ment2, $g->required_ment3, $g->title, $g->contents
            ]);
        }

        return $sheet;
    }
}