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
                                  <a href="{{ route('home') }}" class="text-dark">{{ @trans('home.header-title') }}</a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block ">
                                    <nav>
                                        <ul id="navigation">
                                            @foreach($categories as $category)
                                                @if(sizeof($category->children) > 0)
                                                    <li><a href="{{ route('category.detail', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                                        <ul class="submenu">
                                                            @foreach($category->children as $submenu)
                                                                <li><a href="{{ route('category.detail', ['id' => $submenu->id]) }}">{{ $submenu->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @elseif($category->parent_id == null)
                                                    <li><a href="{{ route('category.detail', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                                                @endif
                                            @endforeach
                                            <li class="hot"><a href="#">{{ @trans('home.suggest-product') }}</a></li>
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
                                                    <li><a href="{{ route('logout') }}">{{ @trans('auth.logout') }}</a></li>
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
