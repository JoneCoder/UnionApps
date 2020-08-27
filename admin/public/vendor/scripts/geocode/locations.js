//Define Base path in global variable
let loc = $('meta[name=path]').attr("content");

$('document').ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#division').focus(function () {
        $.ajax({
            type:'GET',
            url:loc+'/api/geo/code/divisions',
            success: function (data) {
                $.each(data, function (key, value) {
                    $('.divisions').after('<option value="'+value.id+'">'+value.name+'</option>');
                })
            }
        });
    });

    $.ajax({
        type:'GET',
        url:loc+'/api/geo/code/districts',
        success: function (data) {
            $.each(data, function (key, value) {
                $('.districts').after('<option value="'+value.id+'">'+value.name+'</option>');
            })
        }
    });
});

//get geo location
function getLocation(value, type){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        url:loc+'/api/geo/code/',
        beforeSend: function() { $(".pre-loader").fadeToggle("medium"); },
        complete: function() { $('.pre-loader').fadeOut(); },
        data: {'id': value, 'type': type},
        success: function (data) {
            if (type == 'upazila'){
                $('#policestation').html('<option value="">চিহ্নিত করুন</option>');
                $('#upazila').html('<option value="">চিহ্নিত করুন</option>');

                $.each(data[0], function (key, n) {
                    $('#policestation').append('<option value="' + n.id + '">' + n.name + '</option>');
                });

                $.each(data[1], function (key, n) {
                    $('#upazila').append('<option value="' + n.id + '">' + n.name + '</option>');
                })
            }else {
                $('#'+type).html('<option value="">চিহ্নিত করুন</option>');

                $.each(data, function (key, n) {
                    $('#'+type).append('<option value="' + n.id + '">' + n.name + '</option>');
                })
            }
        }
    });
}

