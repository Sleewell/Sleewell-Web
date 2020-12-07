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
                <a href="" class=" vertical-center btn btn-rounded my-3 Amber" data-toggle="modal" data-target="#modalLRForm"><?php echo $lang['connexion-redirection'];?></a>
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
            <h4 style="text-align:center"><?php echo $lang['contact'];?></h4>
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
                <h3 style="text-align:center"><?php echo $lang['reseaux'];?></h3>
                <div id="reseaux" style="text-align:center;margin-bottom:50px">
                    <a href="https://twitter.com/sleewell" class="button"><input type="image" class="contact" src="img/twitter.png"></a>
                    <a href="https://www.linkedin.com/company/sleewell" class="button"><input type="image" class="contact" src="img/linkedin.png" style="margin-right:100px;margin-left:100px;"></a>
                    <a href="https://www.instagram.com/sleewell_/" class="button"><input type="image" class="contact" src="img/insta.png"></a>
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
                    <h3>SUPPORT</h3>
                    <a href="contact_us.php"><h4><?php echo $lang['contact-redirection'];?></h4></a>
                </td>
            </tr></table>
        </footer>
    </body>
</html>