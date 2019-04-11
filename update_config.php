<?php

    include_once 'methods/config.php';

    try{
     
        $config = new Config();
        $config->container_price = $_POST['container'];
        $config->wagon_price = $_POST['wagon'];
        $config->discount = $_POST['discount'];
        if($config->update()){
            header("Location: index.php");
        };
    }

    catch(Exception $e){
        echo $e;
    }
    
?>