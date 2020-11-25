<!doctype html>
<html lang="en" dir="ltr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- CSS -->
	<link rel="stylesheet" href="../../assets/css/login.css">

	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">

	<title>Login | ADMIN PAGE</title>
</head>
<body class="container-fluid">
	<div id="info"></div>
	<div class="loginbox">
		<img src="../../assets/images/undraw_profile_pic_ic5t (1).png" class="avatar">
		<h2>Admin Login</h2>
		<form id='login-form' method="POST">
			<div class="form-group">
				<label>Username</label><br />
				<input type="text" name="username" id="username" placeholder="Enter Username" class="form-control"><br /><br />
			</div>
			<div class="form-group">
				<label>Password</label><br />
				<input type="password" name="password" id="password" placeholder="Enter Password" class="form-control"><br /><br />
			</div>
			<div class="form-group">
				<button type="submit" id="login" name="login">Login</button>
			</div>
			<a href="#">Forget Password?</a>
		</form>
	</div>

<script src="../../assets/jquery.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready( ()=>{

	$('#login').on('click', ()=>{

		var username = $('#username').val();
		var password = $('#password').val();

		if(username!='' && password!=''){
			$.ajax({
				url: "../includes/login.inc.php",
				type: 'POST',
				data: {
					type: 1,
					username: username,
					password: password
				},
				cache: false,
				beforeSend : ()=>{
					$('#info').fadeOut();
					$('#login').html('Login....');
				},
				success: (response)=>{
					var response = JSON.parse(response);
					if (response.statusCode==200){
						$('#login').html("<img src='../../images/Spinner-1s-200px.gif' width='15'/> &nbsp; Login");
						setTimeout('window.location.href = "dashboard.php";', 4000);
					}else if(response.statusCode==201){
						$('#info').fadeIn(1000, ()=>{
							$('#info').html("<div class='alert alert-danger'>"+response+"</div>");
							$('#login').html('Login');
						});
					}
				}
			});
		}else{
			setTimeout( ()=>{
				window.location.href = "dashboard.php";
				}, 4000);
			$('#info').html("<div class='alert alert-danger'>Please fill all fields!</div>");
		}

	});

});

</script>
</body>
</html>
