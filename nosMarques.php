<?php

include './controllers/marquecontroller.php';
include './models/Marques.php';

$marques = new MarquesController();
$marques = $marques->getAllMarques();
if (isset($_POST["Id_m"])) {
    $products = new ProductsController();
    $products = $products->getProductsByMarque($_POST['Id_m']);
} else {
    $data = new ProductsController();
    $products = $data->getAllProducts();
}
?>
<?php
	if(isset($_POST['find'])){
		$dataa = new ProductsController();
		$productts = $dataa->findProduct();
	}else{
		$dataa = new ProductsController();
		$productts = $dataa->getAllProducts();
	}
?>

<div class="container m-1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <form method="post" class="float-right mb-2 d-flex flex-row">
        <input type="text" class="form-control" name="search" placeholder="Recherche">
        <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <br><br><br>
    <div class="row">

        <br><br><br><br><br><br>
        <div id="marqus" class="col-md-2.5">
            <?php
            include './views/includes/alerts.php';
            ?>
            <H3 id="1" class="col-md-2.5 text-center">
                Marques <i class="fas fa-caret-down">     <?php if (isset($_POST["Id_m"]))   : ?>
          <a style="background-color: #c21e2e; color: white;" class="btn btn-lg float-right" href="<?php echo BASE_URL; ?>nosMarques"><i class="fa fa-trash"></i></a>&nbsp&nbsp&nbsp
        <?php endif; ?></i>
                
            </H3>
            <ul id="cat" class="list-group">
                <?php
                foreach ($marques as $marque) :
                ?>
                    <li class="list-group-item text-center">
                        <form id="catPro" method="post">
                            <input type="hidden" name="Id_m" id="Id_m">
                        </form>
                        <a onclick="getMarProducts(<?php echo $marque['Id_m']; ?>)" class="btn btn-link text-secondary">
                            <script>
                                function getMarProducts($id) {
                                    const input = document.querySelector("#Id_m");
                                    const form = document.querySelector("#catPro");
                                    input.value = $id;
                                    form.submit();
                                }
                            </script>
                            <?php
                            echo $marque['nom_m'];
                            ?>
                            (<?php
                                $productsByMar = new ProductsController();
                                $productsByMar = $productsByMar->getProductsByMarque($marque['Id_m']);
                                echo count($productsByMar);
                                ?>)
                        </a>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>

        </div>
        <br><br><br><br><br><br>
        <div class="col-md-8">
            <div class="row">
                <?php
                if (count($products) > 0) :

                ?>
                    <?php
                    foreach ($products as $product) :
                    ?>
                        <div class="col-md-5 mb-1">
                            <div class="card h-100 bg-white rounded p-2">
                                <div class="card-header bg-light">
                                    <form id="form" method="post" action="<?php echo BASE_URL; ?>show">
                                        <input type="hidden" name='Id_P' id='Id_P'>
                                    </form>
                                    <h3 onclick="submitForm(<?php echo $product['Id_P']; ?>)" class="card-title">
                                        <script>
                                            function submitForm($Id_P) {
                                                const input = document.querySelector("#Id_P");
                                                const form = document.querySelector("#form");
                                                input.value = $Id_P;
                                                form.submit();
                                            }
                                        </script>
                                        <?php
                                        echo $product['Nom_P'];
                                        ?>
                                    </h3>
                                </div>
                                <div class="card-img-top">
                                    <img width="500" height="700" src="./public/uploads/<?php echo $product['image']; ?>" class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        <?php
                                        echo $product['petite_desc'];
                                        ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <span class="badge badge-secondary p-2">
                                            <?php
                                            echo $product['Prix'];
                                            ?>Da
                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                <?php
                else :
                ?>
                    <br><br>
                    <div class="alert alert-info">
                        Aucun produit trouvé
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<br><br>
<br><br>
<style>    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";</style>
<br><br><br><br><br><br><br><br><br><br><br><br>

</html>