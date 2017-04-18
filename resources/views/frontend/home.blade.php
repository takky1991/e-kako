@extends('layouts.homepage')

@section('page')
	@foreach($categories as $category)
	<div class="category">
		<div class="col-xs-12 category-title">
			<a href=" {{route('frontend.category', ['category' => $category])}} ">
				<span>{{$category->name}}</span>
			</a>
		</div>
		@foreach($category->latestSixActivePosts() as $post)
			<div class="col-xs-12 col-sm-6 col-md-4">
		  		<div class="grid-item-wrapper">
		  			@include('frontend/includes/article_card')
		  		</div>
			</div>
			@if ($loop->parent->iteration < 4 && $loop->iteration == 1)
			<div class="col-xs-12 col-sm-6 col-md-4">
		  		<div class="grid-item-wrapper">
            		<div style="width: 336px; height: 280px; background-color: gray;">
						Reklama
					</div>
		  		</div>
		  	</div>
        	@endif
	  	@endforeach
	</div>
  	@endforeach
@endsection