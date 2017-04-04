@extends('layouts.frontend')

@section('container')
<div class="col-xs-12">
	<div class="col-md-8">
		<div class="article-wrapper">
			<div class="article-img-wrapper">
				<img class="article-img" src="http://localhost:8000/storage/uploads/g3ticwxzL1io7dkiowl8Wgy7TpC9wte0fNRDVtGT.jpeg">
			</div>
			<div class="article-inner">
	  			<h2 class="article-title">{{$post->title}}</h2>
	  			<p class="article-intro">{{$post->intro}}</p>
	  			{!!$post->content!!}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="article-sidebar">
			<ul class="list-unstyled">
				<li>
					<form class="form-search form-inline row " method="get" action="" role="search">
						<div class="form-group col-xs-19">
							<label for="s" class="sr-only">Search</label>	
							<input type="text" class="form-control" results="5" value="" name="s" id="s" placeholder="Search..." autocomplete="off">
						</div>
						<button type="submit" class="btn search-submit col-xs-4" value=""><i class="fa fa-search"></i></button>
					</form>
				</li>        
				<li class="widget">        
					<h4 class="widgettitle">Recent Posts</h4>        
						<ul class="media-list">
			                <li class="media">
			                    <div class="media-body">
				                <a href="http://codecooki.es/demos/semantic/exploring-the-new-theme/132" title="Exploring the New Blog Theme">Exploring the New Blog Theme</a>
				            	<div class="post-meta"><p><time class="post-meta-time updated" datetime="2016-04-14T18:46:18+00:00" title="April 14th, 2016 at 06:46pm">12 months ago</time></p></div>
				                </div>
			            	</li>
			                <li class="media">
			                    <div class="media-body">
				                <a href="http://codecooki.es/demos/semantic/soaring-spirits-in-the-wild/130" title="Soaring Spirits in the Wild">Soaring Spirits in the Wild</a>
				            	<div class="post-meta"><p><time class="post-meta-time updated" datetime="2016-04-14T18:41:14+00:00" title="April 14th, 2016 at 06:41pm">12 months ago</time></p></div>
				                </div>
			            	</li>
			                <li class="media">
			                    <div class="media-body">
				                <a href="http://codecooki.es/demos/semantic/enhancing-readers-delight/127" title="Enhancing Readers’ Delight">Enhancing Readers’ Delight</a>
				            	<div class="post-meta"><p><time class="post-meta-time updated" datetime="2016-04-14T18:36:30+00:00" title="April 14th, 2016 at 06:36pm">12 months ago</time></p></div>
				                </div>
			            	</li>
			                <li class="media">
			                    <div class="media-body">
				                <a href="http://codecooki.es/demos/semantic/quotes-to-live-by-2/125" title="Quotes to live by">Quotes to live by</a>
				            	<div class="post-meta"><p><time class="post-meta-time updated" datetime="2016-04-14T18:27:50+00:00" title="April 14th, 2016 at 06:27pm">12 months ago</time></p></div>
				                </div>
			            	</li>
			                <li class="media">
			                    <div class="media-body">
				                <a href="http://codecooki.es/demos/semantic/post-format-video-youtube-exhibit-1/116" title="Post format: Video from Youtube">Post format: Video from Youtube</a>
				            	<div class="post-meta"><p><time class="post-meta-time updated" datetime="2016-04-14T18:10:27+00:00" title="April 14th, 2016 at 06:10pm">12 months ago</time></p></div>
				            	</div>
			            	</li>
			           	</ul>
			    </li>
			    <li class="widget">
				    <h4 class="widgettitle">Text Widget</h4>			
				    <div class="textwidget">This is a text widget. Tamarin duck but <a href="#">smoked</a> rattlesnake knelt. <b>Owl slit played</b> improper poked <i><u>aside crud</u></i> therefore garrulous.</div>
				</li>

			</ul>
		</aside>
	</div>
</div>	
</div>
@endsection