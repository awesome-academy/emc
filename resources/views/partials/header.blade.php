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
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4">
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
                                            <li class="hot"><a href="{{ route('suggest.create') }}">{{ @trans('home.suggest-product') }}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                <div class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <div class="shopping-card">
                                        <a href="{{ route('cart.index') }}">
                                            <i class="fas fa-shopping-cart mr-50">
                                                @if (session()->has('cart'))
                                                <b class="ml-1">{{ count(session()->get('cart')->items) }}</b>
                                                @endif
                                            </i>
                                        </a>
                                    </div>
                                    @if (auth()->check() && Auth::user()->role == \App\Models\User::ADMIN)
                                    <div class="shopping-card">
                                        <a href="{{ route('admin.home.index') }}">
                                            <i class="fas fa-chart-bar text-danger"></i>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 fix-card ">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between float-left">
                                @guest
                                   <li class="d-none d-lg-block"> <a href="{{ route('register') }}" class="btn header-btn">{{ @trans('auth.register') }}</a></li>
                                   <li class="d-none d-lg-block"> <a href="{{ route('login') }}" class="btn header-btn">{{ @trans('auth.login') }}</a></li>
                                @else
                                   <li class="d-none d-lg-block main-menu">
                                       <ul id="navigation">
                                            <li><b class="cursor-pointer">{{ Auth::user()->full_name }}</b>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('user.profile', Auth::user()->id) }}">{{ @trans('auth.profile') }}</a></li><hr>
                                                    <li><a href="{{ route('order.history') }}">{{ @trans('home.order-history') }}</a></li><hr>
                                                    @if (auth()->check() && Auth::user()->role == \App\Models\User::ADMIN)
                                                        <li><a href="{{ route('chart.index') }}">{{ @trans('admin.chart') }}</a></li><hr>
                                                    @endif
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
