<?php 

    namespace FinanceControl\Controlers;

    class EditardadosControler{

        public function index(){

            if(isset($_POST['confirmar_dado'])){
                $id_usuario = $_SESSION['id'];
                if(isset($_POST['confirmar'])){
                    $valor = isset($_POST['confirmar']) ? $valor=$_POST['confirmar'] : 0;
                    $id= isset($_POST['Dado']) ? $id=$_POST['Dado'] : 0;
                    if(($valor == 1)){
                        \FinanceControl\Utilidades::redirect('editarrenda');
                    }elseif(($valor == 2)){
                        \FinanceControl\Utilidades::redirect('editardivida');
                    }elseif(($valor == 3)){
                        \FinanceControl\Utilidades::redirect('editarsaldo');;
                    }
                
            }
            }
            \FinanceControl\Views\MainView::render('editardados'); 
        }
    }

?>