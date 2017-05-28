<?php
include_once("config.php");
session_set_cookie_params(3600);
//ini_set('session.gc_maxlifetime',60*60);
//ini_set('session.gc_probability',1);
//ini_set('session.gc_divisor',1);
session_start();


$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
	echo "<script>alert('You are not authorised to view this page, please login for authentication.');</script>";
	echo "<script>window.location.href='index.php'</script>";
}
date_default_timezone_set("Asia/Kolkata");

$date = date("Y-m-d");

$id=$_GET['id'];
$id=base64_decode($id);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">



$(document).ready(function()

{

    $('#customForm').on('submit', function(e)

    {

        e.preventDefault();

        

        //show uploading message

        $("#output").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');

        $(this).ajaxSubmit({

        target: '#output',

        success:  afterSuccess //call function after success

        });

    });

});

 

 function afterSuccess(value)



{

if(value == "Saved!")

{

$('#customForm').resetForm();
window.location.href='list_packages.php';

}



}

</script>

	<style>
	.output { color:#eb268f;}
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
	<?php include("admin_header.php"); ?>
    	<!--/.sidebar-->
		<?php include("admin_sidebar.php"); ?>
	<!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Edit Packages</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Packages</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			
			<?php
  $q="select * from Packages where id='".$id."'";
  $q1=mysql_query($q);
  $q2=mysql_num_rows($q1);
 
  while($q3=mysql_fetch_array($q1))
  {
  
  $id = base64_encode($q3['id']);
  ?>
			
			<div class="col-xs-12 col-md-6 col-lg-3">
				<form name="customForm" id="customForm" method="post" action="save_editpackages.php" enctype="multipart/form-data">

<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />

<input type="text" id="category" name="category" placeholder="Category" class="form-control" value="<?php echo $q3['Name'];?>">
<br>
<select id="package_type" name="package_type" class="form-control">
<option value="">Select Type</option>
<option value="Normal" <?php if($q3['type']=='Normal') { echo 'selected="selected"' ; }?>>Normal</option>
<option value="Pearl" <?php if($q3['type']=='Pearl') { echo 'selected="selected"' ; }?>>Pearl</option>
<option value="Gold" <?php if($q3['type']=='Gold') { echo 'selected="selected"' ; }?>>Gold</option>
<option value="O3+w" <?php if($q3['type']=='O3+w') { echo 'selected="selected"' ; }?>>O3+w</option>
</select>
<br>
<textarea name="desc" id="desc" placeholder="Description" class="form-control" rows="5"><?php echo $q3['description'];?></textarea>
<br>

<button type="submit" id="submitform" class="btn btn-primary">Save</button><span id="output" class="output"></span>
</form>
			</div>
            <?php
}
?>
		</div><!--/.row-->
		
		
								
		
	</div>	<!--/.main-->

	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

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
