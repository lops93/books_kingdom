<?php
require_once("config.php");
include("controller.php");

$del = new Livro();
$del->deleta_livro();
?>