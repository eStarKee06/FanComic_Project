<html>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @extends("bootstrap_test")
    
    <div  id="top-navigator">
        <ul class="p-2 list-group list-group-horizontal">     
            <a href="/explore"><div class="px-4" ><h5>Explore</h5></div></a>
            <a href="/profile"><div class="px-4"><h5>Profile</h5></div></a>
            <a href="/signOut"><div class="px-4"><h5>signOut</h5></div></a>
        </ul>
    </div>

    <body>
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
    <style>
        #top-navigator{
            left: 0;
            top: 0;
            width: 100%;
            height: 8%;
            background-color: #a58966;   
        }
        #top-navigator ul{
            float: right;
        }
    </style>
</html>