@extends('layouts.app')

@section('content')
    @push('scripts_top')
    <script src="{{ mix('build/js/resources.js') }}"></script>
    @endpush
    @push('styles')
    <link href="{{ mix('build/css/resources.css') }}" rel="stylesheet">
    <link href="{{ mix('build/css/backend.css') }}" rel="stylesheet">
    @endpush
    <div id="wrapper">
        <nav class="navbar navbar-inverse mobile-menu">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('backend.home')}}" style="color: #8eaebd;">
                    <img src="{{asset('images/e-kako-logo-trans.png')}}" alt="e-kako" style="width: 100px;margin-top: -10px;">
                </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->first_name}} {{Auth::user()->last_name}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li {{Request::is('backend/home') ? 'class=active': '' }}>
                        <a href="{{route('backend.home')}}">
                            Kontr. ploča
                        </a>
                    </li>
                    <li {{Request::is('backend/posts') || Request::is('backend/posts/*') ? 'class=active': '' }}>
                        <a href="{{route('posts.index')}}">
                            Postovi
                        </a>
                    </li>
                    <li {{Request::is('backend/categories') || Request::is('backend/categories/*') ? 'class=active': '' }}>
                        <a href="{{route('categories.index')}}">
                            Kategorije
                        </a>
                    </li>
                    <li {{Request::is('backend/pictures') || Request::is('backend/pictures/*') ? 'class=active': '' }}>
                        <a href="{{route('pictures.index')}}">
                            Slike
                        </a>
                    </li>
                </ul>
    
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{route('backend.home')}}" style="color: #8eaebd;">
                        <img src="{{asset('images/e-kako-logo-trans.png')}}" alt="e-kako" style="width: 200px;height: 80px;margin-top: 15px;">
                    </a>
                </li>
                <li class="sidebar-user">
                    <a href="#user" data-toggle="collapse" class="collapsed">
                        {{Auth::user()->first_name}} {{Auth::user()->last_name}}<i class="fa fa-angle-up" aria-hidden="true"></i>
                    </a>
                    <div id="user" class="collapse">
                        <a href="{{ url('/logout') }}"
						    onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
                            Logout
                        </a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
                    </div>
                </li>
                <li {{Request::is('backend/home') ? 'class=active': '' }}>
                    <a href="{{route('backend.home')}}">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <p>Kontr. ploča</p>
                    </a>
                </li>
                <li {{Request::is('backend/posts') || Request::is('backend/posts/*') ? 'class=active': '' }}>
                    <a href="{{route('posts.index')}}">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <p>Postovi</p>
                    </a>
                </li>
                <li {{Request::is('backend/categories') || Request::is('backend/categories/*') ? 'class=active': '' }}>
                    <a href="{{route('categories.index')}}">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <p>Kategorije</p>
                    </a>
                </li>
                <li {{Request::is('backend/pictures') || Request::is('backend/pictures/*') ? 'class=active': '' }}>
                    <a href="{{route('pictures.index')}}">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <p>Slike</p>
                    </a>
                </li>
            </ul>
            <i id="menu-toggle" class="fa fa-caret-left menu-toggle" aria-hidden="true"></i>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="javascript:void(0)" style="color: #8eaebd;">
                    @if(Request::is('backend/home'))
                        Kontrolna ploča
                    @elseif(Request::is('backend/categories') || Request::is('backend/categories/*'))
                        Kategorije
                    @elseif(Request::is('backend/pictures') || Request::is('backend/pictures/*'))
                        Slike
                    @elseif(Request::is('backend/posts') || Request::is('backend/posts/*'))
                        Postovi
                    @endif
                    </a>
                </div>
            </nav>
            @yield('container')
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    @push('scripts_bottom')
    <script src="{{ mix('build/js/backend.js') }}"></script>
    @endpush
@endsection