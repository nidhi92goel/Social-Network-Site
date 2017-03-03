<?php
session_start();
?>

<?php
$connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

if (mysqli_connect_errno())
	echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();


	$query = "UPDATE users SET photo = NULL  where userID = '{$_SESSION['userID']}'";
	mysqli_query($connection, $query);
	if (!mysqli_query($connection, $query)) {
        die('Error: ' . mysqli_error($connection));
      }
      else {
        echo '<script language="javascript">';
		echo 'window.location.href = "profile.php"';
		echo '</script>';
		mysql_close($connection);
        exit();
      }

	?>