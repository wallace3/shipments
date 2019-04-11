<?php
  
    include_once "methods/config.php";
    $config = new Config();
    $config = $config->getConfiguration();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Configuración de Precios  y Descuento</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="card m-5" >
            <div class="card-body">
                <form method="post" action = "update_config.php">
                    <div class="form-group">
                        <label for="PrecioPorVagon">Precio por Unidad Vagon</label>
                        <input type="number" step = "0.001" class="form-control" id="priceWagon" name="wagon" value="<?=$config['Price_Wagon']?>" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Precio Unidad Contenedor</label>
                        <input type="number" step="0.001" class="form-control" id="priceContainer" name="container" value="<?=$config['Price_Container']?>" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">% de Descuento para envíos en Barcos</label>
                        <input type="number" step="0.001" class="form-control" id="discount" name="discount" value="<?=$config['Discount']?>" required >
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </body>
</html>
