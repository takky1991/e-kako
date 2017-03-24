@extends('layouts.sidebar')

@section('container')
    @push('styles')
    <link href="{{ mix('build/css/dropzone.css') }}" rel="stylesheet">
    @endpush
    <form action="{{route('images-upload')}}"
        class="dropzone"
        id="my-awesome-dropzone"
        method="POST">
        {{csrf_field()}}        
    </form>

    <hr>

    @foreach($images->chunk(12) as $set)
    <div class="row">
        @foreach($set as $image)
        <div class="col-xs-6 col-md-1">
            <div class="img-wrapper">
                <form method="POST" action="{{route('images.destroy', ['image' => $image])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-default btn-e-kako img-delete-icon"><i class="fa fa-times" aria-hidden="true"></i></button>
                </form>
                <img src="{{Storage::disk('local')->url($image->thumbnail_uri)}}" width="100px" height="100px;">
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    {{ $images->links() }}

    @push('scripts')
    <script>
        Dropzone.options.myAwesomeDropzone = {
            acceptedFiles: 'image/*'
        };
    </script>
    @endpush

@endsection