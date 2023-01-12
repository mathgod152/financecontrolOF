<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/55.css" rel="stylesheet">
    <title>Bem-vindo, <?php echo $_SESSION['nome']; ?></title>
</head>

<body>
<?php include('includes/slidebar2.php');?>
<?php
            $id_usuario = $_SESSION['id'];
            $nomeDivida = ['nome_dividaF'];
            $valor = ['valor_dividasF'];

            //verificar no banco de dados
            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_entradas_dependente WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info = $sql->fetchAll();

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_dependente WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info1 = $sql->fetchAll();

            
            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_saldo_dependente WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info2 = $sql->fetchAll();

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_divida_dependente) as dividastotal FROM tb_dividas_dependente WHERE id_usuario = $id_usuario");
			$sql->execute();
            $totaldividas1 = $sql->fetch(PDO::FETCH_ASSOC);

            
            $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_entrada_dependente) as entradastotal FROM tb_entradas_dependente WHERE id_usuario = $id_usuario");
			$sql->execute();
            $totalentradas1 = $sql->fetch(PDO::FETCH_ASSOC);

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_saldo_dependente) as saldo FROM tb_saldo_dependente WHERE id_usuario = $id_usuario");
			$sql->execute();
            $sald1 = $sql->fetch(PDO::FETCH_ASSOC);

            $saldo = $totalentradas1['entradastotal'] - $totaldividas1['dividastotal'];

        ?>
