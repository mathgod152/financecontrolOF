<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/dividas.css" rel="stylesheet">
    <title>Bem-vindo, <?php echo $_SESSION['nome']; ?></title>
</head>


<body>
    <?php include('includes/slidebar2.php');?>
    <?php
            $id_usuario = $_SESSION['id'];
            $nomeDivida = ['nome_divida_dependent'];
            $valor = ['valor_divida_dependente'];

            //verificar no banco de dados

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_dependente WHERE id_usuario = $id_usuario");
			$sql->execute();
            $info = $sql->fetchAll();

            $sql = \FinanceControl\MySql::connect()->prepare("SELECT SUM(valor_divida_dependente) as dividastotal FROM tb_dividas_dependente WHERE id_usuario = $id_usuario");
			$sql->execute();
            $totaldividas = $sql->fetch(PDO::FETCH_ASSOC);
        ?>


<main>
<form method="post">
        <input type="date" name="data_1" placeholder="Data">
        <input type="date" name="data_2" placeholder="Data">
        <?php        
        if(isset($_POST['confirmar_dado'])){
            $data1 = $_POST['data_1'];
            $data2 = $_POST['data_2'];
            if($data1 > 0){
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $info1 = $sql->fetchAll();
            }else{
                $data1 = '2022-01-01';
                $data2 = '2022-12-31';
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $info1 = $sql->fetchAll();
            }}else{
                $data1 = '2022-01-01';
                $data2 = '2022-12-31';
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data1."') AND CONCAT('".$data2."')");
                $sql->execute();
                $info1 = $sql->fetchAll();}?>
    <section class="grafcbar_content grid">
      <div class="grafcbar_items">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div id="chart_div2" style="width: 600px; height: 400px;margin: 5px;">
             <script type="text/javascript">
                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawColColors);

                function drawColColors() {
                    var data = new google.visualization.arrayToDataTable([
                        ['Divida', 'Valor', { role: 'style' }  ],
                        <?php foreach ($info1 as $key => $value){?>                       
                                     ['<?php echo $value['nome_divida_dependente'];?>', <?php echo $value['valor_divida_dependente']?>, ''],
                                   <?php } ?>
                    ]);


                    var options = {
                        title: 'Motivation and Energy Level Throughout the Day',
                        colors: ['#9575cd'],
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
         </div>
        <input type="date" name="data_3" placeholder="Data">
        <input type="date" name="data_4" placeholder="Data">
        <?php        
        if(isset($_POST['confirmar_dado'])){
            $data3 = $_POST['data_3'];
            $data4 = $_POST['data_4'];
            if($data3 > 0){
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                $sql->execute();
                $info2 = $sql->fetchAll();
            }else{
                $data3 = '2022-01-01';
                $data4 = '2022-12-31';
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                $sql->execute();
                $info2 = $sql->fetchAll();
            }}else{
                $data3 = '2022-01-01';
                $data4 = '2022-12-31';
                $sql = \FinanceControl\MySql::connect()->prepare("SELECT * FROM tb_dividas_dependente WHERE id_usuario = $id_usuario AND data_divida_dependente BETWEEN CONCAT('".$data3."') AND CONCAT('".$data4."')");
                $sql->execute();
                $info2 = $sql->fetchAll();}?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                 <div id="chart_div" style="width: 600px; height: 400px; margin: 5px;">
                     <script type="text/javascript">
                         google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawColColors);

                function drawColColors() {
                    var data = new google.visualization.arrayToDataTable([
                        ['Divida', 'Valor', { role: 'style' }  ],
                        <?php foreach ($info as $key => $value){?>                       
                            ['<?php echo $value['nome_divida_dependente'];?>', <?php echo $value['valor_divida_dependente']?>, ''],
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

                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                    }
                     </script>
                 </div>
        </div>
        

    <div class="linegrafc_items" style="margin-top:-20px;">
        <input type="submit" name="confirmar_dado" value="Confirmar >"> 
                 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                 <div id="curve_chart" style="width: 600px; height: 400px; margin: 5px; ">
                     <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                        ['Divida', 'Valor', { role: 'style' }  ],
                        <?php foreach ($info as $key => $value){?>                       
                                     ['<?php echo $value['nome_divida_dependente'];?>', <?php echo $value['valor_divida_dependente']?>, 'ff9966'],
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
                 <div class="infos">
                    <h1>Dividas:</h1>
                    <h1><?php echo $totaldividas['dividastotal'].'R$' ;?></h1>

                


                </div><!--infos-->
    </form> 

    </div>
 </main>
<script src="js/main.js" charset="utf-8"></script>



</body>

</html>