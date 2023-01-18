<section id="subVisual">
    <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > 만남의장 > 갤러리 > <span>갤러리 작성</span>
    </div>
</section>


<section id="noticeWrite" style="margin-top: 100px; border-bottom:none;">
    <h2>갤러리 사진 등록</h2>
    <form id="noticeWriteMain" action="/gallery/process" method="post" enctype="multipart/form-data">
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