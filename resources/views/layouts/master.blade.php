<html>
    <head>
        <title>Allegro - @yield('title')</title>
        <script src="/js/jquery.js"></script>
       
    </head>
    <body>
    	<div class="HeaderContainer">
    		<ul class="uye">
    			<li><a href="login">Giriş</a></li>
    			<li><a href="yeni_uye">Üye Ol</a></li>
    			<li><a href="sss">SSS</a></li>
    		<ul>
            
    	</div>

        <div class="TopMenu">
            <ul>
                <li><a href="category/Kadın">Kadın</a></li>
                <li><a href="category/Erkek">Erkek</a></li>
                <li><a href="category/Cocuk">Çocuk</a></li>
                <li><a href="category/Ic_giyim">İç giyim</a></li>
                <li><a href="category/Aksesuar">Aksesuar</a></li>

            <ul>
        </di>
        <div class="ContentContainer">
            @yield('content')
        </div>

        <div class="FooterContainer">
            <p>Footer</p>
        </di>
    </body>
</html>