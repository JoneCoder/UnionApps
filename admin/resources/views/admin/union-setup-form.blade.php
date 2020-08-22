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

                <form action="" method="post" enctype="multipart/form-data" class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
                    @csrf
                    <ul class="profile-edit-list row mt-3">
                        <li class="weight-500 col-md-6">
                            <div class="form-group bt-flabels__wrapper @error('name') has-danger @enderror">
                                <label class="form-control-label">ইউনিয়নের নাম (ইংরেজিতে) <span>*</span></label>
                                <input type="text" name="name" value="{{ old('name')}}" placeholder="ইউনিয়নের পূর্ণ নাম প্রদান করূন" class="form-control form-control-lg @error('name') form-control-danger @enderror" autocomplete="name" autofocus data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">ইউনিয়নের নাম দিন ইংরেজিতে....</span>
                                @error('name')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('division_id') has-danger @enderror">
                                <label for="division" class="form-control-label">বিভাগ <span>*</span></label>
                                <select name="division_id" id="division" class="form-control @error('division_id')form-control-danger @enderror" data-parsley-required >
                                    <option value="">চিহ্নিত করুন</option>
                                    <option value="1">Chattagram</option>
                                    <option value="2">Rajshahi</option>
                                    <option value="3">Khulna</option>
                                    <option value="4">Barisal</option>
                                    <option value="5">Sylhet</option>
                                    <option value="6">Dhaka</option>
                                    <option value="7">Rangpur</option>
                                    <option value="8">Mymensingh</option>
                                </select>
                                <span class="bt-flabels__error-desc">বিভাগ নির্বাচন করুন....</span>

                                @error('division_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('district_id') has-danger @enderror">
                                <label for="district_id" class="form-control-label">জেলা <span>*</span></label>
                                <select onchange="getLocation($(this).val(), null, 'upazila_append', 'upazila_id', null, 3 )" name="district_id" id="district_id" class="form-control @error('district_id')form-control-danger @enderror" data-parsley-required >
                                    <option value="" class="district_append">চিহ্নিত করুন</option>
                                    <option value="" selected="selected"></option>
                                </select>
                                <span class="bt-flabels__error-desc">জেলা নির্বাচন করুন....</span>

                                @error('district_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('upazila_id') has-danger @enderror">
                                <label for="upazila_id" class="form-control-label">উপজেলা/থানা <span>*</span></label>
                                <select onchange="getLocation($(this).val(), null, 'postal_append', 'postal_id', null, 6)" name="upazila_id" id="upazila_id" class="form-control @error('upazila_id')form-control-danger @enderror" data-parsley-required >
                                    <option value="" id="upazila_append">চিহ্নিত করুন</option>
                                    <option value="" selected="selected"></option>
                                </select>
                                <span class="bt-flabels__error-desc">উপজেলা/থানা নির্বাচন করুন....</span>

                                @error('upazila_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('postoffice_id') has-danger @enderror">
                                <label for="postoffice_id" class="form-control-label">পোস্ট অফিস <span>*</span></label>
                                <select name="postoffice_id" id="postoffice_id" class="form-control @error('postoffice_id')form-control-danger @enderror"  data-parsley-required>
                                    <option value="" id="postal_append">চিহ্নিত করুন</option>
                                    <option value="" selected="selected"></option>
                                </select>
                                <span class="bt-flabels__error-desc">পোস্ট অফিস নির্বাচন করুন....</span>

                                @error('postoffice_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('union_id') has-danger @enderror">
                                <label for="union_id" class="form-control-label">ইউনিয়ন <span>*</span></label>
                                <select name="union_id" id="union_id" class="form-control @error('union_id')form-control-danger @enderror"  data-parsley-required>
                                    <option value="" id="postal_append">চিহ্নিত করুন</option>
                                    <option value="" selected="selected"></option>
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
                                    <div class="form-group @error('main_logo') has-danger @enderror">
                                        <div class="custom-file">
                                            <input id="mainLogo" accept="image/png" name="main_logo" type="file" class="custom-file-input">
                                            <label for="mainLogo" id="mainLogoLabel" class="custom-file-label" style="cursor: pointer;">মেইন লোগো সিলেক্ট করুন</label>
                                        </div>
                                        @error('main_logo')
                                        <div class="form-control-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group @error('brand_logo') has-danger @enderror">
                                        <div class="custom-file" style="cursor: pointer;">
                                            <input id="brandLogo" accept="image/png" name="brand_logo" type="file" class="custom-file-input">
                                            <label for="brandLogo" id="brandLogoLabel" class="custom-file-label" style="cursor: pointer;">ব্র্যান্ড লোগো সিলেক্ট করুন</label>
                                        </div>
                                        @error('brand_logo')
                                        <div class="form-control-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group @error('jolchap') has-danger @enderror">
                                        <div class="custom-file">
                                            <input id="jolchap" accept="image/png" name="jolchap" type="file" class="custom-file-input">
                                            <label for="jolchap" id="jolchapLabel" class="custom-file-label" style="cursor: pointer;">জলছাপ সিলেক্ট করুন</label>
                                        </div>
                                        @error('jolchap')
                                        <div class="form-control-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="weight-500 col-md-6">
                            <div class="form-group bt-flabels__wrapper @error('bn_name') has-danger @enderror">
                                <label class="form-control-label">ইউনিয়নের নাম (বাংলায়) <span>*</span></label>
                                <input type="text" name="bn_name" value="" placeholder="ইউনিয়নের পূর্ণ নাম প্রদান করূন" class="form-control form-control-lg @error('bn_name') form-control-danger @enderror" autocomplete="bn_name" autofocus data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">ইউনিয়নের নাম দিন বাংলায়....</span>
                                @error('bn_name')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('code') has-danger @enderror">
                                <label for="code" class="form-control-label">ইউনিয়ন কোড <span>*</span></label>
                                <input type="text" name="code" value="" placeholder="ইউনিয়ন কোড প্রদান করূন" class="form-control @error('code') form-control-danger @enderror" autocomplete="code" autofocus data-parsley-maxlength="4" data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">ইউনিয়ন কোড দিন....</span>
                                @error('code')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('subdomain') has-danger @enderror">
                                <label for="subdomain" class="form-control-label">সাব-ডোমেইন <span>*</span></label>
                                <input type="text" name="subdomain" value="" placeholder="সাব-ডোমেইন প্রদান করুন" class="form-control form-control-lg @error('subdomain') form-control-danger @enderror" autocomplete="subdomain" autofocus data-parsley-pattern='^[a-zA-Z. (),:;_]+$' data-parsley-trigger="keyup" data-parsley-required>

                                <span class="bt-flabels__error-desc">সাব-ডোমেইন দিন ইংরেজিতে....</span>
                                @error('subdomain')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('village') has-danger @enderror">
                                <label for="village" class="form-control-label">গ্রাম/মহল্লা (বাংলায়) </label>
                                <input type="text" name="village" value="" placeholder="গ্রাম/মহল্লা নাম দিন" class="form-control form-control-lg @error('village') form-control-danger @enderror" autocomplete="village" autofocus data-parsley-trigger="keyup" >

                                <span class="bt-flabels__error-desc">গ্রাম/মহল্লা নাম দিন বাংলায়....</span>
                                @error('village')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="form-group bt-flabels__wrapper @error('mobile') has-danger @enderror">
                                <label class="form-control-label">মোবাইল </label>
                                <input type="text" name="mobile" value="" placeholder="মোবাইল নম্বর  প্রদান করূন" class="form-control @error('mobile') form-control-danger @enderror" autocomplete="mobile" autofocus data-parsley-maxlength="11" data-parsley-type="number" data-parsley-trigger="keyup">

                                <span class="bt-flabels__error-desc">১১ ডিজিটের মোবাইল নম্বর দিন....</span>
                                @error('mobile')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="form-group bt-flabels__wrapper @error('email') has-danger @enderror">
                                <label class="form-control-label">ইমেল</label>
                                <input type="email" name="email" value="" placeholder="example@gmail.com" class="form-control @error('email') form-control-danger @enderror" autocomplete="email" autofocus data-parsley-type="email" data-parsley-trigger="keyup">

                                <span class="bt-flabels__error-desc">অনুগ্রহ করে ভ্যালিড ই-মেইল দিন....</span>
                                @error('email')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="print" class="form-control-label"><i class="icon-copy fa fa-arrow-right" aria-hidden="true"></i> সনদসমুহ প্যাড -এ প্রিন্ট হবে</label>
                                <input type="checkbox" id="print"  name="print" class="switch-btn" data-size="large" data-color="#0059b2">
                            </div>

                            <div class="form-group">
                                <p><strong>নোটঃ</strong> ইউনিয়ন মেইন লোগো, ব্র্যান্ড লোগো এবং জলছাপ (PNG)* ফরমেট দিতে হবে। লোগো নির্বাচনের সময় লোগোটি ট্রান্সপারেন্ট হলে ভালো হয়।</p>
                            </div>
                        </li>
                    </ul>
                    <div class="col-md-12">
                        <textarea class="textarea_editor form-control border-radius-0" name="about" placeholder="ইউনিয়ন পরিষদ সম্পর্কে লিখুন...."></textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group bt-flabels__wrapper @error('map') has-danger @enderror">
                            <textarea class="form-control @error('map') form-control-danger @enderror" placeholder="গুগল ম্যাপ কী ফ্রেম দিন...." name="map" id="googleMap"></textarea>

                            @error('map')
                            <div class="form-control-feedback">
                                {{ $message }}
                            </div>
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
