<?php
require_once("config.php");
include("controller.php");

$add = new Report();
$add->add_company($con);

?>