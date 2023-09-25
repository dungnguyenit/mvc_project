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
  } elseif (isset($_POST['delete'])) {
    $idToDelete = ($_POST['delete']);
    $result = $controller->deleteContact($idToDelete);
    header('location: index.php');
  } elseif (isset($_POST['update'])) {
    if (isset($_POST['saveUpdate'])) {
      $idUpdate = ($_POST['update']);
      $editFirstName = $_POST['editFirstName'];
      $editLastName = $_POST['editLastName'];
      $editEmail = $_POST['editEmail'];
      $editPhone = $_POST['editPhone'];
      $editAddress = $_POST['editAddress'];
      $controller->updateContact($idUpdate, $editFirstName, $editLastName, $editEmail, $editPhone, $editAddress);
    }
  } elseif (isset($_POST['show'])) {
    $controller->processGetAll();
  }
} else {
  require './view/index.php';
}
?>