    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
               <div class="header-bottom header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="#" class="text-dark">{{ @trans('home.header-title') }}</a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block ">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="hot"><a href="#">Phone</a>
                                                <ul class="submenu">
                                                    <li><a href="#">Iphone</a></li>
                                                    <li><a href="#">Samsung</a></li>
                                                    <li><a href="#">Oppo</a></li>
                                                    <li><a href="#">Xiaomi</a></li>
                                                    <li><a href="#">VSmart</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="b#">Tablet</a>
                                                <ul class="submenu">
                                                    <li class="hot"><a href="#">IPad</a></li>
                                                    <li><a href="#">Samsung</a></li>
                                                    <li><a href="#">Huawei</a></li>
                                                    <li><a href="#">Lenovo</a></li>
                                                    <li><a href="#">Masstel</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="b#">Accessories</a>
                                                <ul class="submenu">
                                                    <li><a href="#">MacBook</a></li>
                                                    <li><a href="#">Asus</a></li>
                                                    <li><a href="#">HP</a></li>
                                                    <li><a href="#">Acer</a></li>
                                                    <li><a href="#">Dell</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="b#">Laptop</a>
                                                <ul class="submenu">
                                                    <li><a href="#">Charger, cable</a></li>
                                                    <li><a href="#">Headphone</a></li>
                                                    <li><a href="#">Music speaker</a></li>
                                                    <li><a href="#">USB</a></li>
                                                    <li><a href="#">Memory Stick</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Clock</a></li>
                                            <li><a href="#">{{ @trans('home.suggest-product') }}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                <div class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <div class="shopping-card">
                                        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 fix-card ">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                @guest 
                                   <li class="d-none d-lg-block"> <a href="{{ route('register') }}" class="btn header-btn">{{ @trans('auth.register') }}</a></li>
                                   <li class="d-none d-lg-block"> <a href="{{ route('login') }}" class="btn header-btn">{{ @trans('auth.login') }}</a></li>
                                @else
                                   <li class="d-none d-lg-block main-menu">
                                       <ul id="navigation">
                                            <li><a href="#">{{ Auth::user()->full_name }}</a>
                                                <ul class="submenu">
                                                    <li><a href="#">{{ @trans('auth.profile') }}</a></li>
                                                    <li><a href="{{ Auth::logout() }}">{{ @trans('auth.logout') }}</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                   </li>
                                @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
