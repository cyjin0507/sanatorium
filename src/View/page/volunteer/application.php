<section id="subVisual">
    <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > 후원 및 자원봉사 > <span>후원·자원봉사 신청</span>
    </div>
</section>

<section id="application">
    <h2>후원·자원봉사 신청</h2>
    <div id="applicationMain">
        <div>
            <h3>후원 신청</h3>
            <div style="border-right: none;">
                <form class="appFileDown">
                    <button type="button" id="down1">후원 신청서 다운</button>
                    <p>*웹사이트 내에서 작성하실 경우 다운로드 할 필요는 없습니다.</p>
                    <input type="file" id="one">
                    <label for="one">파일 업로드</label>
                    <button type="submit">신청서 등록</button>
                </form>
                <form class="appInput">
                    <div>
                        <div>이름</div>
                        <input type="text">
                    </div>
                    <div>
                        <div>전화번호</div>
                        <input type="number">
                    </div>
                    <div>
                        <div>후원 금액</div>
                        <input type="number">
                    </div>
                    <p>후원금액 확인 전까지는 후원상태로 인정되지 않습니다. <br>
                        또한 하루가 지나면 자동 취소됩니다.
                    </p>
                    <button>등록하기</button>
                </form>
            </div>
        </div>
        <div>
            <h3>자원봉사 신청</h3>
            <div>
                <form class="appFileDown">
                    <button type="button" id="down2">자원봉사 신청서 다운</button>
                    <p>*웹사이트 내에서 작성하실 경우 다운로드 할 필요는 없습니다.</p>
                    <input type="file" id="two">
                    <label for="two">파일 업로드</label>
                    <button type="submit">신청서 등록</button>
                </form>
                <form class="appInput">
                    <div>
                        <div>이름</div>
                        <input type="text">
                    </div>
                    <div>
                        <div>전화번호</div>
                        <input type="number">
                    </div>
                    <div>
                        <div>날짜</div>
                        <input type="date">
                    </div>
                    <p>자원 봉사가 수락되었는지 확인해주세요. <br>
                    당일에 참석하지 않으면 무효처리 됩니다.
                    </p>
                    <button>등록하기</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function handleSaveClick() {
        const elt = document.createElement('a');
        elt.setAttribute('href', "/upload/application/자원봉사_신청서.docx");
        elt.setAttribute('download', '자원봉사_신청서.docx');
        elt.style.display = 'none';
        document.body.appendChild(elt);
        elt.click();
        document.body.removeChild(elt);
    }

    $('#down2').click(() => {
        handleSaveClick()
    })

    function handleSaveClick2() {
        const elt = document.createElement('a');
        elt.setAttribute('href', "/upload/application/후원_신청서.docx");
        elt.setAttribute('download', '후원_신청서.docx');
        elt.style.display = 'none';
        document.body.appendChild(elt);
        elt.click();
        document.body.removeChild(elt);
    }

    $('#down1').click(() => {
        handleSaveClick2()
    })
</script>