<main>
<form method="post">
        <?php        
        if(isset($_POST['confirmar_dado'])){
            $data1 = $_POST['data_1'];
            $data2 = $_POST['data_2'];
            if($data1 > 0){
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_saldo_dependente) as saldo FROM tb_saldo_dependente WHERE id_usuario = $id_usuario AND data_saldo_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $sald = $sql->fetch(PDO::FETCH_ASSOC);

                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_divida_dependente) as dividastotal FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $totaldividas = $sql->fetch(PDO::FETCH_ASSOC);

                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_entrada_dependente) as entradastotal FROM tb_entradas_dependente WHERE id_usuario = $id_usuario AND data_entrada_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $totalentradas = $sql->fetch(PDO::FETCH_ASSOC);
            }else{
                $data1 = '2022-01-01';
                $data2 = '2022-12-31';

                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_saldo_dependente) as saldo FROM tb_saldo_dependente WHERE id_usuario = $id_usuario AND data_saldo_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $sald = $sql->fetch(PDO::FETCH_ASSOC);

                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_divida_dependente) as dividastotal FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $totaldividas = $sql->fetch(PDO::FETCH_ASSOC);

                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_entrada_dependente) as entradastotal FROM tb_entradas_dependente WHERE id_usuario = $id_usuario AND data_entrada_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $totalentradas = $sql->fetch(PDO::FETCH_ASSOC);
            }}else{
                $data1 = '2022-01-01';
                $data2 = '2022-12-31';

                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_saldo_dependente) as saldo FROM tb_saldo_dependente WHERE id_usuario = $id_usuario AND data_saldo_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $sald = $sql->fetch(PDO::FETCH_ASSOC);

                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_divida_dependente) as dividastotal FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $totaldividas = $sql->fetch(PDO::FETCH_ASSOC);

                $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_entrada_dependente) as entradastotal FROM tb_entradas_dependente WHERE id_usuario = $id_usuario AND data_entrada_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $totalentradas = $sql->fetch(PDO::FETCH_ASSOC);}?>
    <section class="grafcbar_content grid">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
             <script type="text/javascript">
                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawColColors);

                function drawColColors() {
                    var data = google.visualization.arrayToDataTable([
                        ['Divida', 'Valor', { role: 'style' } ],
                        ['<?php echo 'Dividas';?>', <?php echo $totaldividas['dividastotal']?>, 'color: rgb(235, 103, 16)'],
                        ['<?php echo 'Entradas';?>', <?php echo $totalentradas['entradastotal']?>, 'color: #069'],
                        ['<?php echo 'Saldo';?>', <?php echo $totalentradas['entradastotal'] - $totaldividas['dividastotal']?>, 'color: rgb(73, 153, 126)']
                    ]);

                    var options = {
                        title: 'Relatorio de Saldo <?php echo $data1;?> a <?php echo $data2;?> ',
                        colors: ['#FF6633', '#6699CC'],
                        hAxis: {
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
         </div>
        <?php        
            if(isset($_POST['confirmar_dado'])){
                $data3 = $_POST['data_3'];
                $data4 = $_POST['data_4'];
                if($data3 > 0){
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_saldo_dependente) as saldo FROM tb_saldo_dependente WHERE id_usuario = $id_usuario AND data_saldo_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $sald = $sql->fetch(PDO::FETCH_ASSOC);
    
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_divida_dependente) as dividastotal FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $totaldividas2 = $sql->fetch(PDO::FETCH_ASSOC);
    
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_entrada_dependente) as entradastotal FROM tb_entradas_dependente WHERE id_usuario = $id_usuario AND data_entrada_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $totalentradas2 = $sql->fetch(PDO::FETCH_ASSOC);
                }else{
                    $data3 = '2022-01-01';
                    $data4 = '2022-12-31';

                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_saldo_dependente) as saldo FROM tb_saldo_dependente WHERE id_usuario = $id_usuario AND data_saldo_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $sald = $sql->fetch(PDO::FETCH_ASSOC);
    
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_divida_dependente) as dividastotal FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $totaldividas2 = $sql->fetch(PDO::FETCH_ASSOC);
    
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_entrada_dependente) as entradastotal FROM tb_entradas_dependente WHERE id_usuario = $id_usuario AND data_entrada_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $totalentradas2 = $sql->fetch(PDO::FETCH_ASSOC);
                }}else{
                    $data3 = '2022-01-01';
                    $data4 = '2022-12-31';

                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_saldo_dependente) as saldo FROM tb_saldo_dependente WHERE id_usuario = $id_usuario AND data_saldo_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $sald = $sql->fetch(PDO::FETCH_ASSOC);
    
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_divida_dependente) as dividastotal FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $totaldividas2 = $sql->fetch(PDO::FETCH_ASSOC);
    
                    $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_entrada_dependente) as entradastotal FROM tb_entradas_dependente WHERE id_usuario = $id_usuario AND data_entrada_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                    $sql->execute();
                    $totalentradas2 = $sql->fetch(PDO::FETCH_ASSOC);}?>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                     <script type="text/javascript">
                         google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawColColors);

                function drawColColors() {
                    var data = google.visualization.arrayToDataTable([
                        ['Divida', 'Valor', { role: 'style' } ],
                        ['<?php echo 'Dividas';?>', <?php echo $totaldividas2['dividastotal']?>, 'color: rgb(235, 103, 16)'],
                        ['<?php echo 'Entradas';?>', <?php echo $totalentradas2['entradastotal']?>, 'color: #069'],
                        ['<?php echo 'Saldo';?>', <?php echo $totalentradas2['entradastotal'] - $totaldividas2['dividastotal']?>, 'color: rgb(73, 153, 126)']
                    ]);

                    var options = {
                        title: 'Relatorio de Saldo <?php echo $data3;?> a <?php echo $data4;?> ',
                        colors: ['#FF6633', '#6699CC'],
                        hAxis: {
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

                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                    }
                     </script>
                 </div>
        </div>
        

        <div class="linegrafc_items" style="margin-top:-20px;">
                 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                     <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                        ['Divida', 'Divida', { role: 'style' }  ],
                            <?php foreach ($info2 as $key2 => $value2){?>
                                ['<?php echo $value2['nome_saldo_dependente'];?>',<?php echo $value2['valor_saldo_dependente']?>, '66ff66'],
                                   <?php } ?>                     

                    ]);

                            var options = {
                            title: 'Company Performance',
                            curveType: 'function',
                            legend: { position: 'bottom' }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                     </script>
                 </div>
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
                        <h1>Relatorio Total Do Saldo</h1>  
                        <?php $valor_entradas = $totalentradas['entradastotal'];?>
                        <?php $valor_dividas = $totaldividas['dividastotal'];?>                                  
                                <h2>Renda Total: R$ <?php echo $valor_entradas?></h2>
                                <h2>Dividas Total: R$ <?php echo $valor_dividas?></h2>
                                <h2>Saldo Total: R$ <?php echo $valor_entradas - $valor_dividas?></h2>
                        </div><!--Relatorio-->
                </div>
    </form> 
    </div>
 </main>
<script src="js/main.js" charset="utf-8"></script>
</body>

</html>