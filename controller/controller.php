<?php
require_once './model/model.php';

class Controller
{
  public $model;
  public function __construct()
  {
    $model = new Model();
    $this->model = $model;
    $model->createDB();
    $model->createTable();
  }
  public function processContact($firstName, $lastName, $email, $phone, $address)
  {
    return $this->model->createModel($firstName, $lastName, $email, $phone, $address);
    exit;
  }

  public function processGetAll()
  {
    if (isset($_POST['show'])) {
      $data1 =  $this->model->getAllModel();
      include 'view/listContact.php';
    }
  }
}
