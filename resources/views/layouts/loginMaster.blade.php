<html>
    <head>
        <title>@yield('title')</title>
        
        <script src="/js/jquery.js"></script>
        <script src="/js/main.js"></script>
        @yield('style')
    </head>
    <body>
    	
        <div class="ContentContainer">
            @yield('content')
        </div>

        <div class="FooterContainer">
        </div>
    </body>
</html>