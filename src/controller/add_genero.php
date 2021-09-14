<?php
require_once("config.php");
include("controller.php");

$livro = new Livro();
$livro->show_qde($con);

?>