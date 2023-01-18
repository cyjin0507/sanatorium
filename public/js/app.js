function ajax(url, type, data, successFn, errorFn) {
    $.ajax({
        url: url,
        type: type,
        data: data,
        contentType: false,
        processData: false,
        success: successFn,
        error: errorFn
    });
}

$('#menuBar').click(()=> {
    $('#menuBar').css('visibility', 'hidden')
    $('header').css('visibility', 'visible')
    $('header').css('margin-left', '0px')
})

$('#xBtn').click(()=> {
    $('#menuBar').css('visibility', 'visible')
    $('header').css('visibility', 'hidden')
    $('header').css('margin-left', '-500px')
})