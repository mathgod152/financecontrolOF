<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    require('vendor/autoload.php');  
    
    define('INCLUDE_PATH_STATIC','http://localhost/FinanceControl/FinanceControl/Views/Pages/');
    define('INCLUDE_PATH','http://localhost/FinanceControl/');
    $app = new FinanceControl\Application();

    $app->run();

?>

