<section id="subVisual">
    <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > 요양원 > 식단표 > <span><?= $data->title ?></span>
    </div>
</section>

<section id="albumDetailShow" style="margin-bottom: 100px;">
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
        <div>
            <div>첨부파일</div>
            <div class="not"><a href="#" id="link"><?= $data->file ?></a></div>
            <div>추천수</div>
            <div class="not"><?= mealClickCheck($data->idx)->recommand ?></div>
            <div>조회수</div>
            <div class="not"><?= mealClickCheck($data->idx)->views ?></div>
        </div>
    </div>
    <div id="albumTxt">
        <?=$data->content?>
    </div>
    <a href="/meal/recommand/<?= $data->idx ?>"><button id="recommandBtn">추천</button></a>
</section>


<script>
    function handleSaveClick() {
        const elt = document.createElement('a');
        elt.setAttribute('href', "/upload/meal/<?= $data->file ?>");
        elt.setAttribute('download', '<?= $data->file ?>');
        elt.style.display = 'none';
        document.body.appendChild(elt);
        elt.click();
        document.body.removeChild(elt);
    }

    $('#link').click(() => {
        handleSaveClick()
    })
</script>