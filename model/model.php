<?php
require 'connect.php';

class Model
{
  public $conn;
  public function __construct()
  {
    $this->conn = Connect();
  }

  public function createDB()
  {
    $sql = "CREATE DATABASE IF NOT EXISTS information";
    mysqli_query($this->conn, $sql);
  }
  public function createTable()
  {
    $sqlTable = "CREATE TABLE IF NOT EXISTS contacts (
      id INT(6) UNSIGNED AUTO_INCREMENT primary key,
      firstName VARCHAR(20) NOT NULL,
      lastName VARCHAR(20) NOT NULL,
      email VARCHAR(30) NOT NULL,
      phone INT(10) NOT NULL,
      address VARCHAR(40)
    )";
    $this->conn->query($sqlTable) === true;
  }

  public function createModel($firstName, $lastName, $email, $phone, $address)
  {
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($address)) {
      return "All fields are required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return "Invalid email format.";
    }
    if (
      !is_numeric($phone) || strlen((string)$phone) !== 10
    ) {
      return "Invalid phone number.";
    }
    $sqlAdd = "INSERT INTO contacts (firstName, lastName, email, phone, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sqlAdd);
    if (!$stmt) {
      return "Database error: " . $this->conn->error;
    }
    $stmt->bind_param("sssis", $firstName, $lastName, $email, $phone, $address);
    if (!$stmt->execute()) {
      return "Error adding contact: " . $stmt->error;
    }
    return "Contact added successfully.";
  }

  public function getAllModel()
  {
    $sql_show = "SELECT * FROM contacts";
    $query = mysqli_query($this->conn, $sql_show);
    $data = [];
    $count = 0;
    $row = $query->fetch_all(MYSQLI_ASSOC);
    if (count($row) > 0) {
      while ($count < count($row)) {
        $contacts = new stdClass();
        $contacts->id = $row[$count]['id'];
        $contacts->lastName = $row[$count]['lastName'];
        $contacts->firstName = $row[$count]['firstName'];
        $contacts->email = $row[$count]['email'];
        $contacts->phone = $row[$count]['phone'];
        $contacts->address = $row[$count]['address'];
        $data[] = $contacts;
        $count++;
      }
    }
    return $data;
  }

  public function deleteModel($id)
  {
    $sql_del = "DELETE FROM contacts WHERE id = $id ";
    mysqli_query($this->conn, $sql_del);
  }

  public function updateModel($idUpdate, $editFirstName, $editLastName, $editEmail, $editPhone, $editAddress)
  {
    $sql_update = "UPDATE contacts SET firstName = '$editFirstName', lastName = '$editLastName', email = '$editEmail', phone ='$editPhone', address = '$editAddress' WHERE id = $idUpdate";
    return mysqli_query($this->conn, $sql_update);
  }
}
