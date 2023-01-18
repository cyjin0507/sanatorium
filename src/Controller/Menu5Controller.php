<?php

namespace src\Controller;

use src\App\DB;

class Menu5Controller {
    public function notice() {
        $data = DB::fetchAll("SELECT * FROM `notice` ORDER BY accept desc, idx desc");
        view('/page/notice/notice', ['data'=>$data]);
    }

    public function noticeDetail($idx) {
        $update = DB::execute("UPDATE notice SET views=? where idx=?",
        [(noticeClickCheck($idx)->views)+1, $idx]);
        $data = DB::fetch("SELECT * FROM notice where idx=?", [$idx]);
        view("page/notice/noticeDetail", ['data'=>$data]);
    }

    public function question() {
        $data = DB::fetchAll("SELECT * FROM question order by idx desc");
        view('/page/notice/q&a', ['data'=>$data]);
    }

    public function questionWrite() {
        view('/page/notice/questionWrite');
    }

    public function questionAdd() {
        extract($_POST);
        $data = DB::execute("INSERT INTO `question`(`uidx`, `title`, `content`) VALUES (?,?,?)",
        [$_SESSION['user']->idx, $title, nl2br($content)]);
        if($data) {
            trueAlert("질문 작성이 완료되었습니다.", '/Q&A');
        }
    }

}