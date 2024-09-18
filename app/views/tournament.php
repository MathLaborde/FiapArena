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
  <div id="box-teamsrules" class="box-teamsrules">
    <h1 class="teams-award"><?php echo $tournament['rules'] ?></h1>
  </div>

  <div id="box-teams-createby" class="box-teams-createby show">
    <div class="main-teams">
      <h1>Participantes</h1>

      <ul>
        <?php if (count($participants) > 0) { ?>
          <?php foreach ($participants as $participant) { ?>
            <li>
              <img src="<?php echo $participant['photo'] === '' || $participant['photo'] == null ? 'http://localhost/public/src/img/profile.jpg' : 'data:image/jpeg;base64,' . $participant['photo'] ?>" alt="">
              <p><?php echo $participant['name'] ?></p>
            </li>
          <?php } ?>
        <?php } else { ?>
          <li>Nenhum participante cadastrado.</li>
        <?php } ?>
      </ul>

      <a class="invite-button" href="/tournament/participant?id=<?php echo $tournament['id'] ?>">Participar</a>
    </div>
  </div>

  <div id="box-teamsaward" class="box-teamsaward">
    <h1 class="teams-award"><?php echo $tournament['award'] ?></h1>
  </div>

</div>


<script src="/public/src/js/tournament.js"></script>