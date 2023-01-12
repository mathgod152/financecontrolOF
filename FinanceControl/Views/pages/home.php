<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/home.css" rel="stylesheet">
    <title>Bem-vindo, <?php echo $_SESSION['nome']; ?></title>
</head>

<body>
    <?php include('includes/slidebar2.php');?>
<!--AQUI DA PRA FAZER UM ATALHO-->
<main>
    <section class="registro">
        <div class="Titulo">
            <h1>Cadastro de Dados</h1>
        </div><!--titulo-->
        <form  method="post"> 
        <div class="selecionar">
            <select method="post" name="dado_adicionado">
                <option value=1>Renda</option>
                <option  value=2>Dividas</option>
                <option  value=3>Saldo</option>
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