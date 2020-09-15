{{-- Laravel Mix - CSS File --}}
<link rel="stylesheet" type="text/css" href="{{ theme_url('css/styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ theme_url('css/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ theme_url('css/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ theme_url('bootstrap/css/bootstrap.min.css') }}">

@yield('css')
@stack('css-extra')