<div id="adminLeft">
            <div id="adminMenu">
                <ul class="adminMenu" id="adminMenu1">
                    <a href="/admin/schedule"><li>주간정기일정표</li></a>
                    <a href="/admin/meal"><li>식단표</li></a>
                    <a href="/admin/program"><li>프로그램 일정표</li></a>
                    <a href="/admin/around"><li class="active">기관 둘러보기</li></a>
                    <a href="/admin/gallery"><li>갤러리</li></a>
                    <a href="/admin/news"><li>새소식</li></a>
                    <a href="/admin/Q&A"><li>Q&A</li></a>
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
    <section id="noticeWrite">
        <h2>기관 사진 등록</h2>
        <form id="noticeWriteMain" action="/aroundUpdate/process" method="post" enctype="multipart/form-data">
            <div>
                <div>제목</div>
                <input type="text" name="title">
            </div>
            <div>
                <div>사진</div>
                <label for="file">사진 등록</label>
                <input id="file" name="file" type="file" style="display: none;">
            </div>
            <button>등록하기</button>
        </form>
    </section>
    <section id="album" style="margin-top: 120px;">
        <div id="albumList">
            <?php
            foreach ($data as $key => $value) {
            ?>
                <a href="/admin/around/detail/<?=$data[$key]->idx?>">
                    <div class="albumDetail">
                        <img src="/upload/around/<?=$data[$key]->file?>" alt="">
                        <div class="albumTxt">
                            <div><?=$data[$key]->title?></div>
                            <div></div>
                            <div><?=$data[$key]->create_date?></div>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </section>
</div>



</div>