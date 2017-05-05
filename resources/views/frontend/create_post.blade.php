@extends('layouts.frontend')

@push('styles')
    <link href="{{ mix('build/css/redactor.css') }}" rel="stylesheet">
@endpush

@section('container')
<div class="container" style="margin-top:100px">

	<h1>Novi post</h1>
	<h5>Podijelite svoja vlastita iskustva a mi ćemo ih objaviti.</h5>

    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form role="form" action="{{route('frontend.storePost')}}" method="POST" style="margin-bottom: 100px;">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label for="title">Naslov</label>
                            <input type="text" 
                                class="form-control" 
                                id="title" 
                                name="title" 
                                placeholder="Naslov" 
                                value="{{old('title')}}">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group {{$errors->has('intro') ? 'has-error' : ''}}">
                            <label for="intro">Kratki uvod</label>
                            <textarea class="form-control" 
                                id="intro" 
                                name="intro" 
                                placeholder="Kratki uvod">{{old('intro')}}</textarea> 
                            @if ($errors->has('intro'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('intro') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}"> 
                            <label for="title">Kategorija</label>
                            <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group {{$errors->has('content') ? 'has-error' : ''}}">
                            <label for="content">Sadržaj</label>
                            <textarea id="content"></textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="content" id="hidden-content">
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-default btn-e-kako">Kreiraj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts_bottom')
    <script src="{{ asset('build/js/redactor.js') }}"></script>
    <script src="{{ asset('build/js/fontsize.js') }}"></script>
    <script src="{{ asset('build/js/fontfamily.js') }}"></script>
    <script src="{{ asset('build/js/fontcolor.js') }}"></script>
    <script src="{{ asset('build/js/fullscreen.js') }}"></script>
    <script src="{{ asset('build/js/table.js') }}"></script>
    <script src="{{ asset('build/js/video.js') }}"></script>
    <script src="{{ asset('build/js/ba.js') }}"></script>
    <script src="{{ asset('build/js/image-picker.js') }}"></script>
    <script type = "text/javascript" >
        $(document).ready(function() {
            $("select#image-picker").imagepicker();
            var redactorEditor = $('#content');
            redactorEditor.redactor({
                blurCallback: function(e) {
                    $('#hidden-content').val(this.code.get());
                },
                imageUpload: "{{route('post-image-upload')}}",
                plugins: ['fontsize', 'fontfamily', 'fontcolor', 'fullscreen', 'table', 'video'],
                imageResizable: true,
                imagePosition: true,
                lang : 'ba',
                minHeight: 300 // pixels
            });
            redactorEditor.redactor("code.set", `{!!old('content')!!}`);
        });
    </script>
@endpush
@endsection