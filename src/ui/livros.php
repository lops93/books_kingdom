<?	
/**
*	  Página que contem todos os registros
*     armazenados na base de dados tbl_livros
* 	  @author Viviam Lopes Rodrigues
* 	  @package Books Kingdom/ui
* 	  @create  set/2021
 */?>
<!DOCTYPE html>
<html>
<!--  inclui a configuração da página html da tag head-->
<?php include("../../src/ui/head.php");?>
<body>
    <!--  inclui o menu lateral com os links -->
    <?php include("../../src/ui/sidebar.php");?>
      <!-- Conteudo da Página -->
    <header>
        <h1>Livros Cadastrados</h1>
    </header>
    <div class="main">
        <!-- Tabela para visualização dos dados -->
        <table id="tbl_livro" class="table table-striped table-bordered tbl_livro" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>   
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Nota</th>
                    <th>Nº de votos</th>
                    <th>Preço</th>
                </tr>
            </thead>  
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>