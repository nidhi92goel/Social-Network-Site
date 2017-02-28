<?php
session_start();
?>

<?php
$connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

if (mysqli_connect_errno())
	echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();

if(isset($_POST['photo']))
{
	$file_content = addslashes(file_get_contents($_FILES[$_POST['photo']]));
	$query = "UPDATE users SET photo = '$file_content'  where userID = '{$_SESSION['userID']}'";
	mysqli_query($connection, $query);
	if (!mysqli_query($connection, $query)) {
        die('Error: ' . mysqli_error($connection));
      }
      else {
        echo '<script language="javascript">';
		echo 'window.location.href = "profile.php"';
		echo '</script>';
        exit();
      }
}
else{
	echo '<script language = "javascript">';
	echo 'alert("Please choose an image!)';
	echo '</script>';
	exit();
}

}

?>