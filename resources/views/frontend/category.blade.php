@extends('layouts.homepage')

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
            		<div style="width: 336px; height: 280px; background-color: gray;">
						Reklama
					</div>
		  		</div>
		  	</div>
        	@endif
	  	@endforeach
	</div>
@endsection