$('document').ready(function () {
    let loc = $('meta[name=path]').attr("content");

    $('#division').change(function () {
        if ($(this).val() != ''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'GET',
                url:loc+'/api/geo/code',
                beforeSend: function() { $(".pre-loader").fadeToggle("medium"); },
                complete: function() { $('.pre-loader').fadeOut(); },
                success: function (data) {
                    $(".district_append").after(data);
                }
            });
        }
    });
});

//get geo location
function getLocation(parentId, selectId = null, targetId = null, thanId = null, thanViewId = null, type = null){

    let loc = $('meta[name=path]').attr("content");
    let nam = '';
    if (type == 3){
        nam = 'উপজেলা/থানা';
    }else {
        nam = 'পোস্ট অফিস';
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        url:loc+'/geo/code/get',
        beforeSend: function() { $(".pre-loader").fadeToggle("medium"); },
        complete: function() { $('.pre-loader').fadeOut(); },
        data: {'id': parentId, 'type': type},
        success: function (data) {
            $("#"+thanViewId).val(nam);
            $("#"+selectId).val(data.name);
            $("#"+thanId).html('<option value="" id="'+targetId+'">চিহ্নিত করুন</option>')
            $("#"+targetId).after(data.list);
        }
    });
}

