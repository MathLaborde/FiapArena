<?php

require_once 'Database.php';

class Tournament
{
  private $conn;

  public $id;
  public $name;
  public $age;
  public $class;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->connect();
  }

  // Método para obter todos os alunos
  public function getAll()
  {
    $query = 'SELECT * FROM tournament';
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Método para inserir um novo aluno
  public function store($name, $description, $base64Img, $base64ShortImg, $rules, $award, $user)
  {

    $sql = "INSERT INTO `tournament` (`name`, `description`, `image`, `short_image`, `rules`, `award`, `create_by`) 
                              VALUES (:name,  :description,  :image,  :short_image,  :rules,  :award,  :create_by)";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $base64Img);
    $stmt->bindParam(':short_image', $base64ShortImg);
    $stmt->bindParam(':rules', $rules);
    $stmt->bindParam(':award', $award);
    $stmt->bindParam(':create_by', $user);

    // Executa a query
    if ($stmt->execute()) {
      return $this->conn->lastInsertId();
    }

    return false;
  }

  public function getById($id)
  {
    $query = 'SELECT * FROM tournament WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
