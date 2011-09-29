<?php
if(file_exists("functions.inc"))
require_once("functions.inc");

else
	{
		echo "<div style='text-align:center;color:red;font-size:24px'>Fatal Error. Contact Webmaster</div>";
		die();
	}

session_start();
if(isset($_SESSION['username']))
{
	$username= $_SESSION['username'];
	$con = dbConnect();
	

	
	$employee= mysql_fetch_assoc(getEmployee($username,$con));

}
else 
{
	die("sorry");
	
}

?>

<html>
	<head>
		
		<title> Employee Login </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body class="page2">
		
		<h1> Employee Home</h1>
		<br/><br/>
		
		
	<h2 class="empl">Welcome, <?php echo $employee['name'];?></h3>
	</body>
	
</html>