$('document').ready(function () {
    let loc = $('meta[name=path]').attr("content");
    let committeeMemberTable;
    function committeeMemberList(name = null) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        committeeMemberTable = $('#committee-member-list').DataTable({
            scrollCollapse: true,
            autoWidth: true,
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                dataType: "JSON",
                type    : "post",
                url     : loc+'/union/committee/members/list',
                data    : {name:name},

            },
            columns:[
                {
                    data: null,
                    render: function(){
                        return committeeMemberTable.page.info().start + committeeMemberTable.column(0).nodes().length;
                    }
                },
                { data: "committee_name" },
                { data: "name" },
                { data: "designation" },
                { data: "mobile" },
                { data: "address" },
                {
                    data: null,
                    render: function(data){
                        return "<a class='btn btn-sm btn-warning mb-1'  href=''>এডিট</a> <a class='btn btn-sm btn-danger mb-1'  href=''>ডিলিট</a>";
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

    committeeMemberList();

    //union list search
    function committeeMemberSearch(name = null){

        $("#committee-member-list").dataTable().fnSettings().ajax.data.name = name;

        committeeMemberTable.ajax.reload();
    }

    $('#committee').change(function () {
        committeeMemberSearch($(this).val());
    });
});
