<?php

class HomeController
{
  public function index()
  {
    // Renderiza a view

    require_once __DIR__ . '/../models/TournamentModel.php';

    $tournamentObj = new Tournament();

    $tournaments = $tournamentObj->getAll();

    require_once __DIR__ . '/../views/home.php';
  }
}
