<section id="subVisual">
        <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
        <div id="pageUrl">
            HOME > Q&A > <span>질문 작성하기</span>
        </div>
    </section>


<section id="noticeWrite" style="margin-top: 60px; border-bottom:none;">
    <h2>질문 작성</h2>
    <form id="noticeWriteMain" action="/question/add" method="post" enctype="multipart/form-data">
        <div>
            <div>제목</div>
            <input type="text" name="title">
        </div>
        <div>
        </div>
        <div>
            <div>내용</div>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
        </div>
        <button>등록하기</button>
    </form>
</section>