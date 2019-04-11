<?php

    include_once './config/connection.php';

    class Bill_Detail {


    public $ID_Bill = '';
    public $Price = '';

    public function addDetail(){    // Funcion que se ejectura al generar la factura/pedido 
        try{
            
            $connection = new Database();
            $query = $connection->prepare('INSERT INTO bills_detail (ID_Bill, Price, Discount) VALUES(:ID_Bill, :Price, :Discount)');
            $query->bindParam(':ID_Bill', $this->ID_Bill);
            $query->bindParam(':Price', $this->Price);
            $query->bindParam(':Discount', $this->Discount);
            $query->execute();
    
        }catch(Exception $e)
        {
             echo $e;
        }
    }

    public static function getDetail($idBill)   // Traer Detalle
    {
        try
        {
            $connection = new Database();
            $query = $connection->prepare('SELECT * FROM bills_detail where ID_Bill = '.$idBill);    
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            var_dump($data);
        }catch(Exception $e)
        {
            echo $e;
        }
    }
 
}