<?php
require_once("config.php");
include("controller.php");

$add = new Livro();
$add->cad_livro($con);
?>