<?php 

    namespace FinanceControl\Controlers;

    class EditardependentesControler{

        public function index(){

            if(isset($_POST['confirmar_dado'])){
                if(isset($_POST['dado_adicionado'])){
                    $valor = isset($_POST['dado_adicionado']) ? $valor=$_POST['dado_adicionado'] : 0;
                    $id= isset($_POST['Dado']) ? $id=$_POST['Dado'] : 0;
                    if(($valor == 1)){
                        $nome_dado = $_POST['nome_dado'];
                        $registro = \FinanceControl\MySql::connect()->prepare("UPDATE tb_dependentes SET nome_dependente = ? WHERE id = $id");
                        $registro->execute(array($nome_dado));
                        \FinanceControl\Utilidades::alerta('Dependente editado com sucesso');
                    }elseif(($valor == 2)){
                        $registro = \FinanceControl\MySql::connect()->prepare("DELETE FROM tb_dependentes WHERE id = ?");
                        $registro->execute(array($id));
                        \FinanceControl\Utilidades::alerta('Dependente deletado com sucesso');
                    }
                
            }
            }
            \FinanceControl\Views\MainView::render('editardependentes');
              
        }
    }

?>