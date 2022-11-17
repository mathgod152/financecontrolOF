<?php 

    namespace FinanceControl\Controlers;

    class HomeControler{
        
        public function index(){

            if(isset($_GET['loggout'])){
                session_unset();
                session_destroy();
                \FinanceControl\Utilidades::redirect(INCLUDE_PATH);
                
            }

            if(isset($_SESSION['login'])){
                $id_usuario = $_SESSION['id'];
                //Renderiza a home do usuário.
                if(isset($_POST['confirmar_dado'])){
                    if(isset($_POST['dado_adicionado'])){
                        $valor = isset($_POST['dado_adicionado']) ? $valor=$_POST['dado_adicionado'] : 0;
                        if(($valor == 2)){
                            $nome_dado = $_POST['nome_dado'];
                            $valor_dado = $_POST['valor_dado'];
                            $data_dado = $_POST['data_dado'];
                            $registro = \FinanceControl\MySql::connect()->prepare("INSERT INTO tb_dividas_fixas VALUES (null,$id_usuario,?,?,?)");
                            $registro->execute(array($nome_dado,$valor_dado,$data_dado));
                            \FinanceControl\Utilidades::alerta('Divida adicionado com sucesso');
                            \FinanceControl\Utilidades::redirect(INCLUDE_PATH);
                        }elseif(($valor == 1)){
                            $nome_dado = $_POST['nome_dado'];
                            $valor_dado = $_POST['valor_dado'];
                            $data_dado = $_POST['data_dado'];
                            $registro = \FinanceControl\MySql::connect()->prepare("INSERT INTO tb_entradas_fixas VALUES (null,$id_usuario,?,?,?)");
                            $registro->execute(array($nome_dado,$valor_dado,$data_dado));
                            \FinanceControl\Utilidades::alerta('Renda adicionado com sucesso');
                            \FinanceControl\Utilidades::redirect(INCLUDE_PATH);
                        }elseif(($valor == 3)){
                            $nome_dado = $_POST['nome_dado'];
                            $valor_dado = $_POST['valor_dado'];
                            $data_dado = $_POST['data_dado'];
                            $registro = \FinanceControl\MySql::connect()->prepare("INSERT INTO tb_saldo_usuario VALUES (null,$id_usuario,?,?,?)");
                            $registro->execute(array($nome_dado,$valor_dado,$data_dado));
                            \FinanceControl\Utilidades::alerta('Saldo adicionado com sucesso');
                            \FinanceControl\Utilidades::redirect(INCLUDE_PATH);
                        }
                    }
                    
                }
            \FinanceControl\Views\MainView::render('home');

            }else{
                //Retorna para criar conta

                if(isset($_POST['login'])){
					$login = $_POST['email'];
					$senha = $_POST['senha'];

                    //verificar no banco de dados

                    $verifica = \FinanceControl\MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
					$verifica->execute(array($login));

                    if($verifica->rowCount() == 0){
						//Não existe o usuário!
						\FinanceControl\Utilidades::alerta('Não existe nenhum usuário com este e-mail...');
						\FinanceControl\Utilidades::redirect(INCLUDE_PATH);
                    }else{
                        $dados = $verifica->fetch();
                        $senhaBanco = $dados['senha'];
                        if(\FinanceControl\Bcrypt::check($senha,$senhaBanco)){
                            //usuario logado com sucesso
                            
                            $_SESSION['login'] = $dados['email'];
                            $_SESSION['id'] = $dados['id'];
                            $_SESSION['nome'] = explode(' ',$dados['nome'])[0];

                            \FinanceControl\Utilidades::alerta('Logado com sucesso!');
							\FinanceControl\Utilidades::redirect(INCLUDE_PATH);

                        }else{
                            \FinanceControl\Utilidades::alerta('Senha incorreta....');
							\FinanceControl\Utilidades::redirect(INCLUDE_PATH);
                        }
                    }

                }

                \FinanceControl\Views\MainView::render('login');

            }
        }

    }

        
    
?>