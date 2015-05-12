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
                <span><a href="/sepetim">Sepetim <strong>{{$toplamUrun}}</strong> ürün var</a></span>
            <ul>
    	</div>

        <div class="topMenu">
            <ul id="topMenu">
             @for ($i=0; $i<count($categories); $i++)
                <li><a href="/category/{{$categories[$i]->id}}" class="drop">{{$categories[$i]->name}}</a>
                    <div class="dropdown_3columns">
                        <div class="col_3">
                            <h2>Başlık</h2>
                        </div>
                        <div class="col_1">    
                            <ul>
                                
                                @foreach ($subCategory[$i][0] as $sub)
                                <li><a href="/category/{{$sub->id}}">{{$sub->name}}</a><li>
                                @endforeach 
                               
                            </ul>
                        </div>
                       
                    </div>
                </li>
                @endfor
            <ul>
        </div>

        <div class="clear"></div>
        <div id="slider">
            <ul class="slides">
                <li class="slide"><img src="/img/slider/1.jpg"></li>
                <li class="slide"><img src="/img/slider/2.jpg"></li>
                <li class="slide"><img src="/img/slider/3.jpg"></li>
            </ul>
        </div>

        <div class="ContentContainer">
            @yield('content')
        </div>

        <div class="FooterContainer">
            <p>Footer</p>
        </di>
    </body>
</html>