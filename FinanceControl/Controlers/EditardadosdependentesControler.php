<?php 

    namespace FinanceControl\Controlers;

    class EditardadosdependentesControler{

        public function index(){

            if(isset($_POST['confirmar_dado'])){
                if(isset($_POST['confirmar'])){
                    $valor = isset($_POST['confirmar']) ? $valor=$_POST['confirmar'] : 0;
                    $id= isset($_POST['Dado']) ? $id=$_POST['Dado'] : 0;
                    if(($valor == 1)){
                        \FinanceControl\Utilidades::redirect('editardependentes');
                    }elseif(($valor == 2)){
                        \FinanceControl\Utilidades::redirect('editarrendadependentes');
                    }elseif(($valor == 3)){
                        \FinanceControl\Utilidades::redirect('editardividadependentes');
                    }elseif(($valor == 4)){
                        \FinanceControl\Utilidades::redirect('editarsaldodependentes');;
                    }
                
            }
            }
            \FinanceControl\Views\MainView::render('editardadosdependentes'); 
        }
    }

?>