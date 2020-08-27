<body>
<div class="pre-loader"></div>
<div class="header">
    <div class="header-left col-1">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-middle d-none d-sm-none d-md-block d-lg-block col-8">
        @role('Super Admin')
        <span class="union-icon">
            <img src="{{ asset('images/htcsl-logo.png') }}" class="" alt="">
        </span>
        <span class="union-name">
            Holding Tax Collection Scheme Ltd.
        </span>
        @else
        <span class="union-icon">
            <img src="{{ asset('images/union/'.Auth::User()->union->main_logo) }}" class="" alt="">
        </span>
        <span class="union-name">
            {{ Auth::User()->union->bn_name }}
            <span class="upazila-name">{{ Auth::User()->upazila->bn_name }}, {{ Auth::User()->district->bn_name }}</span>
        </span>
        @endrole
    </div>
    <div class="header-right col-3">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="" alt="">
                                    <h3>John Doe</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="" alt="">
                                    <h3>Lea R. Frith</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="" alt="">
                                    <h3>Erik L. Richards</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="" alt="">
                                    <h3>John Doe</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="" alt="">
                                    <h3>Renee I. Hansen</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="" alt="">
                                    <h3>Vicki M. Coleman</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{ asset('images/user.png') }}" alt="">
						</span>
                    <span class="user-name">{{ auth()->user()->username }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href=""><i class="dw dw-user1"></i> প্রোফাইল</a>
                    <a class="dropdown-item" href=""><i class="dw dw-settings2"></i> সেটিং</a>
                    <a class="dropdown-item" href=""><i class="dw dw-help"></i> হেল্প</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="dw dw-logout"></i> লগ আউট</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
