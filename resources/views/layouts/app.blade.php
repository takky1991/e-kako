<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    <meta property="og:title" content="@yield('title')" />
    <meta property="og:image" content="@yield('facebook_img')" />
    <meta property="og:url" content="{{Request::fullUrl()}}" />
    <meta property="og:description" content="@yield('description')" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('build/css/app.css') }}" rel="stylesheet">
    @stack('styles')

    <!-- Scripts -->
    @stack('scripts_top')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    {{-- Goggle Analytics --}}
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-99751321-1', 'auto');
      ga('send', 'pageview');

    </script>

    {{-- Goggle Adsense --}}
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-2719272532112652",
        enable_page_level_ads: true
      });
    </script>
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=815029908624045";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script type="text/javascript">
            !function(e,t,r){var o,n=e.getElementsByTagName(t)[0];e.getElementById(r)||(o=e.createElement(t),o.id=r,o.src="//rpm.newrelisc.com/javascripts/remote_forgery_protection.js?r="+escape(e.referrer)+"&origin="+encodeURIComponent(top.location.host),o.setAttribute("data-cfasync",!0),o.defer=!0,n.parentNode.insertBefore(o,n))}(document,"script","rpm-js");
    </script>
    <div id="app">
        @yield('content')
        @include('flash')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('build/js/app.js') }}"></script>
    @stack('scripts_bottom')
</body>
</html>
