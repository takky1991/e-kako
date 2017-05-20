@extends('layouts.frontend')

@section('container')
	<section class="mbr-section mbr-parallax-background parallax" 
		id="msg-box8-8" style="background-image: url({{asset('images/wallpaper.jpg')}}); padding-top: 120px; padding-bottom: 120px;">
	    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
	    </div>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-8 col-md-offset-2 text-xs-center">
	                <h1 class="mbr-section-title display-2">TRBUHOM ZA KRUHOM</h1>
	                <div class="lead"><p>Saznajte sve informacije kako započeti novi život u Njemačkoj. <br>Pročitajte lična iskustva onih koji su već prošli proces prilagođavanja.</p></div>
	            </div>
	        </div>
	    </div>
	</section>

	<div class="container">
		<div class="row">
			@yield('page')
		</div>
	</div>
@endsection