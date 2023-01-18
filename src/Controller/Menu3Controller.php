<?php

namespace src\Controller;

use src\App\DB;

class Menu3Controller {
    public function news() {
        $data = DB::fetchAll("SELECT * FROM news order by idx desc");
        view('/page/service/news', ['data'=>$data]);
    }

    public function newsDetail($idx) {
        $update = DB::execute("UPDATE news SET views=? where idx=?",
        [(newsClickCheck($idx)->views)+1, $idx]);
        $data = DB::fetch("SELECT * FROM news where idx=?", [$idx]);
        view('/page/service/newsDetail', ['data'=>$data]);
    }

    public function gallery() {
        $data = DB::fetchAll("SELECT * FROM gallery order by idx desc");
        view('/page/service/gallery', ['data'=>$data]);
    }

    public function galleryWrite() {
        loginOk();
        view('/page/service/galleryWrite');
    }

    public function galleryProcess() {
        loginOk();
        extract($_POST);
        $file = $_FILES['file'];

        if (explode('/', $file['type'])[0] != 'image') {
            falseAlert("이미지만 업로드 가능합니다.", '/gallery/write');
        } else {
            $fileName = "";
            if ($file['name'] != "") {
                $fileInfo = $file['tmp_name'];
                $fileName = time() .  $file['name'];
                $url = __GALLERY . __DS . $fileName;
                move_uploaded_file($fileInfo, $url);
            }
    
            $data = DB::execute("INSERT INTO `gallery`(`uidx`, `title`, `file`) VALUES (?,?,?)",
            [$_SESSION['user']->idx, $title, $fileName]);
    
            if($data) {
                trueAlert("갤러리 등록이 완료되었습니다.", '/gallery');
            } else {
                falseAlert("갤러리 등록에 실패하였습니다.", 'back');
            }
        }
        
    }

    public function newsRecommand($idx) {
        $data = DB::execute("UPDATE news SET recommand =? where idx=?", [(newsClickCheck($idx)->recommand)+1, $idx]);
        if($data) {
            trueAlert("추천이 완료되었습니다.", 'back');
        }
    }


}