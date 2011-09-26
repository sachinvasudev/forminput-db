
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
					<p id="occupation" class="toptext">
				Occupation
			</p></td>
					<td>
					<select name="occupation">
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
						<p id="address" class="toptext">
						Address
						</p>
				</td>
				
				
				<td>
					<textarea name="address" rows="5" cols="25"></textarea>
					
				</td>
				
				<tr>
					<td>
						<p id="status" class="toptext">
							Status
						</p>
					</td>
							
					<td>
						<select name="status">
							<option value="">-Select-</option>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						</select>
					</td>

				</tr>
				
				<tr>
					
					<td>
						<input type="reset" value"Reset" name="reset"/>
					</td>
					
					<td>
						<input type="submit" value="Submit" name="submit"/>
					</td>
					
				</tr>
			
			
			
			
			
			
		

			
			
			</table>
			</form>
			
			<?php
			if (isset($_POST['submit'])) 
			
			{
				$name=addslashes(htmlspecialchars($_POST['Name']));
				$age=$_POST['Age'];
				$occpn=addslashes($_POST['occupation']);
				$addrs=addslashes((nl2br(htmlspecialchars($_POST['address']))));
				$status = $_POST['status'];
				
				$con = mysql_connect("localhost","root","") or die('Could not connect to db');
				$db = mysql_select_db("form") or die('Could not select databse');
				
				
				$query = "INSERT INTO employee (name,age,occupation,address,status)
						 VALUES
(						 '$name','$age','$occpn','$addrs','$status')";

				mysql_query($query,$con) or die("Could not run query");
				
				mysql_close($con);
				header('Location: view.php');
				
				
					
				echo 'Name:'.$name.'</br>';
				echo 'Age:'.$age.'</br>';
				echo 'Occupation:'.$occpn.'</br>';
				echo 'Address:<br/>'.$addrs.'</br>';
				//echo nl2br(htmlspecialchars($addrs));

			}
		?>

			
			<script>
				window.onload=document.getElementById("name").focus();
			</script>
			</body>

			<script type="text/javascript" src="validate.js"></script>

			</html>
