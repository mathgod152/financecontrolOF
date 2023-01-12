<?php 

    namespace FinanceControl\Controlers;

    class ServicoControler{

        public function index(){

            \FinanceControl\Views\MainView::render('servico');
              
        }

    }

?>