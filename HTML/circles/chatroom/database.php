<?php
  $connection = mysqli_connect("localhost:3306", "root", "", "group30");

  if (mysqli_connect_errno())
    echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();

?>