<?php

namespace src\Controller;

use NumberFormatter;
use src\App\DB;

class UserController
{
    public function apiIdCheck()
    {
        $response = array("message" => "하루에 한번만 참여할 수 있습니다.");
        returnJSON($response, 401);
    }

    public function join() {
        extract($_POST);

        if($pw != $pw_check) {
            falseAlert("비밀번호가 다릅니다.", "/");
        }

        $check = DB::fetch("SELECT * FROM users where id=?", [$id]);
        if($check) {
            falseAlert("중복되는 아이디입니다.", "back");
            return;
        }

        if(empty($id) || empty($name) || empty($pw) || empty($pw_check) || empty($phone) || empty($email)) {
            falseAlert("누락된 값이 있습니다.", "back");
        } else {
            $rnd = time();
            $data = DB::execute("INSERT INTO `users`(`idx`, `name`, `id`, `password`, `phone`, `email`) VALUES(?,?,?,?,?,?)",
            array($rnd,$name, $id, $pw, $phone, $email));
            $data2 = DB::execute("INSERT INTO `staff`(`uidx`, `id`, `accept`, `menu2`, `menu3`, `menu4`, `menu5`, `menu6`, `menu7`, `menu8`, `menu9`, `menu10`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",
            [$rnd, $id, 0,0,0,0,0,0,0,0,0,0]);
            
            if($data) {
                trueAlert("회원가입이 완료되었습니다.", '/login');
            } else {
                falseAlert("실패", 'back');
            }
    
        }
    }

    public function login() {
        extract($_POST);
        $data = DB::fetch("SELECT * FROM users where id=? and password=?", [$id, $pw]);
        if($data) {
            $_SESSION['user'] = $data;
            trueAlert("로그인에 성공하였습니다.", '/');
        } else {
            falseAlert("아이디 혹은 비밀번호가 틀렸습니다.", 'back');
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        trueAlert("로그아웃에 성공하였습니다.", '/');
    }

    public function idFind($name, $email, $phone) {
        $data = DB::fetch("SELECT * FROM users where email=? and phone=?",
        array($email, $phone));

        view('/user/find/idFind', ['data'=>$data, 'name'=>$name, 'email'=>$email, 'phone'=>$phone]);
    }

}