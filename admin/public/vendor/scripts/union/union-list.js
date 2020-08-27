$('document').ready(function () {
    let unionTable;
    function unionList(district = null, upazila = null, union = null) {
        unionTable = $('#union-list').DataTable({
            scrollCollapse: true,
            autoWidth: true,
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                dataType: "JSON",
                type    : "post",
                url     : loc+'/union/list',
                data    : {district:district, upazila:upazila, union:union},

            },
            columns:[
                {
                    data: null,
                    render: function(){
                        return unionTable.page.info().start + unionTable.column(0).nodes().length;
                    }
                },
                { data: "code" },
                { data: "bn_name" },
                {
                    data: null,
                    render:function(data, type, row, meta){
                        return data.username;
                    }
                },
                { data: "subdomain" },
                { data: "mobile" },
                {
                    data: null,
                    render:function(data, type, row, meta){
                        return data.upazila_name_bn+', '+data.district_name_bn;
                    }
                },

                {
                    data: null,
                    render: function(data, type, row, meta){
                        if(data.status == 1){
                            status = "<a class='btn btn-sm btn-danger mb-1'  href='/union/deactivate/activate/"+data.id+"'>ডিএক্টিভ</a>";
                        }else {
                            status = "<a class='btn btn-sm btn-success mb-1'  href='/union/deactivate/activate/"+data.id+"'>এক্টিভেট</a>";
                        }
                        return "<a class='btn btn-sm btn-info mb-1'  href='javascript:void(0)'>লগইন</a> <a class='btn btn-sm btn-warning mb-1'  href='/union/edit/"+data.id+"'>এডিট</a> "+status;
                    }
                },


            ],
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                searchPlaceholder: "Search"
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'pdf', 'print'
            ]
        });
    }

    unionList();

    //union list search
    function unionSearch(district = null, upazila = null, union = null){

        $("#union-list").dataTable().fnSettings().ajax.data.district = district;
        $("#union-list").dataTable().fnSettings().ajax.data.upazila = upazila;
        $("#union-list").dataTable().fnSettings().ajax.data.union = union;

        unionTable.ajax.reload();
    }

    $('#district').change(function () {
        unionSearch($(this).val(), null, null);
    });

    $('#upazila').change(function () {
        unionSearch($('#district').val(), $(this).val(), null);
    });

    $('#union').change(function () {
        unionSearch($('#district').val(), $('#upazila').val(), $(this).val());
    });
});
