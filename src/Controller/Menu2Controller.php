<?php

namespace src\Controller;

use NumberFormatter;
use src\App\DB;

class Menu2Controller
{
    
    public function meal() {
        $data = DB::fetchAll("SELECT * FROM meal order by idx desc");
        view("page/meal/meal", ['data'=>$data]);
    }

    public function mealDetail($idx) {
        $update = DB::execute("UPDATE meal SET views=? where idx=?",
        [(mealClickCheck($idx)->views)+1, $idx]);
        $data = DB::fetch("SELECT * FROM meal where idx=?", [$idx]);
        view("page/meal/mealDetail", ['data'=>$data]);
    }

    public function mealRecommand($idx) {
        $data = DB::execute("UPDATE meal SET recommand =? where idx=?", [(mealClickCheck($idx)->recommand)+1, $idx]);
        if($data) {
            trueAlert("추천이 완료되었습니다.", 'back');
        }
    }

    public function program() {
        $data = DB::fetchAll("SELECT * FROM program order by idx desc");
        view('page/program/program', ['data'=>$data]);
    }

    public function programDetail($idx) {
        $update = DB::execute("UPDATE program SET views=? where idx=?",
        [(programClickCheck($idx)->views)+1, $idx]);
        $data = DB::fetch("SELECT * FROM program where idx=?", [$idx]);
        view("page/program/programDetail", ['data'=>$data]);
    }

    public function programRecommand($idx) {
        $data = DB::execute("UPDATE program SET recommand =? where idx=?", [(programClickCheck($idx)->recommand)+1, $idx]);
        if($data) {
            trueAlert("추천이 완료되었습니다.", 'back');
        }
    }
    
    public function schedule() {
        view("page/schedule/schedule");
    }

    public function howToUse() {
        view("page/introduce/howToUse");
    }

}