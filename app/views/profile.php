<link rel="stylesheet" href="/public/src/css/profile.css" />
<div class="main-content">
  <div class="container-principal">
    <img
      src="/public/src/img/banner.jpg"
      alt="Imagem de fundo"
      id="background-image" />
    <button class="edit-background-button" onclick="editBackground()">
      <i class="fa-solid fa-pencil"></i> Editar Fundo
    </button>

    <div class="content">
      <div class="profile-column">
        <div class="profile-circle">
          <img
            src="/public/src/img/profile.jpg"
            alt="Foto de Perfil Cat"
            id="profile-picture" />
        </div>

        <button class="edit-profile-button" onclick="editProfile()">
          <i class="fa-solid fa-pencil"></i> Editar foto de perfil
        </button>
      </div>

      <div class="profile-info">
        <div class="info-row">
          <div class="info-label">NOME :</div>
          <input
            class="info-field"
            type="text"
            id="name"
            placeholder="Nome" />
        </div>

        <div class="info-row">
          <div class="info-label">CURSO :</div>
          <input
            class="info-field"
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