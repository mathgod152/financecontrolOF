<?php
    namespace FinanceControl;
    class Application
    {
        private $controler;

        private function setApp(){
            $loadname = 'FinanceControl\Controlers\\';
            $url = explode('/',@$_GET['url']);

            if($url[0] == ''){
                $loadname.='Home';
            }else {
                $loadname.=ucfirst(strtolower($url[0]));
            }

            $loadname.='Controler';

            if(file_exists($loadname.'.php')){
                $this->controler = new $loadname();
            }else{
                include('Views/pages/404.php');
                die();
            }




        }

        public function run(){
            $this->setApp();
            $this->controler->index();
        }
        
    }
    


?>