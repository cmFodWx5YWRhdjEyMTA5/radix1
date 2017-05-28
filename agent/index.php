<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Radix Beauty - Agent Panel</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	$("#send").click(function() {
	$("#message").html('Authenticating... Please wait.');
		var action = $("#slick-login").attr('action');
		var form_data = {
			username: $("#username").val(),
			password: $("#password").val(),
			usertype: $("#usertype").val(),
			is_ajax: 1
		};
		
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == 'success')
					 {
						window.location.href='home.php';
						
					}
				else
					$("#message").html("<p class='error1'>Invalid username or password.</p>");	
			}
		});
		
		return false;
	});
	
});
</script>
<style>
.error1{color:#eb268f; font-size: 1em;}
.message{color:#eb268f; font-size: 1em;}
</style>
<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">

<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">

<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">

<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">

<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">

<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">

<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">

<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">

<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">

<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">

<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">

<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">

<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

<link rel="manifest" href="favicon/manifest.json">

<meta name="msapplication-TileColor" content="#ffffff">

<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">

<meta name="theme-color" content="#ffffff">
</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><img src="images/logo.png" /></div>
				<div class="panel-body">
					<form role="form" id="slick-login" name="slick-login" action="doLogin.php" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="username" id="username" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" id="password" type="password" value=""> <input value="agent" name="usertype" id="usertype" type="hidden" required class="user form-control"/>
							</div>
							
							<input type="submit" id="send" name="send" value="Login" class="btn btn-primary" /> <div id="message" class="message"></div>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
