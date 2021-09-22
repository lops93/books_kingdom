<?php
require_once(dirname(__FILE__)."/config.php");

class Livro {
        private $table = "tbl_livros";
        public $log = "../log/dados.log";
        

        function getData($con) {
                $query = "SELECT id, titulo , autor, editora, avaliacao, qtde_votos,preco
                FROM " . $this->table ." where genero is not null group by titulo";
                $result = $con -> query($query);
                $result = $result->fetch_all();
         
                return $result;
        }

        
        function getQtde() {
            global $con;
            $query = "SELECT *
            FROM " . $this->table ." where genero is not null group by titulo";
            $result = $con->query($query);
            $num_rows = $result->num_rows;

            echo $num_rows;
        }

        function getVotos() {
            global $con;
            $query = "SELECT sum(qtde_votos) as qtd
            FROM (select * from " . $this->table ." group by titulo) as tbl;";
            $result = $con->query($query);
            $row = $result->fetch_row();

            echo $row[0];

        }

         function getVotosRec() {
            global $con;
            $query = "select (select count(distinct titulo) from tbl_livros where qtde_votos > 0) / 
             (select count(distinct titulo) from tbl_livros)  * 100 as perc;";
            $result = $con->query($query);
            $row = $result->fetch_row();

            echo number_format($row[0],1).'%';;

        }

        function getMedia() {
            global $con;
            $query = "select sum(preco)/count(preco) as qtd from tbl_livros;";
            $result = $con->query($query);
            $row = $result->fetch_row();

            echo  number_format($row[0],2);
        }

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

        function add_company($con){
            $empresa = $_GET['empresa'];
            $cnpj = $_GET['cnpj'];
            $setor = $_GET['setor'];
            $plano = $_GET['plano'];
            $dt_inicio = $_GET['data_inicio'];
    
            $query = "insert into  " . $this->table . " values(null, '".$cnpj."','".$empresa."','".$setor."',".$plano.",'".$dt_inicio."',null );";
    
            $result = $con->query($query);
    
            if ($result === TRUE) {
                echo "A empresa ".$empresa." foi inserida na base de clientes com sucesso";
                $log_dados = new Report();
                $log_dados->log_dados($query);
            }
            else{
                echo "Houve um problema ao inserir o registro<br> ".mysqli_error($con);
            }
        }

        function log_dados($texto,$bAppend=true){
                if($bAppend){
                    file_put_contents($this->log, $texto.PHP_EOL,FILE_APPEND);
                }
                else{
                    file_put_contents($this->log, $texto.PHP_EOL);
                }
            }
}

function  select_plan($con){
        $qplano = "SELECT * FROM plano";
        $result = $con->query($qplano);
        if($result){
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="'.$row["cod_plano"].'">'.$row["nome_plano"].'</option>';
            }
        }else{
            echo("Erro: " .mysqli_error($con));
        }
    }

    ?>