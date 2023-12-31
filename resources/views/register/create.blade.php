
@extends('layouts.app')

@section('content')
<div class="container loginformdiv">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST" action="/register">
            @csrf
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Nombre" name="name" id="name" required>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Email" type="email" name="email" id="email" required>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password" name="password" id="password" required>
				</div>
				<button class="button login__submit" type="submit" class="btn btn-success">
					<span class="button__text">Registrarse</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
		</div>
	
	</div>
</div>
@endsection