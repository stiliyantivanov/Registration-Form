<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		<div class="user_card">
		<div class="d-flex justify-content-center">
				<h2 style="color: #7d4e78" class="text-muted pt-5">REGISTER</h2>
			</div>	
			<div class="d-flex justify-content-center form_container">
				<form action="registration.php" method="post">
					<div class="input-group mb-1">
						<div class="input-group-append">
							<span class="input-group-text"></span>					
						</div>
						<input type="text" name="first_name" id="first_name" class="form-control input_user" placeholder="First name" required>
					</div>
					<div class="input-group mb-1">
						<div class="input-group-append">
							<span class="input-group-text"></span>					
						</div>
						<input type="text" name="last_name" id="last_name" class="form-control input_user" placeholder="Last name" required>
					</div>
					<div class="input-group mb-1">
						<div class="input-group-append">
							<span class="input-group-text"></span>					
						</div>
						<input type="email" name="email" id="email" class="form-control input_user" placeholder="Email" required>
					</div>
					<div class="input-group mb-1">
						<div class="input-group-append">
							<span class="input-group-text"></span>					
						</div>
						<input type="phone" name="phone_number" id="phone_number" class="form-control input_user" placeholder="Phone" required>
					</div>
					<div class="input-group mb-1">
						<div class="input-group-append">
							<span class="input-group-text"></span>					
						</div>
						<input type="password" name="password" id="password" class="form-control input_pass" placeholder="Password" required>
					</div>
					<input class="btn login_btn" type="submit" id="register" name="register" value="Sign Up">
			</div>
			</form>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
			
				var firstname 			= $('#first_name').val();
				var lastname			= $('#last_name').val();
				var email 				= $('#email').val();
				var phonenumber 		= $('#phone_number').val();
				var password 			= $('#password').val();
			
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process_registration.php',
					data: {firstname: firstname,lastname: lastname,email: email,phonenumber: phonenumber,password: password},
					success: function(data){
						Swal.fire({
								'title': 'Successful registration',
								'text': data,
								'type': 'success'
								});
						setTimeout('window.location.href =  "login.php"',3000);
							},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': data,
								'type': 'error'
							});
					}
				});				
			}});				
	});
</script>
</body>
</html>