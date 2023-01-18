<section id="subVisual">
        <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
        <div id="pageUrl">
            HOME > <span>로그인</span>
        </div>
    </section>

    <section id="login">
        <h2>로그인</h2>
        <form action="/login/process" method="post" id="loginArea">
            <input type="text" name="id" placeholder="아이디를 입력해주세요">
            <input type="password" name="pw" placeholder="비밀번호를 입력해주세요">
            <button>로그인</button>
        </form>
        <div id="loginHelp">
            <ul>
                <li><a href="/find/id">아이디 찾기</a></li>
                <li><div>|</div></li>
                <li><a href="#" onclick="trueAlert('관리자에게 문의해주세요.', '')">비밀번호 재설정</a></li>
                <li><div>|</div></li>
                <li><a href="/join/check">회원가입</a></li>
            </ul>
        </div>
    </section>