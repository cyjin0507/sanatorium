<section id="subVisual">
        <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
        <div id="pageUrl">
            HOME > <span>회원가입</span>
        </div>
    </section>

    <section id="joinMainContent">
        <h2>회원가입</h2>
        <div id="joinProcess">
            <div class="joinFu">
                <div>
                    <span>STEP 1</span>
                    <h3>인증 및 약관동의</h3>
                </div>
            </div>
            <div class="joinNow" style="border-top: 4px solid #FB6E61;">
                <div>
                    <span style="color: #FB6E61;">STEP 2</span>
                    <h3 style="color: #FB6E61;">회원정보 입력</h3>
                </div>
            </div>
        </div>


        <div id="joinInputTitle">필수 입력 사항</div>
        <div id="joinInputArea">
            <div>
                <div>이름</div>
                <div>
                    <input type="text" id="name">
                </div>
            </div>
            <div>
                <div>아이디</div>
                <div>
                    <input type="text" id="id">
                </div>
            </div>
            <div>
                <div>비밀번호</div>
                <div>
                    <input type="password" id="pw">
                    <button id="pw_look">보기</button>
                </div>
            </div>
            <div>
                <div>비밀번호 확인</div>
                <div>
                    <input type="password" id="pw_check">
                    <button id="pw_check_look">보기</button>
                </div>
                <div class="pw_check">비밀번호가 다릅니다.</div>
            </div>
            <div>
                <div>핸드폰번호</div>
                <div>
                    <input type="text" id="phone">
                </div>
            </div>
            <div>
                <div>이메일</div>
                <div>
                    <input type="text" id="email">
                </div>
            </div>
        </div>

        <form action="/join/process" method="post" id="joinNextBtn">
            <input type="hidden" name="name" id="name_copy">
            <input type="hidden" name="id" id="id_copy">
            <input type="hidden" name="pw" id="pw_copy">
            <input type="hidden" name="pw_check" id="pw_check_copy">
            <input type="hidden" name="phone" id="phone_copy">
            <input type="hidden" name="email" id="email_copy">
            <button type="submit" class="joinYes">회원가입</button>
            <a href="/"><button type="button" class="joinNo">취소</button></a>
        </form>

    </section>

    <script>

    $('#name').change(()=> {$('#name_copy').val($('#name').val())})
    $('#id').change(()=> {$('#id_copy').val($('#id').val())})
    $('#pw').change(()=> {$('#pw_copy').val($('#pw').val())})
    $('#pw_check').change(()=> {$('#pw_check_copy').val($('#pw_check').val())})
    $('#phone').change(()=> {$('#phone_copy').val($('#phone').val())})
    $('#email').change(()=> {$('#email_copy').val($('#email').val())})

    $('#pw_check').change(e=> {
        if($('#pw_check').val() == $('#pw').val()) {
            $('.pw_check').css('display', 'none')
        } else {
            $('.pw_check').css('display', 'flex')
        }
    })

    $('#pw').change(e=> {
        if($('#pw_check').val() == $('#pw').val()) {
            $('.pw_check').css('display', 'none')
        } else {
            $('.pw_check').css('display', 'flex')
        }
    })

    $('#pw_look').click(()=> {
        if($('#pw').attr('type') == "text") {
            $('#pw_look').text('보기')
            $('#pw').attr('type', 'password')
            return
        }
        if($('#pw').attr('type') == "password") {
            $('#pw_look').text('숨기기')
           $('#pw').attr('type', 'text')
            return
        }
    })

    $('#pw_check_look').click(()=> {
        if($('#pw_check').attr('type') == "text") {
            $('#pw_check_look').text('보기')
            $('#pw_check').attr('type', 'password')
            return
        }
        if($('#pw_check').attr('type') == "password") {
            $('#pw_check_look').text('숨기기')
           $('#pw_check').attr('type', 'text')
            return
        }
    })


    

    </script>