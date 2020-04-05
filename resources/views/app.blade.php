<html>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @extends("bootstrap_test")
    <body>
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}"></script>
        
    </body>

</html>