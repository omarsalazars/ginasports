<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Dosis:200,300|Open+Sans|Raleway" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <?php require_once 'style.php' ?>
        <link rel="stylesheet" href="css/otroStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <title>Estadísticas</title>
    </head>
<body>
	<?php require_once('controller/banner.controller.php'); ?>
	<div class="container">
    	<h1 class="red-text text-center">Estadísticas</h1>
		<h5 class="red-text text-center">Vistas totales: <?php require_once 'count.php'; ?> </h5>
		<pre>
		<?php 
			$visitsPerMonth = array(0,0,0,0,0,0,0,0,0,0,0,0);
			foreach ($stats as $key => $value) {
				$month = date("m", strtotime(str_replace('-','/', $value['date'])));
				$visitsPerMonth[$month-1]++;
			}
		?>
		</pre>
		<div id="charts"></div>
    	<div id="num"></div>
	</div>
	<?php require('controller/footer.controller.php'); ?>

	<script type="text/javascript">
        google.load('visualization','1.0',{'packages':['corechart']});
        google.setOnLoadCallback(dibujar);
        function dibujar() {
            var data = new google.visualization.DataTable();
            var datosM = <?php echo json_encode($months);?>;
            var datosN = <?php echo json_encode($visitsPerMonth);?>;
            console.log(datosM);
            console.log(datosN);
            data.addColumn('number','Mes');
            data.addColumn('number','Visitas');
            for (var i = 0; i < datosM.length; i++) {
                data.addRows([[datosM[i]/1,datosN[i]/1]]);
            }
            var opciones = {'title':'Visitas de mi web','width':1000,'height':750};
            var grafica = new google.visualization.ColumnChart(document.getElementById('charts'));
            grafica.draw(data,opciones);
        }
    </script>
</body>
</html>