<?php

namespace src\Controller\admin;

use Exception;
use src\App\DB;

class AdminController
{
    public function login()
    {
        if (!moblieCheck()) {
            falseAlert("모바일에서는 이용불가능한 페이지입니다.", '/');
        }
        admin('/login');
    }

    public function loginProcess()
    {
        extract($_POST);
        $user = DB::fetch("SELECT * FROM users where id=? and password=?", [$id, $pw]);
        $data = DB::fetch("SELECT * FROM staff where uidx=? and accept=?", [$user->idx, 1]);

        if ($data) {
            $_SESSION['user'] = $user;
            trueAlert("관리자 로그인이 완료되었습니다.", '/admin');
        } else {
            falseAlert("관리자 권한이 없습니다.", 'back');
        }
    }

    public function meal()
    {
        adminLogin();
        checkStaff('menu3');

        $data = DB::fetchAll("SELECT * FROM meal order by idx desc");

        admin('/view/meal', ['meal' => $data]);
    }

    public function mealUpdate()
    {
        checkStaff('menu3');
        extract($_POST);
        $file = $_FILES['file'];

        $fileInfo = $file['tmp_name'];
        $fileName = time() .  $file['name'];
        $url = __MEAL . __DS . $fileName;
        move_uploaded_file($fileInfo, $url);

        $data = DB::execute(
            "INSERT INTO `meal`(`uidx`, `title`, `content`, `file`, `views`, `recommand`) VALUES (?,?,?,?,?,?)",
            [$_SESSION['user']->idx, $title, nl2br($content), $fileName, 0, 0]
        );

        if ($data) {
            trueAlert("식단표 등록이 완료되었습니다.", '/admin/meal');
        } else {
            falseAlert("식단표 등록에 실패하였습니다.", 'back');
        }
    }

    public function mealDetail($idx)
    {
        checkStaff('menu3');
        $data = DB::fetch("SELECT * FROM meal where idx=?", [$idx]);
        admin("/view/mealDetail", ['data' => $data]);
    }

    public function mealDelete($idx)
    {
        checkStaff('menu3');
        $data = DB::execute("DELETE FROM meal where idx=?", [$idx]);
        if ($data) {
            trueAlert("식단표가 삭제되었습니다.", '/admin/meal');
        } else {
            falseAlert("식단표 삭제에 실패하였습니다.", 'back');
        }
    }

    public function program()
    {
        adminLogin();
        checkStaff('menu4');


        $data = DB::fetchAll("SELECT * FROM program order by idx desc");
        admin('/view/program', ['data' => $data]);
    }

    public function programUpdate()
    {
        checkStaff('menu4');
        extract($_POST);
        $file = $_FILES['file'];

        $fileInfo = $file['tmp_name'];
        $fileName = time() .  $file['name'];
        $url = __PROGRAM . __DS . $fileName;
        move_uploaded_file($fileInfo, $url);

        $data = DB::execute(
            "INSERT INTO `program`(`uidx`, `title`, `content`, `file`, `views`, `recommand`) VALUES (?,?,?,?,?,?)",
            [$_SESSION['user']->idx, $title, nl2br($content), $fileName, 0, 0]
        );

        if ($data) {
            trueAlert("프로그램 일정표 등록이 완료되었습니다.", '/admin/program');
        } else {
            falseAlert("프로그램 일정표 등록에 실패하였습니다.", 'back');
        }
    }

    public function programDetail($idx)
    {
        checkStaff('menu4');
        $data = DB::fetch("SELECT * FROM program where idx=?", [$idx]);
        admin("/view/programDetail", ['data' => $data]);
    }

    public function programDelete($idx)
    {
        checkStaff('menu4');
        $data = DB::execute("DELETE FROM program where idx=?", [$idx]);
        if ($data) {
            trueAlert("식단표가 삭제되었습니다.", '/admin/meal');
        } else {
            falseAlert("식단표 삭제에 실패하였습니다.", 'back');
        }
    }

    public function schedule()
    {
        checkStaff('menu2');
        admin('/view/schedule');
    }

