<?php
header('Content-Type: application/json');
include_once('config.php');

if ( isset($_GET["grafico1"])=='1' ) {
  $query = "select titulo, qtde_votos
  from tbl_livros where genero is not null group by titulo order by qtde_votos desc limit 10;";

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
  $query = "select genero, sum(qtde_votos) as qtde_votos
  from tbl_livros where genero <> 'none' and genero is not null
  group by genero order by qtde_votos desc limit 5;";

$result = $con->query($query);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}
$result->close();

$con->close();

print json_encode($data);
}

if ( isset($_GET["grafico3"])=='1' ) {
  $query = "select distinct(titulo), preco, qtde_votos
  from tbl_livros where genero <> 'none' order by preco desc limit 10;";

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