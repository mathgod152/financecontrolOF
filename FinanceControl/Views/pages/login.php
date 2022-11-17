<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/style.css" rel="stylesheet">
    <title>Já tenho uma conta</title>
</head>
<body>
    <header>
        <div id="title">
            <h1><span>Finance</span></h1>
            <h1>Control</h1>
        </div>

        <ul>
             <a href="<?php echo INCLUDE_PATH ?>registrar"><li>Inicio</li></a>
             <a href="<?php echo INCLUDE_PATH ?>sobre"><li>Sobre</li></a>
             <a href="$"><li>Contato</li></a>
             <a href="$"><li>Serviços</li></a>
             <a href="<?php echo INCLUDE_PATH?>" id="ja-conta-btn"><li>Já tem uma conta</li></a>
        </ul>
    </header>
    <main>
        <div class="form-login">
            <h2>BEM VINDO</h2>
            <form method="post">
                    <input type="text" name="email" placeholder="Login...">
					<input type="password" name="senha" placeholder="Senha...">
					<input type="submit" name="acao" value="Logar!">
					<input type="hidden" name="login">
            </form>
            <p><a href="<?php echo INCLUDE_PATH ?>registrar">Criar Conta</a></p>
        </div>
    </main>
</body>
</html>