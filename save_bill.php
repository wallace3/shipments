<?php

    include_once ('methods/bills.php');

    try{
        
        $bill = new Bills();
        $bill->unit = $_POST['unit'];
        $bill->transportation = $_POST['transportation'];
        $bill->quantity = $_POST['quantity'];

        if($bill->addBill()){
            header("Location: detail.php?id=".$bill->idBill);
        };

    }catch(Exception $e){
        echo $e;
    }

?>