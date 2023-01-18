<?php

use src\App\Route;

Route::get("/", "ViewController@main");

Route::get("/join/check", "ViewController@joinCheck");
Route::get("/join/{rnd}", "ViewController@join");
Route::get("/login", "ViewController@login");

Route::post("/api/idCheck", "UserController@apiIdCheck");
Route::post("/join/process", "UserController@join");
Route::post("/login/process", "UserController@login");
Route::get("/logout", "UserController@logout");
Route::get("/sitemap", "ViewController@siteMap");

Route::get('/find/id', "ViewController@findId");
Route::get('/find/id/process/{name}/{email}/{phone}', "UserController@idFind");

Route::get('/change/password', "ViewController@changePw");
Route::post('/pw/change/id/check', 'UserController@idCheck');
Route::post('/password/change', 'UserController@pwchange');

// admin
Route::get("/admin/login", "admin\AdminController@login");
Route::post("/admin/login/process", "admin\AdminController@loginProcess");

Route::get("/admin/meal", "admin\AdminController@meal");
Route::post("/mealUpdate/process", "admin\AdminController@mealUpdate");
Route::get("/admin/meal/detail/{idx}", "admin\AdminController@mealDetail");
Route::get("/admin/meal/delete/{idx}", "admin\AdminController@mealDelete");

Route::get("/admin/program", "admin\AdminController@program");
Route::post('/programUpdate/process', "admin\AdminController@programUpdate");
Route::get("/admin/program/detail/{idx}", "admin\AdminController@programDetail");
Route::get("/admin/program/delete/{idx}", "admin\AdminController@programDelete");

Route::get("/admin/schedule", "admin\AdminController@schedule");

Route::get("/admin/around", "admin\AdminController@around");
Route::post("/aroundUpdate/process", "admin\AdminController@aroundUpdate");
Route::get("/admin/around/detail/{idx}", "admin\AdminController@aroundDetail");
Route::get("/admin/around/delete/{idx}", "admin\AdminController@aroundDelete");

Route::get("/admin/notice", "admin\AdminController@notice");
Route::post('/noticeUpdate/process', "admin\AdminController@noticeUpdate");
Route::get("/admin/notice/detail/{idx}", "admin\AdminController@noticeDetail");
Route::get("/admin/notice/delete/{idx}", "admin\AdminController@noticeDelete");
Route::get("/admin/notice/accept/{idx}", "admin\AdminController@noticeAccept");


Route::get("/admin/staff", "admin\AdminController@staff");
Route::post("/admin/staff", "admin\AdminController@staffSearch");
Route::post("/admin/staff/control", "admin\AdminController@staffControl");

Route::get('/admin', "admin\AdminController@admin");

Route::get('/admin/Q&A',"admin\AdminController@question");
Route::get('/admin/q&a/detail/{idx}', "admin\AdminController@questionDetail");
Route::post('/admin/question/answer',"admin\AdminController@answer");

Route::get('/admin/news',"admin\AdminController@news");
Route::post('/news/process',"admin\AdminController@newsProcess");
Route::get('/admin/news/detail/{idx}',"admin\AdminController@newsDetail");
Route::get('/admin/news/delete/{idx}',"admin\AdminController@newsDelete");

Route::get('/admin/gallery',"admin\AdminController@gallery");
Route::post('/galleryUpdate/process', "admin\AdminController@galleryProcess");
Route::get('/admin/gallery/detail/{idx}',"admin\AdminController@galleryDetail");
Route::get('/admin/gallery/delete/{idx}',"admin\AdminController@galleryDelete");

Route::get('/admin/volunteer', "admin\AdminController@volunteer");
Route::post('/volunteerUpdate/process', "admin\AdminController@volunteerProcess");
Route::get('/admin/volunteer/detail/{idx}',"admin\AdminController@volunteerDetail");
Route::get('/admin/volunteer/delete/{idx}',"admin\AdminController@volunteerDelete");


// meal
Route::get("/meal", "Menu2Controller@meal");
Route::get("/meal/detail/{idx}", "Menu2Controller@mealDetail");
Route::get("/meal/recommand/{idx}", "Menu2Controller@mealRecommand");

// 프로그램 일정표
Route::get('/program', "Menu2Controller@program");
Route::get("/program/detail/{idx}", "Menu2Controller@programDetail");
Route::get("/program/recommand/{idx}", "Menu2Controller@programRecommand");

// 주간정기 일과표
Route::get('/schedule', "Menu2Controller@schedule");

// 입소절차
Route::get('/howToUse', "Menu2Controller@howToUse");

// 메뉴1
Route::get('/greeting', 'Menu1Controller@greeting');
Route::get('/history', 'Menu1Controller@history');
Route::get('/around', 'Menu1Controller@around');
Route::get('/around/detail/{idx}', 'Menu1Controller@aroundDetail');
Route::get('/map', 'Menu1Controller@map');

// 메뉴6
Route::get('/notice', 'Menu5Controller@notice');
Route::get('/notice/detail/{idx}', 'Menu5Controller@noticeDetail');
Route::get('/Q&A', 'Menu5Controller@question');
Route::get('/question/write', 'Menu5Controller@questionWrite');
Route::post('/question/add', 'Menu5Controller@questionAdd');


Route::get('/step', 'Menu4Controller@step');
Route::get('/service', 'Menu4Controller@service');

// 메뉴3
Route::get('/news', 'Menu3Controller@news');
Route::get('/news/detail/{idx}', 'Menu3Controller@newsDetail');
Route::get('/news/recommand/{idx}', 'Menu3Controller@newsRecommand');
Route::get('/gallery', 'Menu3Controller@gallery');
Route::get('/gallery/write', 'Menu3Controller@galleryWrite');
Route::post('/gallery/process', 'Menu3Controller@galleryProcess');


// 서브
Route::get('/terms', 'ViewController@sub1');
Route::get('/privacy', 'ViewController@sub2');
Route::get('/email_security', 'ViewController@sub3');

// Route::get('/application', 'Menu6Controller@application');

Route::get('/volunteer', 'Menu6Controller@volunteer');
Route::get('/volunteer/news', 'Menu6Controller@news');
Route::get('/volunteer/detail/{idx}', 'Menu6Controller@newsDetail');