<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC; ?>estilos/estilo-cadastro_dependentes.css" rel="stylesheet">
    <title>Bem-Vindo</title>
</head>
<?php
            $id_usuario = $_SESSION['id'];
            $nomeDivida = ['nome_dividaF'];
            $valor = ['valor_dividasF'];

            //verificar no banco de dados
            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info0 = $sql->fetchAll();

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_fixas WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info1 = $sql->fetchAll();

            
            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_saldo_usuario WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info2 = $sql->fetchAll();



        ?>
<body>
    <?php include('includes/slidebar2.php');?>
<!--AQUI DA PRA FAZER UM ATALHO-->
<?php
            $id_usuario = $_SESSION['id'];
            $nomeDivida = ['nome_dividaF'];
            $valor = ['valor_dividasF'];

            //verificar no banco de dados

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dependentes WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info = $sql->fetchAll();
?>


<main>
    <section class="registro">
        <div class="Titulo">
            <h1>Editar Saldo</h1>
        </div><!--titulo-->
        <form  method="post"> 
        <div class="selecionar">
            <select method="post" name="Dado">
            <?php foreach ($info2 as $key => $value2){?>
                <option value=<?php echo $value2['id']?>>Saldo: <?php echo $value2['nome_saldo'];?>Id: <?php echo $value2['id'] ;?></option>
                <?php } ?>
            </select>
        </div><!--select-->
        <br>
        <div class="selecionar">
            <select method="post" name="dado_adicionado">
                <option value=1>Editar</option>
                <option  value=2>Deletar</option>
            </select>
        </div><!--select-->

        <div class="formulario">     
                <input type="text" name="nome_dado" placeholder="Digite a identificação do Dado">
                <input type="text" name="valor_dado" placeholder="Valor">
                <input type="date" name="data_dado" placeholder="Data">
                <input type="submit" name="confirmar_dado" value="Confirmar >">
        </form>
        </div><!--form-->
    </section>
 </main>


</body>