    public function around()
    {
        checkStaff('menu5');
        $data = DB::fetchAll("SELECT * FROM around order by idx desc");
        admin('/view/around', ['data' => $data]);
    }

    public function aroundUpdate()
    {
        checkStaff('menu5');
        extract($_POST);
        $file = $_FILES['file'];

        if (explode('/', $file['type'])[0] != 'image') {
            falseAlert("이미지만 업로드 가능합니다.", '/admin/around');
        } else {
            $fileInfo = $file['tmp_name'];
            $fileName = time() .  $file['name'];
            $url = __AROUND . __DS . $fileName;
            move_uploaded_file($fileInfo, $url);

            $data = DB::execute(
                "INSERT INTO `around`(`uidx`, `title`, `file`) VALUES (?,?,?)",
                [$_SESSION['user']->idx, $title, $fileName]
            );

            if ($data) {
                trueAlert("기관 사진 등록이 완료되었습니다.", '/admin/around');
            } else {
                falseAlert("기관 사진 등록에 실패하였습니다.", 'back');
            }
        }
    }

    public function aroundDetail($idx)
    {
        checkStaff('menu5');
        $data = DB::fetch("SELECT * FROM around where idx=?", [$idx]);
        admin("/view/aroundDetail", ['data' => $data]);
    }

    public function aroundDelete($idx)
    {
        checkStaff('menu5');
        $data = DB::execute("DELETE FROM around where idx=?", [$idx]);
        if ($data) {
            trueAlert("사진이 삭제되었습니다.", '/admin/around');
        } else {
            falseAlert("사진 삭제에 실패하였습니다.", 'back');
        }
    }

    public function notice()
    {
        checkStaff('menu10');
        $data = DB::fetchAll("SELECT * FROM `notice` ORDER BY accept desc, idx desc");
        admin('/view/notice', ['data' => $data]);
    }

    public function noticeUpdate()
    {
        checkStaff('menu10');
        extract($_POST);
        $file = $_FILES['file'];
        $fileName = "";
        if ($file['name'] != "") {
            $fileInfo = $file['tmp_name'];
            $fileName = time() .  $file['name'];
            $url = __NOTICE . __DS . $fileName;
            move_uploaded_file($fileInfo, $url);
        }

        $accept = 1;
        if (empty($notice)) {
            $accept = 0;
        }

        $data = DB::execute(
            "INSERT INTO `notice`(`uidx`, `title`, `file`, content, accept) VALUES (?,?,?,?,?)",
            [$_SESSION['user']->idx, $title, $fileName, nl2br($content), $accept]
        );

        if ($data) {
            trueAlert("공지사항 등록이 완료되었습니다.", '/admin/notice');
        } else {
            falseAlert("공지사항 등록에 실패하였습니다.", 'back');
        }
    }

    public function noticeDetail($idx)
    {
        checkStaff('menu10');
        $data = DB::fetch("SELECT * FROM notice where idx=?", [$idx]);
        admin("/view/noticeDetail", ['data' => $data]);
    }

    public function noticeDelete($idx)
    {
        checkStaff('menu10');
        $data = DB::execute("DELETE FROM notice where idx=?", [$idx]);
        if ($data) {
            trueAlert("공지사항이 삭제되었습니다.", '/admin/notice');
        } else {
            falseAlert("공지사항 삭제에 실패하였습니다.", 'back');
        }
    }

    public function noticeAccept($idx)
    {
        checkStaff('menu10');
        $check = DB::fetch("SELECT * FROM notice where idx=?", [$idx])->accept;
        $data = DB::execute("UPDATE notice set accept=? where idx=?", [($check == 0 ? 1 : 0), $idx]);
        if ($data) {
            trueAlert("완료되었습니다.", '/admin/notice/detail/' . $idx);
        } else {
            falseAlert("실패하였습니다.", 'back');
        }
    }

    public function staff()
    {
        if ($_SESSION['user']->type != "admin") {
            falseAlert('관리자 권한이 없습니다.', 'back');
        }

        $staff = DB::fetchAll("SELECT * FROM staff where accept = 1 and idx!=1", []);

        admin('/staff', ['search' => '', 'staff' => $staff]);
    }

