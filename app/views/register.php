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
  <script src="/public/src/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
    rel="stylesheet" /> -->

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
  <div class="main-register">
    <div class="left-register">
      <h2>Vimos que você é novo por aqui.<br>Crie sua conta agora mesmo! <br> E venha fazer parte da nossa plataforma!</h2>
      <img src="/public/src/img/register.svg" alt="">
    </div>

    <div class="right-register" id="account">
      <div class="card-register">

        <h2>Crie sua conta</h2>

        <form action="/login/store" id="register" method="post">
          <h3>Informe seus dados</h3>
          <label for="usuario">Usuário:</label>
          <input type="text" name="userAcc" id="userAcc" />

          <label for="email">Email:</label>
          <input type="email" name="emailAcc" id="emailAcc" />

          <label for="confirm-email">Confirme seu email:</label>
          <input type="email" name="cmailAcc" id="cmailAcc" />

          <div id="emailBox"></div>

          <label for="senha">Senha:</label>
          <input type="password" name="passwordAcc" id="passwordAcc" />

          <div id="passwordBox"></div>

          <label for="confirm-senha">Confirme sua senha:</label>
          <input type="password" name="cpasswordAcc" id="cpasswordAcc" />

          <div id="passwordBox2"></div>

          <div class="check">
            <input type="checkbox" name="termoAcc" id="termoAcc" style="width: 13px; height: 13px" />
            <label for="termos" style="color: #000">Li e aceito os <a href="#">termos</a></label>
          </div>

          <button class="btn-register" type="submit">Criar Conta</button>
        </form>

      </div>
    </div>

  </div>

</body>

</html>