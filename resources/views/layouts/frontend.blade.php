@extends('layouts.app')
@push('styles')
 	<link href="{{ mix('build/css/frontend.css') }}" rel="stylesheet">
@endpush
@section('content')
	@include('frontend/header')
	@yield('container')
	@include('frontend/footer')
@endsection
@push('scripts_bottom')
	<script src="{{ mix('build/js/frontend.js') }}"></script>
@endpush