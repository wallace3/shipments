<html>
    <head>
        <meta charset="UTF-8">
        <title>Generar Nueva Factura/Pedido</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <form action="save_bill.php" method="POST"> 
            <div class="col-md-12 row">
                <div class="col-md-12">
                    <div class=" mb-3 mr-2"><a href="index.php"><button type="button" class="btn btn-primary pull-rigth">Atras</button></a></div>
                    <hr>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <label >Medio de transporte</label>
                    <select class="form-control" name="transportation" required>
                        <option selected> -- Seleccione Transporte -- </option>
                        <option value="Barco">Barco</option>
                        <option value="Ferrocarril">Ferrocarril</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Nombre de la unidad</label>
                    <input type="text" class="form-control" name="unit" required>
                </div>
                <div class="form-group col-md-12">
                    <label >Cantidad de unidades</label>
                    <input type="number" class="form-control" name="quantity" required>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Generar</button>
                </div>
            </div>
        </form>
    </body>
</html>
