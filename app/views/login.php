<!DOCTYPE html>
<html lang="pt=br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="icon" href="/public/src/img/MiniLogo.png" />

  <!-- CSS -->
  <link rel="stylesheet" href="/public/src/css/reset.css" />
  <link rel="stylesheet" href="/public/src/css/login.css" />

  <!-- JS & SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- FONTES -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Bungee&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="main-login">
    <div class="left-login">
      <h2>Saudações!!<br>Venha descobrir e se divertir em nossa plataforma.</h2>
      <img src="/public/src/img/login.svg" alt="">
    </div>

    <div class="right-login">
      <div class="card-login">
        <h2>Bem Vindo(a)!<br>Acesse nossa plataforma</h2>
        <form action="/login" id="login" method="post">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
          <br>
          <label for="password">Senha:</label>
          <input type="password" id="password" name="password" required>
          <br><br>
          <button class="btn-login" type="submit">Entrar</button>
        </form>

        <a href="/login/forgot">Esqueceu a sua senha?</a>
        <a href="/login/register">Criar uma conta</a>
      </div>
    </div>

  </div>


  <script src="/public/src/js/login.js"></script>
</body>

</html>