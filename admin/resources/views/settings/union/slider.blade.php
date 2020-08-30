@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    {{-- form custom style --}}
    <link rel="stylesheet" href="{{ asset('vendor/styles/form_validate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4><i class="icon-copy fa fa-bank" aria-hidden="true"></i> ওয়েবসাইট ম্যানেজমেন্ট</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">ড্যাশবোর্ড</a></li>
                        <li class="breadcrumb-item hover" aria-current="page">সেটিংস</li>
                        <li class="breadcrumb-item" aria-current="page">ওয়েবসাইট ম্যানেজমেন্ট</li>
                        <li class="breadcrumb-item active" aria-current="page">ইউপি স্লাইডার</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if(count($slides) == 0)
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="#" type="button" class="btn btn-info float-right mb-2" data-toggle="modal" data-target="#Add-slide">যোগ করুন <i class="icon-copy fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-12">
                <div id="defaultSlider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#defaultSlider" data-slide-to="0" class="active"></li>
                        <li data-target="#defaultSlider" data-slide-to="1"></li>
                        <li data-target="#defaultSlider" data-slide-to="2"></li>
                        <li data-target="#defaultSlider" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 mCS_img_loaded" src="{{ asset('images/slider/default1.jpg') }}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-blue">{{ Auth::User()->union->bn_name }}</h5>
                                <p class="text-blue">ইউনিয়ন পরিষদ দেশের প্রাচীনতম স্থানীয় সরকার প্রতিষ্ঠান। এটি তৃনমুল পর্যায়ে জনগণের সবচেয়ে কাছের সরকার।</p>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <img class="d-block w-100 mCS_img_loaded" src="{{ asset('images/slider/default2.jpg') }}" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="color-white">{{ Auth::User()->union->bn_name }}</h5>
                                <p>বাংলাদেশ ইউনিয়ন পরিষদের কিছু মজার তথ্যআপনি জানেন কি বাংলাদেশের মোট ইউনিয়নের সংখ্য ৪৫৭১ টি।</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 mCS_img_loaded" src="{{ asset('images/slider/default3.jpg') }}" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="color-white">{{ Auth::User()->union->bn_name }}</h5>
                                <p>ইউনিয়ন পরিষদ দেশের প্রাচীনতম স্থানীয় সরকার প্রতিষ্ঠান। এটি তৃনমুল পর্যায়ে জনগণের সবচেয়ে কাছের সরকার।</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 mCS_img_loaded" src="{{ asset('images/slider/default4.jpg') }}" alt="Fourth slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="color-white">{{ Auth::User()->union->bn_name }}</h5>
                                <p>সরকারের দারিদ্র বিমোচন কর্মসূচির লক্ষ অর্জনেও অবাধ তথ্য প্রবাহ নিশ্চিত করার প্রতি গুরুত্ব প্রদান করা হয়েছে।</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#defaultSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">পূর্ববর্তী</span>
                    </a>
                    <a class="carousel-control-next" href="#defaultSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">পরবর্তী</span>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="#" type="button" class="btn btn-info float-right mb-2" data-toggle="modal" data-target="#Add-slide">যোগ করুন <i class="icon-copy fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-12">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($slides as $key => $item)
                            <li data-target="#slider" data-slide-to="{{ $key }}" class="{{ ($key == 0)? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($slides as $key => $item)
                            <div class="carousel-item {{ ($key == 0)? 'active': '' }}">
                                <img class="d-block w-100 mCS_img_loaded" src="{{ asset('images/slider/'.$item->photo) }}" alt="slide.jpg">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="btn-group">
                                            <a type="button" href="{{ route('union.changeSliderStatus', ['id' => $item->id]) }}" class="btn {{ ($item->status == 1)? 'btn-danger' : 'btn-success' }}"><i class="icon-copy fa {{ ($item->status == 1)? 'fa-circle' : 'fa-circle-o' }}" aria-hidden="true"></i> {{ ($item->status == 1)? 'ডিজেবল' : 'একটিভ' }}</a>
                                            <button value="{{ $item->id }}" type="button" class="btn btn-info edit" data-toggle="modal" data-target="#edit-slide">এডিট <i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
                                            <button value="{{ $item->id }}" type="button" onclick="warning({{ $item->id }})" class="btn btn-warning delete" data-toggle="modal" data-target="#delet-slide">ডিলিট <i class="icon-copy fa fa-trash" aria-hidden="true"></i></button>

                                            <form id="delete-form_{{ $item->id }}" action="{{ route('union.deleteSlide') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                            </form>
                                    </div>
                                    <h5 class="text-blue">{{ $item->title }}</h5>
                                    <p class="text-blue">{{ $item->caption }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">পূর্ববর্তী</span>
                    </a>
                    <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">পরবর্তী</span>
                    </a>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="pd-20 bg-cover border-radius-4 box-shadow drag-zone height-300-p" style="min-height: 500px;">
                    <div class="row">
                        <div class="col-md-12 bg-blue text-center border-radius-4 p-2">
                            <h4 class="text-white">স্লাইড এর অবস্থান দিতে ফটো ড্র্যাগ করুন </h4>
                        </div>
                    </div>
                    <img src="{{ asset('src/images/success.png') }}" id="success" style="display: none;">
                    <ul id="drag-zone row">
                        @foreach($slides as $item)
                            <li id="slide{{ $item->id }}" value="{{ $item->id }}" class="col-md-4 border-radius-4 box-shadow m-2" style="cursor: move; float: left;">
                                <div class="btn-group">
                                        <a type="button" href="{{ route('union.changeSliderStatus', ['id' => $item->id]) }}" class="btn {{ ($item->status == 1)? 'btn-danger' : 'btn-success' }}"><i class="icon-copy fa {{ ($item->status == 1)? 'fa-circle' : 'fa-circle-o' }}" aria-hidden="true"></i> {{ ($item->status == 1)? 'ডিজেবল' : 'একটিভ' }}</a>
                                        <button value="{{ $item->id }}" type="button" class="btn btn-info edit" data-toggle="modal" data-target="#edit-slide">এডিট <i class="icon-copy fa fa-pencil" aria-hidden="true"></i></button>
                                        <button value="{{ $item->id }}" type="button" onclick="warning({{ $item->id }})" class="btn btn-warning delete" data-toggle="modal" data-target="#delet-slide">ডিলিট <i class="icon-copy fa fa-trash" aria-hidden="true"></i></button>

                                        <form id="delete-form_{{ $item->id }}" action="{{ route('union.deleteSlide') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                        </form>
                                </div>
                                <img src="{{ asset('images/slider/'.$item->photo) }}" height="300" width="100%">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="Add-slide" tabindex="-1" role="dialog" aria-labelledby="Add-slide" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">স্লাইডার অ্যাড করুন</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="{{ route('union.addSlide') }}" method="post" enctype="multipart/form-data" class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
                        @csrf
                        @if($errors->all() != null)
                            <input type="hidden" value="1" id="modal-val">
                        @endif
                        <div class="modal-body">
                            <div class="form-group bt-flabels__wrapper @error('title') has-danger @enderror">
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="স্লাইডার টাইটেল দিন...." class="form-control form-control-lg @error('title') form-control-danger @enderror" autocomplete="title" autofocus data-parsley-required>

                                <span class="bt-flabels__error-desc">স্লাইডার টাইটেল দিন....</span>
                                @error('title')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('photo') has-danger @enderror">
                                <div class="custom-file">
                                    <input id="slide" accept="image/*" name="photo" type="file" class="custom-file-input @error('photo') form-control-danger @enderror" data-parsley-required>
                                    <label for="slide" id="slideLabel" class="custom-file-label" style="cursor: pointer;">স্লাইডার ফটো দিন...</label>

                                    <span class="bt-flabels__error-desc">স্লাইডার ফটো দিন....</span>
                                    @error('photo')
                                    <div class="form-control-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('caption') has-danger @enderror">
                                <textarea name="caption" placeholder="স্লাইডার ক্যাপশন দিন...." class="form-control @error('caption') form-control-danger @enderror" autocomplete="caption" autofocus data-parsley-maxlength="255" data-parsley-trigger="keyup">{{ old('caption') }}</textarea>

                                <span class="bt-flabels__error-desc">স্লাইডার ক্যাপশন ২৫৫ অক্ষরের মধ্যে দিন....</span>
                                @error('caption')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
                            <button type="submit" class="btn btn-primary">অ্যাড স্লাইড</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <div class="modal fade" id="edit-slide" tabindex="-1" role="dialog" aria-labelledby="Add-slide" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">স্লাইডার আপডেট করুন</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="{{ route('union.updateSlide') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="" name="id" id="slide-id">
                        <div class="modal-body">
                            <div class="form-group bt-flabels__wrapper @error('title') has-danger @enderror">
                                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="স্লাইডার টাইটেল দিন...." class="form-control form-control-lg @error('title') form-control-danger @enderror" autocomplete="title" autofocus>

                                @error('title')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('photo') has-danger @enderror">
                                <label for="slide2"><img src="" id="photo" alt="slider-image.jpg" width="100%" style="cursor: pointer;">
                                    <div class="custom-file">
                                        <input id="slide2" accept="image/*" name="photo" type="file" class="custom-file-input @error('photo') form-control-danger @enderror" style="cursor: pointer;">
                                        <label for="slide2" id="slideLabel2" class="custom-file-label" style="cursor: pointer;">স্লাইডার ফটো দিন...</label>

                                        @error('photo')
                                        <div class="form-control-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </label>
                            </div>

                            <div class="form-group bt-flabels__wrapper @error('caption') has-danger @enderror">
                                <textarea id="caption" name="caption" placeholder="স্লাইডার ক্যাপশন দিন...." class="form-control @error('caption') form-control-danger @enderror" autocomplete="caption" autofocus data-parsley-maxlength="255" data-parsley-trigger="keyup">{{ old('caption') }}</textarea>

                                <span class="bt-flabels__error-desc">স্লাইডার ক্যাপশন ২৫৫ অক্ষরের মধ্যে দিন....</span>
                                @error('caption')
                                <div class="form-control-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল</button>
                            <button type="submit" class="btn btn-primary">আপডেট স্লাইড</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/scripts/parsley.js') }}"></script>
    <script src="{{ asset('vendor/scripts/parsley_validate.js') }}"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script src="{{ asset('vendor/scripts/slider.js') }}"></script>
    <!-- add sweet alert js & css in footer -->
    <script src="{{ asset('src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
    <script type="text/javascript" defer>
        //This is for SweetAlert
        function warning(id) {
            swal({
                title: 'ডিলিট!',
                text: "আপনি কি ডিলিট করতে চান?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'হ্যাঁ, ডিলিট!',
                cancelButtonText: 'বাতিল'
            }).then(function (result) {
                if (result.value){
                    swal(
                        'মোছা হয়েছে!',
                        'আপনার ফাইলটি মুছে ফেলা হয়েছে।',
                        'success'
                    ).then(function () {
                        $('#delete-form_'+id).submit();
                    });
                }
            })
        }
    </script>
@endsection
