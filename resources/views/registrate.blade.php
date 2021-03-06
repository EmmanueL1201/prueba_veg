<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrate</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">
<!--===============================================================================================-->
 <!-- Alerts -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
				</div>

				<form class="login100-form validate-form" action="{{ route('guardaregistro') }}" method="POST" enctype='multipart/form-data'>
					{{csrf_field()}} 
					<span class="login100-form-title">
						Registro
					</span>
                    <div class="wrap-input100 validate-input" data-validate = "Nombre requerido">
						<input class="input100" type="text" name="nombre" value="" placeholder="Nombre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "A.Paterno requerido">
						<input class="input100" type="text" name="ap_paterno" value="" placeholder="Apellido Paterno">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "A.Materno requerido">
						<input class="input100" type="text" name="ap_materno" value="" placeholder="Apellido Materno">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Correo requerido">
						<input class="input100" type="text" name="correo" value="" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Contraseña requerida">
						<input class="input100" type="password" name="contrasena" value="" placeholder="Contraseña">
                        <input type="hidden" name="activo" value="1">
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
			
			
				
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Registrar
						</button>
					</div>
					<div class="text-center p-t-12">
					<a class="txt2" href="{{route('login')}}">
							Login
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					
				</form>
				
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('login/js/main.js')}}"></script>
	 <!-- alerts -->
	 <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	 <script>
	 @if(Session::has('message'))
		 var type = "{{ Session::get('alert-type', 'info') }}";
		 switch(type){
			 case 'info':
				 toastr.info("{{ Session::get('message') }}");
				 break;
			 
			 case 'warning':
				 toastr.warning("{{ Session::get('message') }}");
				 break;
			 case 'success':
				 toastr.success("{{ Session::get('message') }}");
				 break;
			 case 'error':
				 toastr.error("{{ Session::get('message') }}");
				 break;
		 }
	 @endif
	 </script>

</body>
</html>