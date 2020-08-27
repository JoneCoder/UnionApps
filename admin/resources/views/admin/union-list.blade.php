@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" defer>
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4><i class="icon-copy fa fa-group" aria-hidden="true"></i> ইউনিয়ন সমূহের তালিকা</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">ড্যাশবোর্ড</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ইউনিয়ন তালিকা</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="form-row align-items-center">
                <div class="col-md-3">
                    <label class="col-form-label" for="district">জেলাঃ</label>
                    <select onchange="getLocation($(this).val(), 'upazila')" class="custom-select2 form-control" id="district">
                        <option value="" class="districts">জেলা সিলেক্ট করুন</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="col-form-label" for="upazila">উপজেলাঃ</label>
                    <select onchange="getLocation($(this).val(), 'union')" class="form-control" id="upazila">
                        <option>উপজেলা সিলেক্ট করুন</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="col-form-label" for="union">ইউনিয়নঃ</label>
                    <select class="form-control" id="union">
                        <option>ইউনিয়ন সিলেক্ট করুন</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <a type="button" href="{{ route('admin.addUnion') }}" class="btn btn-info float-right mt-2">ইউনিয়ন সেটআপ করুন</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5">
                    <table class="hover data-table-export" style="width:100%" id="union-list">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">নং</th>
                            <th>ইউপি কোড</th>
                            <th>ইউপি নাম</th>
                            <th>ইউজারনেম</th>
                            <th>সাব-ডোমেইন</th>
                            <th>মোবাইল</th>
                            <th>ঠিকানা</th>
                            <th>অ্যাকশন</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}" defer></script>
    <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('vendor/scripts/geocode/locations.js') }}"></script>
    <script src="{{ asset('vendor/scripts/union/union-list.js') }}"></script>
@endsection
