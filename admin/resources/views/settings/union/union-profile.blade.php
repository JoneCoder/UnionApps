@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/styles/form_validate.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/switchery/switchery.min.css') }}">
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4><i class="icon-copy fa fa-bank" aria-hidden="true"></i> ইউনিয়ন প্রোফাইল</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">ড্যাশবোর্ড</a></li>
                        <li class="breadcrumb-item hover" aria-current="page">সেটিংস</li>
                        <li class="breadcrumb-item active" aria-current="page">ইউনিয়ন প্রোফাইল সেটআপ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p union-background">
                <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                    <li class="nav-item">
                        <a class="nav-link @if($errors->all() == null)active @endif" id="v-pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="icon-copy fa fa-user" aria-hidden="true"></i> প্রোফাইল</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($errors->all() != null)active @endif" id="v-pills-setting-tab" data-toggle="pill" href="#setting" role="tab" aria-controls="v-pills-setting" aria-selected="false"><i class="icon-copy fa fa-cog" aria-hidden="true"></i> এডিট</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade @if($errors->all() == null)show active @endif" id="profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="row">
                                        <div class="col-md-12 text-center bg-blue border-radius-4 p-2">
                                            <h4 class="text-white">ডিজিটাল ইউনিয়ন পরিষদ প্রোফাইল</h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-borderless table-responsive">
                                                <tbody>
                                                <tr>
                                                    <th>ইউনিয়ন বাংলা নাম:</th>
                                                    <td>{{ $union->bn_name }}</td>

                                                    <th>ইউনিয়ন ইংরেজি নাম:</th>
                                                    <td>{{ $union->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th>পোস্টাল কোড:</th>
                                                    <td>{{ Converter::en2bn($union->postoffice_code ) }}</td>

                                                    <th>ইউনিয়ন কোড:</th>
                                                    <td>{{ Converter::en2bn($union->code) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>ভিলেজ বাংলা:</th>
                                                    <td>{{ $union->village}}</td>

                                                    <th>ওয়েবসাইট:</th>
                                                    <td>{{ $union->subdomain }}</td>
                                                </tr>

                                                <tr>
                                                    <th>মোবাইল:</th>
                                                    <td>{{ Converter::en2bn($union->mobile) }}</td>

                                                    <th>ই-মেইল:</th>
                                                    <td>{{ $union->email }}</td>
                                                </tr>

                                                <tr>
                                                    <th>ঠিকানা: </th>
                                                    <td colspan="3">জেলা: {{ $union->district }}, উপজেলা/থানা: {{ $union->upazila }}, পোস্ট অফিস: {{ $union->postoffice }}-{{ Converter::en2bn($union->postoffice_code) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>ইউনিয়ন সচিব:</th>
                                                    <td>{{ $union->secretary }}</td>

                                                    <th>ইউনিয়ন স্ট্যাটাস:</th>
                                                    <td>@if($union->status == 1) <span class="badge badge-success">চালু আছে</span> @else <span class="badge badge-danger">বন্ধ আছে</span> @endif</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <h4 class="text-blue">ইউনিয়ন মেইন লোগো</h4>
                                            <img src="{{ asset('images/union/'.$union->main_logo) }}" width="100">
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <h4 class="text-blue">ইউনিয়ন ব্র্যান্ড লোগো</h4>
                                            <img src="{{ asset('images/union/'.$union->brand_logo) }}" width="100">
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <h4 class="text-blue">ইউনিয়ন জলছাপ</h4>
                                            <img src="{{ asset('images/union/'.$union->jolchap) }}" width="100">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 border mt-3">
                                            <strong>ইউনিয়ন পরিষদ সম্পর্কে: </strong> @php echo $union->about; @endphp
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 border border-radius-4" id="map">
                                            @php
                                                echo $union->map;
                                            @endphp
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade @if($errors->all() != null)show active @endif" id="setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">
                                    <div class="row">
                                        <div class="col-md-12 text-center bg-blue border-radius-4 p-2">
                                            <h4 class="text-white">ইউনিয়ন পরিষদ প্রোফাইল আপডেট</h4>
                                        </div>
                                    </div>

                                    <form action="{{ route('union.update') }}" method="post" enctype="multipart/form-data" class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
                                        @csrf
                                        <div class="col-md-12">
                                            <ul class="profile-edit-list row mt-3">
                                                <li class="weight-500 col-md-6">
                                                    <div class="form-group bt-flabels__wrapper @error('name') has-danger @enderror">
                                                        <label class="form-control-label">ইউনিয়নের নাম (ইংরেজিতে) <span>*</span></label>
                                                        <input type="text" name="name" value="{{ old('name')? old('name') : $union->name}}" placeholder="ইউনিয়নের পূর্ণ নাম প্রদান করূন" class="form-control form-control-lg @error('name') is-invalid @enderror" autocomplete="name" autofocus data-parsley-trigger="keyup" data-parsley-required>

                                                        <span class="bt-flabels__error-desc">ইউনিয়নের নাম দিন ইংরেজিতে....</span>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group bt-flabels__wrapper @error('district_id') has-danger @enderror">
                                                        <label for="district" class="form-control-label">জেলা <span>*</span></label>
                                                        <select onchange="getLocation($(this).val(), 'upazila')" name="district_id" id="district" class="form-control @error('district_id')is-invalid @enderror">
                                                            <option value="">চিহ্নিত করুন</option>
                                                        </select>
                                                        <span class="bt-flabels__error-desc">জেলা নির্বাচন করুন....</span>

                                                        @error('district_id')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group bt-flabels__wrapper @error('policestation_id') has-danger @enderror">
                                                        <label for="policestation" class="form-control-label">থানা <span>*</span></label>
                                                        <select onchange="getLocation($(this).val(), 'postoffice')" name="policestation_id" id="policestation" class="form-control @error('policestation_id')is-invalid @enderror">
                                                            <option value="">চিহ্নিত করুন</option>
                                                        </select>
                                                        <span class="bt-flabels__error-desc">থানা নির্বাচন করুন....</span>

                                                        @error('policestation_id')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <div class="form-group d-flex align-items-center">
                                                                <div class="mr-1">
                                                                    <img src="{{ asset('images/union/'. $union->main_logo) }}" width="100">
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input id="mainLogo" accept="image/png" name="main_logo" type="file" class="custom-file-input @error('main_logo') is-invalid @enderror">
                                                                    <label for="mainLogo" id="mainLogoLabel" class="custom-file-label" style="cursor: pointer;">@error('main_logo') {{ $message }} @else মেইন লোগো সিলেক্ট করুন @enderror</label>
                                                                </div>
                                                            </div>
                                                            @error('main_logo')
                                                            <span class="has-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <div class="form-group d-flex align-items-center">
                                                                <div class="mr-1">
                                                                    <img src="{{ asset('images/union/'. $union->brand_logo) }}" width="100">
                                                                </div>
                                                                <div class="custom-file" style="cursor: pointer;">
                                                                    <input id="brandLogo" accept="image/png" name="brand_logo" type="file" class="custom-file-input @error('brand_logo') is-invalid @enderror">
                                                                    <label for="brandLogo" id="brandLogoLabel" class="custom-file-label" style="cursor: pointer;">@error('brand_logo') {{ $message }} @else ব্র্যান্ড লোগো সিলেক্ট করুন @enderror</label>
                                                                </div>
                                                            </div>
                                                            @error('brand_logo')
                                                            <span class="has-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <div class="form-group d-flex align-items-center">
                                                                <div class="mr-1">
                                                                    <img src="{{ asset('images/union/'. $union->jolchap) }}" width="100">
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input id="jolchap" accept="image/png" name="jolchap" type="file" class="custom-file-input @error('jolchap') is-invalid @enderror">
                                                                    <label for="jolchap" id="jolchapLabel" class="custom-file-label" style="cursor: pointer;">@error('jolchap') {{ $message }} @else জলছাপ সিলেক্ট করুন @enderror</label>
                                                                </div>
                                                            </div>
                                                            @error('jolchap')
                                                            <span class="has-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <p><strong>নোটঃ</strong> ইউনিয়ন মেইন লোগো, ব্র্যান্ড লোগো এবং জলছাপ (PNG)* ফরমেট দিতে হবে। লোগো নির্বাচনের সময় লোগোটি ট্রান্সপারেন্ট হলে ভালো হয়।</p>
                                                    </div>
                                                </li>
                                                <li class="weight-500 col-md-6">
                                                    <div class="form-group bt-flabels__wrapper @error('bn_name') has-danger @enderror">
                                                        <label class="form-control-label">ইউনিয়নের নাম (বাংলায়) <span>*</span></label>
                                                        <input type="text" name="bn_name" value="{{ old('bn_name')? old('bn_name') : $union->bn_name }}" placeholder="ইউনিয়নের পূর্ণ নাম প্রদান করূন" class="form-control form-control-lg @error('bn_name') is-invalid @enderror" autocomplete="bn_name" autofocus data-parsley-trigger="keyup" data-parsley-required>

                                                        <span class="bt-flabels__error-desc">ইউনিয়নের নাম দিন বাংলায়....</span>
                                                        @error('bn_name')
                                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group bt-flabels__wrapper @error('upazila_id') has-danger @enderror">
                                                        <label for="upazila" class="form-control-label">উপজেলা <span>*</span></label>
                                                        <select onchange="getLocation($(this).val(), 'union')" name="upazila_id" id="upazila" class="form-control @error('upazila_id')is-invalid @enderror">
                                                            <option value="">চিহ্নিত করুন</option>
                                                        </select>
                                                        <span class="bt-flabels__error-desc">উপজেলা নির্বাচন করুন....</span>

                                                        @error('upazila_id')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group bt-flabels__wrapper @error('union_id') has-danger @enderror">
                                                        <label for="union" class="form-control-label">ইউনিয়ন <span>*</span></label>
                                                        <select name="union_id" id="union" class="form-control @error('union_id')is-invalid @enderror">
                                                            <option value="">চিহ্নিত করুন</option>
                                                        </select>
                                                        <span class="bt-flabels__error-desc">ইউনিয়ন নির্বাচন করুন....</span>

                                                        @error('union_id')
                                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group bt-flabels__wrapper @error('postoffice_id') has-danger @enderror">
                                                        <label for="postoffice" class="form-control-label">পোস্ট অফিস <span>*</span></label>
                                                        <select name="postoffice_id" id="postoffice" class="form-control @error('postoffice_id') is-invalid @enderror">
                                                            <option value="">চিহ্নিত করুন</option>
                                                        </select>
                                                        <span class="bt-flabels__error-desc">পোস্ট অফিস নির্বাচন করুন....</span>

                                                        @error('postoffice_id')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group bt-flabels__wrapper @error('village') has-danger @enderror">
                                                        <label for="village" class="form-control-label">গ্রাম/মহল্লা (বাংলায়) </label>
                                                        <input type="text" name="village" value="{{ old('village')? old('village') : $union->village }}" placeholder="গ্রাম/মহল্লা নাম দিন" class="form-control form-control-lg @error('village') is-invalid @enderror" autocomplete="village" autofocus data-parsley-trigger="keyup" data-parsley-required>

                                                        <span class="bt-flabels__error-desc">গ্রাম/মহল্লা নাম দিন বাংলায়....</span>
                                                        @error('village')
                                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                        @enderror
                                                    </div>



                                                    <div class="form-group bt-flabels__wrapper @error('mobile') has-danger @enderror">
                                                        <label class="form-control-label">মোবাইল </label>
                                                        <input type="text" name="mobile" value="{{ old('mobile')? old('mobile') : $union->mobile }}" placeholder="মোবাইল নম্বর  প্রদান করূন" class="form-control @error('mobile') is-invalid @enderror" autocomplete="mobile" autofocus data-parsley-maxlength="11" data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-required>

                                                        <span class="bt-flabels__error-desc">১১ ডিজিটের মোবাইল নম্বর দিন....</span>
                                                        @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                        @enderror
                                                    </div>



                                                    <div class="form-group bt-flabels__wrapper @error('email') has-danger @enderror">
                                                        <label class="form-control-label">ইমেল</label>
                                                        <input type="email" name="email" value="{{ old('email')? old('email') : $union->email }}" placeholder="example@gmail.com" class="form-control @error('email') is-invalid @enderror" autocomplete="email" autofocus data-parsley-type="email" data-parsley-trigger="keyup">

                                                        <span class="bt-flabels__error-desc">অনুগ্রহ করে ভ্যালিড ই-মেইল দিন....</span>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="print" class="form-control-label"><i class="icon-copy fa fa-arrow-right" aria-hidden="true"></i> সনদসমুহ প্যাড -এ প্রিন্ট হবে</label>
                                                        <input type="checkbox" value="1" id="print"  name="print" class="switch-btn" data-size="large" data-color="#0059b2" {{ old('print')? 'checked' : (($union->print == 1)? 'checked' : '')}}>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="textarea_editor form-control border-radius-0 @error('about') is-invalid @enderror" name="about" placeholder="ইউনিয়ন পরিষদ সম্পর্কে লিখুন....">{{ old('about')? old('about') : $union->about }}</textarea>

                                            @error('about')
                                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <div class="form-group bt-flabels__wrapper @error('map') has-danger @enderror">
                                                <textarea class="form-control @error('map') is-invalid @enderror" placeholder="গুগল ম্যাপ কী ফ্রেম দিন...." name="map" id="googleMap">{{ old('map') }}</textarea>

                                                <span class="bt-flabels__error-desc">অনুগ্রহ করে ভ্যালিড গুগল ম্যাপ কী ফ্রেম দিন....</span>
                                                @error('map')
                                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <input type="hidden" name="id" value="{{ $union->id }}">
                                            <input type="hidden" id="division-id" value="{{ auth()->user()->division->id }}">
                                            <button type="submit" class="btn btn-primary mt-3 mb-3">সংরক্ষণ করুন</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('vendor/scripts/parsley.js') }}"></script>
    <script src="{{ asset('vendor/scripts/parsley_validate.js') }}"></script>
    <script src="{{ asset('src/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('vendor/scripts/geocode/locations.js') }}"></script>

    <script>
        $(document).ready(function() {
            getLocation($('#division-id').val(), 'district');

            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
            $('.switch-btn').each(function () {
                new Switchery($(this)[0], $(this).data());
            });

            $('#mainLogo').change(function () {
                let data = $(this)[0].files[0].name;
                $('#mainLogoLabel').text(data);
            });

            $('#brandLogo').change(function () {
                let data = $(this)[0].files[0].name;
                $('#brandLogoLabel').text(data);
            });

            $('#jolchap').change(function () {
                let data = $(this)[0].files[0].name;
                $('#jolchapLabel').text(data);
            });
        })
    </script>
@endsection
