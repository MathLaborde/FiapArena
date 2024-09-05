<link rel="stylesheet" href="/public/src/css/tournament.css" />
<div class="main-content">
  <div class="image-background">
  <div class="text-overlay">
<!-- Inseção de dados com php -->
<h1 class="main-title"><?php echo $tournament['name'] ?></h1>
<div class="align-arrow">
        <div class="down-arrow"></div>
  </div>
<p class="main-description"><?php echo $tournament['description'] ?></p>

  </div>

    <!-- <img src="/public/src/img/fundo.jpg" alt="plano de fundo" /> -->

    <!-- Exemplo de imagem base64, basicamente vc tem que adicionar data:image/jpeg;base64, antes de imprimir o valor do base64-->
    <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($tournament['image']); ?>" alt="plano de fundo" />
  </div>
</div>

<div class="bottons">
  <div id="show-rules" class="btn btn1">Ver regras</div>
  <div id="show-participants" class="btn btn2">Ver Participantes</div>
  <div id="show-award" class="btn btn3">Ver premiação</div>
</div>

<div class="informations">
  <div id="box-teamsaward" class="box-teamsaward">
    <h1 class="teams-award"><?php echo $tournament['award'] ?></h1>
  </div>

  <div id="box-teamsrules" class="box-teamsrules">
    <h1 class="teams-award"><?php echo $tournament['rules'] ?></h1>
  </div>

  <div id="box-teams-createby" class="box-teams-createby">
  <a href="https://www.fiap.com.br/" class="invite-button">Convidar amigos</a>
</div>

</div>


<script src="/public/src/js/tournament.js"></script>