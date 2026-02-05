@extends('layouts.app')

@section('content')
<div class="bg-brand-cream min-h-screen py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumbs -->
        <x-cnpj.breadcrumbs :items="[
            ['label' => 'Consultar CNPJ', 'url' => null], 
            ['label' => $data['razao_social'] ?? 'Empresa', 'url' => null]
        ]" />
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8 space-y-6">
                <x-cnpj.header :data="$data" />
                <x-cnpj.status :data="$data" />
                <x-cnpj.basic-info :data="$data" />
                <x-cnpj.activities :data="$data" />
                <x-cnpj.location :data="$data" />
                <x-cnpj.faq :data="$data" />
                <x-cnpj.removal-banner :data="$data" />
                <x-cnpj.similar-companies :data="$data" />
            </div>
            <div class="lg:col-span-4 space-y-6 sticky top-24 self-start">
                <x-cnpj.sidebar.api-banner />
                <x-cnpj.sidebar.advanced-banner />
            </div>
        </div>
    </div>
</div>
@endsection