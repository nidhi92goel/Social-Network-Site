<?php
session_start();
?>

<?php
$connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

if (mysqli_connect_errno())
	echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();

if(isset($_POST['submit']))
{
	
    $content=file_get_contents($_FILES['imgInput']['tmp_name']);
	$content=mysqli_real_escape_string($connection,$content);

	$query = "UPDATE users SET photo = '{$content}'  where userID = '{$_SESSION['userID']}'";
	if (!mysqli_query($connection, $query)) {
        die('Error: ' . mysqli_error($connection));
      }
    
      else {
  //       echo '<script language="javascript">';
		// echo 'window.location.href = "profile.php"';
		// echo '</script>';
  //       exit();
      }
}




?>