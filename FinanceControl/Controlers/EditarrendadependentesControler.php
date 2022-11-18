<?php 

    namespace FinanceControl\Controlers;

    class EditarrendadependentesControler{

        public function index(){

            if(isset($_POST['confirmar_dado'])){
                if(isset($_POST['dado_adicionado'])){
                    $valor = isset($_POST['dado_adicionado']) ? $valor=$_POST['dado_adicionado'] : 0;
                    $id= isset($_POST['Dado']) ? $id=$_POST['Dado'] : 0;
                    if(($valor == 1)){
                        $nome_dado = $_POST['nome_dado'];
                        $valor_dado = $_POST['valor_dado'];
                        $data_dado = $_POST['data_dado'];
                        $registro = \FinanceControl\MySql::connect()->prepare("UPDATE tb_entradas_dependente SET nome_entrada_dependente = ?, valor_entrada_dependente = ?, data_entrada_dependente = ? WHERE id = $id");
                        $registro->execute(array($nome_dado, $valor_dado, $data_dado));
                        \FinanceControl\Utilidades::alerta('Renda Dependente editada com sucesso');
                    }elseif(($valor == 2)){
                        $registro = \FinanceControl\MySql::connect()->prepare("DELETE FROM tb_entradas_dependente WHERE id = ?");
                        $registro->execute(array($id));
                        \FinanceControl\Utilidades::alerta('Renda Dependente deletado com sucesso');
                    }
                
            }
            }
            \FinanceControl\Views\MainView::render('editarrendadependentes');
              
        }
    }

?>