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

  public function getParticipants($id)
  {

    $query = 'SELECT
        u.name,
        u.photo
      FROM
        participants p
      INNER JOIN tournament t ON p.id_tournament = t.id
      INNER JOIN users u ON p.id_user = u.id
      WHERE t.id = :id';

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function participant($id, $user)
  {
    $sql = "INSERT INTO participants (`id_tournament`, `id_user`) 
                              VALUES (:id,  :user)";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':user', $user);

    // Executa a query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
