<html>
    <head>
        <title>Allegro - @yield('title')</title>
        <script src="/js/jquery.js"></script>
    </head>
    <body>
    	<div class="topMenu">
    		<ul>
    			<li><a href="giris">Giriş</a></li>
    			<li><a href="yeni_uye">Üye Ol</a></li>
    			<li><a href="sss">SSS</a></li>
    		<ul>
    	</div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>