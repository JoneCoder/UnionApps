@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ mix('css/datatables.css') }}" defer>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">ইউনিটসমূহের তালিকা</h4>
                    <a type="button" href="{{ route('admin.addUnion') }}" class="btn btn-info float-right mb-2">ইউনিয়ন সেটআপ করুন</a>
                </div>
                <div class="pb-20">
                    <table class="table hover data-table-export nowrap" id="union-list">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">ক্রমিক নং</th>
                            <th>ইউনিয়নের নাম</th>
                            <th>ইউনিয়ন কোড</th>
                            <th>উপজেলা</th>
                            <th>সেটআপ তারিখ</th>
                            <th>আপডেট তারিখ</th>
                            <th>অ্যাকশন</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i = 1; $i<= 6; $i++)
                        <tr>
                            <td class="table-plus">{{ $i }}</td>
                            <td>জয়কৃষ্ণপুর ইউনিয়ন পরিষদ</td>
                            <td>1232</td>
                            <td>নবাবগঞ্জ, ঢাকা</td>
                            <td>29-03-2020</td>
                            <td>29-03-2020</td>
                            <td>
                                <a type="button" href="{{ route('admin.editUnion') }}" class="btn btn-primary"><i class="icon-copy fa fa-edit" aria-hidden="true"></i> এডিট করুন</a>
                                <a type="button" href="" class="btn btn-warning"><i class="icon-copy fa fa-circle" aria-hidden="true"></i> ডিএক্টিভেট করুন</a>
                            </td>
                        </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/datatables.js') }}" defer></script>
    <script type="text/javascript" defer>
        $('document').ready(function () {
            $('#union-list').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'
                    }
                },
                dom: 'Bfrtp',
                buttons: [
                    'copy', 'csv', 'pdf', 'print'
                ]
            });
        })
    </scriptdefer>
@endsection
