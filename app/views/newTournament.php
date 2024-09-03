<link rel="stylesheet" href="/public/src/css/newTournament.css" />
<link
  href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css"
  rel="stylesheet" />

<section class="main">
  <div>
    <h1 class="main-title">NOVO TORNEIO</h1>
  </div>
  <form class="tournament" enctype="multipart/form-data" id="tournament" action="/tournament/store" method="POST">
    <div>
      <label for="tournament-name">Nome do torneio</label>
      <input
        class="input"
        placeholder="Nome do torneio"
        id="tournament-name"
        name="name"
        type="text" />
      <span class="error" hidden>Favor Preencher o campo</span>
    </div>
    <div>
      <label for="tournament-text">Breve descrição</label>
      <textarea
        class="input"
        placeholder="A descrição é..."
        id="tournament-description"
        name="description"
        rows="4"></textarea>
      <span class="" hidden>Favor Preencher o campo</span>
    </div>
    <div>
      <label for="tournament-text">Imagem</label>
      <input
        class="input"
        id="tournament-img"
        name="img"
        accept="image/*"
        type="file" />
      <span class="" hidden>Favor Preencher o campo</span>
    </div>
    <div>
      <label for="tournament-text">Banner</label>
      <input
        class="input"
        id="tournament-img"
        name="short-img"
        accept="image/*"
        type="file" />
      <span class="" hidden>Favor Preencher o campo</span>
    </div>
    <div>
      <label for="tournament-rules">Regras</label>
      <div class="input" id="tournament-rules" type="text"></div>
      <erspanror class="" hidden>Favor Preencher o campo</erspanror>
    </div>
    <div>
      <label for="tournament-award">Premiação</label>
      <div class="input" id="tournament-award" type="text"></div>
      <span class="" hidden>Favor Preencher o campo</span>
    </div>

    <div class="btn-div">
      <button class="btn btn-cancelar">Cancelar</button>
      <button class="btn btn-salvar">Salvar</button>
    </div>
  </form>

</section>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="/public/src/js/newTournament.js"></script>