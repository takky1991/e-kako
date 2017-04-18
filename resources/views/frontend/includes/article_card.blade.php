<a href="{{route('frontend.post', ['category' => $post->category->slug, 'post' => $post->slug])}}">
	<div class="post-img-wrapper">
		<img class="post-img" src="{{$post->featuredImageUrl()}}">
	</div>
	<div class="grid-item-inner">
		<h5 class="title">{{$post->title}}</h5>
		<p class="intro"> {{str_limit($post->intro, 100)}} <strong>Nastavi čitati</strong></p>
	</div>
</a>