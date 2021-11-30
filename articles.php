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
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Sleewell - Articles</title>

        <!-- Icon -->
        <link rel="icon" href="css/icons/sleewell.ico">

        <link rel="icon" href="./css/icons/sleewell.ico">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/cssanimation.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mdb.min.css" rel="stylesheet"> 
        <link href="css/font_color_sleewell.css" rel="stylesheet">
        <link href="css/registerform.css" rel="stylesheet">

        <!-- TOOLKIT -->
        <script type="text/javascript" src="js/toolkit/jquery.min.js"></script>
        <script type="text/javascript" src="js/toolkit/popper.min.js"></script>
        <script type="text/javascript" src="js/toolkit/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/toolkit/anime.min.js"></script>
        <script type="text/javascript" src="js/toolkit/mdb.min.js"></script>

        <!-- OUR SCRIPTS -->
        <script type="text/javascript" src="js/login.js"></script>

        <!-- FROM WEB -->
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
                <ul style="width:fit-content">
                    <?php if(!isset($_COOKIE["login"])) : ?>
                        <li><a id="logInBtn" href="" data-toggle="modal" data-target="#modalLRForm"><?php echo $lang['connexion-redirection'];?></a></li>
                    <?php else :?>
                        <li><a id="Deconnexion" href="#"><?php echo $lang['disconnect-button'];?></a></li>
                        <li><a id="ProfilButton" href="profile.php"><?php echo $lang['profile-button'];?></a></li>
                    <?php endif; ?>
                    <li>
                        <label for="btn-1" class="show dropdown-toggle"><span> <img src=<?php echo $lang['img_path'];?> style="width:20px;height:15px;"/></span> <?php echo $lang['selected-lang'];?></label>
                        <a class="dropdown-toggle" href=""><span> <img src=<?php echo $lang['img_path'];?> style="width:20px;height:15px;"/></span> <?php echo $lang['selected-lang'];?></a>
                        <input type="checkbox" id="btn-1">
                        <ul>
                            <li><a href="javascript:void(0)" class="language-link-item textMango" id="lang-fr" onclick="changeLanguage('fr');"><span> <img src="img/fra.png"></span> Français</a></li>
                            <li><a href="javascript:void(0)" class="language-link-item textMango" id="lang-en" onclick="changeLanguage('en');"><span> <img src="img/eng.png"></span> English</a></li>
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
        <!--           ARTICLES SECTION         -->
        <!--################################-->
        <div class="container-xxl">
        <h4 class="AmeberText" style="text-align:center"><?php echo $lang['articles_welcome'];?></h4><br><br>
            <table width="100%" style="text-align:center">
                <tr>
                    <td width="10%"></td>
                    <td><a href="https://hitek.fr/actualite/dormir-telephone-aullume-risques_2092"><img src="img/article_danger_telephone_sommeil.jpg" width="40%" height="40%"></a><a style="text-aling:center" href="https://hitek.fr/actualite/dormir-telephone-aullume-risques_2092"><?php echo "<br>Dormir avec son téléphone allumé comporte des risques"; ?></a></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td><a href="https://www.phonandroid.com/digital-detox-comment-deconnecter-smartphone-quand-accro.html"><img style="margin-top:2%" src="img/article_detox.jpeg" width="40%" height="40%"></a><a style="text-aling:center" href="https://www.phonandroid.com/digital-detox-comment-deconnecter-smartphone-quand-accro.html"><?php echo  "<br>Digital detox : comment se déconnecter de son smartphone ?"; ?></a></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td><a href="https://www.santemagazine.fr/medecines-alternatives/relaxation/nos-exercices-de-respiration-pour-combattre-le-stress-et-lanxiete-895156"><img style="margin-top:2%" src="img/article_respiration.jpeg" width="40%" height="40%"></a><a style="text-aling:center" href="https://www.santemagazine.fr/medecines-alternatives/relaxation/nos-exercices-de-respiration-pour-combattre-le-stress-et-lanxiete-895156"><?php echo "<br>Nos exercices de respiration pour combattre le stress et l'anxiété
