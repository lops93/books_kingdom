<?php 
/**
*	  Página com o formulário de inclusão
*     de registros na base de dados tbl_livros
*     e com uma tabela que possibilita excluir
*     qualquer livro da base.
* 	  @author Viviam Lopes Rodrigues
* 	  @package Books Kingdom/ui
* 	  @create  set/2021
 */
/* inclusão da página com as funções da aplicação */
include("../../src/controller/controller.php");
/*número da pagina referente a tabela que o usuário esta acessando */
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }   
        ?>
<!DOCTYPE html>
<html>
 <!--  inclui a configuração da página html da tag head-->
<?php include("head.php");?>

<body>
<!--  inclui o menu lateral com os links -->
    <?php include("sidebar.php");?>
<!-- Conteudo da Página -->
    <header>
        <h1>Cadastro de Livros</h1>
    </header>
    <div class="main">
        <div class="row">
                   <!--Formulario -->
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                        <input type="text" class="form-control form-cadastro" id="titulo">
                    </div>
                    <div class="form-group">
                        <label for="autor" class="col-sm-2 col-form-label">Autor</label>
                        <input type="text" class="form-control form-cadastro" maxlength="100" id="autor">
                    </div>
                    <div class="form-group">
                        <label for="avaliacao" class="col-sm-2 col-form-label">Avaliação</label>
                        <input type="range" class="form-control form-cadastro" min="0" max="5" step="0.1" id="avaliacao" onchange="rangeInfo.value=value">
                        <output id="rangeInfo">2.5</output>
                    </div>
                    <div class="form-group">
                        <label for="qtde_votos" class="col-sm-2 col-form-label">Quantidade de votos</label>
                        <input type="number" class="form-control form-cadastro" id="qtde_votos">
                    </div>
                    <div class="form-group">
                        <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                        <input type="number" class="form-control form-cadastro" id="preco">
                    </div>
                    <div class="form-group">
                        <label for="genero" class="col-sm-2 col-form-label">Genero</label>
                         <input type="text" class="form-control form-cadastro" id="genero">
                    </div>
                    <div class="form-group">
                        <label for="editora" class="col-sm-2 col-form-label">Editora</label>
                        <input type="text" class="form-control form-cadastro" maxlength="100" id="editora">
                    </div>
                    <div class="form-group">
                        <label for="nmro_de_paginas" class="col-sm-2 col-form-label">Número de Páginas</label>
                        <input type="number" class="form-control form-cadastro" maxlength="100" id="nmro_de_paginas">
                    </div>
                    <div class="form-group">
                        <label for="idioma" class="col-sm-2 col-form-label">Idioma</label>
                        <input type="text" class="form-control form-cadastro" maxlength="100" id="idioma">
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                        <textarea class="form-control form-cadastro" id="descricao"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dt_publi " class="col-sm-2 col-form-label">Data da Publicação</label>
                        <input type="date" class="form-control form-cadastro" id="dt_publi">
                    </div>
                    <button class="btn btn-success" id="btn-save">Salvar</button>
                    </div>
                </div><br><br><hr>
                <!-- Tabela com opção de excluir registros -->
                <table id="tbl_livro_dados" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>deletar</th>
                </tr>
            </thead>
            <tbody>
        <!-- chama o metódo da classe livro responsavel por mostrar os dados da tabela -->
             <?php
              $show_tbl= new Livro();
              $show_tbl->getTblFuncoes($page);
             ?>
             </div>


</body>
</html>
