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
    
    @push('scripts')
    <script src="{{ mix('build/js/dropzone.js') }}"></script>
    @endpush

@endsection