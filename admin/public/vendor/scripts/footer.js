$('document').ready(function () {
    x = $('.footer-position').height();
    y = $(window).height();
    if (x <= (y-77)){
        $('.footer-position').css('min-height', y+'px');
        $('#footer').css('position', 'relative');
        $('#footer').css('left', '0px');
        $('#footer').css('bottom', '0px');
    }else{
        $('#footer').removeAttr('style');
        $('.footer-position').removeAttr('style');
    }
});
