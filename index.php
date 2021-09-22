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
      <div class="col">
        <h4>Dashboard para análise de dados</h4>
      </div>
      <!--informações -->
      <div class="row">
        <div class="col cards card-blue">
          <h4>Total de Livros </h4>
          <?php 
          $livro = new Livro();
          $livro->getQtde();      
          ?>
        </div>
        <div class="col cards card-pink">
        <i class="fas fa-chart-bar"></i>
        <h4>Total de Votos</h4>
        <?php 
          $livro = new Livro();
          $livro->getVotos();      
          ?>
        </div>
        <div class="col cards card-lemon">
          <i class="fas fa-percentage"></i>
          <h4>Percentagem de votos</h4>
          <?php 
            $livro = new Livro();
            $livro->getVotosRec();      
          ?>
          <br><span>*percentagem de livros que possuem votos</span>
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
        <!-- Tabela -->
        <div class="col-md-6 dashboard">
          <h3>Dados estatisticos</h3>
          <br>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">média de valores</th>
                <td>
                  <?php $livro = new Livro();
                  $livro->getMedia();?> </td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <th scope="row">menor valor</th>
                  <?php $livro = new Livro();
                  $livro->getMinValor();?> 
              </tr>
              <tr>
                <th scope="row">Maior valor</th>
                <?php $livro = new Livro();
                $livro->getMaxValor();?> 
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