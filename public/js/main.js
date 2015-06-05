function logout(id){
	$.ajax({
		url: '/api/login/exit',
		method: 'delete'
	});
	
}

$(function () {
	$('#login-form').submit(function login(e) {
		e.preventDefault();
		$.ajax({
			url: '/api/login/',
			method: 'post',
			data: {
				email: $('#login').val(),
				password: $('#password').val()
			}
		}).success(function (response, status, xhr) {
			if (xhr.status === 200 && response.success) {
				location.reload();
			}else{
				
				$(".alert").html('Şifreniz hatalı Lütfen tekrar giriniz.');
			}
		});
	});
});

function sepetList(){
	$.get('/api/cart', function (data) {
				
				var data = JSON.parse(data);
				
					$('div.sepet a strong').html(data.length);
					$('div.sepet ul').html('');
					for (var i = 0; i < data.length; i++) {
						$('div.sepet ul').append('<li>Ürün Adı:'+ data[i].product_ID + ' Ürün Adeti :' + data[i].quantity + '<button onclick="removeCart('+ data[i].id +')">sil</button></li>');
					}
			});
}

function removeCart(id) {
	$.ajax({
		url: '/api/cart/' + id,
		method: 'delete'
	}).success(function (response, status, xhr) {
		if (xhr.status === 200 ) {
			sepetList();
		}
	});
	
}

function addToCart(id) {
	var $quan = document.getElementById('quantity').value;
	
	$.post('/api/cart', {quantity: $quan, product_ID: id}, function (response, status, xhr) {
		if (xhr.status === 200) {
			sepetList();
		}
	});
}



function discountCalculator (discount,prePrice){
	var x = discount;
	var Price = prePrice;
	var newPrice;
	
	discount = Price * x / 100;
	newPrice = Price - discount;
	var s = document.getElementById('newPrice').innerHTML = newPrice + " TL";
	
	



}




/*----------------------- SLİDER ----------------------- */ 
$(document).ready(function(){
	 //configuration
	 var widht = 980;
	 var animationSpeed = 1000;
	 var pause = 3000;

	 var $slider = $('#slider');
	 var $sliderContainer = $slider.find('.slides');
	 var $slides = $sliderContainer.find('.slide');
	 var $currentSlide = 1;
	 var $total = $slides.length;
	 //alert($total);
function startSlider(){
	var interval = setInterval(function(){
		$sliderContainer.animate({'margin-left': '-='+widht},animationSpeed,
			function(){
				$currentSlide++;
				if ($currentSlide === $total){
					
					$currentSlide = 1;
					$sliderContainer.css('margin-left',0);
					
				}
			});	
		}
	,pause);
}	

function stopSlider(){
	clearInterval(interval);
}
	$slider.on('mouseenter',stopSlider).on('mouseLeave',startSlider);

	startSlider();
});