@extends('layouts.frontend')

@section('container')
<div class="container article">
	<section>
		<div style="width: 728px; margin-left: auto; margin-right: auto; margin-top: 30px">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- e-kako-728*90 -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:728px;height:90px"
			     data-ad-client="ca-pub-2719272532112652"
			     data-ad-slot="5003479016"></ins>
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
			<strong>{{$post->intro}}</strong>
			<hr>
			{!!$post->content!!} 
			</article>
			<div style="width: 336px; margin-left: auto; margin-right: auto; margin-top: 30px">
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
		<div class="col-xs-12 col-md-4">
			
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- e-kako-300*250 -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:300px;height:250px"
			     data-ad-client="ca-pub-2719272532112652"
			     data-ad-slot="3526745816"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>

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