@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/form_validate.css') }}">
    <link rel="stylesheet" href="{{ mix('css/switchery.css') }}">
@endsection

@section('breadcrumb')
    <h4><i class="icon-copy fa fa-cogs" aria-hidden="true"></i> ইউনিয়ন সেটআপ</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
            <div class="pd-20 bg-white border-radius-4 box-shadow height-100-p">

                <div class="row">
                    <div class="col-md-12 text-center bg-info border-radius-4 p-2">
                        <h4 class="text-white">ইউনিয়ন তথ্য</h4>
                    </div>
                </div>

                <form action="{{ route('admin.addUnion') }}" method="post" enctype="multipart/form-data" class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
                    @csrf
                    <ul class="profile-edit-list row mt-3">
                        <li class="weight-500 col-md-6">
                            <div class="form-group bt-flabels__wrapper @error('name') has-danger @enderror">
                                <label class="form-control-label">ইউনিয়নের নাম (ইংরেজিতে) <span>*</span></label>
                                <input type="text" name="name" value="{{ old('name')}}" placeholder="ইউনিয়নের পূর্ণ নাম প্রদান করূন" class="form-control form-control-lg @error('name') is-invalid @enderror" autocomplete="name" autofocus data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">ইউনিয়নের নাম দিন ইংরেজিতে....</span>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('division_id') has-danger @enderror">
                                <label for="division" class="form-control-label">বিভাগ <span>*</span></label>
                                <select name="division_id" onchange="getLocation($(this).val(), 'district')" id="division" class="form-control @error('division_id')is-invalid @enderror" data-parsley-required >
                                    <option value=""class="divisions">চিহ্নিত করুন</option>
                                </select>
                                <span class="bt-flabels__error-desc">বিভাগ নির্বাচন করুন....</span>

                                @error('division_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('district_id') has-danger @enderror">
                                <label for="district" class="form-control-label">জেলা <span>*</span></label>
                                <select onchange="getLocation($(this).val(), 'upazila')" name="district_id" id="district" class="form-control @error('district_id')is-invalid @enderror" data-parsley-required >
                                    <option value="">চিহ্নিত করুন</option>
                                </select>
                                <span class="bt-flabels__error-desc">জেলা নির্বাচন করুন....</span>

                                @error('district_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('upazila_id') has-danger @enderror">
                                <label for="upazila" class="form-control-label">উপজেলা <span>*</span></label>
                                <select onchange="getLocation($(this).val(), 'union')" name="upazila_id" id="upazila" class="form-control @error('upazila_id')is-invalid @enderror" data-parsley-required >
                                    <option value="">চিহ্নিত করুন</option>
                                </select>
                                <span class="bt-flabels__error-desc">উপজেলা নির্বাচন করুন....</span>

                                @error('upazila_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('policestation_id') has-danger @enderror">
                                <label for="policestation" class="form-control-label">থানা <span>*</span></label>
                                <select onchange="getLocation($(this).val(), 'postoffice')" name="policestation_id" id="policestation" class="form-control @error('policestation_id')is-invalid @enderror" data-parsley-required >
                                    <option value="">চিহ্নিত করুন</option>
                                </select>
                                <span class="bt-flabels__error-desc">থানা নির্বাচন করুন....</span>

                                @error('policestation_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('postoffice_id') has-danger @enderror">
                                <label for="postoffice" class="form-control-label">পোস্ট অফিস <span>*</span></label>
                                <select name="postoffice_id" id="postoffice" class="form-control @error('postoffice_id') is-invalid @enderror"  data-parsley-required>
                                    <option value="">চিহ্নিত করুন</option>
                                </select>
                                <span class="bt-flabels__error-desc">পোস্ট অফিস নির্বাচন করুন....</span>

                                @error('postoffice_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('union_id') has-danger @enderror">
                                <label for="union" class="form-control-label">ইউনিয়ন <span>*</span></label>
                                <select name="union_id" id="union" class="form-control @error('union_id')is-invalid @enderror"  data-parsley-required>
                                    <option value="">চিহ্নিত করুন</option>
                                </select>
                                <span class="bt-flabels__error-desc">ইউনিয়ন নির্বাচন করুন....</span>

                                @error('union_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input id="mainLogo" accept="image/png" name="main_logo" type="file" class="custom-file-input @error('main_logo') is-invalid @enderror">
                                            <label for="mainLogo" id="mainLogoLabel" class="custom-file-label" style="cursor: pointer;">@error('main_logo') {{ $message }} @else মেইন লোগো সিলেক্ট করুন @enderror</label>
                                        </div>
                                        @error('main_logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file" style="cursor: pointer;">
                                            <input id="brandLogo" accept="image/png" name="brand_logo" type="file" class="custom-file-input @error('brand_logo') is-invalid @enderror">
                                            <label for="brandLogo" id="brandLogoLabel" class="custom-file-label" style="cursor: pointer;">@error('brand_logo') {{ $message }} @else ব্র্যান্ড লোগো সিলেক্ট করুন @enderror</label>
                                        </div>
                                        @error('brand_logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input id="jolchap" accept="image/png" name="jolchap" type="file" class="custom-file-input @error('jolchap') is-invalid @enderror">
                                            <label for="jolchap" id="jolchapLabel" class="custom-file-label" style="cursor: pointer;">@error('jolchap') {{ $message }} @else জলছাপ সিলেক্ট করুন @enderror</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="weight-500 col-md-6">
                            <div class="form-group bt-flabels__wrapper @error('bn_name') has-danger @enderror">
                                <label class="form-control-label">ইউনিয়নের নাম (বাংলায়) <span>*</span></label>
                                <input type="text" name="bn_name" value="{{ old('bn_name')}}" placeholder="ইউনিয়নের পূর্ণ নাম প্রদান করূন" class="form-control form-control-lg @error('bn_name') is-invalid @enderror" autocomplete="bn_name" autofocus data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">ইউনিয়নের নাম দিন বাংলায়....</span>
                                @error('bn_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('code') has-danger @enderror">
                                <label for="code" class="form-control-label">ইউনিয়ন কোড <span>*</span></label>
                                <input type="text" name="code" value="{{ old('code')}}" placeholder="ইউনিয়ন কোড প্রদান করূন" class="form-control @error('code') is-invalid @enderror" autocomplete="code" autofocus data-parsley-maxlength="4" data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">ইউনিয়ন কোড দিন....</span>
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('subdomain') has-danger @enderror">
                                <label for="subdomain" class="form-control-label">সাব-ডোমেইন <span>*</span></label>
                                <input type="text" name="subdomain" value="{{ old('subdomain')}}" placeholder="সাব-ডোমেইন প্রদান করুন" class="form-control form-control-lg @error('subdomain') is-invalid @enderror" autocomplete="subdomain" autofocus data-parsley-pattern='^[a-zA-Z. (),:;_]+$' data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">সাব-ডোমেইন দিন ইংরেজিতে....</span>
                                @error('subdomain')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('village') has-danger @enderror">
                                <label for="village" class="form-control-label">গ্রাম/মহল্লা (বাংলায়) </label>
                                <input type="text" name="village" value="{{ old('village')}}" placeholder="গ্রাম/মহল্লা নাম দিন" class="form-control form-control-lg @error('village') is-invalid @enderror" autocomplete="village" autofocus data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">গ্রাম/মহল্লা নাম দিন বাংলায়....</span>
                                @error('village')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="form-group bt-flabels__wrapper @error('mobile') has-danger @enderror">
                                <label class="form-control-label">মোবাইল </label>
                                <input type="text" name="mobile" value="{{ old('mobile')}}" placeholder="মোবাইল নম্বর  প্রদান করূন" class="form-control @error('mobile') is-invalid @enderror" autocomplete="mobile" autofocus data-parsley-maxlength="11" data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">১১ ডিজিটের মোবাইল নম্বর দিন....</span>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="form-group bt-flabels__wrapper @error('email') has-danger @enderror">
                                <label class="form-control-label">ইমেল</label>
                                <input type="email" name="email" value="{{ old('email')}}" placeholder="example@gmail.com" class="form-control @error('email') is-invalid @enderror" autocomplete="email" autofocus data-parsley-type="email" data-parsley-trigger="keyup">

                                <span class="bt-flabels__error-desc">অনুগ্রহ করে ভ্যালিড ই-মেইল দিন....</span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="print" class="form-control-label"><i class="icon-copy fa fa-arrow-right" aria-hidden="true"></i> সনদসমুহ প্যাড -এ প্রিন্ট হবে</label>
                                <input type="checkbox" value="1" id="print"  name="print" class="switch-btn" data-size="large" data-color="#0059b2" {{ old('print')? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <p><strong>নোটঃ</strong> ইউনিয়ন মেইন লোগো, ব্র্যান্ড লোগো এবং জলছাপ (PNG)* ফরমেট দিতে হবে। লোগো নির্বাচনের সময় লোগোটি ট্রান্সপারেন্ট হলে ভালো হয়।</p>
                            </div>
                        </li>
                    </ul>
                    <div class="col-md-12">
                        <textarea class="textarea_editor form-control border-radius-0 @error('about') is-invalid @enderror" name="about" placeholder="ইউনিয়ন পরিষদ সম্পর্কে লিখুন....">{{ old('about')}}</textarea>

                        @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group bt-flabels__wrapper @error('map') has-danger @enderror">
                            <textarea class="form-control @error('map') is-invalid @enderror" placeholder="গুগল ম্যাপ কী ফ্রেম দিন...." name="map" id="googleMap" data-parsley-required>{{ old('map')}}</textarea>

                            <span class="bt-flabels__error-desc">অনুগ্রহ করে ভ্যালিড গুগল ম্যাপ কী ফ্রেম দিন....</span>
                            @error('map')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 border border-radius-4 p-0" id="showMap"></div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary mt-3 mb-3">দাখিল করুন</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/parsley.js') }}"></script>
    <script src="{{ asset('js/parsley_validate.js') }}"></script>
    <script src="{{ mix('js/switchery.js') }}"></script>
    <script src="{{ asset('js/geocode/locations.js') }}"></script>

    <script>
        $(document).ready(function() {
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
