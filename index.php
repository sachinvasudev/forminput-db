<?php
if(file_exists("functions.inc"))
require_once("functions.inc");

else
	{
		echo "<div style='text-align:center;color:red;font-size:24px'>Fatal Error. Contact Webmaster</div>";
		die();
	}
	


if(isset($_POST['submit']))
{
	$con = dbConnect();
	if(login_check($_POST['Username'],md5($_POST['Password']),$con))
	{
		session_start();
		$_SESSION['username'] =$_POST['Username'];
		
	}
	
	mysql_close($con);
}
session_start();
if(isset($_SESSION['username']))
{
	
header('Location: employee.php');

}


?>

<html>
	<head>
		
		<title> Employee Login </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body class="page2">
		
		<h1> Login Page</h1>
		<h2 class="page2">Please login with your username and password</h2>
		
		<form method="post">
			<table border="0">
				
				<tr>
					<td>
					<p class="toptext">
						Username
					</p></td>
					<td>
					<input type="text" maxlength="40" id="username" name= "Username"/>
					</td>
				</tr>
				
				<tr>
					<td>
					<p class="toptext">
						Password
					</p></td>
					<td>
					<input type="password" size="28"maxlength="40" id="password" name= "Password"/>
					</td>
				</tr>
				
				<tr>
					
					<td colspan="2" style="text-align:center;">
						<input type="reset" name="reset" value="Reset"/>
					
						<input type="submit" name="submit" value="Login"/>
					</td>
				</tr>
				
		</table>
		<?php
		if(isset($_POST['submit']))
		echo '<div class="error">Invalid username or password</div>';
		?>
	  </form>	
	</body>
</html>