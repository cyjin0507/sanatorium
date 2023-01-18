<section id="subVisual">
    <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > 만남의장 > 새소식 > <span><?= $data->title ?></span>
    </div>
</section>

<section id="albumDetailShow" style="position: relative; margin-bottom: 100px;">
    <h2>새소식</h2>
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
        <div>
            <div>첨부파일</div>
            <div class="not"></a></div>
            <div>추천수</div>
            <div class="not"><?= newsClickCheck($data->idx)->recommand ?></div>
            <div>조회수</div>
            <div class="not"><?= newsClickCheck($data->idx)->views ?></div>
        </div>
    </div>
    <div id="albumTxt">
        <?=$data->content?>
    </div>
    <a href="/news/recommand/<?= $data->idx ?>"><button id="recommandBtn">추천</button></a>

</section>

