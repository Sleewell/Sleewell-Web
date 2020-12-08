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
        <title> Sleewell </title>
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
                <div class="text" data-scrolly-down="blurInBottom, timing-function:cubic-bezier(.17,.67,.83,.67)">
                    <h1 class="title AmeberText" style="line-height:250px;text_align:right;margin-top:50px"> <img src="img/logo_sleewell.png" style="float:left;width:200px;height:250px"/>leewell</h1>
                    <br/><br/><br/>
                </div>
            </td>
            <td colspan="1" width="40%"></td>
        </tr></table>

        <!--################################-->
        <!-- PROJECT PRESENTATON SECTION -->
        <!--################################-->
        <div>
            <!-- FIRST PRESENTATON PART SECTION -->
            <div class="oldblue-rounded-top"></div>
            <div style="background-color: #001822;">
                <table ><tr>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInRight, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3 class="AmeberText"><?php echo $lang['project-pres1'];?></h3>
                            <h4 class="AmeberText"><?php echo $lang['project-pres1bis'];?></h4>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img1stpres.svg" style="width:400px;height:312.5px;display: block;margin-left: auto;margin-right: auto;"/>
                        </div>
                    </td>
                </tr></table>
                <div class="rounded-top"></div>
            </div>
            <!-- SECOND PRESENTATON PART SECTION -->
            <div style="margin-bottom:100px">
                <table ><tr>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInRight, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img2ndpres.svg" style="width:400px;height:312.5px;display: block;margin-left: auto;margin-right: auto;"/>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3 class="AmeberText"><?php echo $lang['project-pres2'];?></h3>
                            <h4 class="AmeberText"><?php echo $lang['project-pres2bis'];?></h4>
                        </div>
                    </td>
                </tr></table>
            </div>
            <!-- THIRD PRESENTATON PART SECTION -->
            <div class="oldblue-rounded-top"></div>
            <div style="background-color: #001822;">
                <table ><tr>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInRight, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3 class="AmeberText"><?php echo $lang['project-pres3'];?></h3>
                            <h4 class="AmeberText"><?php echo $lang['project-pres3bis'];?></h4>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img3rdpres.svg" style="width:400px;height:312.5px;display: block;margin-left: auto;margin-right: auto;"/>
                        </div>
                    </td>
                </tr></table>
                <div class="rounded-top"></div>
            </div>
            <!-- LAST PRESENTATON PART SECTION -->
            <div style="margin-bottom:100px">
                <table ><tr>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInRight, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img4thpres.svg" style="width:400px;height:312.5px;display: block;margin-left: auto;margin-right: auto;"/>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3 class="AmeberText"><?php echo $lang['project-pres4'];?></h3>
                            <h4 class="AmeberText"><?php echo $lang['project-pres4bis'];?></h4>
                        </div>
                    </td>
                </tr></table>
            </div>
        </div>

        <!--################################-->
        <!--     PRÉSENTATION PRODUITS      -->
        <!--################################-->
        <div id="products">
            <table style="width:100%"><tr>
                </br><h1 class="AmeberText"><?php echo $lang['Products-pres'];?></h1>
            </tr><tr>
                <td colspan="1" width="50%">
                    <h2 class="AmeberText">Base</h2>
                </td>
                <td colspan="1" width="50%">
                    <h2 class="AmeberText">Application</h2>
                </td>
            </tr><tr>
                <td colspan="1" width="50%">
                    <img src="img/base.png" style="width:500px;height:375px;display:block;margin-left:auto;margin-right:auto;text-align:center"/>
                </td>
                <td colspan="1" width="50%">
                    <img src="img/app.png" style="width:300px;height:650px;display:block;margin-left:auto;margin-right:auto;text-align:center;margin-bottom:50px"/>
                </td>
            </tr></table>
                <a href="" class="btn btn-rounded my-3 Mango" style="display:block;margin-left:auto;margin-right:auto;max-width:300px" data-toggle="modal" data-target="#modalproductPres"><?php echo $lang['Products-button'];?></a>
            <br><br><br>
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
                    <a href="contact_us.php"><h4 class="AmeberText"><?php echo $lang['contact-redirection'];?></h4></a>
                </td>
            </tr></table>
        </footer>

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
        <!--          MODAL BASE APP        -->
        <!--################################-->

        <div class="modal fade " id="modalproductPres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog GlobalBackground cascading-modal" role="document">
                <div class="modal-content">
                    <div class="modal-c-tabs">
                        <ul class="nav nav-tabs md-tabs tabs-2 white darken-3" role="tablist">
                            <li class="nav-item">
                                <a class="notActive nav-link active" data-toggle="tab" href="#panelbase" role="tab">Base</a>
                            </li>
                            <li class="nav-item">
                                <a class="notActive nav-link" data-toggle="tab" href="#panelapp" role="tab">App</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in show active" id="panelbase" role="tabpanel">
                                <!-- Slideshow container -->
                                <div class="modal-body mb-1">
                                    <div class="slideshow-container">

                                        <!-- Full-width images with number and caption text -->
                                        <div class="mySlides fadebase">
                                            <div class="numbertext">1 / 4</div>
                                            <img src="img/base.png" style="width:80%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['base-pres1'];?></div>
                                        </div>

                                        <div class="mySlides fadebase">
                                            <div class="numbertext">2 / 4</div>
                                            <img src="img/base1.png" style="width:80%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['base-pres2'];?></div>
                                        </div>

                                        <div class="mySlides fadebase">
                                            <div class="numbertext">3 / 4</div>
                                            <img src="img/base2.png" style="width:80%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['base-pres3'];?></div>
                                        </div>

                                        <div class="mySlides fadebase">
                                            <div class="numbertext">4 / 4</div>
                                            <img src="img/base3.png" style="width:80%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['base-pres4'];?></div>
                                        </div>

                                        <!-- Next and previous buttons -->
                                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                    </div>
                                    </br></br>

                                        <!-- The dots/circles -->
                                    <div style="text-align:center">
                                        <span class="dot" onclick="currentSlide(1)"></span>
                                        <span class="dot" onclick="currentSlide(2)"></span>
                                        <span class="dot" onclick="currentSlide(3)"></span>
                                        <span class="dot" onclick="currentSlide(4)"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="panelapp" role="tabpanel">
                                <h3>PUTE</h3>
                                <!-- Slideshow container -->
                                <div class="modal-body">
                                    <div class="slideshow-containerApp">
                                        <!-- Full-width images with number and caption text -->
                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">1 / 5</div>
                                            <img src="img/app.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['app-pres1'];?></div>
                                        </div>

                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">2 / 5</div>
                                            <img src="img/app1.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['app-pres2'];?></div>
                                        </div>

                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">3 / 5</div>
                                            <img src="img/app2.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['app-pres3'];?></div>
                                        </div>

                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">4 / 5</div>
                                            <img src="img/app3.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['app-pres4'];?></div>
                                        </div>

                                        <div class="mySlidesApp fadeApp">
                                            <div class="numbertextApp">5 / 5</div>
                                            <img src="img/app4.png" style="width:45%;display:block;margin-left:auto;margin-right:auto"></br>
                                            <div class="AmeberText"><?php echo $lang['app-pres5'];?></div>
                                        </div>

                                        <!-- Next and previous buttons -->
                                        <a class="prevApp" onclick="plusSlidesApp(-1)">&#10094;</a>
                                        <a class="nextApp" onclick="plusSlidesApp(1)">&#10095;</a>
                                    </div>
                                    </br></br>

                                        <!-- The dots/circles -->
                                    <div style="text-align:center">
                                        <span class="dotApp" onclick="currentSlideApp(1)"></span>
                                        <span class="dotApp" onclick="currentSlideApp(2)"></span>
                                        <span class="dotApp" onclick="currentSlideApp(3)"></span>
                                        <span class="dotApp" onclick="currentSlideApp(4)"></span>
                                        <span class="dotApp" onclick="currentSlideApp(5)"></span>
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

    <script type="text/javascript" src="js/scrolly.js"></script>
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
    </script>
</html>
