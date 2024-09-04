<?php

session_start();

function route($uri, $callback)
{
  $requestedUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
  $openRouters = ['', 'login', 'login/store', 'login/forgot'];

  if (in_array($uri, $openRouters)) {
    if ($uri === $requestedUri) {
      $callback();
      exit;
    }
  }

  if ($uri === $requestedUri && isset($_SESSION['id']) && $_SESSION['id'] > 0) {
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

route('login/store', function () {
  require_once __DIR__ . '/../app/controllers/LoginController.php';
  $controller = new LoginController();

  $controller->store();
});

route('login', function () {
  require_once __DIR__ . '/../app/controllers/LoginController.php';
  $controller = new LoginController();

  $controller->login();
});

route('login/forgot', function () {
  require_once __DIR__ . '/../app/controllers/LoginController.php';
  $controller = new LoginController();

  $controller->forgot();
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

route('profile/photo/edit', function () {
  require_once __DIR__ . '/../app/controllers/ProfileController.php';
  $controller = new ProfileController();

  $controller->changePhoto();
});

route('profile/banner/edit', function () {
  require_once __DIR__ . '/../app/controllers/ProfileController.php';
  $controller = new ProfileController();

  $controller->changeBanner();
});

route('profile/edit', function () {
  require_once __DIR__ . '/../app/controllers/ProfileController.php';
  $controller = new ProfileController();

  $controller->edit();
});

route('profile/password', function () {
  require_once __DIR__ . '/../app/controllers/ProfileController.php';
  $controller = new ProfileController();

  $controller->password();
});

route('logout', function () {
  session_destroy();
  header('Location: /');
});

header('Location: /');
