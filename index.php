
<html>
	<head>
		<title> Student Registration </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body>
		<form method="post" action="index.php" name="regist" onsubmit="return validate2();"enctype="multipart/form-data">
			<p class="toptext">
				Name
			</p>
			<td>
				
			<input type="text" maxlength="40" name= "Name"/>
			
			&nbsp;</td>
			
			<p class="toptext">
				Age
			</p>
			
			<input type="text" class="num" maxlength="3" size="20" name="Age"/>
			
			<p id="occupation" class="toptext">
				Occupation
			</p>
			
			<select name="occupation">
				<option value="">-Select-</option>
				<option value="Doctor">Doctor</option>
				<option value="Engineer">Engineer</option>
				<option value="Teacher">Teacher</option>
				<option value="Lawyer">Lawyer</option>
			</select>
			
			<p id="address" class="toptext">
				Address
			</p>
			
			<textarea name="address" rows="5" cols="25"></textarea>

			<br/>

			<input type="reset" value"Reset" name="reset"/>

			<input type="submit" value="Submit" name="submit"/>

			</form>
			
			<?php
			if (isset($_POST['submit'])) 
			
			{
				$name=$_POST['Name'];
				$age=$_POST['Age'];
				$occpn=$_POST['occupation'];
				$addrs=nl2br($_POST['address']);

				echo 'Name:'.$name.'</br>';
				echo 'Age:'.$age.'</br>';
				echo 'Occupation:'.$occpn.'</br>';
				echo 'Address:<br/>'.$addrs.'</br>';
				//echo nl2br(htmlspecialchars($addrs));

			}
		?>

			

			</body>

			<script type="text/javascript" src="validate.js"></script>

			</html>
