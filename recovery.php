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
</html>
