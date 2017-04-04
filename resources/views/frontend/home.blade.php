@extends('layouts.frontend')

@section('container')
	<div class="col-xs-12 col-md-4">
		@foreach($posts1 as $post)
	  		<div class="grid-item-wrapper">
	  			<a href="#">
		  			<div class="post-img-wrapper">
			  			<img class="post-img" src="http://localhost:8000/storage/uploads/g3ticwxzL1io7dkiowl8Wgy7TpC9wte0fNRDVtGT.jpeg">
		  			</div>
	  			</a>
		  		<div class="grid-item-inner left">
			  		<div>
			  			<div class="post-meta">
			  				12 MONTHS AGO BY AKIRA NG
			  			</div>
			  			<a href="#"><h2 class="title">{{$post->title}}</h2></a>
			  			<p class="intro">{{$post->intro}}</p>
			  			<p class="read-more"><a href="#">Nastavi čitati</a></p>
			  		</div>
		  		</div>
	  		</div>
	  	@endforeach
	</div>
	<div class="col-xs-12 col-md-4">
		@foreach($posts2 as $post)
	  		<div class="grid-item-wrapper">
	  			<a href="#">
		  			<div class="post-img-wrapper">
			  			<img class="post-img" src="http://localhost:8000/storage/uploads/g3ticwxzL1io7dkiowl8Wgy7TpC9wte0fNRDVtGT.jpeg">
		  			</div>
	  			</a>
		  		<div class="grid-item-inner center">
			  		<div>
			  			<div class="post-meta">
			  				12 MONTHS AGO BY AKIRA NG
			  			</div>
			  			<a href="#"><h2 class="title">{{$post->title}}</h2></a>
			  			<p class="intro">{{$post->intro}}</p>
			  			<p class="read-more"><a href="#">Nastavi čitati</a></p>
			  		</div>
		  		</div>
	  		</div>
	  	@endforeach
	</div>
	<div class="col-xs-12 col-md-4">
		@foreach($posts3 as $post)
	  		<div class="grid-item-wrapper">
	  			<a href="#">
		  			<div class="post-img-wrapper">
			  			<img class="post-img" src="http://localhost:8000/storage/uploads/g3ticwxzL1io7dkiowl8Wgy7TpC9wte0fNRDVtGT.jpeg">
		  			</div>
	  			</a>
		  		<div class="grid-item-inner right">
			  		<div>
			  			<div class="post-meta">
			  				12 MONTHS AGO BY AKIRA NG
			  			</div>
			  			<a href="#"><h2 class="title">{{$post->title}}</h2></a>
			  			<p class="intro">{{$post->intro}}</p>
			  			<p class="read-more"><a href="#">Nastavi čitati</a></p>
			  		</div>
		  		</div>
	  		</div>
	  	@endforeach
	</div>
@endsection