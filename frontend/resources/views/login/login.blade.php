@extends('masterlayout')
@section('login')
<div class="login">
	<div class="login__content">
		<div class="login__form">
			<form action="{{ URL::to('/login-execute') }}" class="form__login" id="login-in" method="post" name="frm">
				{{ csrf_field() }}
				<h1 class="login__title">Login</h1>
				<div class="login__box">
					<i class='bx bx-user login__icon'></i>
					<input class="login__input" type="text" name="username" maxlength="20" placeholder="username" required>
				</div>
				<div class="warning" id="warning-username"></div>
				<div class="login__box">
					<i class='bx bx-lock login__icon'></i>
					<input class="login__input" type="password" name="password" size="20" placeholder="password" required>
				</div>
				<div class="warning" id="warning-password"></div>
					<a><button name="login" class="btn btn-primary login__actions">Login</button></a>
					<div class="login__dash"></div>
					<p id="dangkycss">Do not have an account? => <a>Register</a></p>
				</div>
			</form>
		</div>
	</div>
	
	<?php
	if(isset($_COOKIE['tendangnhap']) && isset($_COOKIE['matkhau'])){
		echo "<script language='javascript'>document.getElementById('tendangnhap').value='" .$_COOKIE['tendangnhap']. "';</script>";
		echo "<script language='javascript'>document.getElementById('matkhau').value='" .$_COOKIE['matkhau']. "';</script>";
	}
	?>
</div>
@endsection
