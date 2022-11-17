<?php 

    namespace FinanceControl\Controlers;

    class SobreControler{

        public function index(){

            \FinanceControl\Views\MainView::render('servico');
              
        }

    }

?>