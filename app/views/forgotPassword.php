<!DOCTYPE html>
<html lang="pt=br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Esqueceu a senha?</title>
  <link rel="icon" href="/public/src/img/MiniLogo.png" />

  <!-- CSS -->
  <link rel="stylesheet" href="/public/src/css/reset.css" />
  <link rel="stylesheet" href="/public/src/css/forgotPassword.css" />

  <!-- SweetAlert2 -->
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
  <div class="main-forgot">
    <div class="left-forgot">
      <h2>Esqueceu sua senha?<br>Não se preocupre, iremos te ajudar!</h2>
      <img src="/public/src/img/forgot.svg" alt="">
    </div>

    <div class="right-forgot" id="passwordDiv">
      <div class="card-forgot">

        <h2>Solicite a redefinição de senha</h2>
        <h3>Informe seu email abaixo:</h3>

        <form action="" id="forget-form" method="post">
          <label for="email">Email:</label>
          <input type="email" id="emailPass" name="emailPass" required>
          <button class="btn-forgot">Obter Código</button>
        </form>
        <p>
          ** Você receberá um código de verificação por e-mail. Insira esse código na tela seguinte. Verifique se seu e-mail está correto e corresponde à conta que deseja recuperar.
        </p>



      </div>
    </div>

  </div>


  <script src="/public/src/js/forgotPassword.js"></script>

</body>

</html>