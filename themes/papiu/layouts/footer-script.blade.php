<script src="{{ theme_url('js/maps.js') }}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyauEvKpF5O3y4wEQhaTg0DAfqw59aHlA&callback=myMap"></script>
<script src="{{ theme_url('assets/libs/jquery/jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{ theme_url('js/jquery.min.js')}}"></script>
<script src="{{ theme_url('assets/libs/proper/popper.min.js') }}"></script>
<script src="{{ theme_url('assets/libs/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ theme_url('js/scrollMain.js') }}"></script>
<script src="{{ theme_url('js/option_book.js') }}"></script>

@yield('js')
@stack('script-extra')
