<?php

class TournamentController
{
  public function index()
  {
    // Renderiza a view
    require_once __DIR__ . '/../views/tournament.php';
  }

  public function new()
  {
    // Renderiza a view
    require_once __DIR__ . '/../views/newTournament.php';
  }

  public function store()
  {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $rules = $_POST['rules'];
    $award = $_POST['award'];

    if (strlen($name) <= 0) {
      header("Location: createEvent.php?error=Favor preencher o nome!");

      return;
    }

    if (strlen($description) <= 0) {
      header("Location: createEvent.php?error=Favor preencher a descrição!");
      return;
    }

    if (strlen($rules) <= 0) {
      header("Location: createEvent.php?error=Favor preencher as regras!");
      return;
    }

    if (strlen($award) <= 0) {
      header("Location: createEvent.php?error=Favor preencher a premiação!");
      return;
    }

    try {
      $imgPath = $_FILES['img']['tmp_name'];
      $imgData = file_get_contents($imgPath);
      $base64Img = base64_encode($imgData);

      $shortImgPath = $_FILES['short-img']['tmp_name'];
      $shortImgData = file_get_contents($shortImgPath);
      $base64ShortImg = base64_encode($shortImgData);

      require_once __DIR__ . '/../models/TournamentModel.php';

      $tournament = new Tournament();

      $result = $tournament->store($name, $description, $base64Img, $base64ShortImg, $rules, $award, $_SESSION['id']);

      if ($result) {
        header("Location: /tournament/new/?success=true");
        exit();
      }

      header("Location: /tournament/new/?error=Falha ao criar torneio");
    } catch (\Throwable $th) {
      header("Location: /tournament/new/?error=Falha ao criar torneio");
    }
  }
}
