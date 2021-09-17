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
  $query = "select count(distinct(titulo)) as qtde_titulo,count(qtde_votos) as votos, RIGHT(dt_publi,5) as ano from tbl_livros 
  where RIGHT(dt_publi,5) <> 186
  group by RIGHT(dt_publi,5) ;";

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