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

        <title> Sleewell </title>

        <link rel="icon" href="./css/icons/sleewell.ico">

        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/cssanimation.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mdb.min.css" rel="stylesheet"> 
        <link href="css/font_color_sleewell.css" rel="stylesheet">
        <link href="css/registerform.css" rel="stylesheet">
        <link href="css/carousel.css" rel="stylesheet">

        <script type="text/javascript" src="js/toolkit/jquery.min.js"></script>
        <script type="text/javascript" src="js/toolkit/popper.min.js"></script>
        <script type="text/javascript" src="js/toolkit/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/toolkit/mdb.min.js"></script>
        <script type="text/javascript" src="js/toolkit/anime.min.js"></script>
        <script type="text/javascript" src="js/toolkit/scrolly.js"></script>

        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript" src="js/register.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
    </head>
    <body>

        <!--################################-->
        <!--              HEADER            -->
        <!--################################-->

        <div class="topnav">
            <nav>
                <div>
                    <a id="mainpage_btn" href=""><img class="navbar-logo" src="img/logo_sleewell.png"/></a>
                </div>
                <label for="btn" class="icon">
                <span class="fa fa-bars"></span>
                </label>
                <input type="checkbox" id="btn">
                <ul>
                    <?php if(!isset($_COOKIE["login"])) : ?>
                        <li><a id="logInBtn" href="" data-toggle="modal" data-target="#modalLRForm"><?php echo $lang['connexion-redirection'];?></a></li>
                    <?php else :?>
                        <li><a id="Deconnexion" href="#"><?php echo $lang['disconnect-button'];?></a></li>
                        <li><a id="ProfilButton" href="profile.php"><?php echo "Profil";?></a></li>
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
        <div>
            <div class="demo-page-title" id="demo-page-title"></div>
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
        </div>



        <!--################################-->
        <!-- PROJECT PRESENTATON SECTION -->
        <!--################################-->

        <div class="container-xxl">
            <!-- FIRST PRESENTATON PART SECTION -->
            <div class="oldblue-rounded-top"></div>
            <!-- <div style="background-color: #001822;"> -->
                <div>
                <table style="width:100%"><tr >
                    <td colspan="1" width="50%">
                        <div class="text placed-right" data-scrolly-down="blurInRight, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3 class="BoldAmberText"><?php echo $lang['project-pres1'];?></h3>
                            <h4 class="AmeberText"><?php echo $lang['project-pres1bis'];?></h4>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img1stpres.svg" class="img_presentation_left"/>
                        </div>
                    </td>
                </tr></table>
                <div class="bckg-rounded-top"></div>
            </div>
            <!-- SECOND PRESENTATON PART SECTION -->
            <div style="margin-bottom:2vw">
                <table><tr>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInRight, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img2ndpres.svg" class="img_presentation_right"/>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text placed-left" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3 class="BoldAmberText"><?php echo $lang['project-pres2'];?></h3>
                            <h4 class="AmeberText"><?php echo $lang['project-pres2bis'];?></h4>
                        </div>
                    </td>
                </tr></table>
            </div>
            <!-- THIRD PRESENTATON PART SECTION -->
            <div class="oldblue-rounded-top"></div>
            <div >
            <!-- <div style="background-color: #001822;"> -->
                <table ><tr>
                    <td colspan="1" width="50%">
                        <div class="text placed-right" data-scrolly-down="blurInRight, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3 class="BoldAmberText"><?php echo $lang['project-pres3'];?></h3>
                            <h4 class="AmeberText"><?php echo $lang['project-pres3bis'];?></h4>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img3rdpres.svg" class="img_presentation_left"/>
                        </div>
                    </td>
                </tr></table>
                <div class="bckg-rounded-top"></div>
            </div>
            <!-- LAST PRESENTATON PART SECTION -->
            <div style="margin-bottom:2vw">
                <table ><tr>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInRight, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img4thpres.svg" class="img_presentation_right"/>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text placed-left" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3 class="BoldAmberText"><?php echo $lang['project-pres4'];?></h3>
                            <h4 class="AmeberText"><?php echo $lang['project-pres4bis'];?></h4>
                        </div>
                    </td>
                </tr></table>
            </div>
        </div>

        <!--################################-->
        <!--     PRÉSENTATION PRODUITS      -->
        <!--################################-->
        <!-- <div class="oldblue-rounded-top"></div>
        <div class="products">
            <table style="width:100%"><tr>
                <td colspan="1" width="50%" height="10vw">
                <h2 class="AmeberText">Base</h2>
                <div class="basepres"><img src="img/base.png" class="base_img img-fluid"/></div>
                </td>
                <td colspan="1" width="50%" height="10vw">
                <h2 class="AmeberText">Application</h2>
                <div class="apppres"><img src="img/imgpresapp.png" class="app_img img-fluid"/></div>
                </td>
            </tr></table>
            <a id="info_btn" href="" class="btn btn-rounded my-3 Mango" style="display:block;margin-left:auto;margin-right:auto;max-width:250px" data-toggle="modal" data-target="#modalproductPres"><?php echo $lang['Products-button'];?></a>
            <br><br><br>
        </div> -->
        <div class="container">
            <section>
                <div class="slide">
                    <div class="content">
                            <h2><?php echo $lang['app-title1'];?></h2>
                            <p><?php echo $lang['app-text1'];?></p>
                    </div>
                </div>
                <div class="slide">
                    <div class="content">
                            <h2><?php echo $lang['app-title2'];?></h2>
                            <p><?php echo $lang['app-text2'];?></p>
                    </div>
                </div>
                <div class="slide">
                    <div class="content">
                            <h2><?php echo $lang['app-title3'];?></h2>
                            <p><?php echo $lang['app-text3'];?></p>
                    </div>
                </div>
                <div class="slide">
                    <div class="content">
                            <h2><?php echo $lang['app-title4'];?></h2>
                            <p><?php echo $lang['app-text4'];?></p>
                    </div>
                </div>
            </section>
        </div>
        <div style="margin-top: 20px;"></div>
        <hr style="border-top: 2px solid #ff8f00; border-radius: 5px; margin: auto; width: 80%;padding-bottom: 2em;">
        <div class=container>
            <div class="row" style="text-align:center;">
                <div class="col-xs-6 col-sm-6">
                    <img src="img/android.png" style="width: 60%;"/>
                </div>
                <div class="col-xs-6 col-sm-6" style="margin-top: 5%;">
                    <h1 style="text-align:left !important;"><?php echo $lang['download-text'];?></h1>
                    <form method="get" action="sleewell.apk">
                        <button type="submit" style="margin-right:10%" class="btn  waves-effect ml-auto Mango"><?php echo $lang['download-button'];?></button>
                    </form>
                </div>
            </div>
        </div>
        
        <div style="margin-top: 20px;"></div>

        <!--################################-->
        <!--          PIED DE PAGE          -->
        <!--################################-->
        
        <?php include 'footer.php';?>

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
                                        <i style="color:#ef952c;" class="fas fa-user prefix"></i>
                                        <input type="text" onkeyup="updateLoginInput()" name="id" id="loginUsername" class="form-control form-color form-control-sm validate">
                                        <label data-success="Super !" for="loginUsername">Votre identifiant</label>
                                    </div>
                                    <div class="md-form form-sm mb-4">
                                        <i style="color:#ef952c;" class="fas fa-lock prefix"></i>
                                        <input type="password" onkeyup="updateLoginInput()" id="loginPassword" class="form-control form-color form-control-sm">
                                        <label name="password" for="loginPassword">Votre superbe mot de passe</label>
                                    </div>
                                    <div class="text-center mt-2">
                                        <input type="button" id="LoginButton" class="btn Mango" value="Se connecter" disabled></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="options text-center text-md-right mt-1">
                                        <p class="textMango">Forgot <a href="recovery.php">Password?</a></p>
                                    </div>
                                    <button type="button" class="btn waves-effect ml-auto Mango" data-dismiss="modal">Fermer</button>
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
                                                <label for="registerLastName">Votre nom</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="md-form">
                                                <input type="text" id="registerFirstName" class="form-control form-color">
                                                <label for="registerFirstName">Votre prénom</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md-form mt-0">
                                        <input type="text" id="registerUsername" name="id" class="form-control form-color">
                                        <label for="registerUsername">Votre identifiant</label>
                                    </div>
                                    <div class="md-form mt-0">
                                        <input onchange="checkRegisterMail()" type="email" id="registerEmail" class="form-control  form-color validate">
                                        <label data-error="Invalide" data-success="Super" for="registerEmail">Votre email</label>
                                        <!-- <small style="display: none;" id="registerPasswordHelpBlock" class="form-text text-muted mb-4">
                                            Votre email ne comporte pas @ ! -->
                                        </small>
                                    </div>
                                    <div class="md-form">
                                        <input type="password" onkeyup="checkRegisterPassword()" id="registerPassword" class="form-control form-color" aria-describedby="registerPasswordPasswordHelpBlock">
                                        <label for="registerPassword">Votre mot de passe</label>
                                        <small id="registerPasswordHelpBlock" class="form-text text-muted mb-4">
                                            Votre superbe mot de passe doit au moins contenir 8 caractères et 1 chiffre
                                        </small>
                                    </div>
                                    <div class="md-form">
                                        <input type="password" onkeyup="checkRegisterPassword()" id="registerPasswordCheck" class="form-control form-color" aria-describedby="registerPasswordCheckPasswordHelpBlock">
                                        <label for="registerPasswordCheck">Votre mot de passe (le même)</label>
                                    </div>
                                    <div class="card card-cascade" id="message">
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
                                    <button type="button" class="btn  waves-effect ml-auto Mango" data-dismiss="modal">Fermer</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--################################-->
        <!--          MODAL BASE APP        -->
        <!--################################-->

        <div class="modal fade " id="modalproductPres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog GlobalBackground cascading-modal" role="document">
                <div class="modal-content GlobalBackground">
                    <div class="modal-c-tabs">
                        <ul class="nav nav-tabs md-tabs tabs-2 darken-3 SecondBackground" role="tablist">
                            <li class="nav-item">
                                <a id="info_base" class="notActive nav-link active" data-toggle="tab" href="#panelbase" role="tab">Base</a>
                            </li>
                            <li class="nav-item">
                                <a id="info_app" class="notActive nav-link" data-toggle="tab" href="#panelapp" role="tab">App</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in show active" id="panelbase" role="tabpanel">
                                <!-- Slideshow container -->
                                <div class="modal-body mb-1">
                                    <div class="slideshow-container">

                                        <!-- Full-width images with number and caption text -->
                                        <div class="mySlides fadebase">
                                            <div class="numbertext">1 / 4</div><br/><br/>
                                            <img src="img/base.png" style="width:80%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['base-pres1'];?></div>
                                        </div>

                                        <div class="mySlides fadebase">
                                            <div class="numbertext">2 / 4</div><br/><br/>
                                            <img src="img/base1.png" style="width:80%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['base-pres2'];?></div>
                                        </div>

                                        <div class="mySlides fadebase">
                                            <div class="numbertext">3 / 4</div><br/><br/>
                                            <img src="img/base2.png" style="width:80%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['base-pres3'];?></div>
                                        </div>

                                        <div class="mySlides fadebase">
                                            <div class="numbertext">4 / 4</div><br/><br/>
                                            <img src="img/base3.png" style="width:80%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['base-pres4'];?></div>
                                        </div>

                                        <!-- Next and previous buttons -->
                                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                    </div>
                                    </br></br>

                                        <!-- The dots/circles -->
                                    <div style="text-align:center">
                                        <span id="1Base_info" class="dot" onclick="currentSlide(1)"></span>
                                        <span id="2Base_info" class="dot" onclick="currentSlide(2)"></span>
                                        <span id="3Base_info" class="dot" onclick="currentSlide(3)"></span>
                                        <span id="4Base_info" class="dot" onclick="currentSlide(4)"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="panelapp" role="tabpanel">
                                <!-- Slideshow container -->
                                <div class="modal-body">
                                    <div class="slideshow-containerApp">
                                        <!-- Full-width images with number and caption text -->
                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">1 / 5</div><br/>
                                            <img src="img/app.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['app-pres1'];?></div>
                                        </div>

                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">2 / 5</div><br/>
                                            <img src="img/app1.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['app-pres2'];?></div>
                                        </div>

                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">3 / 5</div><br/>
                                            <img src="img/app2.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['app-pres3'];?></div>
                                        </div>

                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">4 / 5</div><br/>
                                            <img src="img/app3.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['app-pres4'];?></div>
                                        </div>

                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">5 / 5</div><br/>
                                            <img src="img/app4.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmberText"><?php echo $lang['app-pres5'];?></div>
                                        </div>

                                        <!-- Next and previous buttons -->
                                        <a class="prevApp" onclick="plusSlidesApp(-1)">&#10094;</a>
                                        <a class="nextApp" onclick="plusSlidesApp(1)">&#10095;</a>
                                    </div>
                                    </br></br>

                                        <!-- The dots/circles -->
                                    <div style="text-align:center">
                                        <span id="1App_info" class="dotApp" onclick="currentSlideApp(1)"></span>
                                        <span id="2App_info" class="dotApp" onclick="currentSlideApp(2)"></span>
                                        <span id="3App_info" class="dotApp" onclick="currentSlideApp(3)"></span>
                                        <span id="4App_info" class="dotApp" onclick="currentSlideApp(4)"></span>
                                        <span id="5App_info" class="dotApp" onclick="currentSlideApp(5)"></span>
                                    </div>
                                <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!--################################-->
    <!--    SCRIPTS SCROLL SLIDESHOW    -->
    <!--################################-->
    <script>
        window.onload = function() {
            scrolly();
        };
        //BASE INDEX//
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
        
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }

        //APP INDEX//
        var slideIndexApp = 1;
        showSlidesApp(slideIndexApp);

        function plusSlidesApp(n) {
            showSlidesApp(slideIndexApp += n);
        }

        function currentSlideApp(n) {
            showSlidesApp(slideIndexApp = n);
        }

        function showSlidesApp(n) {
            var i;
            var slides = document.getElementsByClassName("mySlidesApp");
            var dots = document.getElementsByClassName("dotApp");
        
            if (n > slides.length) {
                slideIndexApp = 1
            }
            if (n < 1) {
                slideIndexApp = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndexApp-1].style.display = "block";
            dots[slideIndexApp-1].className += " active";	
        }

        function changeLanguage(lang) {
            if(lang=='en') {
                location = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=eng";
            } else if(lang=='fr') {
                location = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=fre";
            }
        }
    </script>
</html>
