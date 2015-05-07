@extends('layouts.loginMaster')

@section('title', 'Ürünler')

@section('content')

<form id="login-form" action="/api/login" method="post">
		<fieldset>
		
			<legend>Üye Giriş</legend>
			
			<label for="login">Email</label>
			<input type="text" id="login" name="email"/>
			<div class="clear"></div>
			
			<label for="password">Şifre</label>
			<input type="password" id="password" name="password"/>
			<div class="clear"></div>
			
			<label for="remember_me" style="padding: 0;">Beni Hatırla?</label>
			<input type="checkbox" id="remember_me" style="position: relative; top: 3px; margin: 0; " name="remember_me"/>
			<div class="clear"></div>
			
			<br />
			
			<input type="submit" style="margin: -20px 0 0 287px;" class="button" name="commit" value="Giriş"/>	
		</fieldset>
	</form>



@stop