    public function staffSearch()
    {
        extract($_POST);
        if ($_SESSION['user']->type != "admin") {
            falseAlert('관리자 권한이 없습니다.', 'back');
        }

        $search = DB::fetchAll("SELECT * FROM staff where id=?", [$id]);
        $staff = DB::fetchAll("SELECT * FROM staff where accept = 1 and idx!=1", []);

        admin('/staff', ['search' => $search, 'staff' => $staff, 'id' => $id]);
    }

    public function staffControl()
    {
        extract($_POST);
        $menu2 = 0;
        $menu3 = 0;
        $menu4 = 0;
        $menu5 = 0;
        $menu6 = 0;
        $menu7 = 0;
        $menu8 = 0;
        $menu9 = 0;
        $menu10 = 0;
        $accept = 1;

        if (!empty($_POST['menu2'])) {
            $menu2 = 1;
        }
        if (!empty($_POST['menu3'])) {
            $menu3 = 1;
        }
        if (!empty($_POST['menu4'])) {
            $menu4 = 1;
        }
        if (!empty($_POST['menu5'])) {
            $menu5 = 1;
        }
        if (!empty($_POST['menu6'])) {
            $menu6 = 1;
        }
        if (!empty($_POST['menu7'])) {
            $menu7 = 1;
        }
        if (!empty($_POST['menu8'])) {
            $menu8 = 1;
        }
        if (!empty($_POST['menu9'])) {
            $menu9 = 1;
        }
        if (!empty($_POST['menu10'])) {
            $menu10 = 1;
        }

        if ($menu2 == 0 && $menu3 == 0 && $menu4 == 0 && $menu5 == 0 && $menu6 == 0 && $menu7 == 0 && $menu8 == 0 && $menu9 == 0 && $menu10 == 0) {
            $accept = 0;
        }

        $data = DB::execute(
            "UPDATE staff set menu2=?,menu3=?,menu4=?,menu5=?,menu6=?,menu7=?,menu8=?,menu9=?,menu10=?,accept=? where idx=?",
            [$menu2, $menu3, $menu4, $menu5, $menu6, $menu7, $menu8, $menu9, $menu10, $accept, $idx]
        );

        if ($data) {
            trueAlert("스태프 권한 수정이 완료되었습니다.", '/admin/staff');
        } else {
            falseAlert("스태프 권한 수정에 실패하였습니다.", 'back');
        }
    }

    public function admin()
    {
        adminLogin();

        admin('view/admin');
    }

    public function question()
    {
        checkStaff('menu8');
        $data = DB::fetchAll("SELECT * FROM question order by idx desc");
        admin('view/q&a', ['data' => $data]);
    }

    public function questionDetail($idx)
    {
        checkStaff('menu8');
        $data = DB::fetch("SELECT * FROM question where idx=?", [$idx]);
        $answer = DB::fetch("SELECT * FROM answer where qidx=?", [$idx]);
        admin('/view/questionDetail', ['data' => $data, 'answer' => $answer]);
    }

    public function answer()
    {
        checkStaff('menu8');
        extract($_POST);
        $data = DB::execute(
            "INSERT INTO `answer`(`uidx`, `qidx`, `content`) VALUES (?,?,?)",
            [$_SESSION['user']->idx, $idx, nl2br($content)]
        );
        if ($data) {
            trueAlert("대답 작성이 완료되었습니다.", '/admin/Q&A');
        }
    }

    public function news()
    {
        checkStaff('menu7');
        $data = DB::fetchAll("SELECT * FROM news order by idx desc");
        admin('/view/news', ['data' => $data]);
    }

    public function newsProcess()
    {
        checkStaff('menu7');
        extract($_POST);
        $data = DB::execute(
            "INSERT INTO `news`(`uidx`, `title`, `content`) VALUES (?,?,?)",
            [$_SESSION['user']->idx, $title, nl2br($content)]
        );
        if ($data) {
            trueAlert('새소식이 등록되었습니다.', '/admin/news');
        }
    }

