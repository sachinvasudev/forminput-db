
<html>
	<head>
		<title> Employee Registration </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body>
		<form method="post" action="index.php" name="regist" onsubmit="return validate2();"enctype="multipart/form-data">
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
						<a href="view.php">
		<button type="button">View data</button>
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
				
				$con = mysql_connect("localhost","root","") or die('Could not connect to db');
				$db = mysql_select_db("form") or die('Could not select databse');
				
				$query = "select count(*) from employee 
					      where username='$username'";
				
				$result =mysql_query($query,$con) or die("Could not run query");
				$count = mysql_result($result,0,0);
				if($count>0)
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
