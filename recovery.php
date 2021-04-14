<?php
session_start();
if ( ! isset($_SESSION['lang'])) $_SESSION['lang'] = 'eng';
require ("lang/{$_SESSION['lang']}.php");

if (isset($_GET['lang']))
{
    $_SESSION['lang'] = $_GET['lang'];
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta charset="UTF-8">
        <title> Recover Account </title>
        <link rel="icon" href="./css/icons/sleewell.ico">
        <link rel="stylesheet" href="css/global.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mdb.min.css" rel="stylesheet"> 
        <link href="css/font_color_sleewell.css" rel="stylesheet">
        <link href="css/registerform.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script type="text/javascript" src="js/recovery.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/anime.min.js"></script>
        <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
    </head>
    <body>


    <table style="width:100%"><tr>
            <td colspan="1" width="33%"></td>
            <td colspan="1" width="34%">
                <?php 
                    if (isset($_GET['recovery_token'])) {
                ?>
                <div>
                    <form action="index.php" id="SecondStepRecoveryAccount" method="post">
                    <fieldset>
                    <legend class="" style="text-align: center;">Veuillez saisir votre nouveau mot de passe</legend>
                    <div class="modal-body mb-1 ">
                        <div class="md-form form-sm mb-5 ">
                            <i class="fas fa-lock prefix"></i>
                            <input onkeyup="checkForgotPassword()" style="color:#FFFFFF;"type="password" name="forgotPassword1" id="forgotPassword1" class="form-control form-control-sm validate">
                            <label style="color:#FF8F00;" data-success="Excellent" for="forgotPassword1">Votre nouveau mot de passe</label>
                        </div>
                        <div class="md-form form-sm mb-5 ">
                            <i class="fas fa-lock prefix"></i>
                            <input onkeyup="checkForgotPassword()" style="color:#FFFFFF;"type="password" name="forgotPassword2" id="forgotPassword2" class="form-control form-control-sm validate">
                            <label style="color:#FF8F00;" data-success="Parfait" for="forgotPassword2">Votre nouveau mot de passe</label>
                        </div>

                        <div id="message">
                        <h5>Votre mot de passe ne contient pas les éléments suivants:</h5>
                            <p id="number" class="invalid">Un <b>chiffre</b></p>
                            <p id="length" class="invalid">Au moins <b>8 caractères</b></p>
                            <p id="same" class="invalid">Ne sont pas <b>identiques</b></p>
                        </div>

                        <div class="text-center mt-2">
                            <input type="button" id="ChangePassword" class="btn Mango" value="Envoyer" disabled></input>
                        </div>
                    </div>
                    
                    </form>
                </div>
                <?php
                    }else {
                ?>
                <h3 id="waiting" style="text-align: center;display:none;">L'email de récupération a bien été envoyé !</h3>
                <div id="displayable">
                    <form id="FirstStepRecoveryAccount" method="post">
                    <fieldset>
                    <legend class="" style="text-align: center;">Vous avez oublié votre mot de passe ? Saisissez votre adresse mail afin de recevoir un email de récupération de compte !</legend>
                    <div class="modal-body mb-1 ">
                        <div class="md-form form-sm mb-5 ">
                            <i class="fas fa-user prefix "></i>
                            <input onkeyup="checkForgotEmail()" style="color:#FFFFFF;"type="email" name="forgotEmail" id="forgotEmail" class="form-control form-control-sm validate">
                            <label style="color:#FF8F00;" data-success="Super !" for="forgotEmail">Votre email</label>
                        </div>
                        <div class="text-center mt-2">
                            <input type="button" id="sendForgotPassword" class="btn Mango" disabled value="Envoyer"></input>
                        </div>
                    </div>
                    </form>
                </div>

                <?php } ?>
            </td>
            <td colspan="1" width="33%"></td>
        </tr>
    </table>
    </body>
    <footer style="position: absolute;bottom:0;">
        <div style="color:#FF8F00;"; class=container>
            <div class="row" style="text-align:center;">
                <div class="col-xs-8 col-sm-8">
                    <img src="img/logo_sleewell.png" style="float:left;width:110px;height:150px;margin-left:100px"/>
                </div>
                <div class="col-xs-4 col-sm-4">
                    <h3><?php echo $lang['contact-title']; ?></h3>
                    <a id="contactus_btn" href="contact_us.php"><h4 class="AmeberText"><?php echo $lang['contact-redirection']; ?></h4></a>
                    <div id="reseaux" style="text-align:center;margin-bottom:50px">
                        <a href="https://twitter.com/sleewell"><img type="image" class="contact" src="img/twitter.png" style="width:50px;height:50px;"/></a>
                        <a href="https://www.linkedin.com/company/sleewell"><img type="image" class="contact" src="img/linkedin.png" style="width:50px;height:50px;"/></a>
                        <a href="https://www.instagram.com/sleewell_/"><img type="image" class="contact" src="img/insta.png" style="width:50px;height:50px;"/></a>
                    </div>
                </div>
                <div style="text-align:center;" class="col-xs-12 col-sm-12">
                    <?php echo $lang['copyright']; ?>
                </div>
            </div>
        </div>
</footer>
</html>
