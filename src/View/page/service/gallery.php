<section id="subVisual">
    <img src="./resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > 만남의장 > <span>갤러리</span>
    </div>
</section>

<section id="album">
    <h2>갤러리</h2>
    <a href="/gallery/write"><button id="questionBtn">작성하기</button></a>

    <div id="albumList">
        <?php
        foreach ($data as $key => $value) {
        ?>
            <div class="albumDetail">
                <img src="/upload/gallery/<?= $data[$key]->file ?>" alt="">
                <div class="albumTxt">
                    <div><?= $data[$key]->title ?></div>
                    <div><?= userCheck($data[$key]->uidx)->name ?></div>
                    <div><?= $data[$key]->create_date ?></div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>