<?php
include_once("controller.php");

$livro = new Livro();
$tblData = $livro->getData($con);
$count = count($tblData);

$data = array(
  'draw'=>1, 
  'recordsTotal'=>intval($count), 
  'recordsFiltered'=>intval($count), 
  'data'=>$tblData,
);
//send data as json format
echo json_encode($data);

?>