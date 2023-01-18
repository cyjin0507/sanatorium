<section id="subVisual">
    <img src="/resources/img/visual-txt.png" alt="" id="sub-visual-txt">
    <div id="pageUrl">
        HOME > <span>비밀번호 찾기</span>
    </div>
</section>

<section id="pwChange">
    <h2>비밀번호 재설정</h2>
    <form action="/pw/change/id/check" method="post">
        <div>
            <div>아이디</div>
            <input type="text" name="id" value="<?= empty($data) ? '' : $data->id ?>">
        </div>
        <?php
        if (empty($data)) {
        ?>
            <button>아이디 인증</button>
        <?php
        } else {
        ?>
            <button type="button">인증완료</button>
        <?php
        }
        ?>
    </form>

    <?php
    if (!empty($data)) {
    ?>
        <form action="/password/change" id="pwInput" method="post">
            <div>
                <div>비밀번호</div>
                <input type="password" name="pw" id="pw">
            </div>
            <div>
                <div>비밀번호 재설정</div>
                <input type="password" name="pw_check" id="pw_check">
            </div>
            <input type="hidden" name="id" value="<?=$data->id?>">
            <button type="button" class="btn">재설정</button>
        </form>
    <?php
    }
    ?>


</section>

<script>
    $('.btn').click(()=> {
        if($('#pw').val() != $('#pw_check').val()) {
            falseAlert("비밀번호가 일치하지 않습니다.", "")
            return
        }
        if($('#pw').val() == "" || $('#pw_check').val() == "") {
            falseAlert("비밀번호를 입력해주세요.", "")
            return
        }
        $('.btn').attr('type', 'submit')
    })
</script>