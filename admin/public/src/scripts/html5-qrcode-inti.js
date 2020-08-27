function onScanSuccess(qrMessage) {
    let data = qrMessage;
    let basePath    = $('meta[name=path]').attr("content");
    let token       = $('meta[name=csrf-token]').attr("content");
    if (data!='') {
        $('#qr-error').html('');

        $.ajax({
            type: "POST",
            cache: false,
            url : basePath+"/qrlogin",
            data: {"_token": token, data:data},
            success: function(data) {
                if (data==1) {
                    $(location).attr('href', basePath+"/home");
                }else{
                    $('#qr-error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
                        '                                                                <strong>There is no user with this qr code!</strong>\n' +
                        '                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '                                                                    <span aria-hidden="true">&times;</span>\n' +
                        '                                                                </button>\n' +
                        '                                                            </div>');
                }
            }
        })
    }else{
        $('#qr-error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
            '                                                                <strong>There is no data!</strong>\n' +
            '                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
            '                                                                    <span aria-hidden="true">&times;</span>\n' +
            '                                                                </button>\n' +
            '                                                            </div>');
    }
}

function onScanFailure(error) {
    $('#qr-error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
        '                                                                <strong>'+ error +'</strong>\n' +
        '                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
        '                                                                    <span aria-hidden="true">&times;</span>\n' +
        '                                                                </button>\n' +
        '                                                            </div>');
}
$('#login-modal').on('shown.bs.modal', function (e) {
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 200 }, /* verbose= */ true);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
});
