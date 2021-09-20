<?php include("src/controller/controller.php");?>
<!DOCTYPE html>
<html>
<?php include("src/ui/head.php");?>

<body>

  <?php include("src/ui/sidebar.php");?>
  <!-- Conteudo da Página -->
  <header>
    <h1>Books Kingdom</h1>
  </header>
  <div class="main">
    <div class="container-fluid">
      <!--informações -->
      <div class="row">
        <div class="col teste">
          <h3>Número de livros cadastrados</h3>
          <?php 
          $livro = new Livro();
          $livro->getQtde();      
          ?>
        </div>
        <div class="col teste">
        <h3>Número de votos no total</h3>
        <?php 
          $livro = new Livro();
          $livro->getVotos();      
          ?>
        </div>
        <div class="col teste">
          teste
        </div>
     </div>
      <!--gráfico-->
      <div class="row">
        <div class="col-md-6">
          <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-6">
          <canvas id="myChart2"></canvas>
        </div>     
     </div><br>
     <div class="row">
        <div class="col-md-6">
          <canvas id="myChart3"></canvas>
        </div>
        <div class="col-md-6">
          <h3>Dados estatisticos</h3>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">média de valores</th>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <th scope="row">menor valor</th>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <th scope="row">Maior valor</th>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
        </div>     
     </div>
    </div>
    <footer>
      <a href="sobre.html">Sobre nós</a>
    </footer>
  </div>

</body>

</html>