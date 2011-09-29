<?php
if(file_exists("functions.inc"))
require_once("functions.inc");

else
	{
		echo "<div style='text-align:center;color:red;font-size:24px'>Fatal Error. Contact Webmaster</div>";
		die();
	}


session_start();
if($_SESSION['type']=="employee")
{
$con = dbConnect();
updateHistory($_SESSION['username'],$con);

}
session_unset();
header("Location: index.php");
die();


?>