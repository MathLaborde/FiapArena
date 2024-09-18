<?php

require_once 'Database.php';

class Login
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Método para inserir um novo aluno
    public function store($nome, $email, $senha)
    {

        $hashed_password = password_hash($senha, PASSWORD_BCRYPT);
        // VERIFICAR SE O EMAIL JA EXISTE
        $sql_consulta = "SELECT * FROM users WHERE email = :email ";
        $stmt_email = $this->conn->prepare($sql_consulta);
        $stmt_email->bindParam(':email', $email);
        $stmt_email->execute();
        $dados = $stmt_email->fetchAll(PDO::FETCH_ASSOC);


        if (count($dados) > 0) {
            header('Location: /login/register?error=Email já em uso, favor usar outro email ou fazer a recupeação de senha!');
        } else {
            // EXECUTANDO A QUERY
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hashed_password);

            if ($stmt->execute()) {
                header('Location: /login/register?success=Usuario criado com sucesso!');
            } else {
                header('Location: /login/register?error=Erro ao criar usuario!');
            }
        }
    }

    public function login($email, $password)
    {
        //BUSCAR USUÁRIO
        $sql_consulta = "SELECT id, email, name, password, photo FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql_consulta);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($dados) > 0) {


            if (password_verify($password, $dados[0]['password'])) {
                $_SESSION['email'] = $email;

                $_SESSION['id'] = $dados[0]['id'];
                $_SESSION['email'] = $dados[0]['email'];
                $_SESSION['name'] = $dados[0]['name'];
                $_SESSION['photo'] = $dados[0]['photo'];

                header('Location: /home');
                exit;
            } else {
                header('Location: /?error=Email ou senha incorreta');
                exit;
            }
        } else {
            header('Location: /?error=Email ou senha incorreta');
            exit;
        }
    }
}
