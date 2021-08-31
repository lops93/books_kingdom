<?php
header('Content-Type: application/json');
include_once('config.php');

if ( isset($_GET["grafico1"])=='1' ) {
  $query = "select nome_plano, round(sum(valor),2) as valor from empresas_cadastradas 
inner join plano on plano_contratado = cod_plano group by nome_plano;";

$result = $con->query($query);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}
$result->close();

$con->close();

print json_encode($data);
}

if ( isset($_GET["grafico2"])=='1' ) {
  $query = "select setor_empresa, round(sum(valor),2) as valor from empresas_cadastradas 
  inner join plano on plano_contratado = cod_plano group by setor_empresa;";

$result = $con->query($query);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}
$result->close();

$con->close();

print json_encode($data);
}

?>