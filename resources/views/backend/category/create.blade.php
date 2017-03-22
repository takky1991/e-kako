@extends('layouts.sidebar')

@section('container')
    
    <h1>Nova kategorija</h1>

    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form role="form" action="{{route('categories.store')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label for="name">Naziv kategorije</label>
                            <input type="text" 
                                class="form-control" 
                                id="name" 
                                name="name" 
                                placeholder="Ime" 
                                value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                            <label for="description">Opis</label>
                            <textarea class="form-control"
                                rows="5"
                                id="description" 
                                name="description" 
                                placeholder="Opis">{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
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