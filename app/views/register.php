<!DOCTYPE html>
<html lang="pt=br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registre-se</title>
  <link rel="icon" href="/public/src/img/MiniLogo.png" />

  <!-- CSS -->
  <link rel="stylesheet" href="/public/src/css/reset.css" />
  <link rel="stylesheet" href="/public/src/css/register.css" />

  <!-- JS & SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
  <div class="main-register">
    <div class="left-register">
      <h2>Vimos que você é novo por aqui.<br>Crie sua conta agora mesmo! <br> E venha fazer parte da nossa plataforma!</h2>
      <img src="/public/src/img/register.svg" alt="">
    </div>

    <div class="right-register" id="account">
      <div class="card-register">

        <h2>Crie sua conta</h2>

        <form action="/login/store" id="register" class="register" method="post">
          <h3>Informe seus dados</h3>
          <div>
            <label for="usuario">Usuário:</label>
            <input type="text" name="userAcc" id="userAcc" />
          </div>

          <div>
            <label for="email">Email:</label>
            <input type="email" name="emailAcc" id="emailAcc" />
          </div>

          <div>
            <label for="confirm-email">Confirme seu email:</label>
            <input type="email" name="cmailAcc" id="cmailAcc" />
          </div>

          <div id="emailBox"></div>

          <div>
            <label for="senha">Senha:</label>
            <input type="password" name="passwordAcc" id="passwordAcc" />
          </div>

          <div id="passwordBox"></div>

          <div>
            <label for="confirm-senha">Confirme sua senha:</label>
            <input type="password" name="cpasswordAcc" id="cpasswordAcc" />
          </div>

          <div id="passwordBox2"></div>

          <button class="btn-register" type="submit">Criar Conta</button>
        </form>

      </div>
    </div>

  </div>


  <script src="/public/src/js/register.js"></script>
</body>

</html>