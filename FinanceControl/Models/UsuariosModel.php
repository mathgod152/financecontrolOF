<?php
    namespace FinanceControl\Models;
   
    class UsuariosModel{
        
        public static function emailExist($email){
            $pdo = \FinanceControl\MySql::connect();
            $verificar = $pdo->prepare("SELECT email FROM usuarios WHERE email = ?");
            $verificar->execute(array($email));

            if($verificar->rowCount() == 1){
                //email existe.
                return true;
            }else{
                return false;
            }

        }

    }
        


    
?>