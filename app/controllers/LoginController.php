<?php

class LoginController
{
  public function index()
  {
    // Renderiza a view
    require_once __DIR__ . '/../views/login.php';
  }
  public function store()
  {
    require_once __DIR__ . '/../models/LoginModel.php';
    $login = new Login();

    $nome = $_POST['userAcc'];
    $email = $_POST['emailAcc'];
    $senha = $_POST['passwordAcc'];

    $login->store($nome, $email, $senha);
  }
  public function login()
  {
    require_once __DIR__ . '/../models/LoginModel.php';
    $login = new Login();

    $email = $_POST['email'];
    $senha = $_POST['password'];

    $login->login($email, $senha);
  }
  public function forgot()
  {
    require_once __DIR__ . '/../views/forgotPassword.php';
  }
  public function register()
  {
    require_once __DIR__ . '/../views/register.php';
  }
}
