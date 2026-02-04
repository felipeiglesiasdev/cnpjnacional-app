@extends('layouts.app')
@push('seo')
    @include('components.cnpj.tags', ['data' => $data])
@endpush
@section('content')
<section class="bg-gradient-to-b from-blue-50 via-white to-white border-b border-slate-200">
    <div class="max-w-5xl mx-auto px-4 py-10 space-y-6">
        <x-cnpj.header :data="$data" />
        <div class="grid gap-4 md:grid-cols-2">
            <x-cnpj.basic-info :data="$data" />
            <x-cnpj.status :data="$data" />
        </div>
        <x-cnpj.activities :data="$data" />
        <x-cnpj.location :data="$data" />
        <x-cnpj.faq :data="$data" />
        <x-cnpj.removal-banner :data="$data" />
        <x-cnpj.similar-companies :data="$data" />
    </div>
    
</section>
@endsection