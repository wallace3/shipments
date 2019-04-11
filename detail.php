
<?php

    include_once 'methods/bills.php';
    include_once 'methods/bill_detail.php';

    $bill = Bills::getBill($_GET['id']);
    $detail = Bill_Detail::getDetail($_GET['id']);


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalle</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="card m-5" >
            <div class="card-body">
                <div class="col-md-12">
                    <label><b>Detalle</b></label>
                    <div class="float-right mb-3 mr-2"><a href="index.php"><button type="button" class="btn btn-primary pull-rigth">Atras</button></a></div>
                    
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">ID Detalle</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $total = 0;  // Declaramos variable para sumar el total 
                                $total_descuento = 0;    // Declaramos variable para sumar el descuento

                                foreach ($detail as $key => $det) {
                                    
                                    $total += $det['Price'];     //Sumatoria en cada vuelta del ciclo
                                    $total_descuento += $det['Discount'];
                            ?>
                                    <tr>
                                    <th scope="row"><?=$key+1?></th>
                                    
                                    <td><?="$".number_format($det['Price'],2)?></td>
                                    <td><?="$".number_format($det['Discount'],2)?></td>
                                    <td><b><?="$".number_format($det['Price']-$det['Discount'],2)?></b></td>
                                    </tr>
                            <?php
                                }
                            ?>
                        
                            <tfoot>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><?="$".number_format($total_descuento,2)?></th>
                                    <th scope="col"><?="$".number_format($total,2)?></th>
                                </tr>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Total a pagar</th>
                                    <th scope="col"><font color="blue"><?="$".number_format($total-$total_descuento,2)?></font></th>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
?>