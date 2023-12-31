@extends('layouts.app')

@section('content')
<div class="container loginformdiv">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST" action="/login">
            @csrf
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="User name / Email" name="name" id="name" required>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password" name="password" id="password" required>
				</div>
				<button class="button login__submit" type="submit" class="btn btn-success">
					<span class="button__text">Iniciar Sesion</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
@endsection