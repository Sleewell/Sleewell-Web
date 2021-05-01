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
        <title>Sleewell - Routine Manager</title>
        <link rel="icon" href="./css/icons/sleewell.ico">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/cssanimation.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mdb.min.css" rel="stylesheet"> 
        <link href="css/font_color_sleewell.css" rel="stylesheet">
        <link href="css/routine_manager.css" rel="stylesheet">
        <link href="css/registerform.css" rel="stylesheet">
        <link href="css/wheelcolorpicker.dark.css" rel="stylesheet">
        
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript" src="js/jquery.wheelcolorpicker.js"></script>

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
                <ul style="width:fit-content">
                    <?php if(!isset($_COOKIE["login"])) : ?>
                        <li><a id="logInBtn" href="" data-toggle="modal" data-target="#modalLRForm"><?php echo $lang['connexion-redirection'];?></a></li>
                    <?php else :?>
                        <li><a id="Deconnexion" href="index.php"><?php echo $lang['disconnect-button'];?></a></li>
                    <?php endif; ?>
                    <li>
                        <label for="btn-1" class="show dropdown-toggle"><span> <img src=<?php echo $lang['img_path'];?> style="width:20px;height:15px;"/></span> <?php echo $lang['selected-lang'];?></label>
                        <a class="dropdown-toggle" href=""><span> <img src=<?php echo $lang['img_path'];?> style="width:20px;height:15px;"/></span> <?php echo $lang['selected-lang'];?></a>
                        <input type="checkbox" id="btn-1">
                        <ul>
                            <li><a href="javascript:void(0)" class="language-link-item textMango" id="lang-fr" onclick="changeLanguage('fr');"><span> <img src="img/fra.png"></span> French</a></li>
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
        <!--           FORM SECTION         -->
        <!--################################-->
        <div class="container-xxl">
            <h4 class="AmeberText" style="text-align:center"><?php echo $lang['routine-manager'];?></h4>
            <table style="width:100%"><tr>
                <td class="fit-table-routine">
                    <div class="fit-routine">
                        <button class="halo" href="" data-toggle="modal" data-target="#modalRoutine">
                            <img type="image" class="music-cover" src="img/leprouscover.png"/>
                            <img type="image" class="spotify-logo" src="img/spotify_logo.png"/>
                        </button>
                        <h4 class="AmberText">Protocol lundi</h4>
                    </div>
                </td>
                <td class="fit-table-routine">
                    <div class="fit-routine">
                        <button class="halo" href="" data-toggle="modal" data-target="#modalRoutine">
                            <img type="image" class="music-cover" src="img/leprouscover.png"/>
                            <img type="image" class="spotify-logo" src="img/spotify_logo.png"/>
                        </button>
                        <h4 class="AmberText">Protocol lundi</h4>
                    </div>
                </td>
                <td class="fit-table-routine">
                    <div class="fit-routine">
                        <button class="halo" href="" data-toggle="modal" data-target="#modalRoutine">
                            <img type="image" class="music-cover" src="img/leprouscover.png"/>
                            <img type="image" class="spotify-logo" src="img/spotify_logo.png"/>
                        </button>
                        <h4 class="AmberText">Protocol lundi</h4>
                    </div>
                </td>
                <td class="fit-table-routine">
                    <div class="fit-routine">
                        <button class="halo" href="" data-toggle="modal" data-target="#modalRoutine">
                            <img type="image" class="music-cover" src="img/leprouscover.png"/>
                            <img type="image" class="spotify-logo" src="img/spotify_logo.png"/>
                        </button>
                        <h4 class="AmberText">Protocol lundi</h4>
                    </div>
                </td>
                <td class="fit-table-routine">
                    <div class="fit-routine">
                        <button class="halo" href="" data-toggle="modal" data-target="#modalRoutine">
                            <img type="image" class="music-cover" src="img/leprouscover.png"/>
                            <img type="image" class="spotify-logo" src="img/spotify_logo.png"/>
                        </button>
                        <h4 class="AmberText">Protocol lundi</h4>
                    </div>
                </td>
            </tr><tr>
                <td class="fit-table-routine">
                    <div class="fit-routine">
                        <button class="halo" href="" data-toggle="modal" data-target="#modalRoutine">
                            <img type="image" class="music-cover" src="img/leprouscover.png"/>
                            <img type="image" class="spotify-logo" src="img/spotify_logo.png"/>
                        </button>
                        <h4 class="AmberText">Protocol lundi</h4>
                    </div>
                </td>
                <td class="fit-table-routine">
                    <a class="fit-routine" href="routine_modify.php">
                        <div class="crea-bg">
                            <img type="image" class="create-routine" src="img/plus.png"/>
                        </div>
                    </a>
                </td>
            </tr></table>
        </div>

        <!--################################-->
        <!--      MODAL MODIF / DELETE      -->
        <!--################################-->
        <div class="modal fade"  id="modalRoutine" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content GlobalBackground" style="border-radius: 10px;">
                    <div class="modal-header textMango">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#FF8F00">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body AmberText">
                        <p class="modal-title">Protocole title</p></br>
                        <table style="width:100%"><tr>
                            <td width=50%>
                                <h3>Halo lumineux</h3>
                                <div class="halo-modal"></div>
                            </td>
                            <td width=50%>
                                <h3>Son d'ambiance</h3>
                                <div class="spotify-pos">
                                    <img type="image" class="music-cover" src="img/leprouscover.png"/>
                                    <img type="image" class="spotify-logo" src="img/spotify_logo.png"/>
                                </div>
                            </td>
                        </tr></table>
                    </div>
                    <div class="modal-footer">
                    <table style="width:100%"><tr>
                        <td width=20%></td>
                            <td width=20%>
                            <span class="waves-input-wrapper waves-effect waves-light" style="text-align:center"><a href="routine_modify.php" class="btn Mango btn-rounded" style="text-decoration: none;">Modifer</a><span>
                            </td> <td width=20%></td>
                            <td width=20%>
                            <span class="waves-input-wrapper waves-effect waves-light" style="text-align:center"><a href="" class="btn Mango btn-rounded" style="text-decoration: none;">Supprimer</a><span>
                            </td><td width=20%></td>
                        </tr></table>
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
                    <h3 class="BoldAmberText">SUPPORT</h3>
                    <a id="contactus_btn" href="contact_us.php"><h4 class="AmeberText"><?php echo $lang['contact-redirection'];?></h4></a>
                </td>
            </tr></table>
        </footer>
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