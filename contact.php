<script>
  function validate() {
    var isValid = true;

    var name = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    if (name == "") {
      $("#name").css('border', '#fb0505 1px solid');
      isValid = false;
    }
    if (email == "") {
      $("#email").css('border', '#fb0505 1px solid');
      isValid = false;
    }
    if (!email.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
      $("#info").html("(Adresse email non valide)");
      $("#email").css('border', '#fb0505 1px solid');
      isValid = false;
    }
    if (subject == "") {
      $("#subject").css('border', '#fb0505 1px solid');
      isValid = false;
    }
    if (message == "") {
      $("#message").css('border', '#fb0505 1px solid');
      isValid = false;
    }
    return isValid;
  }
</script>
<?php

//Base de donnée
if(!empty($_POST["submit"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$connexion = mysqli_connect("localhost", "root", "", "stage") or die("Erreur de connexion: " . mysqli_error($connexion));
	$result = mysqli_query($connexion, "INSERT INTO contact (name, email, subject, message) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $message. "')");
	if($result){
		$db_msg = "Vos informations de contact sont enregistrées avec succés.";
		$type_db_msg = "success";
	}else{
		$db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
		$type_db_msg = "error";
	}
	
}
//l'envoie du mail
if(!empty($_POST["submit"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$toEmail = "pharmaciefihakhir@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $message, $mailHeaders)) {
	    $mail_msg = "Vos informations de contact ont été reçues avec succés.";
		$type_mail_msg = "success";
	}else{
		$mail_msg = "Erreur lors de l'envoi de l'e-mail.";
		$type_mail_msg = "error";
	}
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./images/img.jpg">

</head>

<body>
  <br><br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <h1 class="heading-section">Contactez nous</h1>
        <br>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <img src="https://stat.ameba.jp/user_images/20210703/22/3chi-ao/3e/70/j/o3584238914966883034.jpg" alt="" width="100%" class="backgtound">
        <div class="centered">
          <div class="wrapper img">
            <div class="row">
              <div class="col-md-10 col-lg-7">
                <div class="contact-wrap w-100 p-md-5 p-4">
                  <h3 class="mb-4">Dites nous tout!</h3>
                  <div id="form-message-warning" class="mb-4"></div>

                  <form id="form" name="contactForm" class="contactForm" onsubmit="return validate()" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="name">Nom prénom</label>
                          <input type="text" width="1000px" class="form-control" name="name" id="name" placeholder="Nom complet">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="email">Email </label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" width="100%">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="subject">Sujet</label>
                          <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="#">Message</label>
                          <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" name="submit" class="btn btn-success">
                          <div class="submitting"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
</body>
<style>
  .centered {
    position: absolute;
    top: 50%;
    left: 35%;
    transform: translate(-50%, -50%);
  }

  .form-control {
    -webkit-transition: none;
    -o-transition: none;
    transition: none;
  }

  .form-control::-ms-expand {
    background-color: transparent;
    border: 0;
  }

  .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #80bdff;
    outline: 0;
    -webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }

  .form-control::placeholder {
    color: #6c757d;
    opacity: 1;
  }

  .form-control:disabled,
  .form-control[readonly] {
    background-color: #e9ecef;
    opacity: 1;
  }

  select.form-control:focus::-ms-value {
    color: #495057;
    background-color: #fff;
  }

  .form-control-file,
  .form-control-range {
    display: block;
    width: 100%;
  }

  .col-form-label {
    padding-top: calc(0.375rem + 1px);
    padding-bottom: calc(0.375rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 1.5;
  }

  .col-form-label-lg {
    padding-top: calc(0.5rem + 1px);
    padding-bottom: calc(0.5rem + 1px);
    font-size: 1.25rem;
    line-height: 1.5;
  }

  .col-form-label-sm {
    padding-top: calc(0.25rem + 1px);
    padding-bottom: calc(0.25rem + 1px);
    font-size: 0.875rem;
    line-height: 1.5;
  }

  .form-control-plaintext {
    display: block;
    width: 100%;
    padding-top: 0.375rem;
    padding-bottom: 0.375rem;
    margin-bottom: 0;
    line-height: 1.5;
    color: #212529;
    background-color: transparent;
    border: solid transparent;
    border-width: 1px 0;
  }

  .form-control-plaintext.form-control-sm,
  .form-control-plaintext.form-control-lg {
    padding-right: 0;
    padding-left: 0;
  }

  .form-control-sm {
    height: calc(1.5em + 0.5rem + 2px);
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
  }

  .form-control-lg {
    height: calc(1.5em + 1rem + 2px);
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: 0.3rem;
  }

  select.form-control[size],
  select.form-control[multiple] {
    height: auto;
  }

  textarea.form-control {
    height: auto;
  }

  .form-group {
    margin-bottom: 1rem;
  }

  .form-text {
    display: block;
    margin-top: 0.25rem;
  }

  .form-row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -5px;
    margin-left: -5px;
  }

  .form-row>.col,
  .form-row>[class*="col-"] {
    padding-right: 5px;
    padding-left: 5px;
  }

  .form-check {
    position: relative;
    display: block;
    padding-left: 1.25rem;
  }



  .form-check-label {
    margin-bottom: 0;
  }

  .form-check-inline {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding-left: 0;
    margin-right: 0.75rem;
  }

  .col-md-12 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
  }

  .form-inline .form-group {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 0;
  }

  .form-group {
    margin-bottom: 1rem;
  }

  a.bg-primary:hover,
  a.bg-primary:focus,
  button.bg-primary:hover,
  button.bg-primary:focus {
    background-color: #0062cc !important;
  }

  .heading-section {
    font-size: 28px;
    color: #000;
  }

  body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
  }

  .media-body {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
  }

  .toast-body {
    padding: 0.75rem;
  }

  .modal-body {
    position: relative;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
  }

  .popover-body {
    padding: 0.5rem 0.75rem;
    color: #212529;
  }

  .text-body {
    color: #212529 !important;
  }

  .submitting {
    float: left;
    width: 100%;
    padding: 10px 0;
    display: none;
    font-size: 16px;
    font-weight: 500;
  }
</style>

</html>