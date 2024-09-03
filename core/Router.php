<?php
function route($uri, $callback)
{
  $requestedUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

  if ($uri === $requestedUri) {
    $callback();
    exit;
  }
}

function layout($controller, $action = 'index')
{
  $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

  require_once __DIR__ . '/../app/views/layout/header.php';

  $controller->$action();

  require_once __DIR__ . '/../app/views/layout/footer.php';
}


route('', function () {
  require_once __DIR__ . '/../app/controllers/LoginController.php';
  $controller = new LoginController();

  $controller->index();
});

route('home', function () {
  require_once __DIR__ . '/../app/controllers/HomeController.php';
  $controller = new HomeController();

  layout($controller);
});

route('tournament', function () {
  require_once __DIR__ . '/../app/controllers/TournamentController.php';
  $controller = new TournamentController();

  layout($controller);
});

route('tournament/new', function () {
  require_once __DIR__ . '/../app/controllers/TournamentController.php';
  $controller = new TournamentController();

  layout($controller, 'new');
});

route('tournament/store', function () {
  require_once __DIR__ . '/../app/controllers/TournamentController.php';
  $controller = new TournamentController();

  $controller->store();
});

route('ranking', function () {
  require_once __DIR__ . '/../app/controllers/RankingController.php';
  $controller = new RankingController();

  layout($controller);
});

route('profile', function () {
  require_once __DIR__ . '/../app/controllers/ProfileController.php';
  $controller = new ProfileController();

  layout($controller);
});

// Caso a rota não seja encontrada
http_response_code(404);
echo "404 - Página não encontrada";
