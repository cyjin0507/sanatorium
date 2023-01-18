function trueAlert(txt, url) {
    $('#alertZone').append(`
        <div id="alertArea">
        <div id="alert">
        <svg width="115px" height="115px" viewBox="0 0 133 133" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="check-group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <circle id="filled-circle" fill="#07b481" cx="66.5" cy="66.5" r="54.5" />
                <circle id="white-circle" fill="#FFFFFF" cx="66.5" cy="66.5" r="55.5" />
                <circle id="outline" stroke="#07b481" stroke-width="4" cx="66.5" cy="66.5" r="54.5" />
                <polyline id="check" stroke="#FFFFFF" stroke-width="5.5" points="41 70 56 85 92 49" />
            </g>
        </svg>
        <div id="alertMsg">
            ${txt}
        </div>
        <div class="alertBtn">
            확인
        </div>
    </div>
        </div>

    <style>
    #alertZone >#alertArea {
            width:100%;
            height:200vh;
            margin-top:-100vh;
            z-index:99999;
            position: fixed;
            background-color:white;
        }

        #alert {
    position: fixed;
    width: 400px;
            height: 270px;
            background-color: white;
            box-shadow: 3px 3px 5px rgb(91, 91, 91);
            top: 0;
            left: 50%;
            transform: translate(-50%);
            border-radius: 0 0 10px 10px;
        }

        #alertMsg {
            margin-top: 160px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .alertBtn {
            float: right;
            width: 100px;
            line-height: 2;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            text-align: center;
            background-color: #07b481;
            border-radius: 5px;
            margin-top: 20px;
            margin-right: 20px;
        }

        svg {
            transform: translate(-50%);
            left: 50%;
            position: absolute;
            top: 15px;
        }

        #check-group {
            animation: 0.32s ease-in-out 1.03s check-group;
            transform-origin: center;
        }

        #check-group #check {
            animation: 0.34s cubic-bezier(0.65, 0, 1, 1) 0.8s forwards check;
            stroke-dasharray: 0, 75px;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        #check-group #outline {
            animation: 0.38s ease-in outline;
            transform: rotate(0deg);
            transform-origin: center;
        }

        #check-group #white-circle {
            animation: 0.35s ease-in 0.35s forwards circle;
            transform: none;
            transform-origin: center;
        }

        @keyframes outline {
            from {
                stroke-dasharray: 0, 345.576px;
            }

            to {
                stroke-dasharray: 345.576px, 345.576px;
            }
        }

        @keyframes circle {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(0);
            }
        }

        @keyframes check {
            from {
                stroke-dasharray: 0, 75px;
            }

            to {
                stroke-dasharray: 75px, 75px;
            }
        }

        @keyframes check-group {
            from {
                transform: scale(1);
            }

            50% {
                transform: scale(1.09);
            }

            to {
                transform: scale(1);
            }
        }
    </style>
        `)

    $('.alertBtn').click(() => {
        if(url == "back") {
            history.back()
        } else if (url != '') {
            go(url)
        }
        $('#alertZone').html('')
    })

    $('body').keypress(e=> {
        if(e.keyCode == 13) {
            if(url == "back") {
                history.back()
            } else if (url != '') {
                go(url)
            }
            $('#alertZone').html('')
        }
    })


}

function falseAlert(txt, url) {
    $('#alertZone').append(`
    <div id="alertArea">
    <div id="alert">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
        xml:space="preserve">

        <g id="Layer_3">
            <line id="path2" fill="none" stroke="#DA3E3E" stroke-width="3" stroke-miterlimit="10" x1="8.5" y1="41.5"
                x2="41.5" y2="8.5" />
            <line id="path3" fill="none" stroke="#DA3E3E" stroke-width="3" stroke-miterlimit="10" x1="41.5"
                y1="41.5" x2="8.5" y2="8.5" />
        </g>
    </svg>

    <div id="alertMsg">
        ${txt}
    </div>
    <div class="alertBtn">
        확인
    </div>
</div>
    </div>

<style>
#alertZone >#alertArea {
    width:100%;
    height:200vh;
    margin-top:-100vh;
    z-index:99999;
    position: fixed;
    background-color:white;
}

    #alert {
    position: fixed;
        width: 400px;
        height: 270px;
        background-color: white;
        box-shadow: 3px 3px 5px rgb(91, 91, 91);
        top: 0;
        left: 50%;
        transform: translate(-50%);
        border-radius: 0 0 10px 10px;
    }

    #alertMsg {
        margin-top: 160px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    .alertBtn {
        float: right;
        width: 100px;
        line-height: 2;
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        text-align: center;
        background-color: #DA3E3E;
        border-radius: 5px;
        margin-top: 20px;
        margin-right: 20px;
    }

    svg {
        width: 120px;
        height: 120px;
        transform: translate(-50%);
        left: 50%;
        position: absolute;
        top: 15px;
    }

    #path {
        stroke-dasharray: 200;
        stroke-dashoffset: 400;

        animation: checker 2.8s linear;
        animation-fill-mode: forwards;
    }

    @keyframes checker {
        from {
            stroke-dashoffset: 320;
        }

        to {
            stroke-dashoffset: 400;
        }
    }


    #path2 {
        stroke-dasharray: 430;
        stroke-dashoffset: 800;

        animation: x 0.6s linear;
        animation-fill-mode: forwards;
    }

    #path3 {
        stroke-dasharray: 430;
        stroke-dashoffset: 800;

        animation: x 0.6s linear;
        animation-fill-mode: forwards;
        animation-delay: 0.3s;
    }

    @keyframes x {
        from {
            stroke-dasharray: 430;
        }

        to {
            stroke-dasharray: 400;
        }
    }
</style>
        `)

    $('.alertBtn').click(() => {
        if(url == "back") {
            history.back()
        } else if (url != '') {
            go(url)
        }
        
        $('#alertZone').html('')
    })

    $('body').keypress(e=> {
        if(e.keyCode == 13) {
            if(url == "back") {
                history.back()
            } else if (url != '') {
                go(url)
            }
            $('#alertZone').html('')
        }
    })


}

function go(url) {
    window.location.href = url
}