<html>
<head>
<title>connect</title>
</head>
<body>
<?php

	ini_set('display_errors', 1);
	error_reporting(~0);

   $serverName = "127.0.0.1";
   $userName = "root";
   $userPassword = "root";
   $dbName = "project";
  
   $objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);

    $strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST['txtUsername'])."' 
	and password = '".mysqli_real_escape_string($objCon,$_POST['txtPassword'])."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			header("location:login.php");
	}
	else
	{
			$_SESSION["status"] = $objResult["status"];

			session_write_close();
			
			if($objResult["status"] == "s")
			{
				header("location:student_page.php");
			}
			
	}
	mysqli_close($objCon);
?>