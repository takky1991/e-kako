@extends('layouts.app')
@push('styles')
 	<link href="{{ mix('build/css/frontend.css') }}" rel="stylesheet">
@endpush
@section('content')
	@include('frontend/header')
	<div class="container">
		<div class="row">
			@yield('container')
		</div>
	</div>
@endsection