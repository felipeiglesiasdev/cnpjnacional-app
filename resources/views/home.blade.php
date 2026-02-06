@extends('layouts.app')
@push('seo')
    @include('components.home.tags')
@endpush
@section('content')
    @include('components.home.hero')
    @include('components.home.features')
    @include('components.home.advanced-search-preview')
    @include('components.home.api-section')
    @include('components.home.faq')
    <x-modals.removal-success />
@endsection