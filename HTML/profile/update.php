<?php
session_start();
?>

<?php
$connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

if (mysqli_connect_errno())
	echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();
if (isset($_POST['submit'])) {
$name = mysqli_real_escape_string($connection, $_POST['name']);
$lastname = mysqli_real_escape_string($connection, $_POST['surname']);
$birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
$gender = mysqli_real_escape_string($connection, $_POST['gender']);
$privacy_birthday = mysqli_real_escape_string($connection,$_POST['privacy_birthday']);
$privacy_email = mysqli_real_escape_string($connection,$_POST['privacy_email']);
$privacy_gender = mysqli_real_escape_string($connection,$_POST['privacy_gender']);


$query = "UPDATE users SET name='$name', surname='$lastname', birthday='$birthday',gender='$gender' where userID = '{$_SESSION['userID']}'";
$query_privacy_bday = "UPDATE user_settings SET status='$privacy_birthday' where userID = '{$_SESSION['userID']}' and settingID = '1'";
$query_privacy_email = "UPDATE user_settings SET status='$privacy_email' where userID = '{$_SESSION['userID']}' and settingID = '2'";
$query_privacy_gender = "UPDATE user_settings SET status='$privacy_gender' where userID = '{$_SESSION['userID']}' and settingID = '3'";

if (!mysqli_query($connection, $query) || !mysqli_query($connection, $query_privacy_email) || !mysqli_query($connection, $query_privacy_gender) || !mysqli_query($connection, $query_privacy_bday)) {
	die('Error: ' . mysqli_error($connection));
}
else {
	echo '<script language="javascript">';
	echo 'window.location.href = "profile.php"';
	echo '</script>';
	exit();
}
}

?>
