<?php

    include_once('./config/connection.php');   // Conexion a BD

    class config {

        public $discount = '';
        public $wagon_price = '';
        public $container_price = '';
        
        public function getConfiguration(){     // Obtener información de la tabla config
            try{
                $connection = new Database();
                $query = $connection->prepare('SELECT * FROM config WHERE ID_Config = 1');    
                $query->execute();
                $data = $query->fetch();
                return $data;
            }
            catch(Exception $e){   
                echo $e;
            }
        }

        public function update(){    // Actualizar datos de configuración
            try {
                $connection = new Database();
                $query = $connection->prepare('UPDATE  config  set Price_Container = :container, Price_Wagon = :wagon, Discount = :discount');
                $query->bindParam(':container', $this->container_price);
                $query->bindParam(':wagon', $this->wagon_price);
                $query->bindParam(':discount', $this->discount);
                $query->execute();  
                return 1;
            }
            catch(Exception $e){
                echo $e;
            }
        }
    }

?>