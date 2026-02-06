@props(['metaData'])
<title>{{ $metaData['title'] }}</title>
<meta name="description" content="{{ $metaData['description'] }}">
<meta name="keywords" content="{{ $metaData['keywords'] }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $metaData['og_url'] }}">
<meta property="og:site_name" content="CNPJ Nacional">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $metaData['og_url'] }}">
<meta property="og:title" content="{{ $metaData['title'] }}">
<meta property="og:description" content="{{ $metaData['description'] }}">
<meta property="og:image" content="{{ asset('images/social.webp') }}">

