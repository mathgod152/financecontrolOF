<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/33.css" rel="stylesheet">
    <title>Bem-vindo, <?php echo $_SESSION['nome']; ?></title>
</head>

<body>
<?php include('includes/slidebar2.php');?>
<?php
            $id_usuario = $_SESSION['id'];
            $nomeDivida = ['nome_entradaF'];
            $valor = ['valor_entradaF'];

            //verificar no banco de dados

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info = $sql->fetchAll();

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_entradaF) as entradastotal FROM 	tb_entradas_fixas WHERE id_usuario = $id_usuario");
			$sql->execute();
            $totaldividas = $sql->fetch(PDO::FETCH_ASSOC);

            
            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario ORDER BY valor_entradaF DESC LIMIT 5");
			$sql->execute();
            $topentradas = $sql->fetchAll();
        ?>
        
<main>

    <form method="post">
        <?php        
        if(isset($_POST['confirmar_dado'])){
            $data1 = $_POST['data_1'];
            $data2 = $_POST['data_2'];
            if($data1 > 0){
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario AND data_incremento_entradaF BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $info1 = $sql->fetchAll();
            }else{
                $data1 = '2022-01-01';
                $data2 = '2022-12-31';
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario AND data_incremento_entradaF BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $info1 = $sql->fetchAll();
            }}else{
                $data1 = '2022-01-01';
                $data2 = '2022-12-31';
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario AND data_incremento_entradaF BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $info1 = $sql->fetchAll();}?>
    <section class="grafcbar_content grid">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
             <script type="text/javascript">
                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawColColors);

                function drawColColors() {
                    var data = new google.visualization.arrayToDataTable([
                        ['Divida', 'Valor', { role: 'style' }  ],
                        <?php foreach ($info1 as $key => $value){?>                       
                            ['<?php echo $value['nome_entradaF'];?>', <?php echo $value['valor_entradaF']?>, ''],
                                   <?php } ?>
                    ]);

                    var options = {
                        title: 'Motivation and Energy Level Throughout the Day',
                        colors: ['#33ac71'],
                        hAxis: {
                        title: 'Time of Day',
                        format: 'h:mm a',
                        viewWindow: {
                            min: [7, 30, 0],
                            max: [17, 30, 0]
                        }
                        },
                        vAxis: {
                        title: 'Rating (scale of 1-10)'
                        }
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
                    chart.draw(data, options);
                    }
             </script>
        <?php 
            if(isset($_POST['confirmar_dado'])){
                $data3 = $_POST['data_3'];
                $data4 = $_POST['data_4'];                
                if($data3 > 0){
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario AND data_incremento_entradaF BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $info2 = $sql->fetchAll();
                }else{
                    $data3 = '2022-01-01';
                    $data4 = '2022-12-31';
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario AND data_incremento_entradaF BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $info2 = $sql->fetchAll();
                }}else{
                    $data3 = '2022-01-01';
                    $data4 = '2022-12-31';
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_fixas WHERE id_usuario = $id_usuario AND data_incremento_entradaF BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $info2 = $sql->fetchAll();}?>        

            
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                     <script type="text/javascript">
                         google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawColColors);

                function drawColColors() {
                    var data = new google.visualization.arrayToDataTable([
                        ['Divida', 'Valor', { role: 'style' }  ],
                        <?php foreach ($info2 as $key => $value){?>                       
                            ['<?php echo $value['nome_entradaF'];?>', <?php echo $value['valor_entradaF']?>, ''],
                                   <?php } ?>
                    ]);
                    var options = {
                        title: 'Motivation and Energy Level Throughout the Day',
                        colors: ['#993300'],
                        hAxis: {
                        title: 'Time of Day',
                        format: 'h:mm a',
                        viewWindow: {
                            min: [7, 30, 0],
                            max: [17, 30, 0]
                        }
                        },
                        chartArea: {
    	                    backgroundColor: '#00000'
                        },
                        vAxis: {
                        title: 'Rating (scale of 1-10)'
                        }
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                    };
                     </script>
    </div>
        

    <div class="linegrafc_items" style="margin-top:-20px;">
                 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                     <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = new google.visualization.arrayToDataTable([
                        ['Divida', 'Valor', { role: 'style' }  ],
                        <?php foreach ($info as $key => $value){?>                       
                            ['<?php echo $value['nome_entradaF'];?>', <?php echo $value['valor_entradaF']?>, ''],
                                   <?php } ?>

                    ]);

                            var options = {
                            title: 'Company Performance',
                            curveType: 'function',
                            legend: { position: 'bottom' }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                            chart.draw(data, options);
                        }
                     </script>
                <div id="chart_wrap">
                <div id="chart_wrap1">
                        <input type="date" name="data_1" placeholder="Data">
                        <input type="date" name="data_2" placeholder="Data">
                        <div id="chart_div2"></div>
                    </div><!--chart_wraP1-->
                    <div id="chart_wrap2">
                        <input type="date" name="data_3" placeholder="Data">
                        <input type="date" name="data_4" placeholder="Data">
                        <div id="chart_div"></div>
                    </div><!--chart_wraP2-->
                    <div id="chart_wrap3">
                        <input type="submit" name="confirmar_dado" value="Confirmar >"> 
                        <div id="curve_chart"></div>
                        <div class="Relatorio">
                            <h1>Relatorio Maiores Entradas</h1>
                            <?php foreach ($topentradas as $key => $value){?>                                   
                                <h2><?php echo $value['nome_entradaF'];?>: R$ <?php echo $value['valor_entradaF']?></h2>
                                   <?php } ?>
                        </div><!--Relatorio-->
                </div>


    </form>    
    </div>
 </main>

</body>

</html>
