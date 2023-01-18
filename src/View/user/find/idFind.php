<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js"></script>


<section id="subVisual">
    <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > <span>아이디 찾기</span>
    </div>
</section>

<section id="findId">
    <h2>아이디 찾기</h2>

    <div>

        <div id="findIdInput">
            <div>
                <div>이름</div>
                <input type="text" id="name">
            </div>
            <div>
                <div>이메일</div>
                <input type="email" id="email" value="<?=!empty($email) ? $email : ''?>">
            </div>
            <div>
                <div>전화번호</div>
                <input type="text" id="phone" value="<?=!empty($phone) ? $phone : ''?>">
            </div>
            <button id="serialNumBtn">인증번호 보내기</button>
        </div>

        <div id="findIdSerial">
            <div>
                <div>인증번호</div>
                <input type="text" id="serial">
            </div>
            <button id="serialCheckBtn">확인</button>
            <?php
            if(!empty($data)) {
                ?>
                <div class="findIdSuccess">
                    아이디 : <span><?=$data->id?></span>
                </div>
                <?php
            } else {
                ?>
                <div class="findIdFail">
                    아이디를 찾지 못했습니다.
                </div>
                <?php
            }
            ?>
        </div>

    </div>

</section>

<script>

    let rnd = 0
    $('#serialNumBtn').click(()=> {
        if($('#name').val() == "" || $('#email').val() == "" || $('#phone').val() == "") {
            falseAlert("모두 입력해주세요.", "")
            return
        }

        rnd = Math.floor(Math.random() * 89999) + 10000
        emailSend(rnd, $('#email').val(), $('#name').val())
        trueAlert("인증번호가 발송되었습니다.", "")
        $('#findIdSerial').css('display', 'block')
    })

    $('#serialCheckBtn').click(()=> {
        if($('#serial').val() != rnd) {
            falseAlert("인증번호가 옳지 않습니다.", "")
            return
        }

        trueAlert("인증이 완료되었습니다.", "/find/id/process/"+$('#name').val()+"/"+$('#email').val()+"/"+$('#phone').val())

    })

    emailjs.init("Lw9_3VXdORs3mD2q_");

    function emailSend (number, email, name) {
        var templateParams = {
            number: number,
            email: email,
            name: name
        };

        emailjs.send('service_dghs0k7', 'template_1kakf9v', templateParams)
            .then(function(response) {
                return true
            }, function(error) {
                return false
            });
    }

</script>