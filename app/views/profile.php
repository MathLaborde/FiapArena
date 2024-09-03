<link rel="stylesheet" href="/public/src/css/profile.css" />
<div class="main-content">
  <div class="container-principal">
    <img
      src="<?php echo isset($user['banner']) ? 'data:image/jpeg;base64,' . $user['banner'] : '/public/src/img/banner.jpg' ?>"
      alt="Imagem de fundo"
      id="background-image" />


    <label for="edit-banner-profile" class="edit-background-button"><i class="fa-solid fa-pencil"></i> Editar Banner</label>
    <input type="file" style="visibility: hidden;" id="edit-banner-profile">

    <div class="content">
      <div class="profile-column">
        <div class="profile-circle">
          <img
            src="<?php echo isset($_SESSION['photo']) ? 'data:image/jpeg;base64,' . $_SESSION['photo'] : '/public/src/img/profile.jpg' ?>"
            alt="Foto de Perfil Cat"
            id="profile-picture" />
        </div>

        <label for="edit-photo-profile" class="edit-profile-button"><i class="fa-solid fa-pencil"></i> Editar foto de perfil</label>
        <input type="file" style="visibility: hidden;" id="edit-photo-profile">

      </div>

      <div class="profile-info">
        <div class="info-row">
          <div class="info-label">NOME :</div>
          <input
            class="info-field"
            value="<?php echo $_SESSION['name'] ?>"
            type="text"
            id="name"
            placeholder="Nome" />
        </div>

        <div class="info-row">
          <div class="info-label">CURSO :</div>
          <input
            class="info-field"
            value="<?php echo isset($user['curso']) ? $user['curso'] : '' ?>"
            type="text"
            id="course"
            placeholder="Curso" />
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form-container">
  <h1 class="title-password">Mudar senha:</h1>

  <input type="password" id="current-password" placeholder="Senha Atual" />
  <input type="password" id="new-password" placeholder="Alterar Senha" />
  <br />
  <!-- <input type="email" id="email" placeholder="Email" /> -->
  <br />
  <button class="cancel-button">Cancelar</button>
  <button class="submit-button" onclick="submitForm()">Enviar</button>
</div>

<script src="/public/src/js/profile.js"></script>
</body>

</html>