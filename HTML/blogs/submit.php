<?php
session_start();
?>

<?php
$connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

if (mysqli_connect_errno())
    echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();
if (isset($_POST['submit'])) {
$content = mysqli_real_escape_string($connection, $_POST['blogcontent']);
$title = mysqli_real_escape_string($connection, $_POST['blogTitle']);

$query = "UPDATE blog_posts SET title = '$title', content = '$content' where postID = '{$_SESSION['postID']}'";

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