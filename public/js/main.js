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

function removeCart(id) {
	$.ajax({
		url: '/api/cart/' + id,
		method: 'delete'
	}, function (response, status, xhr) {
		if (xhr.status === 200) {
			alert('Ürün silindi');
		}
	});
}