<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "fiaparena";

try {
  // Create a new PDO connection
  $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

  // Set PDO to throw exceptions for errors
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  // Handle connection failure
  die("A conexão falhou: " . $e->getMessage());
}
