<?php
include "./models/User.php";
include "./controllers/userscontroller.php";
if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
    Redirect::to("home");
}
if (isset($_POST["submit"])) {
    $createUser = new UsersController();
    $createUser->register();
}
?>
<!DOCTYPE html>
<html lang="en">

<body>



    <a href="https://front.codes/" class="logo" target="_blank">
        <img src="https://assets.codepen.io/1462889/fcy.png" alt="">
    </a>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Inscription</h4>
                                            <form name="f" method="post" >
                                                <div class="form-group mt-2">
                                                    <input type="text" name="Nom_U" class="form-style" placeholder="Nom" id="Nom_U" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="Prenom_U" class="form-style" placeholder="Prenom" id="Prenom_U" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="Wilaya" class="form-style" placeholder="Wilaya de résidence" id="Wilaya" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="Ville" class="form-style" placeholder="Ville de résidence" id="Ville" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="Email" class="form-style" placeholder="Email" id="Email" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="tel" name="Tel" class="form-style" placeholder="N° téléphone" id="Tel" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="mdp" class="form-style" placeholder="Mot de passe" id="mdp" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" name="submit" type="button" id="btnn" class="btn mt-4">S'incrire</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                /* Please ❤ this if you like it! */

                @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900");

                body {
                    font-family: "Poppins", sans-serif;
                    font-weight: 300;
                    font-size: 15px;
                    line-height: 1.7;
                    color: #c4c3ca;
                    background-color: #1f2029;
                    overflow-x: hidden;
                }

                a {
                    cursor: pointer;
                    transition: all 200ms linear;
                }

                a:hover {
                    text-decoration: none;
                }

                .link {
                    color: #c4c3ca;
                }

                .link:hover {
                    color: #ffeba7;
                }

                p {
                    font-weight: 500;
                    font-size: 14px;
                    line-height: 1.7;
                }

                h4 {
                    font-weight: 600;
                }

                h6 span {
                    padding: 0 20px;
                    text-transform: uppercase;
                    font-weight: 700;
                }

                .section {
                    position: relative;
                    width: 100%;
                    display: block;
                }

                .full-height {
                    min-height: 100vh;
                }

                [type="checkbox"]:checked,
                [type="checkbox"]:not(:checked) {
                    position: absolute;
                    left: -9999px;
                }

                .checkbox:checked+label,
                .checkbox:not(:checked)+label {
                    position: relative;
                    display: block;
                    text-align: center;
                    width: 60px;
                    height: 16px;
                    border-radius: 8px;
                    padding: 0;
                    margin: 10px auto;
                    cursor: pointer;
                    background-color: #ffeba7;
                }

                .checkbox:checked+label:before,
                .checkbox:not(:checked)+label:before {
                    position: absolute;
                    display: block;
                    width: 36px;
                    height: 36px;
                    border-radius: 50%;
                    color: #ffeba7;
                    background-color: #102770;
                    font-family: "unicons";
                    content: "\eb4f";
                    z-index: 20;
                    top: -10px;
                    left: -10px;
                    line-height: 36px;
                    text-align: center;
                    font-size: 24px;
                    transition: all 0.5s ease;
                }

                .checkbox:checked+label:before {
                    transform: translateX(44px) rotate(-270deg);
                }

                .card-3d-wrap {
                    position: relative;
                    width: 440px;
                    max-width: 100%;
                    height: 400px;
                    -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d;
                    perspective: 800px;
                    margin-top: 60px;
                }

                .card-3d-wrapper {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d;
                    transition: all 600ms ease-out;
                }

                .card-front,
                .card-back {
                    width: 100%;
                    height: 500px;
                    background-color: #2a2b38;
                    background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg");
                    background-position: bottom center;
                    background-repeat: no-repeat;
                    background-size: 300%;
                    position: absolute;
                    border-radius: 6px;
                    left: 0;
                    top: 0;
                    -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d;
                    -webkit-backface-visibility: hidden;
                    -moz-backface-visibility: hidden;
                    -o-backface-visibility: hidden;
                    backface-visibility: hidden;
                }

                .card-back {
                    transform: rotateY(180deg);
                }

                .checkbox:checked~.card-3d-wrap .card-3d-wrapper {
                    transform: rotateY(180deg);
                }

                .center-wrap {
                    position: absolute;
                    width: 100%;
                    padding: 0 35px;
                    top: 50%;
                    left: 0;
                    transform: translate3d(0, -50%, 35px) perspective(100px);
                    z-index: 20;
                    display: block;
                }

                .form-group {
                    position: relative;
                    display: block;
                    margin: 0;
                    padding: 0;
                }

                .form-style {
                    padding: 13px 20px;
                    padding-left: 55px;
                    height: 48px;
                    width: 100%;
                    font-weight: 500;
                    border-radius: 4px;
                    font-size: 14px;
                    line-height: 22px;
                    letter-spacing: 0.5px;
                    outline: none;
                    color: #c4c3ca;
                    background-color: #1f2029;
                    border: none;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                    box-shadow: 0 4px 8px 0 rgba(21, 21, 21, 0.2);
                }

                .form-style:focus,
                .form-style:active {
                    border: none;
                    outline: none;
                    box-shadow: 0 4px 8px 0 rgba(21, 21, 21, 0.2);
                }

                .input-icon {
                    position: absolute;
                    top: 0;
                    left: 18px;
                    height: 48px;
                    font-size: 24px;
                    line-height: 48px;
                    text-align: left;
                    color: #ffeba7;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .form-group input:-ms-input-placeholder {
                    color: #c4c3ca;
                    opacity: 0.7;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .form-group input::-moz-placeholder {
                    color: #c4c3ca;
                    opacity: 0.7;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .form-group input:-moz-placeholder {
                    color: #c4c3ca;
                    opacity: 0.7;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .form-group input::-webkit-input-placeholder {
                    color: #c4c3ca;
                    opacity: 0.7;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .form-group input:focus:-ms-input-placeholder {
                    opacity: 0;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .form-group input:focus::-moz-placeholder {
                    opacity: 0;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .form-group input:focus:-moz-placeholder {
                    opacity: 0;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .form-group input:focus::-webkit-input-placeholder {
                    opacity: 0;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                }

                .btn {
                    border-radius: 4px;
                    height: 44px;
                    font-size: 13px;
                    font-weight: 600;
                    text-transform: uppercase;
                    -webkit-transition: all 200ms linear;
                    transition: all 200ms linear;
                    padding: 0 30px;
                    letter-spacing: 1px;
                    display: -webkit-inline-flex;
                    display: -ms-inline-flexbox;
                    display: inline-flex;
                    -webkit-align-items: center;
                    -moz-align-items: center;
                    -ms-align-items: center;
                    align-items: center;
                    -webkit-justify-content: center;
                    -moz-justify-content: center;
                    -ms-justify-content: center;
                    justify-content: center;
                    -ms-flex-pack: center;
                    text-align: center;
                    border: none;
                    background-color: #ffeba7;
                    color: #102770;
                    box-shadow: 0 8px 24px 0 rgba(255, 235, 167, 0.2);
                }

                .btn:active,
                .btn:focus {
                    background-color: #102770;
                    color: #ffeba7;
                    box-shadow: 0 8px 24px 0 rgba(16, 39, 112, 0.2);
                }

                .btn:hover {
                    background-color: #102770;
                    color: #ffeba7;
                    box-shadow: 0 8px 24px 0 rgba(16, 39, 112, 0.2);
                }

                .logo {
                    position: absolute;
                    top: 30px;
                    right: 30px;
                    display: block;
                    z-index: 100;
                    transition: all 250ms linear;
                }

                .logo img {
                    height: 26px;
                    width: auto;
                    display: block;
                }
            </style>