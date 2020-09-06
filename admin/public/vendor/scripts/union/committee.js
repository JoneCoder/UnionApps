$('document').ready(function () {
    let loc = $('meta[name=path]').attr("content");
    let committeeTable;
    function committeeList(name = null) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        committeeTable = $('#committee-list').DataTable({
            scrollCollapse: true,
            autoWidth: true,
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                dataType: "JSON",
                type    : "post",
                url     : loc+'/union/committee/list',
                data    : {name:name},

            },
            columns:[
                {
                    data: null,
                    render: function(){
                        return committeeTable.page.info().start + committeeTable.column(0).nodes().length;
                    }
                },
                { data: "name" },
                { data: null,
                    render : function(data){
                        if(data.description.length > 50) return data.description.substring(0,50);
                    }
                },
                { data: "updated_at" },
                {
                    data: null,
                    render: function(data){
                        return "<a class='btn btn-sm btn-warning mb-1'  href=''>এডিট</a> <a class='btn btn-sm btn-danger mb-1'  href=''>একটিভ/ডিএক্টিভ</a>";
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

    committeeList();
});
