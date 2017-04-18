@extends('layouts.sidebar')

@push('styles')
    <link href="{{ mix('build/css/redactor.css') }}" rel="stylesheet">
@endpush

@section('container')
    
    <h1>{{$post->title}}</h1>

    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form role="form" action="{{route('posts.update', ['post' => $post])}}" method="POST" style="margin-bottom: 100px;">
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
                    <div class="col-xs-3">
                        <div class="form-group"> 
                            <label for="public" style="width:100%">Objavi</label>
                            <label class="switch">
                                <input type="checkbox" name="public" {{$post->public ? 'checked' : '' }}>
                                <div class="slider round"></div>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group {{$errors->has('featured_image_id') ? 'has-error' : ''}}"> 
                        <!-- Trigger the modal with a button -->
                            <label for="title">Promotivna slika</label>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#featured_image_modal">Odaberi sliku</button>
                        </div>

                        <!-- Modal -->
                        <div id="featured_image_modal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Promotivna slika</h4>
                              </div>
                              <div class="modal-body">
                                <select class="image-picker show-html" id="image-picker" name="featured_image_id">
                                    @foreach($images as $image)
                                        <option data-img-src="{{Storage::disk('local')->url($image->thumbnail_uri)}}" 
                                            value="{{$image->id}}"
                                            {{$post->featured_image_id == $image->id ? 'selected' : ''}} >  {{$image->real_name}} </option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                              </div>
                            </div>

                          </div>
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
