@extends('layouts.homepage')

@section('title', 'e-kako | ' . $category->name)
@section('description', $category->description)

@section('page')
	<div class="category">
		<div class="col-xs-12 category-title">
			<span>{{$category->name}}</span>
		</div>
		@foreach($posts as $post)
			<div class="col-xs-12 col-sm-6 col-md-4">
		  		<div class="grid-item-wrapper">
		  			@include('frontend/includes/article_card')
		  		</div>
			</div>
			@if($loop->iteration == 1)
			<div class="col-xs-12 col-sm-6 col-md-4">
		  		<div class="grid-item-wrapper">
		  			<div style="width:100%; max-width: 336px; margin-left: auto; margin-right: auto;">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- e-kako-responsive -->
						<ins class="adsbygoogle"
						     style="display:block"
						     data-ad-client="ca-pub-2719272532112652"
						     data-ad-slot="9573279410"
						     data-ad-format="auto"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
		  		</div>
		  	</div>
        	@endif
	  	@endforeach
	</div>
@endsection