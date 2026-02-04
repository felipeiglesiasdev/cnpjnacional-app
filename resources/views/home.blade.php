@extends('layouts.app')
@push('seo')
    @include('components.home.tags')
@endpush
@section('content')
    @include('components.home.hero')
@endsection