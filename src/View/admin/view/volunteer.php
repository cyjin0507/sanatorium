<div id="adminLeft">
            <div id="adminMenu">
                <ul class="adminMenu" id="adminMenu1">
                    <a href="/admin/schedule"><li>주간정기일정표</li></a>
                    <a href="/admin/meal"><li>식단표</li></a>
                    <a href="/admin/program"><li>프로그램 일정표</li></a>
                    <a href="/admin/around"><li>기관 둘러보기</li></a>
                    <a href="/admin/gallery"><li>갤러리</li></a>
                    <a href="/admin/news"><li>새소식</li></a>
                    <a href="/admin/Q&A"><li>Q&A</li></a>
                    <a href="/admin/volunteer"><li class="active">후원 및 자원봉사</li></a>
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

    <section id="noticeWrite">
        <h2>후원·자원봉사 소식 작성</h2>
        <form id="noticeWriteMain" action="/volunteerUpdate/process" method="post" enctype="multipart/form-data">
            <div>
                <div>제목</div>
                <input type="text" name="title">
            </div>
            <div>
                <div>파일</div>
                <label for="file">등록</label>
                <input id="file" name="file" type="file" style="display: none;">
            </div>
            <div>
                <div>내용</div>
                <textarea name="content" id="" cols="30" rows="10"></textarea>
            </div>
            <button>등록하기</button>
        </form>
    </section>

    <section id="notice">
        <h2>후원·자원봉사 소식</h2>
        <div id="noticeContent">

            <div id="noticeMainContent">
                <div class="noticeColumn" id="noticeTitle">
                    <div>번호</div>
                    <div>제목</div>
                    <div>작성자</div>
                    <div>작성일</div>
                    <div>조회수</div>
                    <div>추천수</div>
                </div>
                <?php
                foreach ($data as $key => $value) {
                ?>
                    <a href="/admin/volunteer/detail/<?= $data[$key]->idx ?>" class="noticeColumn noticeLook">
                        <div><?= $data[$key]->idx ?></div>
                        <div class="title"><?= $data[$key]->title ?></div>
                        <div><?= userCheck($data[$key]->uidx)->name ?></div>
                        <div><?= $data[$key]->create_date ?></div>
                        <div><?= $data[$key]->views ?></div>
                        <div><?= $data[$key]->recommand ?></div>
                    </a>
                <?php
                }
                ?>
            </div>

        </div>
    </section>

</div>



</div>