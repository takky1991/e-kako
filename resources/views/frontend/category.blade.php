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
			@if($loop->iteration == 1 || $loop->iteration == 3 || $loop->iteration == 5)
			<div class="col-xs-12 col-sm-6 col-md-4">
		  		<div class="grid-item-wrapper">
					<!-- e-kako 336x280 naslovna -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:336px;height:280px"
					     data-ad-client="ca-pub-2719272532112652"
					     data-ad-slot="7247314616"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
		  		</div>
		  	</div>
        	@endif
	  	@endforeach
	</div>
@endsection