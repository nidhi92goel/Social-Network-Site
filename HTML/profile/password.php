<?php
session_start();
?>

<?php
$connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

if (mysqli_connect_errno())
	echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();
if (isset($_POST['submit'])) {
$old_password = mysqli_real_escape_string($connection, $_POST['old_password']);
$new_password = mysqli_real_escape_string($connection, $_POST['new_password']);
$new_password_check = mysqli_real_escape_string($connection, $_POST['new_password_second']);

$query_old = "SELECT password from accounts where userID = '{$_SESSION['userID']}'";
$password_database = mysqli_query($connection, $query_old);
if($old_password != mysqli_fetch_assoc($password_database)['password']){
	echo '<script language="javascript">';	
	echo 'window.location.href = "profile.php";';
	echo 'alert("The old password does not match.");';
	echo '</script>';
	exit();

}
if ($new_password !=$new_password_check)
 {
	echo '<script language="javascript">';	
	echo 'window.location.href = "profile.php";';
	echo 'alert("The two passwords you input do not match.");';
	echo '</script>';
	exit();
 }
 if($new_password == $new_password_check && strlen($new_password) < 6){
	echo '<script language="javascript">';	
 	echo 'window.location.href = "profile.php";';
	echo 'alert("The new password is too short.");';
	echo '</script>';
	exit();
 }

$query = "UPDATE accounts SET password = '$new_password' where userID = '{$_SESSION['userID']}'";
if (!mysqli_query($connection, $query)) {
	die('Error: ' . mysqli_error($connection));
}
else {
	echo '<script language="javascript">';
	echo 'window.location.href = "profile.php";';
	echo 'alert("Password successfully changed!");';
	echo '</script>';
	exit();
}
}

?>
