<?php

namespace src\Controller;

use src\App\DB;

class Menu6Controller {

    public function application() {
        view('/page/volunteer/application');
    }

    public function volunteer() {
        view('/page/volunteer/info');
    }

    public function news() {
        $data = DB::fetchAll("SELECT * FROM volunteer order by idx desc");
        view('/page/volunteer/news', ['data'=>$data]);
    }

    public function newsDetail($idx) {
        $update = DB::execute("UPDATE volunteer SET views=? where idx=?",
        [(volunteerClickCheck($idx)->views)+1, $idx]);
        $data = DB::fetch("SELECT * FROM volunteer where idx=?", [$idx]);
        view("page/volunteer/newsDetail", ['data'=>$data]);
    }

}