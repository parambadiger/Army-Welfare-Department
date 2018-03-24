<?php
	include("connect.php");
	if(isset($_POST['ok'])) 
	{
		$a=$_POST['a'];
		$b=$_POST['b'];
		$c=$_POST['c'];

	    $rid1= mysql_query("insert into feedback (name,email,question)values('$a','$b','$c')")or die(mysql_error());
			echo '<script language="JavaScript">alert("Record Saved Successfully!");</script>';
			include("index.php");
			
			if($rid1)
			{
			echo "DONE";
			}
			else
			{
			echo "failed";
			}
			
			
			exit;
	}
?>