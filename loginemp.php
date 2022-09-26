<?php
include './controllers/logincontroller.php';

if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
        Redirect::to("home");
    }
    $loginUser = new UsersController();
    $loginUser->auth();

?>
<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container  text-center" id="AA">
    <br><br>
        <h1>Connectez vous!</h1>
        <br>
        <form method="post">
            <style>
                .form-control {
                    width: 60%;
                    margin-left: 20%;
                }
                h1{
                    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                }
            </style>
            <div class="form-group">
                <input type="Email" class="form-control" name="Email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
            </div>
            <br>
            <button type="submit" class="btn btn-dark" type="button" name="submit" id="btnn">Connexion</button>
            <br><br>
        </form>

    </div>
</body>
<style>    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";</style>
<br><br><br>
</html>







