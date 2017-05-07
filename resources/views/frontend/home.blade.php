@extends('layouts.homepage')

@section('title', 'e-kako')
@section('description', '')

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