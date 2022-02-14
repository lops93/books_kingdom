<?php
/**
*	  Código com as funções do sistema
* 	  @author Viviam Lopes Rodrigues
* 	  @package Books Kingdom/controller
* 	  @create  set/2021
 */
/* inclui arquivo com a conexão ao banco de dados */
require_once(dirname(__FILE__)."/config.php");

class Livro {
        private $table = "tbl_livros";
        
        //exibe os livros cadastrados no sistema
        //$con - recebe a conexão com o banco de dados
        function getData($con) {
                $query = "SELECT id, titulo , autor, editora, avaliacao, qtde_votos,preco
                FROM " . $this->table ." where genero is not null group by titulo";
                $result = $con -> query($query);
                $result = $result->fetch_all();
         
                return $result;
        }

        //registra a quantidade de livros cadastrados na base de dados
        function getQtde() {
            global $con;
            $query = "SELECT *
            FROM " . $this->table ." where genero is not null group by titulo";
            $result = $con->query($query);
            $num_rows = $result->num_rows;

            echo $num_rows;
        }
        
        //soma os votos de cada livro
        function getVotos() {
            global $con;
            $query = "SELECT sum(qtde_votos) as qtd
            FROM (select * from " . $this->table ." group by titulo) as tbl;";
            $result = $con->query($query);
            $row = $result->fetch_row();

            echo $row[0];

        }
         
        //calcula a percentagem de livros que possuem voto
         function getVotosRec() {
            global $con;
            $query = "select (select count(distinct titulo) from tbl_livros where qtde_votos > 0) / 
             (select count(distinct titulo) from tbl_livros)  * 100 as perc;";
            $result = $con->query($query);
            $row = $result->fetch_row();

            echo number_format($row[0],1).'%';;

        }
        
        //calcula a mádia de preço dos livros
        function getMedia() {
            global $con;
            $query = "select sum(preco)/count(preco) as qtd from tbl_livros;";
            $result = $con->query($query);
            $row = $result->fetch_row();

            echo  number_format($row[0],2);
        }
        
        //exibe o livro de maior valor
        function getMaxValor() {
            global $con;
            $query = "SELECT preco, titulo 
            FROM tbl_livros
            ORDER BY preco DESC 
            LIMIT 1";
            $result = $con->query($query);
            $row = $result->fetch_row();

            echo  "<td>".number_format($row[0],2)."</td>
            <td>".$row[1]."</td>";
        }

        //exibe o livro de menor valor
        function getMinValor() {
            global $con;
            $query = "SELECT preco, titulo 
            FROM tbl_livros
            where preco > 0
            ORDER BY preco 
            LIMIT 1";
            $result = $con->query($query);
            $row = $result->fetch_row();

            echo  "<td>".number_format($row[0],2)."</td>
            <td>".$row[1]."</td>";
        }

        /*insere od dados de um livro 
        cadastrado pelo usuario
        no banco de dados */
        function cad_livro(){
            global $con;
            $titulo = $_GET['titulo'];
            $autor = $_GET['autor'];
            $avaliacao = $_GET['avaliacao'];
            $qtde_votos = $_GET['qtde_votos'];
            $preco = $_GET['preco'];
            $genero = $_GET['genero'];
            $editora = $_GET['editora'];
            $nmro_de_paginas = $_GET['nmro_de_paginas'];
            $idioma = $_GET['idioma'];
            $descricao = $_GET['descricao'];
            $dt_publi = $_GET['dt_publi'];
    
            $query = "insert into  " . $this->table . " values
            (null, '".$titulo."','".$autor."',".$avaliacao.",".$qtde_votos.",".$preco.",'".$descricao."', '".$editora."', 
            ".$nmro_de_paginas.",'".$genero."','".$idioma."','".$dt_publi."');";
            $result = $con->query($query);
    
            if ($result) {
                echo "O livro ".$titulo." foi inserido na base de dados com sucesso";
            }
            else{
                echo "Houve um problema ao inserir o registro<br> ".mysqli_error($con);
            }
        }

        /*exibe a tabela da pagina de cadastro
        com opção de excluir os registros */
        function  getTblFuncoes($page){
            global $con;
                $reg_por_pag = 10; 
                 $start_from = ($page-1) * $reg_por_pag;     
                $query = "SELECT id, titulo, autor FROM " . $this->table . " LIMIT ".$start_from.",". $reg_por_pag;
                $result = $con->query($query);
                if($result){
                     while ($row = mysqli_fetch_array($result)) {
                     echo '<tr>
                     <td>'.$row["id"].'</td><td>'.$row["titulo"].'</td><td>'.$row["autor"].'</td>
                     <td><a class="delete" id="'.$row["id"].'" titulo="'.$row["titulo"].'"><i class="fas fa-trash-alt icon-red"></i></a></td>
                     </tr>'; }
                }else{
                    echo("Erro: " .mysqli_error($con));
                }
                echo '</tbody>
                     </table>
                     ';
                $query = "SELECT COUNT(*) FROM " . $this->table;     
                $rs_result = mysqli_query($con, $query);     
                $row = mysqli_fetch_row($rs_result);     
                $total_records = $row[0];     
          
                echo "</br>";     
                // Number of pages required.   
                $total_pages = ceil($total_records / $reg_por_pag);     
                 $pagLink = "";       
         echo '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if($page>=2){   
            echo "<li class='page-item'><a class='page-link' href='cad_livro.php?page=".($page-1)."'>  &laquo; </a></li>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= " <li class='page-item active'><a class = ' page-link' href='cad_livro.php?page="  
                                                .$i."'>".$i." </a></li>
                             <li class='page-item active'  aria-current='page'>";   
          }               
          else  {   
              $pagLink .= "<li class='page-item'><a class='page-link' href='cad_livro.php?page=".$i."'>   
                                                ".$i." </a></li>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<li class='page-item'><a class='page-link'  href='cad_livro.php?page=".($page+1)."'>  &raquo; </a></li>";   
        }   

        echo'</ul>
            </nav>';
    }

    //deleta um registro da base de dados
    function deleta_livro(){
        global $con;
        $query = "delete from " . $this->table . " 
        where id = '".$_GET['id']."';";
        $result = $con->query($query);

         if ($result) {
            echo "O Registro foi excluido com sucesso";
        }
        else{
            echo "Houve um problema ao inserir o registro<br> ".mysqli_error($con);
        }
    }
}

    ?>