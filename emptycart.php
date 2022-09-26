<?php
include './app/classes/redirct.php';
include './views/cart.php';
if (isset($_POST['submit'])) {
    $price = $_POST["Prix"];
$data = new ProductsController();
$data->emptyCart($id,$price);
}

