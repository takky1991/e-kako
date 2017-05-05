@extends('layouts.homepage')

@section('page')
	@foreach($categories as $category)
	<div class="category">
		<div class="col-xs-12 category-title">
			<a href=" {{route('frontend.category', ['category' => $category])}} ">
				<span>{{$category->name}}</span>
			</a>
			<h5 style="color: #444b51">{{$category->description}}</h5>
		</div>
		@foreach($category->latestThreeActivePosts() as $post)
			@if ($loop->parent->iteration < 4 && $loop->iteration == 2)
			<div class="col-xs-12 col-sm-6 col-md-4 hide-on-mobile">
		  		<div class="grid-item-wrapper">
            		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- e-kako-336x280 -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:336px;height:280px"
					     data-ad-client="ca-pub-2719272532112652"
					     data-ad-slot="2050012611"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
		  		</div>
		  	</div>
		  	<div class="col-xs-12 col-sm-6 col-md-4 hide-on-mobile">
		  		<div class="grid-item-wrapper">
            		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- e-kako-336x280 -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:336px;height:280px"
					     data-ad-client="ca-pub-2719272532112652"
					     data-ad-slot="2050012611"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
		  		</div>
		  	</div>
		  	@else
			<div class="col-xs-12 col-sm-6 col-md-4">
		  		<div class="grid-item-wrapper">
		  			@include('frontend/includes/article_card')
		  		</div>
			</div>
        	@endif
	  	@endforeach
	</div>
  	@endforeach
@endsection