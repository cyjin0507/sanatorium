<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/mobile.css">
    <script src="/js/jquery.js"></script>

    <title>Document</title>
</head>

<body>

    <a href="/"><img src="/resources/logo.png" alt="" id="logoMoblie"></a>
    <img src="/resources/img/menu.png" id="menuBar" alt="">

    <header class="header">
        <div id="xBtn">✖</div>
        <div id="headerTop">
            <a href="/"><img src="/resources/logo.png" alt="" id="logo"></a>
            <nav>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <ul>
                        <li><?=$_SESSION['user']->name?>님</a></li>
                        <div>|</div>
                        <li><a href="/logout">로그아웃</a></li>
                        <div>|</div>
                        <?php
                        if($_SESSION['user']->type == "admin") {
                            ?>
                            <li><a href="/admin">관리자페이지</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="/Q&A">문의하기</a></li>
                            <?php
                        }
                        ?>
                        <div>|</div>
                        <li><a href="/sitemap">사이트맵</a></li>
                    </ul>
                <?php
                } else {
                ?>
                    <ul>
                        <li><a href="/login">로그인</a></li>
                        <div>|</div>
                        <li><a href="/admin/login">관리자</a></li>
                        <div>|</div>
                        <li><a href="/join/check">회원가입</a></li>
                        <div>|</div>
                        <li><a href="/sitemap">사이트맵</a></li>
                    </ul>
                <?php
                }
                ?>
            </nav>
        </div>
        <div id="headerUnder">
            <ul>
                <li><div>기관소개</div>
                    <ul class="subMenu">
                        <a href="/greeting"><li>인사말</li></a>
                        <a href="/history"><li>연혁</li></a>
                        <a href="/around"><li>기관 둘러보기</li></a>
                        <a href="/map"><li>오시는길</li></a>
                    </ul>
                </li>
                <li><div>요양원</div>
                    <ul class="subMenu">
                        <a href="/howToUse"><li>입소절차 및 비용안내</li></a>
                        <a href="/schedule"><li>주간정기일과표</li></a>
                        <a href="/meal"><li>식단표</li></a>
                        <a href="/program"><li>프로그램 일정표</li></a>
                    </ul>
                </li>
                <li><div>만남의장</div>
                    <ul class="subMenu">
                        <a href="/gallery"><li>갤러리</li></a>
                        <a href="/news"><li>새소식</li></a>
                    </ul>
                </li>
                <li><div>방문요양</div>
                    <ul class="subMenu">
                        <a href="/step"><li>이용절차 및 비용안내</li></a>
                        <a href="/service"><li>서비스 내용</li></a>
                    </ul>
                </li>
                <li><div>후원 및 자원봉사</div>
                    <ul class="subMenu">
                        <a href="/volunteer"><li>후원·자원봉사 안내</li></a>
                        <a href="/volunteer/news"><li>후원·자원봉사 소식</li></a>
                    </ul>
                </li>
                <li><div>공지사항</div>
                    <ul class="subMenu">
                        <a href="/notice"><li>공지사항</li></a>
                        <a href="/Q&A"><li>Q&A</li></a>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div id="mobile"></div>

    <div id="alertZone"></div>

    <script>
        $("#headerUnder>ul > li").hover(function() {
            $(this).children('.subMenu').stop().slideDown()
        }, function() {
            $('.subMenu').stop().slideUp("fast")
        })
    </script>