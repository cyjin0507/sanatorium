<?php

use src\App\DB;

function checkInvalid($datas)
{
	foreach ($datas as $key => $data) {
		if (empty(trim($data))) {
			back('누락된 항목이 있습니다.');
		}
	}

	return $datas;
}

function view($pageName, $datas = [])
{
	extract($datas);

	require_once __VIEWS . __DS . "header.php";
	require_once __VIEWS . __DS . $pageName . ".php";
	require_once __VIEWS . __DS . "footer.php";
}

function admin($pageName, $datas = [])
{
	extract($datas);

	require_once __VIEWS . __DS . "/admin/header.php";
	require_once __VIEWS . __DS . "/admin/" . $pageName . ".php";
	require_once __VIEWS . __DS . "/admin/footer.php";
}

function redirect($msg, $url)
{
	echo "<script>alert('" . $msg . "')</script>";
	echo "<script>location.href='" . $url . "'</script>";
	exit;
}

function back($msg)
{
	echo "<script>alert('" . $msg . "')</script>";
	echo "<script>history.back()</script>";
	exit;
}

function returnJSON($obj, $responseCode = 200)
{
	http_response_code($responseCode);
	echo json_encode($obj, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	exit;
}

function trueAlert($txt, $url)
{
	echo "<script src='/js/jquery.js'></script>";
	echo "<script src='/js/alert.js'></script>";
	echo "<div id='alertZone'></div>";
	echo "<script>trueAlert('" . $txt . "', '" . $url . "')</script>";
}

function falseAlert($txt, $url)
{
	echo "<script src='/js/jquery.js'></script>";
	echo "<script src='/js/alert.js'></script>";
	echo "<div id='alertZone'></div>";
	echo "<script>falseAlert('" . $txt . "', '" . $url . "')</script>";
}

function loginOk() {
	if(!isset($_SESSION['user'])) {
		falseAlert("로그인 후 이용가능한 페이지입니다.", '/login');
	}
}

function loginNot() {
	if(isset($_SESSION['user'])) {
		falseAlert("이미 로그인 되어있습니다.", '/');
	}
}

function adminLogin() {
	if(!moblieCheck()) {
		falseAlert("모바일에서는 이용불가능한 페이지입니다.", '/');
	}
	$data = DB::fetch("SELECT * FROM staff where accept=1 and uidx=?", [$_SESSION['user']->idx]);
	if(empty($data)) {
		falseAlert("관리자 권한이 없습니다.", '/');
	}
}

function userCheck($idx) {
	$data = DB::fetch("SELECT * FROM users where idx=?", [$idx]);
	if(!$data) {return;}
	return $data;
}

function mealClickCheck($idx) {
	$cnt = DB::fetch("SELECT views, recommand FROM meal where idx=?", [$idx]);
	return $cnt;
}

function programClickCheck($idx) {
	$cnt = DB::fetch("SELECT views, recommand FROM program where idx=?", [$idx]);
	return $cnt;
}

function noticeClickCheck($idx) {
	$cnt = DB::fetch("SELECT views, recommand FROM notice where idx=?", [$idx]);
	return $cnt;
}

function checkStaff($column) {
	if(!moblieCheck()) {
		falseAlert("모바일에서는 이용불가능한 페이지입니다.", '/');
	}
	$data = DB::fetch("SELECT * FROM staff where uidx=? and " . $column . "=1", [$_SESSION['user']->idx]);
	if(empty($data)) {
		falseAlert('해당 페이지에 권한이 없습니다.', '/admin');
	}
}

function answerCheck($idx) {
	$data = DB::fetch("SELECT * FROM answer where qidx=?", [$idx]);
	if(empty($data)) {
		return false;
	} else {
		return $data;
	}
}

function newsClickCheck($idx) {
	$cnt = DB::fetch("SELECT views, recommand FROM news where idx=?", [$idx]);
	return $cnt;
}

function volunteerClickCheck($idx) {
	$cnt = DB::fetch("SELECT views, recommand FROM volunteer where idx=?", [$idx]);
	return $cnt;
}

function moblieCheck() {
	$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

    if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
		return false;
    } else {
		return true;
	}
}