<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC; ?>estilos/registrar.css" rel="stylesheet">
    <title>Finance Control</title>
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
             <a href="<?php echo INCLUDE_PATH ?>" id="ja-conta-btn"><li>Já tem uma conta</li></a>
        </ul>
    </header>
    <main>
        <aside>
            <h2><span>Inscreva-se Agora</span></h2>
            <h2>No Finance Control</h2>
            <p>O finance control tem como objetivo auxiliar famílias com o controle financeiro, junte-se a esse projeto desenvolvido pelos alunos da UNIVESP. Seja um membro da comunidade Finance Control para melhorar seu controle financeiro e para nos ajudar no desenvolvimento do nosso software.</p>
            <form method="post">
                <input type="text" name="nome" placeholder="Nome">
                <input type="email" name="email" placeholder="E-mail">
                <input type="password" name="senha" placeholder="Senha">
                <input type="password" name="confirmasenha"  placeholder="Confirmar Senha">
                <input type="submit" name="registrar" value="Confirmar >">
            </form>
        </aside>
        <article>
            <img src="finance contol.png" />
        </article>
    </main>
</body>
</html>