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

  // public function createModel($firstName, $lastName, $email, $phone, $address)
  // {
  //   $sqlAdd = "INSERT INTO contacts(firstName, lastName, email, phone, address) VALUES ('$firstName', '$lastName', '$email', '$phone',' $address')";
  //   mysqli_query($this->conn, $sqlAdd);
  // }

  public function createModel($firstName, $lastName, $email, $phone, $address)
  {
    // Kiểm tra tính hợp lệ của dữ liệu
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($address)) {
      return "All fields are required.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return "Invalid email format.";
    }

    // Validate phone (assuming it should be numeric and 10 digits)
    if (
      !is_numeric($phone) || strlen((string)$phone) !== 10
    ) {
      return "Invalid phone number.";
    }

    // Sử dụng prepared statement để tránh SQL injection
    $sqlAdd = "INSERT INTO contacts (firstName, lastName, email, phone, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sqlAdd);

    // Kiểm tra lỗi prepare
    if (!$stmt) {
      return "Database error: " . $this->conn->error;
    }

    // Bind parameters và thực thi truy vấn
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

    if (mysqli_fetch_row($query) > 0) {
      while ($row = mysqli_fetch_array($query)) {
        $contacts = new stdClass();
        $contacts->id = $row['id'];
        $contacts->lastName = $row['lastName'];
        $contacts->firstName = $row['firstName'];
        $contacts->email = $row['email'];
        $contacts->phone = $row['phone'];
        $contacts->address = $row['address'];
        $data[] = $contacts;
      }
    }
    return $data;
  }
}
