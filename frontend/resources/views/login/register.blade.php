@extends('masterlayout')
@section('register')

<div class="register">
	<div class="register__content">
		<div class="register__form">
			<form action="{{ URL::to('/register-Account') }}" class="form__register" method="post" name="frm">
				{{ csrf_field() }}
				<h1 class="login__title">Register</h1>
				<div class="register__box">
					<input class="login__input @error('fullname') is-invalid @enderror" placeholder="Fullname" type="text" name="fullname">
					@error('fullname')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('username') is-invalid @enderror" placeholder="Username" type="text" name="username">
					@error('username')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('password') is-invalid @enderror" placeholder="Password" type="password" name="password">
					@error('password')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div class="register__box">
					<input class="login__input @error('confirm') is-invalid @enderror" placeholder="Confirm Password" type="password" name="confirm">
					@error('confirm')
					    <span class='invalid-feedback'>{{ $message }}</span>
				    @enderror
				</div>
				<div style="margin: auto; width: fit-content; margin-top: 20px;">
					<button class="btn btn-primary" type="submit" name="submit">Register</button>
					<button class="btn btn-danger" type="reset" style="margin-left: 60px;">Reset</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
 @endsection