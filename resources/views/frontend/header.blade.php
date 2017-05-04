<nav id="header" class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('homepage')}}">
        <img src="{{asset('images/e-kako-logo-trans.png')}}" alt="e-kako">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @isset($categories)
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategorije <span class="caret"></span></a>
            <ul class="dropdown-menu">
              @foreach($categories as $category)
              <li><a href="{{route('frontend.category', ['category' => $category])}}">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </li>
        @endisset
        @if(Auth::check())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->first_name}} {{Auth::user()->first_last}}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if(Auth::user()->admin)
              <li><a href="{{route('backend.home')}}">Administracija</a></li>
            @endif
            <li>
              <a href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Odjava
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
        @else
          <li>
            <a href="{{route('register')}}">Registruj se</a>
          </li>
          <li>
            <a href="{{route('login')}}">Prijava</a>
          </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>