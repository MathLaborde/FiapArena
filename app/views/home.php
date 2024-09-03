<link rel="stylesheet" href="/public/src/css/home.css">

<div class="main-content">
  <h1 class="main-title">Bem-vindo ao FIAP Arena</h1>

  <?php if (count($tournaments) > 0) { ?>
    <div class="carousel-container">
      <div class="carousel">

        <?php foreach ($tournaments as $tournament) { ?>

          <img
            class="carousel-thumbnail"
            alt="<?php echo htmlspecialchars($tournament['name']); ?>"
            src="data:image/jpeg;base64,<?php echo htmlspecialchars($tournament['short_image']); ?>"
            data-img="data:image/jpeg;base64,<?php echo htmlspecialchars($tournament['image']); ?>"
            data-id="<?php echo htmlspecialchars($tournament['id']); ?>"
            data-large-text="<?php echo htmlspecialchars($tournament['name']); ?>"
            data-text="<?php echo htmlspecialchars($tournament['description']); ?>" />
        <?php } ?>

      </div>

      <div class="display-area">
        <div class="display-container">
          <img
            src="./src/img/LeagueofLegends.png"
            alt="Imagem Selecionada"
            id="display-image" />
          <div class="text-container">
            <div class="large-text" id="image-large-text">League of legends</div>

            <div class="text" id="text">
              Duas equipes com 5 jogadores; controle do jogador, defesa do mapa e
              destruição do território inimigo
            </div>
            <a href="/tournament?id=<?php echo htmlspecialchars($tournament['id']); ?>" class="explore-button">
              <i class="fa-solid"></i>Explore</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

</div>

<script src="/public/src/js/home.js"></script>