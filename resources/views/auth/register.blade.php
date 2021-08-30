<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng kí</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" role="form" method="POST" action="{{ url('/register') }}">
					<span class="login100-form-title p-b-43">
						Đăng ký
					</span>
					{{ csrf_field() }}

					<div class="wrap-input100 validate-input {{ $errors->has('name') ? ' has-error' : '' }}" data-validate="Nhập tên tài khoản!">
						<input class="input100" type="text" name="name">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
						<span class="focus-input100"></span>
						<span class="label-input100">Tài khoản</span>
					</div>

					<div class="wrap-input100 validate-input {{ $errors->has('email') ? ' has-error' : '' }}" data-validate="Email không chính xác! yêu cầu: ex@abc.xyz">
						<input class="input100" type="text" name="email" value="{{ old('email') }}">
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="wrap-input100 validate-input {{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Vui lòng nhập mật khẩu">
						<input class="input100" type="password" name="password">
						@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>
					<div class="wrap-input100 validate-input {{ $errors->has('password_confirmation') ? ' has-error' : '' }}" data-validate="Nhập lại mật khẩu">
						<input class="input100" type="password" name="password_confirmation">
						@if ($errors->has('password_confirmation'))
						<span class="help-block">
							<strong>{{ $errors->first('password_confirmation') }}</strong>
						</span>
						@endif
						<span class="focus-input100"></span>
						<span class="label-input100">Nhập lại mật khẩu</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Đồng ý với điều khoản!
							</label>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="button1" disabled>
							Đăng kí
						</button>
					</div>
					<script>
						
							var checkBox = document.getElementById("ckb1");
							var button = document.getElementById("button1");
							checkBox.onchange =function() {
								button.disabled=!this.checked;
							};
					</script>

				
					

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							Đã có tài khoản?<a href="{{url('/login')}}">Đăng nhập</a>
						</span>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-02.jpg');">
				</div>
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>