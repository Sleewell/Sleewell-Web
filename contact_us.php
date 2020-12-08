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
        <title>Sleewell - Contact</title>
        <link rel="icon" href="./css/icons/sleewell.ico">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/cssanimation.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mdb.min.css" rel="stylesheet"> 
        <link href="css/font_color_sleewell.css" rel="stylesheet">
        <link href="css/registerform.css" rel="stylesheet">

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script type="text/javascript" src="js/login.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/anime.min.js"></script>
        <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>

    </head>
    <body>

        <!--################################-->
        <!--              HEADER            -->
        <!--################################-->
        <header>
            <div id="langSelect">
                <a href="index.php"><img src="img/logo_sleewell.png" style="float:left;width:40px;height:50px;margin-left:5px;"/></a>
                <select class="select-css" name="choose-lang" onchange="location = this.value;">
                    <option value=""><?php echo $lang['selected-lang'];?></option>
                    <option class="fr" value="<?php echo $_SERVER['PHP_SELF']; ?>?lang=fre" style="background-image:url('img/eng.png');" >French</option>
                    <option class="en" value="<?php echo $_SERVER['PHP_SELF']; ?>?lang=eng" style="background-image:url('img/fra.png');" >English</option>
                </select>
                <img src=<?php echo $lang['img_path'];?> style="float:right;width:20px;height:15px;margin-left:5px;margin-top: 21px;"/>
                <a href="" class=" vertical-center btn btn-rounded my-3 Mango" data-toggle="modal" data-target="#modalLRForm"><?php echo $lang['connexion-redirection'];?></a>
            </div>
        </header>

        <!--################################-->
        <!-- ENTÊTE / LOGO SLEEWELL SECTION -->
        <!--################################-->
        <table style="width:100%"><tr>
            <td colspan="1" width="40%"></td>
            <td colspan="1" width="20%">
                <div class="text" data-scrolly-down="blurInTop, timing-function:cubic-bezier(.17,.67,.83,.67)">
                    <h1 class="title" style="line-height:250px;text_align:right;margin-top:50px"> <img src="img/logo_sleewell.png" style="float:left;width:200px;height:250px"/>leewell</h1>
                    <br/><br/><br/>
                </div>
            </td>
            <td colspan="1" width="40%"></td>
        </tr></table>

        <!--################################-->
        <!--           FORM SECTION         -->
        <!--################################-->
        <div>
            <h4 class="AmeberText" style="text-align:center"><?php echo $lang['contact'];?></h4>
            <table width="100%">
                <td width="30%"></td>
                <td width="40%">
                    <form action="feedback_form.php" method="post">
                        <label><?php echo $lang['adresse'];?></label> <br/>
                        <input type="text" name="email_address" size="40" style="float:left;margin-bottom:10px;background-color:#00555E;color:#fff"><br/><br/>
                        <label><?php echo $lang['sujet'];?></label> </br>
                        <input type="text" name="sujet" size="40" style="float:left;margin-bottom:10px;background-color:#00555E;color:#fff"><br/><br/>
                        <label><?php echo $lang['message'];?></label> <br/>
                        <textarea name="feedback" cols="100" rows="5" style="float:left;margin-bottom:10px;background-color:#00555E;color:#fff"></textarea><br/><br/>
                        <input class="submit-button" type="submit" name="send" value=<?php echo $lang['envoi-mail'];?>><br/>
                    </form>
                </td>
                <td width="30%"></td>
            </table>

            <!--################################-->
            <!--     FOLLOW NETWORKS SECTION    -->
            <!--################################-->
            <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                <h3 class="AmeberText" style="text-align:center"><?php echo $lang['reseaux'];?></h3>
                <div id="reseaux" style="text-align:center;margin-bottom:50px">
                    <a href="https://twitter.com/sleewell" class="button"><input type="image" class="contact" src="img/twitter.png"></a>
                    <a href="https://www.linkedin.com/company/sleewell" class="button"><input type="image" class="contact" src="img/linkedin.png" style="margin-right:100px;margin-left:100px;"></a>
                    <a href="https://www.instagram.com/sleewell_/" class="button"><input type="image" class="contact" src="img/insta.png"></a>
                </div>
            </div>
        </div>

        <!--################################-->
        <!--      MODAL LOGIN REGISTER      -->
        <!--################################-->
        <div class="modal fade " id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog GlobalBackground cascading-modal" role="document">
                <div class="modal-content">
                    <div class="modal-c-tabs">
                        <ul class="nav nav-tabs md-tabs tabs-2 white darken-3" role="tablist">
                            <li class="nav-item">
                                <a class="notActive nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-user mr-1"></i>Se connecter</a>
                            </li>
                            <li class="nav-item">
                                <a class="notActive nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="fas fa-user-plus mr-1"></i>S'enregistrer</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                                <form id="loginForm" action="profile.php" method="post">
                                <div class="modal-body mb-1">
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" onkeyup="updateLoginInput()" name="id" id="loginUsername" class="form-control form-control-sm validate">
                                        <label data-success="Super !" for="loginUsername">Votre identifiant</label>
                                    </div>
                                    <div class="md-form form-sm mb-4">
                                        <i class="fas fa-lock prefix"></i>
                                        <input type="password" onkeyup="updateLoginInput()" id="loginPassword" class="form-control form-control-sm">
                                        <label name="password" for="loginPassword">Votre superbe mot de passe</label>
                                    </div>
                                    <div class="text-center mt-2">
                                        <input type="button" id="LoginButton" class="btn Mango" value="Se connecter" disabled></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="options text-center text-md-right mt-1">
                                        <p>Forgot <a href="#" class="blue-text">Password?</a></p>
                                    </div>
                                    <button type="button" class="btn waves-effect ml-auto closeButtonMango" data-dismiss="modal">Fermer</button>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="panel2" role="tabpanel">
                                <form id="registerForm" action="profile.php" method="post">
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="md-form">
                                                <input type="text" id="registerLastName" class="form-control">
                                                <label for="registerLastName">Votre nom</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="md-form">
                                                <input type="text" id="registerFirstName" class="form-control">
                                                <label for="registerFirstName">Votre prénom</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md-form mt-0">
                                        <input type="text" id="registerUsername" name="id" class="form-control">
                                        <label for="registerUsername">Votre identifiant</label>
                                    </div>
                                    <div class="md-form mt-0">
                                        <input onchange="checkRegisterMail()" type="email" id="registerEmail" class="form-control validate">
                                        <label data-error="Invalide" data-success="Super" for="registerEmail">Votre email</label>
                                        <!-- <small style="display: none;" id="registerPasswordHelpBlock" class="form-text text-muted mb-4">
                                            Votre email ne comporte pas @ ! -->
                                        </small>
                                    </div>
                                    <div class="md-form">
                                        <input type="password" onkeyup="checkRegisterPassword()" id="registerPassword" class="form-control" aria-describedby="registerPasswordPasswordHelpBlock">
                                        <label for="registerPassword">Votre mot de passe</label>
                                        <small id="registerPasswordHelpBlock" class="form-text text-muted mb-4">
                                            Votre superbe mot de passe doit au moins contenir 8 caractères et 1 chiffre
                                        </small>
                                    </div>
                                    <div class="md-form">
                                        <input type="password" onkeyup="checkRegisterPassword()" id="registerPasswordCheck" class="form-control" aria-describedby="registerPasswordCheckPasswordHelpBlock">
                                        <label for="registerPasswordCheck">Votre mot de passe (le même)</label>
                                    </div>
                                    <div id="message">
                                    <h5>Votre mot de passe ne contient pas les éléments suivants:</h5>
                                        <p id="number" class="invalid">Un <b>chiffre</b></p>
                                        <p id="length" class="invalid">Au moins <b>8 caractères</b></p>
                                        <p id="same" class="invalid">Ne sont pas <b>identiques</b></p>
                                    </div>
                                    <div class="text-center form-sm mt-2">
                                        <input type="button" id="RegisterButton" class="btn Mango" value="S'enregistrer" disabled></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  waves-effect ml-auto closeButtonMango" data-dismiss="modal">Fermer</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--################################-->
        <!--          PIED DE PAGE          -->
        <!--################################-->
        <footer>
            <table style="width:100%"><tr>
                <td colspan="1" width="60%">
                    <img src="img/logo_sleewell.png" style="float:left;width:120px;height:150px;margin-left:100px"/>
                </td>
                <td colspan="1" width="40%">
                    <h3 class="AmeberText">SUPPORT</h3>
                    <a class="AmeberText" href="contact_us.php"><h4><?php echo $lang['contact-redirection'];?></h4></a>
                </td>
            </tr></table>
        </footer>
    </body>
</html>