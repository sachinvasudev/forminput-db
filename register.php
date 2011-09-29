<?php
if(file_exists("functions.inc"))
require_once("functions.inc");

else
	{
		echo "<div style='text-align:center;color:red;font-size:24px'>Fatal Error. Contact Webmaster</div>";
		die();
	}

?>
<html>
	<head>
		<title> Employee Registration </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body>
		<form method="post" action="register.php" name="regist" onsubmit="return validate2();"enctype="multipart/form-data">
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
					<td>
					<p class="toptext">
						Name
					</p></td>
					<td>
					<input type="text" maxlength="40" id="name" name= "Name"/>
					</td>
				</tr>
				
		    	<tr>
					<td>
					<p class="toptext">
						Age
					</p></td>
					<td>
					<input type="text" class="num" maxlength="3" size="20" name="Age"/>
					</td>
				</tr>
				
				<tr>
					<td>
					<p  class="toptext">
				Occupation
			</p></td>
					<td>
					<select id="occupation" name="occupation">
				<option value="">-Select-</option>
				<option value="Doctor">Doctor</option>
				<option value="Engineer">Engineer</option>
				<option value="Teacher">Teacher</option>
				<option value="Lawyer">Lawyer</option>
			</select>
					</td>
				</tr>
				
				
				<tr>
					<td>
						<p  class="toptext">
						Address
						</p>
				</td>
				
				
				<td>
					<textarea id="address" name="address" rows="5" cols="25"></textarea>
					
				</td>
				
				<tr>
					<td>
						<p  class="toptext">
							Status
						</p>
					</td>
							
					<td>
						<select id="status" name="status">
							<option value="">-Select-</option>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						</select>
					</td>

				</tr>
				
				<tr>
					
					<td colspan="2" style="text-align: center">
						<input type="reset" value"Reset" name="reset"/>
						<input type="submit" value="Submit" name="submit"/>
						<a href="index.php">
		<button type="button">Home</button>
	</a>
						
					</td>
					
					
				</tr>
				
				
			
			
			
			</table>
			
			</form>
			
			<?php
			if (isset($_POST['submit'])) 
			
			{
				$username=addslashes(htmlspecialchars($_POST['Username']));
				$password=md5($_POST['Password']);
				$name=addslashes(htmlspecialchars($_POST['Name']));
				$age=$_POST['Age'];
				$occpn=addslashes($_POST['occupation']);
				$addrs=addslashes((nl2br(htmlspecialchars($_POST['address']))));
				$status = $_POST['status'];
				
				$con = dbConnect();
				
				
				
				
			
				if(idExists($username,$con))
				{
					echo "<div class='error'>Username '$username' already taken</div>";
				}
				else
					{
						$query = "INSERT INTO employee (username,password,name,age,occupation,address,status)
						 VALUES
(						 '$username','$password','$name','$age','$occpn','$addrs','$status')";

				mysql_query($query,$con) or die("Could not run query");
				
				mysql_close($con);
				header('Location: view.php');
				exit();
						
					}
				
				

			}
		?>

			
			<script>
				window.onload=document.getElementById("username").focus();
			</script>
			</body>

			<script type="text/javascript" src="validate.js"></script>

			</html>
