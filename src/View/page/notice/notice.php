<section id="subVisual">
        <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
        <div id="pageUrl">
            HOME > <span>공지사항</span>
        </div>
    </section>

    <section id="notice">
        <h2>공지사항</h2>
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
                    <a href="/notice/detail/<?=$data[$key]->idx?>" class="noticeColumn noticeLook" <?= $data[$key]->accept == 0 ? '' : 'style="color: #FB6E61; font-weight:bold;"' ?>>
                        <div><?= $data[$key]->accept == 0 ? $data[$key]->idx : '공지' ?></div>
                        <div class="title"><?=$data[$key]->title?></div>
                        <div><?=userCheck($data[$key]->uidx)->name?></div>
                        <div><?=$data[$key]->create_date?></div>
                        <div><?=noticeClickCheck($data[$key]->idx)->views?></div>
                        <div>-</div>
                    </a>
                    <?php
                }
                ?>
            </div>

        </div>
    </section>