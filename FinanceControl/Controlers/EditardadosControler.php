<?php 

    namespace FinanceControl\Controlers;

    class EditardadosControler{

        public function index(){

            if(isset($_POST['confirmar_dado'])){
                $id_usuario = $_SESSION['id'];
                if(isset($_POST['dado_adicionado'])){
                    $valor = isset($_POST['dado_adicionado']) ? $valor=$_POST['dado_adicionado'] : 0;
                    $id= isset($_POST['Dado']) ? $id=$_POST['Dado'] : 0;
                    if(($valor == 1)){
                        $nome_dado = $_POST['nome_dado'];
                        $valor_dado = $_POST['valor_dado'];
                        $data_dado = $_POST['data_dado'];
                        $registro = \FinanceControl\MySql::connect()->prepare("UPDATE tb_saldo_usuario SET nome_saldo = ?, valor_saldo_usuario = ?, data_incremento_saldo = ? WHERE id = $id");
                        $registro->execute(array($nome_dado, $valor_dado, $data_dado));
                        \FinanceControl\Utilidades::alerta('Saldo adicionado com sucesso');
                    }elseif(($valor == 2)){
                    }
                
            }
            }
            \FinanceControl\Views\MainView::render('editardados');
              
        }
    }

?>