<?php

if(isset($_POST["Id_P"])){
    $id = $_POST["Id_P"];
    $data = new ProductsController();
    $product = $data->getProduct();

    if($_SESSION["products_".$id]["title"] == $_POST["Nom_P"]){
        Session::set("info","Vous avez déja ajouté ce produit au panier");
        Redirect::to("cart");
    }else{
        if($product->Qtt < $_POST["Qtt"]){
            Session::set("info","La quantité disponible est : $product->Qtt");
            Redirect::to("cart");
        }else{
            $_SESSION["products_".$product->Id_P] = array(
                "id" => $product->Id_P,
                "title" => $product->Nom_P,
                "price" => $product->Prix,
                "Qtt" => $_POST["Qtt"],
                "total" => $product->Prix * $_POST["Qtt"],
            );
            $_SESSION["totaux"] += $_SESSION["products_".$product->id]["total"];
            $_SESSION["count"] += 1;
            Redirect::to("cart");
        }
    }
}else{
    Redirect::to("cart");
}
?>