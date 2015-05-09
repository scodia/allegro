@extends('layouts.loginMaster')

@section('title', 'Üye Giriş sayfası')

@section('style')
<link rel="stylesheet" type="text/css" href="/css/login.css">
@stop

@section('content')





<form id="login-form" method="post" action="">
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
			
		<input type="submit" style="margin: -20px 0 0 287px;" class="button" name="commit" value="Giriş" onClick="login"/>	
	</fieldset>
		
</form>

<div style="color:red; margin: 100px 140px 0 350px;"><p class="alert"></p></div>


@stop