"; ?></a></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td><a href="https://hellocare.com/blog/exercice-de-respiration/"><img style="margin-top:2%" src="img/article_exercice_respiration.jpg" width="40%" height="40%"></a><a style="text-aling:center" href="https://hellocare.com/blog/exercice-de-respiration/"><?php echo "<br>Exercice de respiration profonde ou respiration diaphragmatique"; ?></a></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td><a href="https://www.passeportsante.net/fr/Actualites/Dossiers/DossierComplexe.aspx?doc=10-choses-a-faire-pour-mieux-dormir"><img style="margin-top:2%" src="img/article_meilleur_sommeil.jpg" width="40%" height="40%"></a><a style="text-aling:center" href="https://www.passeportsante.net/fr/Actualites/Dossiers/DossierComplexe.aspx?doc=10-choses-a-faire-pour-mieux-dormir"><?php echo "<br>10 choses à faire pour mieux dormir
"; ?></a></td>
                </tr>
            </table></br></br>
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
                                <a id="connectionTab" class="notActive nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-user mr-1"></i><?php echo $lang['modal-login'];?></a>
                            </li>
                            <li class="nav-item">
                                <a id="registerTab" class="notActive nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="fas fa-user-plus mr-1"></i><?php echo $lang['modal-register'];?></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                                <form id="loginForm" action="profile.php" method="post">
                                <div class="modal-body mb-1">
                                    <div class="md-form form-sm mb-5">
                                        <i style="color:#ef952c;" class="fas fa-user prefix"></i>
                                        <input type="text" onkeyup="updateLoginInput()" name="id" id="loginUsername" class="form-control form-color form-control-sm validate">
                                        <label data-success="Super !" for="loginUsername"><?php echo $lang['modal-login-username'];?></label>
                                    </div>
                                    <div class="md-form form-sm mb-4">
                                        <i style="color:#ef952c;" class="fas fa-lock prefix"></i>
                                        <input type="password" onkeyup="updateLoginInput()" id="loginPassword" class="form-control form-color form-control-sm">
                                        <label name="password" for="loginPassword"><?php echo $lang['modal-login-password'];?></label>
                                    </div>
                                    <div class="text-center mt-2">
                                        <input type="button" id="LoginButton" class="btn Mango" value="<?php echo $lang['modal-login-btn'];?>" disabled></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="options text-center text-md-right mt-1">
                                        <p class="textMango"><?php echo $lang['modal-login-forgot'];?><a href="recovery.php"><?php echo $lang['modal-login-forgot-password'];?></a></p>
                                    </div>
                                    <button type="button" class="btn waves-effect ml-auto Mango" data-dismiss="modal"><?php echo $lang['modal-close'];?></button>
                                </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="panel2" role="tabpanel">
                                <form id="registerForm" action="profile.php" method="post">
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="md-form">
                                                <input type="text" id="registerLastName" class="form-control form-color">
                                                <label for="registerLastName"><?php echo $lang['modal-register-lastname'];?></label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="md-form">
                                                <input type="text" id="registerFirstName" class="form-control form-color">
                                                <label for="registerFirstName"><?php echo $lang['modal-register-firstname'];?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md-form mt-0">
                                        <input type="text" id="registerUsername" name="id" class="form-control form-color">
                                        <label for="registerUsername"><?php echo $lang['modal-register-username'];?></label>
                                    </div>
                                    <div class="md-form mt-0">
                                        <input onchange="checkRegisterMail()" type="email" id="registerEmail" class="form-control  form-color validate">
                                        <label data-error="Invalide" data-success="Super" for="registerEmail"><?php echo $lang['modal-register-email'];?></label>
                                        <!-- <small style="display: none;" id="registerPasswordHelpBlock" class="form-text text-muted mb-4">
                                            Votre email ne comporte pas @ ! -->
                                        </small>
                                    </div>
                                    <div class="md-form">
                                        <input type="password" onkeyup="checkRegisterPassword()" id="registerPassword" class="form-control form-color" aria-describedby="registerPasswordPasswordHelpBlock">
                                        <label for="registerPassword"><?php echo $lang['modal-register-password'];?></label>
                                        <small id="registerPasswordHelpBlock" class="form-text text-muted mb-4">
                                        <?php echo $lang['modal-register-placeholder'];?>
                                        </small>
                                    </div>
                                    <div class="md-form">
                                        <input type="password" onkeyup="checkRegisterPassword()" id="registerPasswordCheck" class="form-control form-color" aria-describedby="registerPasswordCheckPasswordHelpBlock">
                                        <label for="registerPasswordCheck"><?php echo $lang['modal-register-confirm'];?></label>
                                    </div>
                                    <div class="card card-cascade" id="message">
                                    <h5>Votre mot de passe ne contient pas les éléments suivants:</h5>
                                        <p id="number" class="invalid">Un <b>chiffre</b></p>
                                        <p id="length" class="invalid">Au moins <b>8 caractères</b></p>
                                        <p id="same" class="invalid">Ne sont pas <b>identiques</b></p>
                                    </div>
                                    <div class="text-center form-sm mt-2">
                                        <input type="button" id="RegisterButton" class="btn Mango" value="<?php echo $lang['modal-register-btn'];?>" disabled></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  waves-effect ml-auto Mango" data-dismiss="modal"><?php echo $lang['modal-close'];?></button>
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

    <script>
        function changeLanguage(lang) {
            if(lang=='en') {
                location = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=eng";
            } else if(lang=='fr') {
                location = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=fre";
            }
        }
    </script>
</html>