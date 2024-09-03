<?php

require_once 'Database.php';

class User
{
  private $conn;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->connect();
  }

  public function getData()
  {
    $email = $_SESSION['email'];
    $sql_consulta = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql_consulta);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function changePhoto($file)
  {
    $_SESSION['photo'] = $file;

    $sql = "UPDATE users SET photo=:photo WHERE :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':photo', $file);
    $stmt->bindParam(':id', $_SESSION['id']);

    // Executa a query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function changeBanner($file)
  {

    $sql = "UPDATE users SET banner=:banner WHERE :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':banner', $file);
    $stmt->bindParam(':id', $_SESSION['id']);

    // Executa a query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function edit($name, $curso)
  {
    $sql = "UPDATE users SET name=:name, curso=:curso WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':curso', $curso);
    $stmt->bindParam(':id', $_SESSION['id']);

    // Executa a query
    if ($stmt->execute()) {
      $_SESSION['name'] = $name;

      return true;
    }

    return false;
  }

  public function password($currentPassword, $newPassword)
  {
    $sql = "SELECT password FROM users WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':id', $_SESSION['id']);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($currentPassword, $data['password'])) {

      $sql = "UPDATE users SET password = :password WHERE id = :id";

      $stmt = $this->conn->prepare($sql);

      $hash = password_hash($newPassword, PASSWORD_BCRYPT);

      $stmt->bindParam(':password', $hash);
      $stmt->bindParam(':id', $_SESSION['id']);
      $stmt->execute();

      return true;
    }

    return false;
  }
}
