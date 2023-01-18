<section id="visual">
    <img src="/resources/img/visual-txt.png" alt="" id="visual-txt">
    <div id="visual-info">
        <ul>
            <li>
                <a href="/greeting">
                    <img src="/resources/img/icon1.png" alt="">
                    <div>기관소개</div>
                </a>
            </li>
            <li>
                <a href="/around">
                    <img src="/resources/img/icon2.png" alt="">
                    <div>둘러보기</div>
                </a>
            </li>
            <li>
                <a href="/meal">
                    <img src="/resources/img/icon3.png" alt="">
                    <div>식단표</div>
                </a>
            </li>
            <li>
                <a href="/map">
                    <img src="/resources/img/icon4.png" alt="">
                    <div>오시는길</div>
                </a>
            </li>
        </ul>
    </div>
</section>

<section id="section2">
    <div>
        <div id="galleryInfo">
            <h3>갤러러</h3>
            <p>인삼골주간보호센터의 일상생활을 보여드립니다.</p>
            <a href="/gallery"><button>더보기</button></a>
        </div>
        <div>
            <img src="/upload/gallery/<?=$gallery[0]->file?>" alt="">
        </div>
        <div>
            <img src="/upload/gallery/<?=$gallery[1]->file?>" alt="">
        </div>
    </div>
    <div>
        <div>
            <img src="/upload/gallery/<?=$gallery[2]->file?>" alt="">
        </div>
        <div>
            <img src="/upload/gallery/<?=$gallery[3]->file?>" alt="">
        </div>
        <div>
            <img src="/upload/gallery/<?=$gallery[4]->file?>" alt="">
        </div>
    </div>
</section>

<section id="section3">
    <div id="sec3Inner">
        <h2>새소식</h2>
        <p>인삼골주간보호센터의 새소식을 알려드립니다.</p>
        <div id="sec3Main">
            <div class="sec3Detail">
                <h3><?=$news[0]->title?></h3>
                <div><span>작성자 : </span><?=userCheck($news[0]->uidx)->name?></div>
                <a href="/news/detail/<?=$news[0]->idx?>"><button>더보기</button></a>
            </div>
            <div class="sec3Detail">
                <h3><?=$news[1]->title?></h3>
                <div><span>작성자 : </span><?=userCheck($news[1]->uidx)->name?></div>
                <a href="/news/detail/<?=$news[1]->idx?>"><button>더보기</button></a>
            </div>
            <div class="sec3Detail">
                <h3><?=$news[2]->title?></h3>
                <div><span>작성자 : </span><?=userCheck($news[2]->uidx)->name?></div>
                <a href="/news/detail/<?=$news[2]->idx?>"><button>더보기</button></a>
            </div>
            <div class="sec3Detail">
                <h3><?=$news[3]->title?></h3>
                <div><span>작성자 : </span><?=userCheck($news[3]->uidx)->name?></div>
                <a href="/news/detail/<?=$news[3]->idx?>"><button>더보기</button></a>
            </div>
        </div>
        <a href="/news"><button>더보기</button></a>
    </div>
</section>

<section id="section1">
    <div id="help">
        <div> <span>도움이</span> 필요하세요?</div>
        <div><span>043)</span> 838-6645 </div>
        <div>충청북도 증평군 증평읍 광장로30 (송산리 734)</div>
    </div>
    <div id="business">
        <ul>
            <li>
                <a href="/howToUse">
                    <h3>입소 비용안내</h3>
                    <p>VIEW<br>+</p>
                </a>
            </li>
            <li>
                <a href="/around">
                    <h3>기관 둘러보기</h3>
                    <p>VIEW<br>+</p>
                </a>
            </li>
            <li>
                <a href="/step">
                    <h3>요양원 이용절차</h3>
                    <p>VIEW<br>+</p>
                </a>
            </li>
        </ul>
    </div>
</section>