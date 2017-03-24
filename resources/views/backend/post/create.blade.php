@extends('layouts.sidebar')

@section('container')
    
    <h1>Novi post</h1>

    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form role="form" action="{{route('posts.store')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label for="title">Naslov</label>
                            <input type="text" 
                                class="form-control" 
                                id="title" 
                                name="title" 
                                placeholder="Ime" 
                                value="{{old('title')}}">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-default btn-e-kako">Kreiraj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection