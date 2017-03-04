<?php
session_start();
?>

<?php
$connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

if (mysqli_connect_errno())
    echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();
if (isset($_POST['submit'])) {
$content = mysqli_real_escape_string($connection, $_POST['blogcontent']);
$description = mysqli_real_escape_string($connection,$_POST['description']);
$title = mysqli_real_escape_string($connection, $_POST['blogTitle']);
$privacy = mysqli_real_escape_string($connection,$_POST['privacy_blog']);

$query = "INSERT INTO blog_posts (title, content, description, access_rights, blogID) VALUES ('$title','$content','$description','$privacy', '{$_SESSION['blogID']}')";

if (!mysqli_query($connection, $query)) {
    die('Error: ' . mysqli_error($connection));
}
else {
    echo '<script language="javascript">';
    echo 'window.location.href = "blog.php"';
    echo '</script>';
    exit();
}
}

?>