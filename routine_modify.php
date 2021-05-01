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
        
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script type="text/javascript" src="js/login.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/anime.min.js"></script>
        <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
        <script type="text/javascript" src="js/jquery.wheelcolorpicker.js"></script>
        <link type="text/css" rel="stylesheet" href="css/wheelcolorpicker.dark.css" />
        <script type="text/javascript">
            $(function() {
                $('#background').wheelColorPicker({
                    layout: 'block',
                    format: 'css'
                });
                $('#background').on('change', function() {
                    $('body').css('background', $(this).val());
                });
                $('#background').on('slidermove', function() {
                    $('#color-label').text($(this).val());
                });
                $('#background').on('sliderup', function() {
                    $('#state-label').text('Released');
                });
                $('#background').on('sliderdown', function() {
                    $('#state-label').text('Pressed');
                });
            });
    	</script>

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
            <table style="width:100%;height:40vw"><tr>
                <td colspan="4" width="50%" class="modif-musique">
                    <a id="sleewellClick" class="btn-sleewell"><img type="image" class="sleewell-logo" src="img/logo_sleewell.png"/><p class="text-sleewell">Choisir un son d'ambiance selectioné par l'équipe</p></a>
                    <a id="spotifyClick" class="btn-spotify"><img type="image" class="spot-logo" src="img/spotify_logo.png"/><p class="text-spotify">Choisir une playlist sur Spotify</p></a>
                    <h3 class="textMango">Choisissez la musique du protocole d'endormissement</h3>
                </td>
                <td colspan="4" width="50%" class="modif-halo">
                    <h3 class="textMango" style="margin-top:4vw">Configurer le halo lumineux</h3>
                </td>
            </tr><tr>
                <td colspan="4">
                    <div id="1" class="row" style="display:none;">
                        <div class="col-sm-3">
                            <div class="vl-list-right"></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="md-form mb-0">
                                <input style="color:white;margin-bottom:2vw" name="sujet" type="text" id="form82" class="form-control">
                                <label style="color:#FF8F00;" for="form83">Rechercher une playlist</label>
                            </div>
                            <div class="scrolltest">
                                <div class="spotify-item">
                                    <img class="playlist-img" src="img/leprouscover.png"/> <h5 class="playlist-name">LEPROUS discography</h5>
                                </div>
                                <div class="spotify-item">
                                    <img class="playlist-img" src="img/leprouscover.png"/> <h5 class="playlist-name">LEPROUS discography</h5>
                                </div>
                                <div class="spotify-item">
                                    <img class="playlist-img" src="img/leprouscover.png"/> <h5 class="playlist-name">LEPROUS discography</h5>
                                </div>
                                <div class="spotify-item">
                                    <img class="playlist-img" src="img/leprouscover.png"/> <h5 class="playlist-name">LEPROUS discography</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="vl-list-left"></div>
                        </div>
                    </div>

                    <div id="2" class="row">
                        <div class="col-sm-3">
                            <div class="vl-list-right"></div>
                        </div>
                        <div class="col-sm-6">
                            <select style="text-align:center;background-color:#ffffff09;width:10vw;height:2vw;border-radius:0.5vw;margin-left:7vw;margin-bottom:2vw;color:white">
                                <option value="0" style="background-color:#00111F">Select category:</option>
                                <option value="1" style="background-color:#00111F">Forest</option>
                                <option value="2" style="background-color:#00111F">Wind</option>
                                <option value="3" style="background-color:#00111F">Fire</option>
                                <option value="4" style="background-color:#00111F">Rain</option>
                                <option value="5" style="background-color:#00111F">Water</option>
                            </select>
                            <div class="scrolltest">
                                <div class="sleewell-item">
                                    <img class="music-img" src="img/leprouscover.png"/>
                                    <h4 class="music-name">Birds</h4>
                                    <h5 class="music-category">Birds sound</h5>
                                </div>
                                <div class="sleewell-item">
                                    <img class="music-img" src="img/leprouscover.png"/> 
                                    <h4 class="music-name">Cicadas</h4>
                                    <h5 class="music-category">Cicadas sound</h5>
                                </div>
                                <div class="sleewell-item">
                                    <img class="music-img" src="img/leprouscover.png"/>
                                    <h4 class="music-name">Crickets</h4>
                                    <h5 class="music-category">Crickets sound</h5>
                                </div>
                                <div class="sleewell-item">
                                    <img class="music-img" src="img/leprouscover.png"/>
                                    <h4 class="music-name">Crows</h4>
                                    <h5 class="music-category">Crows sound</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="vl-list-left"></div>
                        </div>
                    </div>
                </td>

                <!--################################-->
                <!--            HALO PART           -->
                <!--################################-->
                <td colspan="4" class="modif-halo" style="text-align:center">

                    <input type="text" id="background" data-wcp-autoresize="false" data-wcp-cssclass="custom-size1"/>
                    <style type="text/css">
                    .custom-size1 {
                        width: 20vw;
                        height: 12vw;
                    }
                    </style>
                    <div class="col-4 textMango" style="margin-left:15vw;padding-top:2vw">
                        <h4>Hex</h4>
                        <input type="text" data-wheelcolorpicker="" id="color-input">
                    </div>
                    <div class="col-4 textMango" style="margin-left:15vw;padding-top:2vw">
                        <h4>Selected color in RGB</h4>
                        <input type="text" readonly="" id="event-color">
                    </div>

                </td>
            </tr></table>
        </div>

        
        <!--################################-->
        <!--          PIED DE PAGE          -->
        <!--################################-->
        <footer>
            <table style="width:100%"><tr>
                <td colspan="1" width="33%" style="text-align:center">
                    <div class="spotify-pos-footer">
                        <img type="image" class="music-cover-footer" src="img/leprouscover.png"/>
                        <img type="image" class="spotify-logo-footer" src="img/spotify_logo.png"/>
                    </div>
                </td>
                <td colspan="1" width="34%" style="text-align:center">
                    <div class="vl"></div>
                    <h4 class="textMango" style="margin-top:1vw">Protocole title</h4>
                    <a href="" class="btn btn-rounded Mango" style="max-width:25vw"><h4 style="margin-bottom:0rem">Valider</h4></a>
                </td>
                <td colspan="1" width="33%" style="text-align:center">
                    <div class="vl"></div>
                    <div class="halo-footer"></div>
                </td>
            </tr></table>
        </footer>


        <!--################################-->
        <!--             SCRIPT             -->
        <!--################################-->

    <script type="text/javascript">
        $(function() {
            $('#color-input').on('sliderup', function() {
                $('#event-slider').val('Released');
            });
            $('#color-input').on('colorchange', function() {
                $('#event-color').val($(this).wheelColorPicker('getValue', 'rgb'));
            });
        });

        $('#sleewellClick').on('click',function(){
            if($('#1').css('display')!='none'){
                $('#2').show().siblings('div').hide();
                $('.text-sleewell').css("color", "white");
                $('.text-spotify').css("color", "black");
            }
        });

        $('#spotifyClick').on('click',function(){
            if($('#2').css('display')!='none'){
                $('#1').show().siblings('div').hide();
                $('.text-spotify').css("color", "white");
                $('.text-sleewell').css("color", "black");
            }
        });
    </script>

    <script>
        function changeLanguage(lang) {
                if(lang=='en') {
                    location = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=eng";
                } else if(lang=='fr') {
                    location = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=fre";
                }
            }
    </script>

    </body>
</html>