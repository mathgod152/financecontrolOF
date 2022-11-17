<?php 

    namespace FinanceControl\Controlers;

    class DependentesdadosControler{

        public function index(){

            if(isset($_POST['confirmar_dado'])){
                $id_usuario = $_SESSION['id'];
                if(isset($_POST['dado_adicionado'])){
                    $valor = isset($_POST['dado_adicionado']) ? $valor=$_POST['dado_adicionado'] : 0;
                    $id_dependente = isset($_POST['Dependente']) ? $id_dependente=$_POST['Dependente'] : 0;
                    if(($valor == 2)){
                        $nome_dado = $_POST['nome_dado'];
                        $valor_dado = $_POST['valor_dado'];
                        $data_dado = $_POST['data_dado'];
                        $registro = \FinanceControl\MySql::connect()->prepare("INSERT INTO tb_dividas_dependente VALUES (null,$id_usuario,?,?,?,?)");
                        $registro->execute(array($id_dependente,$nome_dado,$valor_dado,$data_dado));
                        \FinanceControl\Utilidades::alerta('Divida adicionado com sucesso');
                    }elseif(($valor == 1)){
                        $nome_dado = $_POST['nome_dado'];
                        $valor_dado = $_POST['valor_dado'];
                        $data_dado = $_POST['data_dado'];
                        $registro = \FinanceControl\MySql::connect()->prepare("INSERT INTO tb_saldo_dependente VALUES (null,$id_usuario,?,?,?,?)");
                        $registro->execute(array($id_dependente,$nome_dado,$valor_dado,$data_dado));
                        \FinanceControl\Utilidades::alerta('Saldo adicionado com sucesso');
                    }elseif(($valor == 3)){
                        $nome_dado = $_POST['nome_dado'];
                        $valor_dado = $_POST['valor_dado'];
                        $data_dado = $_POST['data_dado'];
                        $registro = \FinanceControl\MySql::connect()->prepare("INSERT INTO tb_entradas_dependente VALUES (null,$id_usuario,?,?,?,?)");
                        $registro->execute(array($id_dependente,$nome_dado,$valor_dado,$data_dado));
                        \FinanceControl\Utilidades::alerta('Entrada adicionado com sucesso');
                }
                
            }
            }
            \FinanceControl\Views\MainView::render('dependentesdados');
              
        }
    }

?>