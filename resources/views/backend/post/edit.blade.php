@extends('layouts.sidebar')

@push('styles')
    <link href="{{ mix('build/css/redactor.css') }}" rel="stylesheet">
@endpush

@section('container')
    
    <h1>{{$post->title}}</h1>

    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form role="form" action="{{route('posts.update', ['post' => $post])}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label for="title">Naslov</label>
                            <input type="text" 
                                class="form-control" 
                                id="title" 
                                name="title" 
                                placeholder="Ime" 
                                value="{{$post->title}}">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group {{$errors->has('intro') ? 'has-error' : ''}}">
                            <label for="intro">Naslov</label>
                            <textarea class="form-control" 
                                id="intro" 
                                name="intro" 
                                placeholder="Kratki uvod">{{$post->intro}}</textarea> 
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
                                <option value="{{ $category->id }}" {{$post->category_id == $category->id ? 'selected' : ''}}>
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
                    <div class="col-xs-6">
                        <div class="form-group"> 
                            <label for="public" style="width:100%">Objavi</label>
                            <label class="switch">
                                <input type="checkbox" name="public" {{$post->public ? 'checked' : '' }}>
                                <div class="slider round"></div>
                            </label>
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
                        <button type="submit" class="btn btn-default btn-e-kako">Sačuvaj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@push('scripts_bottom')
    <script src="{{ asset('build/js/redactor.js') }}"></script>
    <script src="{{ asset('build/js/imagemanager.js') }}"></script>
    <script src="{{ asset('build/js/fontsize.js') }}"></script>
    <script src="{{ asset('build/js/fontfamily.js') }}"></script>
    <script src="{{ asset('build/js/fontcolor.js') }}"></script>
    <script src="{{ asset('build/js/fullscreen.js') }}"></script>
    <script src="{{ asset('build/js/table.js') }}"></script>
    <script src="{{ asset('build/js/video.js') }}"></script>
    <script src="{{ asset('build/js/ba.js') }}"></script>
    <script type = "text/javascript" >
        $(document).ready(function() {
            var redactorEditor = $('#content');
            redactorEditor.redactor({
                blurCallback: function(e) {
                    $('#hidden-content').val(this.code.get());
                },
                imageUpload: "{{route('post-image-upload')}}",
                imageManagerJson: "{{route('images-json')}}",
                plugins: ['imagemanager', 'fontsize', 'fontfamily', 'fontcolor', 'fullscreen', 'table', 'video'],
                imageResizable: true,
                imagePosition: true,
                lang : 'ba',
                focusEnd : true
            });
            redactorEditor.redactor("code.set", `{!!$post->content!!}`);
        });
    </script>
@endpush
@endsection
