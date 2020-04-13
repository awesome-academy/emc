    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="{{ route('homepage') }}" class="text-dark">Home</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block ">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="hot"><a href="#">Phone</a>
                                                <ul class="submenu">
                                                    <li><a href="#">Iphone</a></li>
                                                    <li><a href="#">Samsung</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="b#">Laptop</a>
                                                <ul class="submenu">
                                                    <li><a href="#">Acer</a></li>
                                                    <li><a href="#">Dell</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Suggest Product</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card ">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li>
                                        <div class="shopping-card">
                                            <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </li>
                                @guest 
                                   <li class="d-none d-lg-block"> <a href="{{ route('register') }}" class="btn header-btn">Register</a></li>
                                   <li class="d-none d-lg-block"> <a href="{{ route('login') }}" class="btn header-btn">Sign in</a></li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a href="#" id="navbarDropdown" class="btn header-btn nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->full_name }}</a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a id="logout" class="dropdown-item" href="{{ Auth::logout() }}">
                                               log out
                                            </a>
                                        </div>
                                    </li>
                                @endguest
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
