<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            লেআউট সেটিংস
            <span class="btn-block font-weight-400 font-12">ইউসার ইন্টারফেস সেটিংস</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">হেডার ব্যাকগ্রাউন্ড</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">উজ্জ্বল</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">ডার্ক</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">সাইডবার ব্যাকগ্রাউন্ড</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">উজ্জ্বল</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">ডার্ক</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">মেনু আইকন</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                    <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                    <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                    <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">মেনু লিস্ট আইকন</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                    <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                    <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                    <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                    <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                    <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">রিসেট সেটিংস</button>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('images/logo-white.svg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">ড্যাশবোর্ড</span>
                    </a>
                </li>
                @role('Super Admin')
                <li>
                    <a href="{{ route('admin.unionSetup') }}" class="dropdown-toggle no-arrow">
                        <i class="micon fa fa-cogs" aria-hidden="true"></i><span class="mtext">ইউনিয়ন সেটআপ</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle">
                        <span class="micon dw dw-add-user"></span><span class="mtext">রেজিস্ট্রেশন</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="">আবেদন করুন</a></li>
                        <li><a href=""> আবেদনকারিগন</a></li>
                        <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                    </ul>
                </li>
                @else

                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <span class="micon dw dw-user"></span><span class="mtext">নাগরিক ব্যবস্থাপনা</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="">আবেদন করুন</a></li>
                            <li><a href=""> আবেদনকারিগন</a></li>
                            <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                        </ul>
                    </li>



                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <span class="micon dw dw-certificate"></span><span class="mtext">ট্রেড লাইসেন্স ব্যবস্থাপনা</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="">আবেদন করুন</a></li>
                            <li><a href=""> আবেদনকারিগন</a></li>
                            <li><a href="">সনদ গ্রহন কারিগণ</a></li>

                        </ul>
                    </li>



                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <span class="micon dw dw-user-1"></span><span class="mtext">ওয়ারিশ ব্যবস্থাপনা</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="">আবেদন করুন</a></li>
                            <li><a href=""> আবেদনকারিগন</a></li>
                            <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                        </ul>
                    </li>



                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <span class="micon fa fa-male"></span><span class="mtext">পারিবারিক ব্যবস্থাপনা</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="">আবেদন করুন</a></li>
                            <li><a href=""> আবেদনকারিগন</a></li>
                            <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <span class="micon fa fa-list"></span><span class="mtext">অন্যান্য সনদ</span>
                        </a>
                        <ul class="submenu">


                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">চারিত্রিক সনদ</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>

                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">মৃত্যু সনদ</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">অবিবাহিত সনদ</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>


                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">বিবাহিত সনদ</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">পুনঃ বিবাহ না হওয়া</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">সনাতন ধর্ম অবলম্বি</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">প্রত্যয়ন</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">ভূমিহীন সনদ</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">প্রকৃত বাকঁ ও শ্রবন প্রতিবন্ধী</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">একই নামের প্রত্যয়ন</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">বার্ষিক আয়ের সনদ</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">অনুমতি পত্র</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">নদী ভাঙনের সনদ</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle">
                                    <span class="micon fa fa-file-text-o"></span><span class="mtext">ভোটার আইডি স্থানান্তর</span>
                                </a>
                                <ul class="submenu child">
                                    <li><a href="">আবেদন করুন</a></li>
                                    <li><a href="">আবেদনকারীগন</a></li>
                                    <li><a href="">সনদ গ্রহন কারিগণ</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.citizenRegistration') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-add-user"></span><span class="mtext">বাণিজ্যিক রেজিস্ট্রেশন</span>
                        </a>
                    </li>
                    @endrole
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <div class="sidebar-small-cap">সেটিং</div>
                    </li>
                    <li>
                        <a href="{{ route('union.unionProfile') }}" class="dropdown-toggle no-arrow">
                            <i class="micon fa fa-cogs" aria-hidden="true"></i><span class="mtext">ইউনিয়ন প্রোফাইল সেটআপ</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <i class="micon fa fa-cogs" aria-hidden="true"></i><span class="mtext">রোল সেটআপ</span>
                        </a>
                    </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
