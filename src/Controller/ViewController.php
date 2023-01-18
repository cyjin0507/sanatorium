<?php

namespace src\Controller;
use src\App\DB;

class ViewController
{
    public function main()
    {
        $gallery = DB::fetchAll("SELECT * FROM gallery order by idx desc");
        $news = DB::fetchAll("SELECT * FROM news order by idx desc");
        view("index", ['gallery'=>$gallery, 'news'=>$news]);
    }

    public function joinCheck()
    {
        if(!moblieCheck()) {
            falseAlert("모바일에서 이용불가능한 페이지입니다.", '/');
        }
        loginNot();
        view("/user/join/join1");
    }

    public function join($rnd)
    {
        if(!moblieCheck()) {
            falseAlert("모바일에서 이용불가능한 페이지입니다.", '/');
        }
        loginNot();
        if($rnd != $_SESSION['join']) {
            falseAlert("잘못된 접근입니다.", '/');
        }
        view("/user/join/join2");
    }

    public function login()
    {
        loginNot();
        view("/user/login/login");
    }

    public function sub1() {
        view('page/sub/sub1');
    }

    public function sub2() {
        view('page/sub/sub2');
    }

    public function sub3() {
        view('page/sub/sub3');
    }

    public function sub4() {
        view('page/sub/sub4');
    }

    public function siteMap() {
        view('page/sub/siteMap');
    }

    public function findId() {
        if(!moblieCheck()) {
            falseAlert("모바일에서 이용불가능한 페이지입니다.", '/');
        }
        view('user/find/idFind');
    }

    public function changePw() {
        if(!moblieCheck()) {
            falseAlert("모바일에서 이용불가능한 페이지입니다.", '/');
        }
        view('user/find/passwordChange');
    }

}
