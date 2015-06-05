<html>
    <head>
        <title>Allegro - @yield('title')</title>
        <script src="/js/jquery.js"></script>
        <script src="/js/main.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/main.css"/>
        @yield('headAdd')
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
            
            <div class="sepet">
                <a href="/sepetim">Sepetim <strong>{{$toplamUrun}}</strong> ürün var</a>
                <ul>
                    @foreach ($cartItems as $cartItem)
                    <li>Ürün adı :{{ $cartItem->product_ID }} Ürün adeti:{{$cartItem->quantity}} <button onclick="removeCart({{ $cartItem->id }})">Sil</button></li>
                    @endforeach
                </ul>
            </div>
    	</div>
        <div class="topMenu">
            <ul id="topMenu">
             @foreach($categories as $category)
                <li><a href="/category/{{$category->id}}" class="drop">{{$category->name}}</a>
                    <div class="dropdown_3columns">
                        <div class="col_3">
                            <h2>Başlık</h2>
                        </div>
                        <div class="col_1">    
                            <ul>
                                @foreach ($category->subCategories as $sub)
                                <li><a href="/category/{{$sub->id}}">{{$sub->name}}</a><li>
                                @endforeach
                            </ul>
                        </div>
                       
                    </div>
                </li>
                @endforeach
            <ul>
        </div>

        <div class="clear"></div>
        @yield('slider')

        <div class="ContentContainer">
            @yield('content')
        </div>
        <div class="clear"></div>
        <div class="FooterContainer">
            <p>Footer</p>
        </di>
    </body>
</html>