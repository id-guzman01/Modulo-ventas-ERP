<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <title>Reportes</title>
</head>
<body>

    <?php
        include '../Modelo/Consultas.php';
        $cons = new ConsultasBD();
        
        $ventas_sinPagadar = $cons->VentasSinPagar();
        $ventas_pagadas = $cons->VentasPagadas();

        $clientes_activos = $cons->contrarClientesActivos();
        $clientes_inactivos = $cons->contrarClientesInactivos();

        $enero=0;
        $febrero = 0;
        $marzo = 0;
        $abril = 0;
        $mayo = 0;
        $junio = 0;
        $julio = 0;
        $agosto = 0;
        $septiembre = 0;
        $octubre = 0;
        $noviembre = 0;
        $diciembre = 0;

        $contenidoTotalMeses = $cons->totalMeses();
        while($rowM = mysqli_fetch_array($contenidoTotalMeses)){
            $mes = $rowM['mes'];
            if($mes=='January'){
                $enero = $rowM['valor'];
            }else if($mes=='February'){
                $febrero = $rowM['valor'];
            }else if($mes=='March'){
                $marzo = $rowM['valor'];
            }else if($mes=='April'){
                $abril = $rowM['valor'];
            }else if($mes=='May'){
                $mayo = $rowM['valor'];
            }else if($mes=='June'){
                $junio = $rowM['valor'];
            }else if($mes=='July'){
                $julio = $rowM['valor'];
            }else if($mes=='August'){
                $agosto = $rowM['valor'];
            }else if($mes=='September'){
                $septiembre = $rowM['valor'];
            }else if($mes=='October'){
                $octubre = $rowM['valor'];
            }else if($mes=='November'){
                $noviembre = $rowM['valor'];
            }else if($mes=='December'){
                $diciembre = $rowM['valor'];
            }

        }

        $eneroF=0;
        $febreroF = 0;
        $marzoF = 0;
        $abrilF = 0;
        $mayoF = 0;
        $junioF = 0;
        $julioF = 0;
        $agostoF = 0;
        $septiembreF = 0;
        $octubreF = 0;
        $noviembreF = 0;
        $diciembreF = 0;

        $contenidoTotalMesesSinPagar = $cons->totalMesesSinPagar();
        while($rowMS = mysqli_fetch_array($contenidoTotalMesesSinPagar)){
            $mes = $rowMS['mes'];
            if($mes=='January'){
                $eneroF = $rowMS['valor'];
            }else if($mes=='February'){
                $febreroF = $rowMS['valor'];
            }else if($mes=='March'){
                $marzoF = $rowMS['valor'];
            }else if($mes=='April'){
                $abrilF = $rowMS['valor'];
            }else if($mes=='May'){
                $mayoF = $rowMS['valor'];
            }else if($mes=='June'){
                $junioF = $rowMS['valor'];
            }else if($mes=='July'){
                $julioF = $rowMS['valor'];
            }else if($mes=='August'){
                $agostoF = $rowMS['valor'];
            }else if($mes=='September'){
                $septiembreF = $rowMS['valor'];
            }else if($mes=='October'){
                $octubreF = $rowMS['valor'];
            }else if($mes=='November'){
                $noviembreF = $rowMS['valor'];
            }else if($mes=='December'){
                $diciembreF = $rowMS['valor'];
            }
        }
    ?>
        <div id="chart-container" style="width: 100%;

            margin-left: 160px;
            margin-top: 50px;
            border-radius: 6px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            transform: translateY(-3%);
            cursor: default;
            transition: all 400ms ease;">
            <h1 style="width: 100%; margin-top: 0;
            padding-top: 20px;
                background-color: #f2f2f2;
                font-size: 30px;
                text-align: center;">Ventas Realizadas</h1>
            <canvas id="myChart"></canvas>
        </div>
        <div class="card" style="width: 45%;
            margin-left: 170px;
            margin-top: 30px;
            border-radius: 6px;
             border-left-size: 1px;
            border-left-style: solid;
            border-left-color:hsla(138, 100%, 54%);
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            cursor: default;
            transition: all 400ms ease;">
            <h2 style="font-size: 20px; text-align: center; color:
            hsla(138, 100%, 54%)">Ventas Pagadas</h2>
            <label style="font-size: 25px; text-align: center; margin-left: 50px;"><?php echo '$'.$ventas_pagadas?></label><img src="img/money.png">
        </div>
        <div class="card" style="width: 45%;
            
            margin-left: 405px;
            margin-top: -95px;
            border-radius: 6px;
            border-left-size: 1px;
            border-left-style: solid;
            border-left-color:hsla(338, 67%, 60%);
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            cursor: default;
            transition: all 400ms ease;">
            <h2 style="font-size: 20px; text-align: center; color:
            hsla(338, 67%, 60%)">Ventas No Pagadas</h2>
            <label style="font-size: 25px; text-align: center; margin-left: 50px;"><?php echo '$'.$ventas_sinPagadar?></label><img src="img/money.png">
        </div>
        <div class="card" style="width: 45%;

            margin-left: 290px;
            margin-top: 25px;
            border-radius: 6px;
            border-left-size: 1px;
            border-left-style: solid;
            border-left-color:hsla(35, 100%, 50%);
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            cursor: default;
            transition: all 400ms ease;">
            <h2 style="font-size: 20px; text-align: center; color:
            hsla(35, 100%, 50%)">Total de Ventas</h2>
            <label style="font-size: 25px; text-align: center; margin-left: 50px;"><?php  echo '$'.$total=$ventas_pagadas+$ventas_sinPagadar;?></label><img src="img/money.png">
        </div>
         <div id="chart-container " style="width: 100%;
               
                margin-left: 160px;
                margin-top: 60px;
                border-radius: 6px;
                overflow: hidden;
                background: #fff;
                box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
                transform: translateY(-3%);
                cursor: default;
                transition: all 400ms ease;">

            <h1 style="
                width: 100%; margin-top: 0;
                padding-top: 20px;
                background-color: #f2f2f2;
                font-size: 30px;
                text-align: center;">Clientes Activos e Inactivos</h1>
            <canvas id="grafica" style="width: 300px; height: 300px;" ></canvas>
         </div>
         <div class="card" style="width: 45%;
            
            margin-left: 170px;
            margin-top: 30px;
            border-radius: 6px;
             border-left-size: 1px;
            border-left-style: solid;
            border-left-color:hsla( 128, 78%, 44%, 0.548);
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            cursor: default;
            transition: all 400ms ease;">
            <h2 style="font-size: 20px; text-align: center; color:
            hsla(138, 100%, 54%)">Clientes Activos</h2>
            
          <label style=" position: relative; font-size: 23px; text-align: center; margin-left: 95px; margin-top: -5px;"><?php echo $clientes_activos?></label>
        </div>
         <div class="card" style="width: 45%;
            
            margin-left: 405px;
            margin-top: -90px;
            border-radius: 6px;
            border-left-size: 1px;
            border-left-style: solid;
            border-left-color:hsla(0, 88%, 55%, 0.548);
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            cursor: default;
            transition: all 400ms ease;">
            <h2 style="font-size: 20px; text-align: center; color:
            hsla(0, 88%, 55%, 0.548)">Clientes Inactivos</h2>
            
            <label style=" position: relative; font-size: 23px; text-align: center; margin-left: 95px; margin-top: -5px;"><?php echo $clientes_inactivos?></label>
        </div>
        <div class="card" style="width: 45%;
            
            margin-left: 290px;
            margin-top: 30px;
            border-radius: 6px;
            border-left-size: 1px;
            border-left-style: solid;
            border-left-color:hsla(192, 76%, 54%);
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            cursor: default;
            transition: all 400ms ease;">
            <h2 style="font-size: 20px; text-align: center; color:
            hsla(192, 76%, 54%)">Total de Clientes</h2>
           <label style=" position: relative; font-size: 23px; text-align: center; margin-left: 95px; margin-top: -5px;"><?php echo $total_clientes=$clientes_activos+$clientes_inactivos?></label>
        </div>

         <div id="chart-container" style="width: 100%;
                margin-left: 160px;
                margin-top: 50px;
                border-radius: 6px;
                overflow: hidden;
                background: #fff;
                box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
                transform: translateY(-3%);
                cursor: default;
                transition: all 400ms ease;">
              <h1 style="
                width: 100%;
                margin-top: 0;
                padding-top: 20px;
                background-color: #f2f2f2;
                font-size: 30px;
                text-align: center;">Total Ventas al Mes</h1>
            <canvas id="graficaVendidos"style="width: 300px; height: 300px;" ></canvas>
         </div> 
         <div class="card" style="width: 45%;
            
            margin-left: 660px;
            margin-top: -460px;
            border-radius: 6px;
            border-left-size: 1px;
            border-left-style: solid;
            border-left-color:hsla(143, 91%, 42%, 0.548);
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            cursor: default;
            transition: all 400ms ease;">
            <h2 style="font-size: 20px; text-align: center; color:
            hsla(143, 91%, 42%, 0.548)">Total de Ventas al Mes</h2>
           <label style=" position: relative; font-size: 23px; text-align: center; margin-left: 55px; margin-top: -5px;"><?php echo '$'.$mayo; ?></label>
        </div>

         <div id="chart-container" style="width: 100%;
               
                margin-left: 160px;
                margin-top: 390px;
                border-radius: 6px;
                overflow: hidden;
                background: #fff;
                box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
                transform: translateY(-3%);
                cursor: default;
                transition: all 400ms ease;">

            <h1 style="
                width: 100%; margin-top: 0;
                padding-top: 20px;
                background-color: #f2f2f2;
                font-size: 30px;
                text-align: center;">Total Ventas sin Pagar al Mes</h1>
            <canvas id="graficaVendidosSinPagar"style="width: 300px; height: 300px;" ></canvas>
         </div>
         <div class="card" style="width: 45%;
            
            margin-left: 660px;
            margin-top: -460px;
            border-radius: 6px;
            border-left-size: 1px;
            border-left-style: solid;
            border-left-color:hsla(338, 67%, 60%, 0.548);
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
            cursor: default;
            transition: all 400ms ease;">
            <h2 style="font-size: 20px; text-align: center; color:
            hsla(338, 67%, 60%, 0.548)">Total de Ventas sin Pagar al Mes</h2>
           <label style=" position: relative; font-size: 23px; text-align: center; margin-left: 55px; margin-top: -5px;"><?php echo '$'.$mayoF; ?></label>
        </div> 

         <div id="chart-container" style="width: 100%;
        
                margin-left: 160px;
                margin-top: 390px;
                border-radius: 6px;
                overflow: hidden;
                background: #fff;
                box-shadow: 0px 1px 10px rgba(0,0,0,0.4);
                transform: translateY(-3%);
                cursor: default;
                transition: all 400ms ease;">
              <h1 style="
                width: 100%;
                margin-top: 0;
                padding-top: 20px;
                background-color: #f2f2f2;
                font-size: 30px;
                text-align: center;">Total de Productos Vendidos</h1>
            <canvas id="graficaTotalProductos"style="width: 300px; height: 300px;" ></canvas>
         </div>
         <div class="contenedor" 
         style="margin: 30px auto;
                margin-left: 180px;
                width: 100%;
                height: 60%;
                "> 
            <table class="table-container" 
            style=" background-color: white;
                text-align: left;
                width: 100%;
                position: relative;
                border-collapse: collapse;
                margin: 60px auto;">
                     
                    <thead style="background: -webkit-linear-gradient(to right, #3DA3A6, #28B640);
                            background: linear-gradient(to right, #3DA3A6, #28B640);
                            color: white;">
                        <tr> 
                            <th style="padding: 8px;
                                text-align: center;">Nombre</th>     
                            <th style="padding: 8px;
                                text-align: center;">Cantidad</th>
                        </tr>
                    </thead>
              <tbody>
               <tr>
                    <td style="padding: 8px;
                        text-align: center;">Alpina</td>
                    <td style="padding: 8px;
                        text-align: center;">8</td>
                </tr>
                <tr>
                   <td style="padding: 8px;
                        text-align: center;">Yogurt de mora</td>
                    <td style="padding: 8px;
                        text-align: center;">10</td>
                </tr>       

                </tbody>
            </table>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.esm.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.esm.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.js"></script>
      </div>
</body>
</html>

        <script>
        var ctx = document.getElementById('myChart');

        var speedData = {
        labels: [ "Ventas sin pagar","Ventas Pagadas"],
        datasets: [{
            label: "Ventas Totales",
            data: [<?php echo $ventas_pagadas; ?>, <?php echo $ventas_sinPagadar; ?>],
            backgroundColor: [
                'hsla(168, 100%, 74%, 0.548)',
                'hsla(338, 67%, 60%, 0.548)'
            ],
            borderColor: [
                'hsla(168, 100%, 74%, 0.548)',
                'hsla(338, 67%, 60%, 0.548)'
            ],
            borderWidth: 1
        }]
        };
        
        var chartOptions = {
        tittle: 'Ventas realizadas',
        legend: {display: true, position: 'top',labels: {boxWidth: 80, fontColor: 'black'}}

        };


        var lineChart = new Chart(ctx, {
        type: 'pie',
        data: speedData,
        options: chartOptions
            });

         
    </script>
<script>
        var grafica = document.getElementById('grafica');

        var speedData = {
            labels: ["Clientes Activos", "Clientes Inactivos"],
        datasets: [{
            label: 'Clientes Activos',
            data: [<?php echo $clientes_activos; ?>, <?php echo $clientes_inactivos; ?>],
            backgroundColor: [
                'hsla( 128, 78%, 44%, 0.548)',
                'hsla(0, 88%, 55%, 0.548)'
            ],
            borderColor: [
                'hsla( 128, 78%, 44%, 0.548)',
                'hsla(0, 88%, 55%, 0.548)'
            ],
            borderWidth: 1
        }]
        };
        
        var chartOptions = {
       
        legend: {display: true, position: 'top',labels: {boxWidth: 80, fontColor: 'black'}}

        };


        var lineChart = new Chart(grafica, {
        type: 'bar',
        data: speedData,
        options: chartOptions
            });

         
    </script>


<script>
        var graficaVendidos = document.getElementById('graficaVendidos');

        var speedData = {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        datasets: [{
            label: 'Total de ventas al mes',
            data: [<?php echo $enero; ?>,<?php echo $febrero; ?>,<?php echo $marzo; ?>,<?php echo $abril; ?>,<?php echo $mayo; ?>,<?php echo $junio; ?>,<?php echo $julio; ?>,<?php echo $agosto; ?>,<?php echo $septiembre; ?>,<?php echo $octubre; ?>,<?php echo $noviembre; ?>,<?php echo $diciembre; ?>],
            backgroundColor: [
                'hsla(143, 91%, 42%, 0.548)'
            ],
            borderColor: [
                'hsla(143, 91%, 42%, 0.548)',
            ],
            borderWidth: 1
        }]
        };
        
        var chartOptions = {
        tittle: 'Ventas realizadas',
        legend: {display: true, position: 'top',labels: {boxWidth: 80, fontColor: 'black'}}

        };


        var lineChart = new Chart(graficaVendidos, {
        type: 'line',
        data: speedData,
        options: chartOptions
            });

         
    </script>



<script>
        var graficaVendidosSinPagar = document.getElementById('graficaVendidosSinPagar');

        var speedData = {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        datasets: [{
            label: 'Total de ventas sin pagar',
            data: [<?php echo $eneroF; ?>,<?php echo $febreroF; ?>,<?php echo $marzoF; ?>,<?php echo $abrilF; ?>,<?php echo $mayoF; ?>,<?php echo $junioF; ?>,<?php echo $julioF; ?>,<?php echo $agostoF; ?>,<?php echo $septiembreF; ?>,<?php echo $octubreF; ?>,<?php echo $noviembreF; ?>,<?php echo $diciembreF; ?>],
            backgroundColor: [
                'hsla(338, 67%, 60%, 0.548)'
            ],
            borderColor: [
                'hsla(338, 67%, 60%, 0.548)'
            ],
            borderWidth: 1
        }]
        };
        
        var chartOptions = {
        tittle: 'Ventas realizadas',
        legend: {display: true, position: 'top',labels: {boxWidth: 80, fontColor: 'black'}}

        };


        var lineChart = new Chart(graficaVendidosSinPagar, {
        type: 'line',
        data: speedData,
        options: chartOptions
            });

         
    </script>


   <script>
        var graficaTotalProductos = document.getElementById('graficaTotalProductos');

        var speedData = {
            labels: [
                <?php 
            $contenidoProductosVendidos = $cons->productosMasVendidos();
            while($rowP = mysqli_fetch_array($contenidoProductosVendidos)){
                $contenidoProductoVendidoF = $cons->buscarProducto($rowP['idProductos']);
                $resultado = mysqli_fetch_array($contenidoProductoVendidoF);
                $codProducto = $resultado['nombre'];
                echo "'".$codProducto."'".', ';
            }    
                ?>        

            ],
        datasets: [{
            label: 'Total de productos mas vendidos',
            data: [<?php
            
            $contenidoProductosVendidos = $cons->productosMasVendidos();
            while($rowP = mysqli_fetch_array($contenidoProductosVendidos)){
                
                $codProducto = $rowP['Mas_vendido'].', ';
                echo $codProducto;
            }        
        ?>],
            backgroundColor: [
                'hsla(192, 76%, 54%, 0.548)',
                'hsla(35, 100%, 50%, 0.548)'
            ],
            borderColor: [
                'hsla(192, 76%, 54%, 0.548)',
                'hsla(35, 100%, 50%, 0.548)'
            ],
            borderWidth: 1
        }]
        };
        
        var chartOptions = {
        tittle: 'Ventas realizadas',
        legend: {display: true, position: 'top',labels: {boxWidth: 80, fontColor: 'black'}}

        };


        var lineChart = new Chart(graficaTotalProductos, {
        type: 'bar',
        data: speedData,
        options: chartOptions
            });
    </script>