<?php 

    namespace FinanceControl\Controlers;

    class EditardividadependentesControler{

        public function index(){

            if(isset($_POST['confirmar_dado'])){
                if(isset($_POST['dado_adicionado'])){
                    $valor = isset($_POST['dado_adicionado']) ? $valor=$_POST['dado_adicionado'] : 0;
                    $id= isset($_POST['Dado']) ? $id=$_POST['Dado'] : 0;
                    if(($valor == 1)){
                        $nome_dado = $_POST['nome_dado'];
                        $valor_dado = $_POST['valor_dado'];
                        $data_dado = $_POST['data_dado'];
                        $registro = \FinanceControl\MySql::connect()->prepare("UPDATE tb_dividas_dependente SET nome_divida_dependente = ?, valor_divida_dependente = ?, data_divida_dependente = ? WHERE id = $id");
                        $registro->execute(array($nome_dado, $valor_dado, $data_dado));
                        \FinanceControl\Utilidades::alerta('Divida Dependente editada com sucesso');
                    }elseif(($valor == 2)){
                        $registro = \FinanceControl\MySql::connect()->prepare("DELETE FROM tb_dividas_dependente WHERE id = ?");
                        $registro->execute(array($id));
                        \FinanceControl\Utilidades::alerta('Divida Dependente deletado com sucesso');
                    }
                
            }
            }
            \FinanceControl\Views\MainView::render('editardividadependentes');
              
        }
    }

?>