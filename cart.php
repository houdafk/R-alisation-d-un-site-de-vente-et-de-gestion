<?php
include "./models/Order.php";
include "./controllers/orderscontroller.php";
if (isset($_POST["submit"])) {
    $createOrder = new OrdersController();
    $createOrder->addOrder($data);
}
?>
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-7 bg-white">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION as $name => $product) : ?>
                        <?php if (substr($name, 0, 9) == "products_") : ?>
                            <tr>
                                <td><?php echo $product["title"]; ?></td>
                                <td><?php echo $product["price"]; ?></td>
                                <td><?php echo $product["Qtt"]; ?></td>
                                <td><?php echo $product["total"]; ?> Da</td>
                                <td>
                                    <form method="post" action="<?php echo BASE_URL; ?>cancelcart">
                                        <input type="hidden" name="Id_P" value="<?php echo $product["id"]; ?>">
                                        <input type="hidden" name="Prix" value="<?php echo $product["total"]; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger text-white font-weight-bold p-1">
                                            &times;
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="col-4 col-md-4 float-right bg-white">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Produits</th>
                        <td>
                            <?php echo isset($_SESSION["count"]) ? $_SESSION["count"] : 0; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Total TTC</th>
                        <td>
                            <strong id="amount" data-amount="<?php echo $_SESSION["totaux"]; ?>">
                                <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0; ?> <span class="bb-danger">Da</span>
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0 && isset($_SESSION["logged"])) : ?>
            <form method="post" id="addOrder" action="<?php echo BASE_URL; ?>addOrder">
                <button type="submit" name="submit" class="btn btn-dark" type="button" id="btnn">Valider la commande</button>
            </form>
        <?php elseif (isset($_SESSION["count"]) && $_SESSION["count"] > 0) : ?>
            <a href="<?php echo BASE_URL; ?>login" style="background-color: black ; color: white;" class="btn btn-lg">Connectez vous pour terminer vos achats</a>
        <?php endif; ?>
    </div>
</div>
<style>    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";</style>
<br><br><br>