<?php 

    namespace FinanceControl\Controlers;

    class RegistrarControler{

        public function index(){

            if(isset($_POST['registrar'])){
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    \FinanceControl\Utilidades::alerta('E-mail Inválido');
                    \FinanceControl\Utilidades::redirect(INCLUDE_PATH.'registrar');

                }else if(strlen($senha) < 5){
                    \FinanceControl\Utilidades::alerta('Sua senha é curta, use no minimo 5 caracteris');
                    \FinanceControl\Utilidades::redirect(INCLUDE_PATH.'registrar');
                }elseif(\FinanceControl\Models\UsuariosModel::emailExist($email)){
                    \FinanceControl\Utilidades::alerta('E-mail já cadastrado');
                    \FinanceControl\Utilidades::redirect(INCLUDE_PATH.'registrar');
                }else{
                    //registrar o usuário.
                    $senha = \FinanceControl\Bcrypt::hash($senha);
                    $registro = \FinanceControl\MySql::connect()->prepare("INSERT INTO usuarios VALUES (null,?,?,?)");
                    $registro->execute(array($nome,$email,$senha));
                    \FinanceControl\Utilidades::alerta('Registrado com sucesso');
                    \FinanceControl\Utilidades::redirect(INCLUDE_PATH);
                }

            }

            \FinanceControl\Views\MainView::render('registrar');
              
        }

    }

?>