<?php 

    namespace FinanceControl\Controlers;

    class DependenteControler{

        public function index(){

            if(isset($_POST['confirmar_dependente'])){
                $id_usuario = $_SESSION['id'];
                $nome_dependente = $_POST['nome_dependente'];
                $registro = \FinanceControl\MySql::connect()->prepare("INSERT INTO tb_dependentes VALUES (null,$id_usuario,?)");
                $registro->execute(array($nome_dependente));
                \FinanceControl\Utilidades::alerta('Registrado com sucesso');
                }
                \FinanceControl\Views\MainView::render('dependente');
            }

              
        }

?>