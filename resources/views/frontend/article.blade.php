@extends('layouts.frontend')

@section('title', 'e-kako | ' . $post->title)
@section('description', $post->intro)
@section('facebook_img', URL::to('/') . Storage::disk('local')->url($post->featuredImage->uri))

@section('container')
<div class="container article">
	<section>
		<div style="width:100%; max-width: 728px; margin-left: auto; margin-right: auto; margin-top: 30px">
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
	</section>
	<div class="row">
		<div class="col-xs-12">
			<h1 style="font-weight: bold"> {{$post->title}} </h1>
			<hr>
		</div>
		<div class="col-xs-12 col-md-8">
			<article style="overflow: hidden;">
			<div class="row">
				<div class="col-xs-12">
					<strong>{{$post->intro}}</strong>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-12">
					{!!$post->content!!} 
				</div>
			</div>
			</article>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- e-kako 336x280 bottom -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:336px;height:280px"
			     data-ad-client="ca-pub-2719272532112652"
			     data-ad-slot="8863648616"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			<br>
			<br>
			@include('frontend/includes/comments', ['comments' => $comments])
			@include('frontend/includes/comment_form')
		</div>
		<div class="col-xs-12 col-md-4">
			<div class="fb-page" data-href="https://www.facebook.com/E-kako-1309113109157543/" data-width="300" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/E-kako-1309113109157543/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/E-kako-1309113109157543/">E-kako</a></blockquote></div>
			<ul class="media-list mod unstyled " data-module="rcp_right_rail" style="width: 300px;margin-left: auto;margin-right: auto;">
				<h2 class="head mg-2 title">Najnovije</h2>
				@foreach($category->latestSixActivePosts() as $suggestedPost)
					@if($suggestedPost->id != $post->id)
					<li class="media headline6">
						<a href="{{route('frontend.post', ['category' => $suggestedPost->category->slug, 'post' => $suggestedPost->slug])}}" class="fl gtm_youMayLike">
							<img src="{{$suggestedPost->featuredImageUrl()}}" alt="" class="media-object">
						</a>
						<div class="media-body">
							<a href="{{route('frontend.post', ['category' => $suggestedPost->category->slug, 'post' => $suggestedPost->slug])}}" class="gtm_youMayLike">{{$suggestedPost->title}}</a>
						</div>
					</li>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection