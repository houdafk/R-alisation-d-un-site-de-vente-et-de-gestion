<?php
include './app/classes/redirct.php';
$order = new OrdersController();
if(isset($_POST['submit'])){
foreach($_SESSION as $name => $product){
    if(substr($name,0,9) == "products_"){
       $data = array(
        "Email" => $_SESSION["Email"],
        "product" => $product["title"],
        "Qtt" => $product["Qtt"],
        "price" => $product["price"],
        "total" => $product["total"]
       );
       $order->addOrder($data);
    }else{
        Redirect::to("home");
    }
}
}

?>