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
        <div class="topnav">
            <nav>
                <div>
                    <a id="mainpage_btn" href="index.php"><img class="navbar-logo" src="img/logo_sleewell.png"/></a>
                </div>
                <label for="btn" class="icon">
                <span class="fa fa-bars"></span>
                </label>
                <input type="checkbox" id="btn">
                <ul>
                    <?php if(!isset($_COOKIE["login"])) : ?>
                        <li><a id="logInBtn" href="" data-toggle="modal" data-target="#modalLRForm"><?php echo $lang['connexion-redirection'];?></a></li>
                    <?php else :?>
                        <li><a id="Deconnexion" href="#"><?php echo "Deconnexion";?></a></li>
                        <li><a id="ProfilButton" href="profile.php"><?php echo "Profil";?></a></li>
                    <?php endif; ?>
                    <li>
                        <label for="btn-1" class="show dropdown-toggle"><span> <img src=<?php echo $lang['img_path'];?> style="width:20px;height:15px;"/></span> <?php echo $lang['selected-lang'];?></label>
                        <a class="dropdown-toggle" href="#"><span> <img src=<?php echo $lang['img_path'];?> style="width:20px;height:15px;"/></span> <?php echo $lang['selected-lang'];?></a>
                        <input type="checkbox" id="btn-1">
                        <ul>
                            <li><a href="#"><span> <img src="img/fra.png"></span> French</a></li>
                            <li><a href="#"><span> <img src="img/eng.png"></span> English</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        <div>

        <!--################################-->
        <!-- ENTÊTE / LOGO SLEEWELL SECTION -->
        <!--################################-->
        <table style="width:100%"><tr>
            <td colspan="1" width="33%"></td>
            <td colspan="1" width="34%">
                <div class="container-title" data-scrolly-down="blurInBottom, timing-function:cubic-bezier(.17,.67,.83,.67)">
                    <img src="img/logo_sleewell.png" class="sleewell-logo-size img-fluid"/>
                    <h1 class="title text-title">leewell</h1>
                </div>
            </td>
            <td colspan="1" width="33%"></td>
        </tr></table>

        <!--################################-->
        <!--           FORM SECTION         -->
        <!--################################-->
        <div>
            <!--<h4 class="AmeberText" style="text-align:center"><?php echo $lang['contact'];?></h4>
            <table width="100%">
                <td width="30%"></td>
                <td width="40%">
                    <form action="feedback_form.php" method="post">
                        <label class="BoldAmberText"><?php echo $lang['adresse'];?></label> <br/>
                        <input type="text" name="email_address" size="40" style="float:left;margin-bottom:10px;background-color:#00555E;color:#fff"><br/><br/>
                        <label><?php echo $lang['sujet'];?></label> </br>
                        <input type="text" name="sujet" size="40" style="float:left;margin-bottom:10px;background-color:#00555E;color:#fff"><br/><br/>
                        <label><?php echo $lang['message'];?></label> <br/>
                        <textarea name="feedback" cols="100" rows="5" style="float:left;margin-bottom:10px;background-color:#00555E;color:#fff"></textarea><br/><br/>
                        <input class="submit-button" type="submit" name="send" value=<?php echo $lang['envoi-mail'];?>><br/>
                    </form>
                </td>
                <td width="30%"></td>
            </table>-->


            <h4 class="AmeberText" style="text-align:center"><?php echo $lang['contact'];?></h4>
            <div class="card-body card-body-cascade text-center">
                <form action="feedback_form.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input style="color:white;" name="email_address" type="email" id="form80" class="form-control validate">
                            <label style="color:#FF8F00;" data-error="Incorrect" data-success="Excellent" for="form81"><?php echo $lang['adresse'];?></label>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input style="color:white;" name="sujet" type="text" id="form82" class="form-control">
                            <label style="color:#FF8F00;" data-error="Incorrect" data-success="Brillant" for="form83"><?php echo $lang['sujet'];?></label>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="md-form mb-0">
                            <textarea style="color:white;" name="feedback" type="text" id="form84" class="md-textarea form-control" rows="3"></textarea>
                            <label style="color:#FF8F00;" for="form85"><?php echo $lang['message'];?></label>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center my-4">
                        <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" name="send" value=<?php echo $lang['envoi-mail'];?> class="btn Mango btn-rounded"></span>
                        </div>
                    </div>
                    <!-- End of Fourth row -->
                </form>
            </div>
        </div>

        <!--################################-->
        <!--      MODAL LOGIN REGISTER      -->
        <!--################################-->

        <div class="modal fade " id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog GlobalBackground cascading-modal" role="document">
                <div class="modal-content GlobalBackground">
                    <div class="modal-c-tabs">
                        <ul class="nav nav-tabs md-tabs tabs-2 darken-3 SecondBackground" role="tablist">
                            <li class="nav-item">
                                <a id="connectionTab" class="notActive nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-user mr-1"></i>Se connecter</a>
                            </li>
                            <li class="nav-item">
                                <a id="registerTab" class="notActive nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="fas fa-user-plus mr-1"></i>S'enregistrer</a>
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
                                        <p>Forgot <a href="#" class="textMango">Password?</a></p>
                                    </div>
                                    <button id="CloseButton" type="button" class="btn waves-effect ml-auto Mango" data-dismiss="modal">Fermer</button>
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
                                    <button id="CloseButton" type="button" class="btn  waves-effect ml-auto Mango" data-dismiss="modal">Fermer</button>
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
        <?php include 'footer.php';?>
    </body>
</html>