<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin panel</title>

        <link href="{{asset('vendor/sb-admin/css/styles.css')}}" rel="stylesheet" />
        @yield('css')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route('home')}}">Admin panel</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            <!-- Navbar-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="{{ route('front.home') }}">{{ __('Open website') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ml-md-0">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user fa-fw"></i>{{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{route('home')}}"
                                ><div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                {{__('Dashboard')}}
                            </a>
                            <a class="nav-link" href="{{route('user.index')}}"
                            ><div class="sb-nav-link-icon">
                                <i class="fas fa-users"></i>
                                {{__('Users')}}
                            </div>
                        </a>
                            <a class="nav-link" href="{{route('store.index')}}"
                            ><div class="sb-nav-link-icon">
                                <i class="fas fa-store"></i>
                                {{__('Stores')}}
                            </div>
                        </a>
                            <a class="nav-link" href="{{route('category.index')}}"
                            ><div class="sb-nav-link-icon">
                                <i class="fas fa-list-alt"></i>
                                {{__('Categories')}}
                            </div>
                        </a>
                            <a class="nav-link" href="{{route('article.index')}}"
                                ><div class="sb-nav-link-icon">
                                    <i class="fas fa-list-alt"></i>
                                    {{__('Articles')}}
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        @auth {{\Auth::user()->name}} @endauth
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
             <main>
                 <div class="container-fluid">
                    @yield('content')
                 </div>

             </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; LOGIDEVS 2020</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('vendor/sb-admin/js/scripts.js')}}"></script>
        @yield('script')
    </body>
</html>
