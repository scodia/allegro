<html>
    <head>
        <title>Allegro - @yield('title')</title>
        <script src="/js/jquery.js"></script>
        <script src="/js/main.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    </head>
    <body>
    	<div class="HeaderContainer">
    		<ul class="uye">
    			@if (Auth::check())

                <span>Merhaba <strong>{{ Auth::user()->name }}</strong></span>
                    <li><a href="" onClick="logout()">Çıkış</a></li>
                @else
                <li><a href="/user">Üye Ol</a></li>    
                <li><a href="/login">Giriş</a></li>
                @endif

    			<li><a href="sss">SSS</a></li>
    		<ul>
            
            <ul class="sepet">
                <span>Sepetim <strong>{{$toplamUrun}}</strong> ürün var</span>
            <ul>
    	</div>

        <div class="topMenu">
            <ul id="topMenu">
                @foreach ($categories as $category)
                <li><a href="/category/{{$category->id}}" class="drop">{{$category->name}}</a>
                    <div class="dropdown_4columns">
                        <div class="col_4">
                            <h2>Başlık</h2>
                        </div>
                        <div class="col_1">    
                            <ul>
                           
                                
                            </ul>
                        </div>
                        <div class="col_1">    
                            <ul>
                                <li><a href="#">asdasd</a></li>
                                <li><a href="#">asdasd</a></li>
                                <li><a href="#">asdasd</a></li>
                                <li><a href="#">asdasd</a></li>
                                <li><a href="#">asdasd</a></li>
                                <li><a href="#">asdasd</a></li>
                                <li><a href="#">asdasd</a></li>
                                <li><a href="#">asdasd</a></li>
                                <li><a href="#">asdasd</a></li>
                            </ul>
                        </div>
                        <div class="col_1">
                            <h3>Çok satanlar</h3>
                            <img src="/img/login-page-bg.jpg" width="70" height="70"/>
                        </div>
                        <div class="col_1">
                            <h3>Kampanyalar</h3>
                            <img src="/img/login-page-bg.jpg" width="70" height="70"/>
                        </div>
                    </div>
                </li>
                @endforeach
            <ul>
        </div>

        <div class="clear"></div>
        <div class="ContentContainer">
            @yield('content')
        </div>

        <div class="FooterContainer">
            <p>Footer</p>
        </di>
    </body>
</html>