<section id="subVisual">
    <img src="./resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > 방문요양 > <span>이용절차 및 비용안내</span>
    </div>
</section>

<section id="question">
    <h2>Q&A</h2>
    <div id="noticeContent">
        <a href="/question/write"><button id="questionBtn">작성하기</button></a>
        
        <div id="noticeMainContent">
            <div class="noticeColumn" id="noticeTitle">
                <div>번호</div>
                <div>제목</div>
                <div>작성자</div>
                <div>작성일</div>
                <div>조회수</div>
                <div>답변여부</div>
            </div>

            <?php
            foreach ($data as $key => $value) {
            ?>
                <div class="qa">

                    <div class="noticeColumn noticeLook">
                        <div><?= $data[$key]->idx ?></div>
                        <div class="title"><?= $data[$key]->title ?></div>
                        <div><?= userCheck($data[$key]->uidx)->name ?></div>
                        <div><?= $data[$key]->create_date ?></div>
                        <div>22</div>
                        <div><?= answerCheck($data[$key]->idx) ? '답변' : '대기중' ?></div>
                    </div>
                    <div class="answerColumn">
                        <div class="questionTxt">
                            <span>문의내용 : </span><br>
                            <?= $data[$key]->content ?>
                        </div>
                        <?php
                        if (answerCheck($data[$key]->idx)) {
                        ?>
                            <div class="answerTxt">
                                <span>답변내용 : </span><br>
                                <?= answerCheck($data[$key]->idx)->content ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>



        </div>

    </div>
</section>


<script>
    $('.noticeColumn').click((e) => {
        let answer = $(e.target.closest('.qa')).children('.answerColumn')
        if (answer.css('display') == 'block') {
            answer.stop().slideUp('fast')
        } else {
            answer.stop().slideDown('fast')
        }
    })
</script>