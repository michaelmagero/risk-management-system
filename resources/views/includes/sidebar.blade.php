<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <h5 class="ml-5">RETEX</h5>
                </div>
                <div class="kt-aside__brand-tools">
                    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                        <i class="fa fa-2x fa-angle-double-right text-info"></i>
                    </button>

                    <!--
    <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
    -->
                </div>
            </div>

            <!-- end:: Aside -->
            @if(Auth::user()->hasRole('dev'))
            <!-- begin:: Aside Menu -->
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                        <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ url('/admin-dash') }}" class="kt-menu__link "><span class="kt-menu__link-icon">
                            <i class="fa fa-compass"></i>
                            </span><span class="kt-menu__link-text">Dashboard</span></a></li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Navigation</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>



                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                    <i class="fa fa-users"></i>
                                    </span><span class="kt-menu__link-text">Users</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('all-users-dev') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">All Users</span></a>
                                        </li>
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('new-user-dev') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">New User</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                            <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                            <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                    </span><span class="kt-menu__link-text">Itemcodes</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/all-itemcodes-dev') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">All Itemcodes</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/new-itemcode-dev') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Create Itemcodes</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/verify-dev') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Verify Itemcodes</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/checkout-dev') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Cashier Checkout</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/return-dev') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Return Item</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Settings</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu">

                                <a href="{{ url('/logout') }}" class="kt-menu__link kt-menu__toggle" class="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                    <span class="kt-menu__link-icon">
                                        <i class="flaticon-logout"></i>
                                    </span>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <span class="kt-menu__link-text">Sign Out</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
            @elseif(Auth::user()->hasRole('admin'))
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                        <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ url('/admin-dash') }}" class="kt-menu__link "><span class="kt-menu__link-icon">
                            <i class="fa fa-compass"></i>
                            </span><span class="kt-menu__link-text">Dashboard</span></a></li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Navigation</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>



                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                    <i class="fa fa-users"></i>
                                    </span><span class="kt-menu__link-text">Users</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('all-users') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">All Users</span></a>
                                        </li>
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('new-user') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">New User</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                            <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                            <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                    </span><span class="kt-menu__link-text">Itemcodes</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/all-itemcodes') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">All Itemcodes</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/verify-admin') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Verify Itemcodes</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/checkout-admin') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Cashier Checkout</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/return-admin') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Return Item</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Settings</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu">

                                <a href="{{ url('/logout') }}" class="kt-menu__link kt-menu__toggle" class="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                    <span class="kt-menu__link-icon">
                                        <i class="flaticon-logout"></i>
                                    </span>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <span class="kt-menu__link-text">Sign Out</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
            @elseif(Auth::user()->hasRole('retex-admin'))
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                        <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ url('/admin-dash') }}" class="kt-menu__link "><span class="kt-menu__link-icon">
                            <i class="fa fa-compass"></i>
                            </span><span class="kt-menu__link-text">Dashboard</span></a></li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Navigation</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                            <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                            <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                    </span><span class="kt-menu__link-text">Itemcodes</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/all-itemcodes') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">All Itemcodes</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/new-itemcode') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Create Itemcodes</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/verify-admin') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Verify Itemcodes</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Settings</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu">

                                <a href="{{ url('/logout') }}" class="kt-menu__link kt-menu__toggle" class="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                    <span class="kt-menu__link-icon">
                                        <i class="flaticon-logout"></i>
                                    </span>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <span class="kt-menu__link-text">Sign Out</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
            @elseif(Auth::user()->hasRole('agent'))
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                        <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ url('/admin-dash') }}" class="kt-menu__link "><span class="kt-menu__link-icon">
                            <i class="fa fa-compass"></i>
                            </span><span class="kt-menu__link-text">Dashboard</span></a></li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Navigation</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>


                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                            <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                            <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                    </span><span class="kt-menu__link-text">Itemcodes</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/all-itemcodes-agent') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">All Itemcodes</span></a>
                                        </li>

                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/verify-agent') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Verify Itemcodes</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </li>


                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Settings</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu">

                                <a href="{{ url('/logout') }}" class="kt-menu__link kt-menu__toggle" class="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                    <span class="kt-menu__link-icon">
                                        <i class="flaticon-logout"></i>
                                    </span>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <span class="kt-menu__link-text">Sign Out</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>

            @elseif(Auth::user()->hasRole('cashier'))
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                        <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ url('/admin-dash') }}" class="kt-menu__link "><span class="kt-menu__link-icon">
                            <i class="fa fa-compass"></i>
                            </span><span class="kt-menu__link-text">Dashboard</span></a></li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Navigation</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>


                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                            <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                            <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                    </span><span class="kt-menu__link-text">Itemcodes</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">


                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('/admin-dash') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Verify Itemcodes</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </li>


                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Settings</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu">

                                <a href="{{ url('/logout') }}" class="kt-menu__link kt-menu__toggle" class="" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                    <span class="kt-menu__link-icon">
                                        <i class="flaticon-logout"></i>
                                    </span>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    <span class="kt-menu__link-text">Sign Out</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
            @else
            @endif
            <!-- end:: Aside Menu -->
        </div>

        <!-- end:: Aside -->
