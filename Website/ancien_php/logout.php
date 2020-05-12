<?php
// *** Logout the current user.
$logoutGoTo = "index.php";
if (!isset($_SESSION)) {
  session_start();
}
include('firebase.php');

$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "")
{

	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root","","locknest");
	// Select Database
	mysqli_select_db( $con,"locknest");
	// Specify the query to Insert Record
	
	// execute query
	mysqli_close ($con);
header("Location: $logoutGoTo");

exit;
}


?>

<!DOCTYPE >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
