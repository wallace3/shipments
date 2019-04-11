<?php

    include_once('methods/bills.php');
    $bills_data = Bills::getBills();    // Obtener Información de los Pedidos/Facturas

?>

<html>
    <head>
        <title>Sistema de Paquetes - Inicio</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class ="row">
            <div class="col-md-4">
                <a href="config.php">
                    <button type="button" class="btn btn-primary pull-rigth">Configuracion</button>
                </a>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <a href="new_bill.php">
                    <button type="button" class="btn btn-primary pull-rigth">Nuevo Envío</button>
                </a>
            </div>
        </div>  
        <hr>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Transporte</th>
                    <th scope="col">Nombre de Transporte</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($bills_data as $key => $data) {     //Ciclo para llenar información en tabla
                ?>
                <tr>
                    <td scope="row"><?=$data['ID_Bill']?></td>
                    <td><?=$data['Transportation']?></td>
                    <td><?=$data['Unit']?></td>
                    <td><?=$data['Quantity']?></td>
                    <td><?=$data['Date']?></td>
                    <td>
                        <a href="detail.php?id=<?=$data['ID_Bill']?>">
                            <button type="button" class="btn btn-info">Detalle</button>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>