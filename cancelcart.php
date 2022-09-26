<?php

$id = $_POST["Id_P"];
$price = $_POST["Prix"];
$data = new ProductsController();
$data->emptyCart($id,$price);

?>