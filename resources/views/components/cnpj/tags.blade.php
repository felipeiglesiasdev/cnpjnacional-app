@php
    $meta = $data['meta_data'] ?? [];
    $og = $data['og_data'] ?? [];
    $structured = $data['structured_data'] ?? [];
@endphp
<title>{{  $meta['title']  }}</title>
<meta name="description" content="{{ $meta['description'] }}">
<meta name="keywords" content="{{ $meta['keywords'] }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://www.buscacnpjs.com/cnpj/{{ $data['cnpj_limpo'] }}">
<script type="application/ld+json">
    {!! json_encode($structured, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>
