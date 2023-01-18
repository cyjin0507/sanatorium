<section id="subVisual">
    <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > 후원 및 자원봉사 > <span>후원·자원봉사 소식</span>
    </div>
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
                foreach($data as $key=>$value) {
                    ?>
                    <a href="/volunteer/detail/<?=$data[$key]->idx?>" class="noticeColumn noticeLook">
                        <div><?=$data[$key]->idx?></div>
                        <div class="title"><?=$data[$key]->title?></div>
                        <div><?=userCheck($data[$key]->uidx)->name?></div>
                        <div><?=$data[$key]->create_date?></div>
                        <div><?=$data[$key]->views?></div>
                        <div><?=$data[$key]->recommand?></div>
                    </a>
                    <?php
                }
                ?>
            </div>

        </div>
    </section>