<?php

  if (isset($_POST['submit'])) {
    // $user = mysqli_real_escape_string($connection, $_POST['user']);
    // $message = mysqli_real_escape_string($connection, $_POST['message']);

    // date_default_timezone_set('Europe/London');
    // $time = date('Y-m-d h:i:s', time());

    // if (!isset($user) || $user == '' || !isset($message) || $message == '') {
    //   $error = "Please fill in your name and a message";
    //   header("Location: index.php?error=" . urlencode($error));
    //   exit();
    // }
    // else {
    //   $query = "INSERT INTO messages (user, message, time) 
    //             VALUES ('$user', '$message', '$time')";
    //   if (!mysqli_query($connection, $query)) {
    //     die('Error: ' . mysqli_error($connection));
    //   }
    //   else {
        header('Location: ../album.php');
        exit();
      }
    }
  }
?>