<div class="card">
	<div class="card-block">
		<form method="POST" action="{{route('frontend.storeComment', ['post' => $post])}}">
			{{ csrf_field() }}
			<div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
				<textarea name="body" placeholder="Vaš komentar" class="form-control"></textarea>
				@if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Dodaj komentar</button>
			</div>
		</form>
	</div>
</div>