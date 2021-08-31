<!DOCTYPE html>
<html>
<?php include("../../src/ui/head.php");?>
<body>
    <?php include("../../src/ui/sidebar.php");?>
    <header>
        <h1>Livros Cadastrados</h1>
    </header>
    <div class="main">
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