    public function newsDetail($idx)
    {
        checkStaff('menu7');
        $data = DB::fetch("SELECT * FROM news where idx=?", [$idx]);
        admin('/view/newsDetail', ['data' => $data]);
    }

    public function newsDelete($idx)
    {
        checkStaff('menu7');
        $data = DB::execute("DELETE FROM news where idx=?", [$idx]);
        if ($data) {
            trueAlert("새소식이 삭제되었습니다.", '/admin/news');
        } else {
            falseAlert("새소식 삭제에 실패하였습니다.", 'back');
        }
    }

    public function gallery()
    {
        checkStaff('menu6');
        $data = DB::fetchAll("SELECT * FROM gallery order by idx desc");
        admin('/view/gallery', ['data' => $data]);
    }

    public function galleryProcess()
    {
        checkStaff('menu6');
        extract($_POST);
        $file = $_FILES['file'];

        if (explode('/', $file['type'])[0] != 'image') {
            falseAlert("이미지만 업로드 가능합니다.", '/admin/around');
        } else {
            $fileName = "";
            if ($file['name'] != "") {
                $fileInfo = $file['tmp_name'];
                $fileName = time() .  $file['name'];
                $url = __GALLERY . __DS . $fileName;
                move_uploaded_file($fileInfo, $url);
            }

            $data = DB::execute(
                "INSERT INTO `gallery`(`uidx`, `title`, `file`) VALUES (?,?,?)",
                [$_SESSION['user']->idx, $title, $fileName]
            );

            if ($data) {
                trueAlert("갤러리 등록이 완료되었습니다.", '/admin/gallery');
            } else {
                falseAlert("갤러리 등록에 실패하였습니다.", 'back');
            }
        }
    }

    public function galleryDetail($idx)
    {
        checkStaff('menu6');
        $data = DB::fetch("SELECT * FROM gallery where idx=?", [$idx]);
        admin('/view/galleryDetail', ['data' => $data]);
    }

    public function galleryDelete($idx)
    {
        checkStaff('menu6');
        $data = DB::execute("DELETE FROM gallery where idx=?", [$idx]);
        if ($data) {
            trueAlert("갤러리가 삭제되었습니다.", '/admin/gallery');
        } else {
            falseAlert("갤러리 삭제에 실패하였습니다.", 'back');
        }
    }

    public function volunteer()
    {
        checkStaff('menu9');
        $data = DB::fetchAll("SELECT * FROM volunteer order by idx desc");

        admin('/view/volunteer', ['data' => $data]);
    }

    public function volunteerProcess()
    {
        checkStaff('menu9');
        extract($_POST);
        $file = $_FILES['file'];
        $fileName = "";
        if ($file['name'] != "") {
            $fileInfo = $file['tmp_name'];
            $fileName = time() .  $file['name'];
            $url = __VOLUNTEER . __DS . $fileName;
            move_uploaded_file($fileInfo, $url);
        }

        $data = DB::execute(
            "INSERT INTO `volunteer`(`uidx`, `title`, `file`, `content`) VALUES (?,?,?,?)",
            [$_SESSION['user']->idx, $title, $fileName, nl2br($content)]
        );

        if ($data) {
            trueAlert("게시글이 등록되었습니다.", '/admin/volunteer');
        } else {
            falseAlert("실패", 'back');
        }
    }

    public function volunteerDetail($idx)
    {
        checkStaff('menu9');
        $data = DB::fetch("SELECT * FROM volunteer where idx=?", [$idx]);
        admin('/view/volunteerDetail', ['data' => $data]);
    }

    public function volunteerDelete($idx)
    {
        checkStaff('menu9');
        $data = DB::execute("DELETE FROM volunteer where idx=?", [$idx]);
        if ($data) {
            trueAlert("게시글가 삭제되었습니다.", '/admin/volunteer');
        } else {
            falseAlert("게시글 삭제에 실패하였습니다.", 'back');
        }
    }
}
