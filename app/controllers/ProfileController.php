<?php

class ProfileController
{
  public function index()
  {
    require_once __DIR__ . '/../models/UserModel.php';

    $user = new User();

    $user = $user->getDAta();

    require_once __DIR__ . '/../views/profile.php';
  }

  public function changePhoto()
  {

    if (!isset($_FILES['image'])) {
      die('{ "success": false, "message": "Arquivo invalido"}');
    }

    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    $allowed_extensions = array('png', 'jpg', 'jpeg');

    if (!in_array($image_ext, $allowed_extensions)) {
      die('{ "success": false, "message": "Formato de imagem não permitido."}');
    }

    $maxSize = 10 * 1024 * 1024;

    if ($image_size > $maxSize) {
      die('{ "success": false, "message": "Imagem muito grande. A imagem deve ter no máximo 10MB."}');
    }

    $imgData = file_get_contents($image_tmp_name);
    $base64Img = base64_encode($imgData);

    require_once __DIR__ . '/../models/UserModel.php';

    $user = new User();

    $result = $user->changePhoto($base64Img);

    if ($result) {
      die('{ "success": true, "message": "Imagem alterada com sucesso."}');
    }
    die('{ "success": false, "message": "Falha ao alterar a imagem."}');
  }

  public function changeBanner()
  {

    if (!isset($_FILES['banner'])) {
      die('{ "success": false, "message": "Arquivo invalido"}');
    }

    $image_name = $_FILES['banner']['name'];
    $image_size = $_FILES['banner']['size'];
    $image_tmp_name = $_FILES['banner']['tmp_name'];

    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    $allowed_extensions = array('png', 'jpg', 'jpeg');

    if (!in_array($image_ext, $allowed_extensions)) {
      die('{ "success": false, "message": "Formato de imagem não permitido."}');
    }

    $maxSize = 10 * 1024 * 1024;

    if ($image_size > $maxSize) {
      die('{ "success": false, "message": "Imagem muito grande. A imagem deve ter no máximo 10MB."}');
    }

    $imgData = file_get_contents($image_tmp_name);
    $base64Img = base64_encode($imgData);

    require_once __DIR__ . '/../models/UserModel.php';

    $user = new User();

    $result = $user->changeBanner($base64Img);

    if ($result) {
      die('{ "success": true, "message": "Banner alterado com sucesso."}');
    }
    die('{ "success": false, "message": "Falha ao alterar o banner."}');
  }

  public function edit()
  {
    $name = $_POST['name'];
    $course = $_POST['course'];

    require_once __DIR__ . '/../models/UserModel.php';

    $user = new User();

    $result = $user->edit($name, $course);

    if ($result) {
      die('{ "success": true, "message": "Dados alterados com sucesso."}');
    } else {
      die('{ "success": false, "message": "Falha ao alterar dados."}');
    }
  }

  public function password()
  {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    require_once __DIR__ . '/../models/UserModel.php';

    $user = new User();

    $result = $user->password($currentPassword, $newPassword);

    if ($result) {
      die('{ "success": true, "message": "Senha alterada com sucesso."}');
    } else {
      die('{ "success": false, "message": "Senha atual errada."}');
    }
  }
}
