        <!--header-->
        <header class="header">
            <div class="header_container">
              <div class="none"> </div>
     
     
              <div class="user">
                <div class="icon">
                  <i class="fa-solid fa-gear"></i>
                  <a href="<?php echo INCLUDE_PATH?>?loggout">
                    <i class="fa-solid fa-right-to-bracket"></i>
                  </a>
                </div><!--icon-->
     
                <div class="img">
                  <img src="avatar.jpeg" alt="">
                </div><!--IMG-->
              </div><!--user-->    
            <div class="toggle">
                <i class="fa-solid fa-bars" id="header-toggler"></i>
            </div><!--"toggle"-->
        </div><!--header_container-->
    </header>
        <!--header-->
        <?php
            $id_usuario = $_SESSION['id'];
            $nomeDivida = ['nome_dividaF'];
            $valor = ['valor_dividasF'];

            //verificar no banco de dados

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dependentes WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info = $sql->fetchAll();
?>
        <!--navegador-->
        <section class="nav" id="navbar">
            <nav class="nav_container">
                <div>
                    <a href="#" class="nav_link nav_logo ">
                    <i class ="fa-solid fa-bars nav_icon"></i>
                        <div class ="Finance-Control">Finance <h3>Control</h3></div>   
                    </a>

                    <div class="nav_list">
                            <div class="nav_items navtop">
                                <a href="<?php echo INCLUDE_PATH?>home" class="nav_link navtop active">
                                    <i class="fa fa-house nav_icon"></i>
                                    <span class="nav_name">Cadastro de Dados</span>
                                </a>
                                <a href="<?php echo INCLUDE_PATH?>entradas" class="nav_link navtop">
                                    <i class="fa-solid fa-piggy-bank nav_icon"></i>
                                    <span class="nav_name">Renda</span>
                                </a>
                                <a href="<?php echo INCLUDE_PATH?>dividas" class="nav_link navtop">
                                    <i class="fa-solid fa-sack-xmark nav_icon"></i>
                                    <span class="nav_name">Dividas</span>
                                </a>
                                <a href="<?php echo INCLUDE_PATH?>saldo" class="nav_link navtop">
                                    <i class="fa-solid fa-landmark nav_icon"></i>
                                    <span class="nav_name">Saldo</span>
                                </a>
                                <a href="<?php echo INCLUDE_PATH?>dependente" class="nav_link navtop">
                                    <i class="fa-solid fa-users nav_icon"></i>
                                    <span class="nav_name">Cadastro Dependente</span>
                                </a>
                                <a href="<?php echo INCLUDE_PATH?>dependentesdados" class="nav_link navtop">
                                    <i class="fa-solid fa-file-invoice nav_icon"></i>
                                    <span class="nav_name">Cadastro Dados Dependente</span>
                                </a>
                                <a href="<?php echo INCLUDE_PATH?>entradasdependentes" class="nav_link navtop">
                                    <i class="fa-solid fa-piggy-bank nav_icon"></i>
                                    <span class="nav_name">Renda Dependente</span>
                                </a>
                                <a href="<?php echo INCLUDE_PATH?>dividasdependentes" class="nav_link navtop">
                                    <i class="fa-solid fa-sack-xmark nav_icon"></i>
                                    <span class="nav_name">Dividas Dependente</span>
                                </a>
                                <a href="<?php echo INCLUDE_PATH?>saldodependentes" class="nav_link navtop">
                                    <i class="fa-solid fa-landmark nav_icon"></i>
                                    <span class="nav_name">Saldo Dependente</span>
                                </a>

                                <div class="nav_dropdown">
                                    <a href="#" class="nav_link navtop" class="nav_link ">
                                        <i class="fa-solid fa-chevron-down nav_icon"></i>
                                        <span class="nav_name">Gerenciar de Dados</span>
                                    </a>

                                    <div class="nav_dropdown-collapse">
                                        <div class="nav_dropdown-content">
                                            <a href="<?php echo INCLUDE_PATH?>editardados" class="nav_dropdown-item">Editar Dados</a>
                                            <a href="#" class="nav_dropdown-item">Editar Dados Dependente</a>
                                        </div><!--nav_dropdown-collapse-->

                                    </div><!--nav_dropdown-collapse-->

                                </div><!--nav_dropdown-->
                            </div><!--nav_items navtop-->

                            <div class="nav_items subscribe-container">
                                <h3 class="nav_subititle">DEPENDENTES</h3>
                                <?php foreach ($info as $key => $value){?>
                                <a href="#" class="nav_link">
                                        <img class="subscribe" src="avatar.jpeg" alt="">
                                        <span class="nav_name"><?php echo $value['nome_dependente'];?></span>
                                </a>
                                <?php } ?>
                                        </div><!--nav_dropdown-content-->
                                    </div><!--nav_dropdown-collapse nav_dropdown-second-->

                                </div><!--nav_dropdown-->
                            </div><!--nav_items subscribe-container-->

                    </div><!--DIVnav_list-->

                </div><!--div1 container-->
            </nav>
        </section><!--section nav-->
        <!--navegador-->