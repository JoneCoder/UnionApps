$('document').ready(function () {
    let loc = $('meta[name=path]').attr("content");

    $('#slide').change(function () {
        let data = $(this)[0].files[0].name;
        $('#slideLabel').text(data);
    });

    $('#slide2').change(function () {
        let data = $(this)[0].files[0].name;
        $('#slideLabel2').text(data);
    });

    let m = $('#modal-val').val();
    if(m == 1){
        $("#Add-slide").modal();
    }

    //This is for drag & drop
    $( ".drag-zone ul" ).sortable(
        {
            stop: function( event, ul ) {
                let idList = [];
                $(".drag-zone ul").children("li").each(function(){
                    idList.push($(this).val());
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:loc+'/union/slider/sequence',
                    data: {'seq': idList},
                    success: function (data) {
                        if(data.success){
                            setTimeout(function(){ $('#success').css('display', 'block'); }, 1000);
                            $('#success').delay(2000).slideUp(300);
                        }else{
                            alert('দুঃখিত! পেজ এক্সপায়ার হয়েছে, অনুগ্রহ করে পেজটি রিলোড দিন।');
                        }
                    }
                });
            }
        }
    );
    $( ".drag-zone ul" ).disableSelection();

    /*slider data*/
    $('.edit').click(function () {
        let id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:loc+'/union/slider/get',
            beforeSend: function() { $(".pre-loader").fadeToggle("medium"); },
            complete: function() { $('.pre-loader').fadeOut(); },
            data: {id: id},
            success: function (data) {
                $('#slide-id').val(data.id);
                $('#title').val(data.title);
                $('#photo').attr('src', loc+'/images/slider/'+data.photo);
                $('#caption').val(data.caption);
            }
        });
    });
});
