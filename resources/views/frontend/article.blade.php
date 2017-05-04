@extends('layouts.frontend')

@section('container')
<div class="container article">
	<section>
		<div style="width: 728px; height: 90px; background-color: gray; margin: 30px auto">
			Reklama
		</div>
	</section>
	<div class="row">
		<div class="col-xs-12">
			<h1 style="font-weight: bold"> {{$post->title}} </h1>
			<hr>
		</div>
		<div class="col-xs-12 col-md-8">
			<article style="overflow: hidden;"> {!!$post->content!!} </article>
		</div>
		<div class="col-xs-12 col-md-4">
			<div style="width: 300px; height: 250px; background-color: gray; margin: 30px auto">
			Reklama
			</div>
			<ul class="media-list mod unstyled " data-module="rcp_right_rail" style="width: 300px;margin-left: auto;margin-right: auto;">
				<h2 class="head mg-2 title">Najnovije</h2>
				@foreach($category->latestSixActivePosts() as $suggestedPost)
					@if($suggestedPost->id != $post->id)
					<li class="media headline6">
						<a href="{{route('frontend.post', ['category' => $suggestedPost->category->slug, 'post' => $suggestedPost->slug])}}" class="fl gtm_youMayLike">
							<img src="//img-aws.ehowcdn.com/150X100/cme/photography.prod.demandstudios.com/0794544f-832b-4d7a-a996-d455ae8fd9c6.jpg" alt="" class="media-object">
						</a>
						<div class="media-body">
							<a href="{{route('frontend.post', ['category' => $suggestedPost->category->slug, 'post' => $suggestedPost->slug])}}" class="gtm_youMayLike">{{$suggestedPost->title}}</a>
						</div>
					</li>
					@endif
				@endforeach
			</ul>
			<div style="width: 300px; height: 250px; background-color: gray; margin: 30px auto">
			Reklama
			</div>
		</div>
	</div>
</div>
@endsection