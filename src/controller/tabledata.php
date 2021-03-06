<?php
/**
*	  Exibe os dados na tabela de livros
* 	  @author Viviam Lopes Rodrigues
* 	  @package Books Kingdom/controller
* 	  @create  set/2021
 */
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