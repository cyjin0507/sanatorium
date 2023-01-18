<div id="adminLeft">
            <div id="adminMenu">
                <ul class="adminMenu" id="adminMenu1">
                    <a href="/admin/schedule"><li>주간정기일정표</li></a>
                    <a href="/admin/meal"><li>식단표</li></a>
                    <a href="/admin/program"><li>프로그램 일정표</li></a>
                    <a href="/admin/around"><li>기관 둘러보기</li></a>
                    <a href="/admin/gallery"><li>갤러리</li></a>
                    <a href="/admin/news"><li>새소식</li></a>
                    <a href="/admin/Q&A"><li class="active">Q&A</li></a>
                    <a href="/admin/volunteer"><li>후원 및 자원봉사</li></a>
                    <a href="/admin/notice"><li>공지사항</li></a>
                </ul>
                <ul class="adminMenu" id="adminMenu2">
                    <li>관리자님</li>
                    <a href="/admin/staff"><li>스태프 관리</li></a>
                    <a href="/"><li>홈페이지 이동</li></a>
                    <a href="/logout"><li>로그아웃</li></a>
                </ul>
            </div>
        </div>

<div id="adminRight">
    <h2>관리자 페이지</h2>

    <section id="notice">
        <h2>Q&A</h2>
        <div id="noticeMainContent">
            <div class="noticeColumn" id="noticeTitle">
                <div>번호</div>
                <div>제목</div>
                <div>작성자</div>
                <div>작성일</div>
                <div>답변여부</div>
                <div></div>
            </div>
            <?php
            foreach ($data as $key => $value) {
            ?>
                <a href="/admin/q&a/detail/<?= $data[$key]->idx ?>" class="noticeColumn noticeLook">
                    <div><?= $data[$key]->idx ?></div>
                    <div class="title"><?= $data[$key]->title ?></div>
                    <div><?= userCheck($data[$key]->uidx)->name ?></div>
                    <div><?= $data[$key]->create_date ?></div>
                    <div></div>
                    <div></div>
                </a>
            <?php
            }
            ?>
        </div>
    </section>

</div>
</div>