<?php if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
    $myOrders = new OrdersController;
    $myOrders = $myOrders->getHistory();

}
?>
<div class="container">
    <div class="row my-3">
        <div class="col-md-13 mx-auto">
            <div class="card p-1">
                <table class="table table-hover table-inverse">
                    <h3 class="font-weight-bold">Mes commandes (<?php echo count ($myOrders); ?>)</h3>
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Total</th>
                            <th>Quantité</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($myOrders as $myOrder) : ?>
                            <tr>
                                <td><?php echo $myOrder["product"]; ?></td>
                                <td><?php echo $myOrder["total"]; ?></td>
                                <td><?php echo $myOrder["Qtt"]; ?></td>
                                <td><?php echo $myOrder["done_at"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
