<?php

namespace src\Controller;

use NumberFormatter;
use src\App\DB;

class Menu1Controller {
    public function greeting() {
        view('page/introduce/greeting');
    }

    public function history() {
        view('page/introduce/history');
    }

    public function around() {
        $data = DB::fetchAll("SELECT * FROM around order by idx desc");
        view('page/introduce/around', ['data'=>$data]);
    }

    public function map() {
        view('page/introduce/map');
    }

    public function aroundDetail($idx) {
        $data = DB::fetch("SELECT * FROM around where idx=?", [$idx]);
        view("page/introduce/aroundDetail", ['data'=>$data]);
    }

}