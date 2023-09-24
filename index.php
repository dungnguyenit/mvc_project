<link rel="stylesheet" href="./style/globalStyle.css">
<link rel="stylesheet" href="./style/add.css">

<?php
require './controller/controller.php';
$controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['btn'])) {
    require './view/index.php';
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $controller->processContact($firstName, $lastName, $email, $phone, $address);
  } elseif ($_POST['show']) {
    $controller->processGetAll();
  }
} else {
  require './view/index.php';
}
?>