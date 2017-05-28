<?php
	include_once("config.php");
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$usertype = $_REQUEST['usertype'];
		
		/*if($username == 'demo' && $password == 'demo')
		{
			echo "success";	
		}*/
		
		$q="select * from agent where email='$username' and pass='$password' and confirmation='Yes' and active='Yes'";
		$q1=mysql_query($q);
		$q2=mysql_num_rows($q1);
		if($q2 > 0)
		{
		session_start();
		ini_set('session.gc_maxlifetime',60*60);
ini_set('session.gc_probability',1);
ini_set('session.gc_divisor',1);
		$_SESSION['username']= $username;
		$_SESSION['usertype']= $usertype;
		
		echo "success";	
		}
		
	}
	
?>