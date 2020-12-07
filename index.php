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
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" href="css/cssanimation.css"> 
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
                <img src=<?php echo $lang['img_path'];?> style="float:right;width:20px;height:15px;margin-left:5pxmargin-right:30px;margin-top: 18px;"/>
                <a class="vertical-center" href="contact_us.php"><?php echo $lang['register-redirection'];?></a>
                <a class="vertical-center" href="contact_us.php"><?php echo $lang['connexion-redirection'];?></a>
            </div>
        </header>

        <!--################################-->
        <!-- ENTÊTE / LOGO SLEEWELL SECTION -->
        <!--################################-->
        <table style="width:100%"><tr>
            <td colspan="1" width="40%"></td>
            <td colspan="1" width="20%">
                <div class="text" data-scrolly-down="blurInBottom, timing-function:cubic-bezier(.17,.67,.83,.67)">
                    <h1 class="title" style="line-height:250px;text_align:right;margin-top:50px"> <img src="img/logo_sleewell.png" style="float:left;width:200px;height:250px"/>leewell</h1>
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
                            <h3><?php echo $lang['project-pres1'];?></h3>
                            <h4><?php echo $lang['project-pres1bis'];?></h4>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img1stpres.svg" style="width:200px;height:250px;display: block;margin-left: auto;margin-right: auto;"/>
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
                            <img src="img/img2ndpres.svg" style="width:200px;height:250px;display: block;margin-left: auto;margin-right: auto;"/>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3><?php echo $lang['project-pres2'];?></h3>
                            <h4><?php echo $lang['project-pres2bis'];?></h4>
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
                            <h3><?php echo $lang['project-pres3'];?></h3>
                            <h4><?php echo $lang['project-pres3bis'];?></h4>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <img src="img/img3rdpres.svg" style="width:200px;height:250px;display: block;margin-left: auto;margin-right: auto;"/>
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
                            <img src="img/img4thpres.svg" style="width:200px;height:250px;display: block;margin-left: auto;margin-right: auto;"/>
                        </div>
                    </td>
                    <td colspan="1" width="50%">
                        <div class="text" data-scrolly-down="blurInLeft, timing-function:cubic-bezier(.17,.67,.83,.67)">
                            <h3><?php echo $lang['project-pres4'];?></h3>
                            <h4><?php echo $lang['project-pres4bis'];?></h4>
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
                </br><h1><?php echo $lang['Products-pres'];?></h1>
            </tr><tr>
                <td colspan="1" width="50%">
                    <h2>Base</h2>
                </td>
                <td colspan="1" width="50%">
                    <h2>Application</h2>
                </td>
            </tr><tr>
                <td colspan="1" width="50%">
                    <img src="img/base.png" style="width:500px;height:375px;display:block;margin-left:auto;margin-right:auto;text-align:center"/>
                </td>
                <td colspan="1" width="50%">
                    <img src="img/app.png" style="width:300px;height:650px;display:block;margin-left:auto;margin-right:auto;text-align:center;margin-bottom:50px"/>
                </td>
            </tr></table>
            <form action="contact_us.php">
                <input class="submit-button" type="submit" value="<?php echo $lang['Products-button'];?>"><br/>
            </form>
        </div>

        <script type="text/javascript" src="js/scrolly.js"></script>
        <script>
            window.onload = function() {
                scrolly();
            };
        </script>

        <!--################################-->
        <!--          PIED DE PAGE          -->
        <!--################################-->
        <footer>
            <table style="width:100%"><tr>
                <td colspan="1" width="60%">
                    <img src="img/logo_sleewell.png" style="float:left;width:120px;height:150px;margin-left:100px"/>
                </td>
                <td colspan="1" width="40%">
                    <h3>SUPPORT</h3>
                    <a href="contact_us.php"><h4><?php echo $lang['contact-redirection'];?></h4></a>
                </td>
            </tr></table>
        </footer>
    </body>
</html>
