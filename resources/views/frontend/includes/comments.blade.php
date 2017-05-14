@forelse($comments as $comment)
	<ul class="media-list">
		<li class="media">
		    <div class="media-left">
		        <img class="media-object" src="{{asset('images/avatar.jpg')}}" style="width: 70px;height: 70px;">
		    </div>
		    <div class="media-body">
		 		<p>
		 			<strong>{{$comment->user->first_name}} {{$comment->user->last_name}}</strong> | {{$comment->created_at->format('H:i d-m-y')}}
		 		</p>
		 		<p>
		     		{{$comment->body}}
		 		</p>
		    </div>
		</li>
	</ul>
@empty
	<div class="panel panel-default">
	  	<div class="panel-body">
	    	<strong>Nema komentara</strong>
	  	</div>
	</div>
@endforelse