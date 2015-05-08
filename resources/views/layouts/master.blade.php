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
                @foreach ($categories as $category)
                <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
                @endforeach
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