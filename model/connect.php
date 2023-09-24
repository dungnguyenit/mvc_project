<?php
function Connect()
{
  $server = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'information';

  $conn = new mysqli($server, $user, $password, $database);
  if (isset($conn)) {
    mysqli_query($conn, "SET_NAMES 'utf8'");
    return $conn;
  }
  else{
    echo 'loi ket noi database';
  }
}
