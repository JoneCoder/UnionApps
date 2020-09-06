@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('vendor/styles/form_validate.css') }}">
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4><i class="icon-copy fa fa-group" aria-hidden="true"></i> ওয়েবসাইট ম্যানেজমেন্ট</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">ড্যাশবোর্ড</a></li>
                        <li class="breadcrumb-item hover" aria-current="page">সেটিংস</li>
                        <li class="breadcrumb-item" aria-current="page">ওয়েবসাইট ম্যানেজমেন্ট</li>
                        <li class="breadcrumb-item active" aria-current="page">ইউপি স্থায়ী কমিটির</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="row">
                <div class="col-md-12 text-center align-items-center">
                    <h4 class="text-info">কমিটির তালিকা</h4> <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#add-committee">কমিটি যোগ করুন</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5">
                    <table class="hover data-table-export" style="width:100%" id="committee-list">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">ক্র.নং</th>
                            <th>কমিটির নাম</th>
                            <th>বর্ণনা</th>
                            <th>সর্বশেষ আপডেট</th>
                            <th>অ্যাকশন</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="form-row align-items-center">
                <div class="col-md-3">
                    <label class="col-form-label" for="committee">কমিটিঃ</label>
                    <select class="form-control" id="committee">
                        <option value="" >কমিটি সিলেক্ট করুন</option>
                        @foreach($committees as $committee)
                            <option value="{{ $committee->id }}" >{{ $committee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 text-center">
                    <h4 class="text-info">সদস্যগণের তালিকা</h4>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-info float-right mt-2" data-toggle="modal" data-target="#add-committee-member">সদস্য যোগ করুন</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5">
                    <table class="hover data-table-export" style="width:100%" id="committee-member-list">
                        <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">ক্র.নং</th>
                            <th>কমিটির নাম</th>
                            <th>সদস্যের নাম</th>
                            <th>পদবী</th>
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

    <div class="modal fade" id="add-committee" tabindex="-1" role="dialog" aria-labelledby="add-committee" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title">কমিটি অ্যাড করুন</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ route('union.addCommittee') }}" method="post" enctype="multipart/form-data" class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
                    @csrf
                    @if($errors->all() != null)
                        <input type="hidden" value="1" id="modal-val">
                    @endif
                    <div class="modal-body">
                        <div class="form-group bt-flabels__wrapper @error('name') has-danger @enderror">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="কমিটি টাইটেল দিন...." class="form-control form-control-lg @error('name') form-control-danger @enderror" autocomplete="name" autofocus data-parsley-required>

                            <span class="bt-flabels__error-desc">কমিটি টাইটেল দিন....</span>
                            @error('name')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group bt-flabels__wrapper @error('description') has-danger @enderror">
                            <textarea name="description" placeholder="কমিটি বিবরণ দিন...." class="form-control @error('description') form-control-danger @enderror" autocomplete="description" autofocus data-parsley-maxlength="255" data-parsley-trigger="keyup">{{ old('description') }}</textarea>

                            <span class="bt-flabels__error-desc">কমিটি বিবরণ ১০০ অক্ষরের মধ্যে দিন....</span>
                            @error('description')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
                        <button type="submit" class="btn btn-primary">অ্যাড কমিটি</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-committee" tabindex="-1" role="dialog" aria-labelledby="edit-committee" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title">কমিটি অ্যাড করুন</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="" method="post" enctype="multipart/form-data" class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
                    @csrf
                    @if($errors->all() != null)
                        <input type="hidden" value="1" id="modal-val">
                    @endif
                    <div class="modal-body">
                        <div class="form-group bt-flabels__wrapper @error('name') has-danger @enderror">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="কমিটি টাইটেল দিন...." class="form-control form-control-lg @error('name') form-control-danger @enderror" autocomplete="name" autofocus data-parsley-required>

                            <span class="bt-flabels__error-desc">কমিটি টাইটেল দিন....</span>
                            @error('name')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group bt-flabels__wrapper @error('description') has-danger @enderror">
                            <textarea name="description" placeholder="কমিটি বিবরণ দিন...." class="form-control @error('description') form-control-danger @enderror" autocomplete="description" autofocus data-parsley-maxlength="255" data-parsley-trigger="keyup">{{ old('description') }}</textarea>

                            <span class="bt-flabels__error-desc">কমিটি বিবরণ ২৫৫ অক্ষরের মধ্যে দিন....</span>
                            @error('description')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
                        <button type="submit" class="btn btn-primary">অ্যাড কমিটি</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-committee-member" tabindex="-1" role="dialog" aria-labelledby="add-committee-member" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title">কমিটি মেম্বার অ্যাড করুন</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ route('union.addCommitteeMember') }}" method="post" enctype="multipart/form-data" class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
                    @csrf
                    @if($errors->all() != null)
                        <input type="hidden" value="1" id="modal-val">
                    @endif
                    <div class="modal-body">
                        <div class="form-group bt-flabels__wrapper @error('committee_id') has-danger @enderror">
                            <label class="col-form-label" for="committee_id">কমিটিঃ</label>
                            <select class="form-control" id="committee_id" name="committee_id" data-parsley-required>
                                <option value="" >কমিটি সিলেক্ট করুন</option>
                                @foreach($committees as $committee)
                                    <option value="{{ $committee->id }}" >{{ $committee->name }}</option>
                                @endforeach
                            </select>

                            <span class="bt-flabels__error-desc">কমিটি সিলেক্ট করুন....</span>
                            @error('committee_id')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group bt-flabels__wrapper @error('name') has-danger @enderror">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="সদস্যের নাম দিন...." class="form-control form-control-lg @error('name') form-control-danger @enderror" autocomplete="name" autofocus data-parsley-required>

                            <span class="bt-flabels__error-desc">সদস্যের নাম দিন....</span>
                            @error('name')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group bt-flabels__wrapper @error('designation') has-danger @enderror">
                            <input type="text" name="designation" value="{{ old('designation') }}" placeholder="পদবী দিন...." class="form-control form-control-lg @error('designation') form-control-danger @enderror" autocomplete="designation" autofocus data-parsley-required>

                            <span class="bt-flabels__error-desc">সদস্যের পদবী দিন....</span>
                            @error('designation')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group bt-flabels__wrapper @error('mobile') has-danger @enderror">
                            <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="মোবাইল দিন...." class="form-control form-control-lg @error('mobile') form-control-danger @enderror" autocomplete="mobile" autofocus data-parsley-required>

                            <span class="bt-flabels__error-desc">সদস্যের মোবাইল দিন....</span>
                            @error('mobile')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group bt-flabels__wrapper @error('address') has-danger @enderror">
                            <textarea name="address" placeholder="ঠিকানা দিন...." class="form-control @error('address') form-control-danger @enderror" autocomplete="address" autofocus data-parsley-maxlength="255" data-parsley-trigger="keyup">{{ old('address') }}</textarea>

                            <span class="bt-flabels__error-desc">ঠিকানা ১০০ অক্ষরের মধ্যে দিন....</span>
                            @error('address')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
                        <button type="submit" class="btn btn-primary">অ্যাড কমিটির সদস্য</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-committee-member" tabindex="-1" role="dialog" aria-labelledby="edit-committee-member" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title">কমিটি মেম্বার অ্যাড করুন</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="" method="post" enctype="multipart/form-data" class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
                    @csrf
                    @if($errors->all() != null)
                        <input type="hidden" value="1" id="modal-val">
                    @endif
                    <div class="modal-body">
                        <div class="form-group bt-flabels__wrapper @error('committee_id') has-danger @enderror">
                            <label class="col-form-label" for="committee_id">কমিটিঃ</label>
                            <select class="form-control" id="committee_id" name="committee_id" data-parsley-required>
                                <option value="" >কমিটি সিলেক্ট করুন</option>
                                @foreach($committees as $committee)
                                    <option value="{{ $committee->id }}" >{{ $committee->name }}</option>
                                @endforeach
                            </select>

                            <span class="bt-flabels__error-desc">কমিটি সিলেক্ট করুন....</span>
                            @error('committee_id')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group bt-flabels__wrapper @error('name') has-danger @enderror">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="সদস্যের নাম দিন...." class="form-control form-control-lg @error('name') form-control-danger @enderror" autocomplete="name" autofocus data-parsley-required>

                            <span class="bt-flabels__error-desc">সদস্যের নাম দিন....</span>
                            @error('name')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group bt-flabels__wrapper @error('designation') has-danger @enderror">
                            <input type="text" name="designation" value="{{ old('designation') }}" placeholder="পদবী দিন...." class="form-control form-control-lg @error('designation') form-control-danger @enderror" autocomplete="designation" autofocus data-parsley-required>

                            <span class="bt-flabels__error-desc">সদস্যের পদবী দিন....</span>
                            @error('designation')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group bt-flabels__wrapper @error('mobile') has-danger @enderror">
                            <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="মোবাইল দিন...." class="form-control form-control-lg @error('mobile') form-control-danger @enderror" autocomplete="mobile" autofocus data-parsley-required>

                            <span class="bt-flabels__error-desc">সদস্যের মোবাইল দিন....</span>
                            @error('mobile')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group bt-flabels__wrapper @error('address') has-danger @enderror">
                            <textarea name="address" placeholder="ঠিকানা দিন...." class="form-control @error('address') form-control-danger @enderror" autocomplete="address" autofocus data-parsley-maxlength="255" data-parsley-trigger="keyup">{{ old('address') }}</textarea>

                            <span class="bt-flabels__error-desc">ঠিকানা ২৫৫ অক্ষরের মধ্যে দিন....</span>
                            @error('address')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
                        <button type="submit" class="btn btn-primary">অ্যাড কমিটির সদস্য</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/scripts/parsley.js') }}" defer></script>
    <script src="{{ asset('vendor/scripts/parsley_validate.js') }}" defer></script>
    <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}" defer></script>
    <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('vendor/scripts/union/committee.js') }}"></script>
    <script src="{{ asset('vendor/scripts/union/committee-member.js') }}"></script>
@endsection
