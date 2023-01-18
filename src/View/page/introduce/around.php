

<section id="subVisual">
        <img src="./resources/img/visual-txt.png" alt="" id="sub-visual-txt">
        <div id="pageUrl">
            HOME > 기관소개 > <span>기관 둘러보기</span>
        </div>
    </section>

    <section id="album">
        <h2>기관 둘러보기</h2>
        <div id="albumList">
        <?php
            foreach ($data as $key => $value) {
            ?>
                <a href="/around/detail/<?=$data[$key]->idx?>">
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