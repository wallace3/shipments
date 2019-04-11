<?php

    include_once('./config/connection.php');   // Conexion a BD
    include_once('config.php');   // Incluimos para obtener datos de config para operaciones
    include_once('bill_detail.php');   // Incluimos para regresar detalle
  
    class Bills {

        public $transportation = '';
        public $quantity = '';
        public $unit = '';
        public $date = '';
        public $discount = '';
        const TABLA = 'bills';

        public function __construct() {
            $this->Date_Local = date("Y-m-d H:m");      // Función para seleccionar fecha de la expedición
        }

        public static function getBill($idBill){    // Función para traer detalle de Factura
            try
            {
                $connection = new Database();
                $query = $connection->prepare('SELECT * FROM bills where ID_Bill = '.$idBill);    
                $query->execute();
                $data = $query->fetch();
                return $data;
                
            }catch(Exception $e)
            {
                echo  $e;
            }
        }
 
        public static function getBills(){              // Función para traer todas las facturas expedidas
            try{
                $connection = new Database();
                $query = $connection->prepare('SELECT * FROM ' . self::TABLA . '');    
                $query->execute();
                $data = $query->fetchAll();
                return $data;
            }catch(Exception $e)
            {
                echo $e;
            }
        }

        public function addBill(){          // Funcion para generar nueva factura pedido
            try{
                $connection = new Database();
                $config = new Config();
                $config = $config->getConfiguration();
                $config['Discount'];
                var_dump($config['Discount']);
                $query = $connection->prepare('INSERT INTO ' . self::TABLA . ' (Transportation,Unit,Quantity,Date) VALUES (:transportation,:unit,:quantity,:Date_Local)');
                $query->bindParam(':transportation', $this->transportation);
                $query->bindParam(':unit', $this->unit);
                $query->bindParam(':quantity', $this->quantity);
                $query->bindParam(':Date_Local', $this->Date_Local);
                $query->execute();
              
                $this->idBill = $connection->lastInsertId();
            
                if($this->transportation == 'Barco' &&  $this->quantity >= 20){
                    for ($i=0; $i < $this->quantity; $i++){ 

                        $detail = new Bill_Detail();   // Para insertar el detail cuando es mayor a 20 y barco
                        $detail->ID_Bill = $this->idBill;
                  
                        $detail->Price = $config['Price_Container'];
                    
                        if($i <= 19){
                            $detail->Discount = (((float)$config['Discount']/100)*((float)$config['Price_Container']));
                        }else{
                            $detail->Discount = 0;
                        }
                        $detail->addDetail();
                    }
                }else{
                    for ($i=0; $i < $this->quantity; $i++) { 
                        $detail = new Bill_Detail();   // Para insertar el detail cuando es menor a 20
                        $detail->ID_Bill = $this->idBill;
                       
                        if($this->transportation == 'Barco'){
                            $detail->Price = $config['Price_Container'];
                        }else{
                            $detail->Price = $config['Price_Wagon'];
                        }
                        $detail->Discount = 0;
                        $detail->addDetail();
                    }
                }

                return 1;

            }catch(Exception $e){
                echo $e;
            }
        }

    }

?>