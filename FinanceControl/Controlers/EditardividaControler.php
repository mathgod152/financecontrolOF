<?php 

    namespace FinanceControl\Controlers;

    class EditardividaControler{

        public function index(){

            if(isset($_POST['confirmar_dado'])){
                if(isset($_POST['dado_adicionado'])){
                    $valor = isset($_POST['dado_adicionado']) ? $valor=$_POST['dado_adicionado'] : 0;
                    $id= isset($_POST['Dado']) ? $id=$_POST['Dado'] : 0;
                    if(($valor == 1)){
                        $nome_dado = $_POST['nome_dado'];
                        $valor_dado = $_POST['valor_dado'];
                        $data_dado = $_POST['data_dado'];
                        $registro = \FinanceControl\MySql::connect()->prepare("UPDATE tb_dividas_fixas SET nome_dividaF = ?, valor_dividasF = ?, data_incremento_dividasF = ? WHERE id = $id");
                        $registro->execute(array($nome_dado, $valor_dado, $data_dado));
                        \FinanceControl\Utilidades::alerta('Divida editado com sucesso');
                    }elseif(($valor == 2)){
                        $registro = \FinanceControl\MySql::connect()->prepare("DELETE FROM tb_dividas_fixas WHERE id = ?");
                        $registro->execute(array($id));
                        \FinanceControl\Utilidades::alerta('Divida deletada com sucesso');
                    }
                
            }
            }
            \FinanceControl\Views\MainView::render('editardivida');
              
        }
    }

?>