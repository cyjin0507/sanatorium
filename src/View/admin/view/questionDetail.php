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
    <section id="albumDetailShow">
        <h2>식단표</h2>
        <div id="albumTitleInfo">
            <div>
                <div>제목</div>
                <div class="not"><?= $data->title ?></div>
            </div>
            <div>
                <div>작성자</div>
                <div class="not"><?= userCheck($data->uidx)->name ?></div>
                <div>작성일</div>
                <div class="not"><?= $data->create_date ?></div>
            </div>
        </div>
        <div id="albumTxt">
            <?= $data->content ?>
        </div>
        <?php
        if (!answerCheck($data->idx)) {
        ?>
            <form id="answerArea" action="/admin/question/answer" method="post">
                <input type="hidden" value="<?= $data->idx ?>" name="idx">
                <div>
                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                </div>
                <button>답변하기</button>
            </form>
        <?php
        } else {
            ?>
            <div id="albumTxt">
                <?=$answer->content?>
            </div>
            <?php
        }
        ?>
    </section>
</div>


</div>