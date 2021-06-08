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

        <!-- Icon -->
        <link rel="icon" href="css/icons/sleewell.ico">

        <link rel="icon" href="./css/icons/sleewell.ico">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/cssanimation.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mdb.min.css">
        <link rel="stylesheet" href="css/font_color_sleewell.css">
        <link rel="stylesheet" href="css/routine_manager.css">
        <link rel="stylesheet" href="css/registerform.css">
        <link type="text/css" rel="stylesheet" href="css/wheelcolorpicker.dark.css" />

        <!-- TOOLKIT -->
        <script type="text/javascript" src="js/toolkit/jquery.js"></script>
        <script type="text/javascript" src="js/toolkit/jquery.min.js"></script>
        <script type="text/javascript" src="js/toolkit/popper.min.js"></script>
        <script type="text/javascript" src="js/toolkit/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/toolkit/mdb.min.js"></script>        
        <script type="text/javascript" src="js/toolkit/anime.min.js"></script>

        <!-- OUR SCRIPTS -->
        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript" src="js/spotify_get_access_token.js"></script>
        <script type="text/javascript" src="js/create_management.js"></script>

        <!-- FROM WEB + COLORPICKER -->
        <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
        <script type="text/javascript" src="js/toolkit/jquery.wheelcolorpicker.js"></script>

        <script type="text/javascript">
            $(function() {
                $('#background').wheelColorPicker({
                    layout: 'block',
                    format: 'css'
                });
            });
    	</script>

    </head>
    <body onload="onPageLoad()">

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
                        <a class="dropdown-toggle" href="" ><span> <img src=<?php echo $lang['img_path'];?> style="width:20px;height:15px;"/></span> <?php echo $lang['selected-lang'];?></a>
                        <input type="checkbox" id="btn-1">
                        <ul style="z-index:1">
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
        <div style="color:#FF8F00;" class="container-flex">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modif-musique">
                        <a href="javascript:void(0)" id="sleewellClick" class="btn-sleewell"><img type="image" class="sleewell-logo" src="img/logo_sleewell.png"/><p class="text-sleewell"><?php echo $lang['choose-sleewell-sound'];?></p></a>
                        <a href="javascript:void(0)" id="spotifyClick" class="btn-spotify"><img type="image" class="spot-logo" src="img/spotify_logo.png"/><p class="text-spotify"><?php echo $lang['choose-spotify-sound'];?></p></a>
                        <h4 class="textMango EmailText"><?php echo $lang['choose-music'];?></h4>
                    </div>
                    <div id="1" class="row" style="display:none;">
                        <div class="col-lg-2 col-presence">
                            <div class="vl-list-right"></div>
                        </div>
                        <div class="col-lg-8" id="connectionSection">
                            <input class="btn Mango" type="button" onclick="requestAuthorization()" value="<?php echo $lang['spotify authorization'];?>"></input>
                        </div>
                        <div class="col-lg-8" id="playlistsSection">
                            <div class="md-form mb-0" style="text-align:center;margin-bottom:2vh">
                                <input id="searchPlaylistInput" style="color:white;margin-bottom:2vw" name="sujet" type="text" id="form82" class="form-control">
                                <label style="color:#FF8F00" for="form83"><?php echo $lang['search-playlist'];?></label>
                                <input id="searchButton" class="btn Mango" type="button" value="<?php echo $lang['search-playlist'];?>"></input>
                            </div>
                            <div id="SpotifyItemsList" class="scrolltest">
                            </div>
                        </div>
                        <div class="col-lg-2 col-presence">
                            <div class="vl-list-left"></div>
                        </div>
                    </div>

                    <div id="2" class="row">
                        <div class="col-lg-3 col-presence">
                            <div class="vl-list-right"></div>
                        </div>
                        <div class="col-lg-6" style="text-align:center">
                            <select id="cat_selector" class="category-selector">
                                <option value="no_category" style="background-color:#00111F"><?php echo $lang['select-category'];?></option>
                                <option value="forest" style="background-color:#00111F">Forest</option>
                                <option value="wind" style="background-color:#00111F">Wind</option>
                                <option value="fire" style="background-color:#00111F">Fire</option>
                                <option value="rain" style="background-color:#00111F">Rain</option>
                                <option value="water" style="background-color:#00111F">Water</option>
                            </select>
                            <div id="selections">
                                <div id="no_category">
                                    <h4 class="textMango"><?php echo $lang["no-selection"] ?></h4>
                                </div>
                                <div id="forest" class="scrolltest" style="display:none;">
                                    <div id="forest_birds" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img id="img/leprouscover.png" class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Birds" class="music-name">Birds</h4>
                                        <h5 id="Birds sound" class="music-category">Birds sound</h5>
                                    </div>
                                    <div id="forest_cicadas" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/> 
                                        <h4 id="Cicadas" class="music-name">Cicadas</h4>
                                        <h5 class="music-category">Cicadas sound</h5>
                                    </div>
                                    <div id="forest_crickets" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Crickets" class="music-name">Crickets</h4>
                                        <h5 class="music-category">Crickets sound</h5>
                                    </div>
                                    <div id="forest_crows" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Crows" class="music-name">Crows</h4>
                                        <h5 class="music-category">Crows sound</h5>
                                    </div>
                                    <div id="forest_nature" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Nature" class="music-name">Nature</h4>
                                        <h5 class="music-category">Nature sound</h5>
                                    </div>
                                    <div id="forest_night" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Night" class="music-name">Night</h4>
                                        <h5 class="music-category">Night sound</h5>
                                    </div>
                                    <div id="forest_owl" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Owl" class="music-name">Owl</h4>
                                        <h5 class="music-category">Owl sound</h5>
                                    </div>
                                    <div id="forest_sheep" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Sheep" class="music-name">Sheep</h4>
                                        <h5 class="music-category">Sheep sound</h5>
                                    </div>
                                    <div id="forest_spring" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Spring" class="music-name">Spring</h4>
                                        <h5 class="music-category">Spring sound</h5>
                                    </div>
                                    <div id="forest_windy" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Windy" class="music-name">Windy</h4>
                                        <h5 class="music-category">Windy sound</h5>
                                    </div>
                                </div>
                                <div id="wind" class="scrolltest" style="display:none;">
                                    <div id="wind_trees" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Trees" class="music-name">Trees</h4>
                                        <h5 class="music-category">Trees sound</h5>
                                    </div>
                                    <div id="wind_wind" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/> 
                                        <h4 id="Wind" class="music-name">Wind</h4>
                                        <h5 class="music-category">Wind sound</h5>
                                    </div>
                                </div>
                                <div id="fire" class="scrolltest" style="display:none;">
                                    <div id="fire_fire" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Fire" class="music-name">Fire</h4>
                                        <h5 class="music-category">Fire sound</h5>
                                    </div>
                                </div>
                                <div id="rain" class="scrolltest" style="display:none;">
                                    <div id="rain_rain" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Rain" class="music-name">Rain</h4>
                                        <h5 class="music-category">Rain sound</h5>
                                    </div>
                                    <div id="rain_rooftop" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/> 
                                        <h4 id="Rooftop" class="music-name">Rooftop</h4>
                                        <h5 class="music-category">Rooftop sound</h5>
                                    </div>
                                </div>
                                <div id="water" class="scrolltest" style="display:none;">
                                    <div id="water_boating" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Boating" class="music-name">Boating</h4>
                                        <h5 class="music-category">Boating sound</h5>
                                    </div>
                                    <div id="water_bubbles" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Bubbles" class="music-name">Bubbles</h4>
                                        <h5 class="music-category">Bubbles sound</h5>
                                    </div>
                                    <div id="water_flowing" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Flowing" class="music-name">Flowing</h4>
                                        <h5 class="music-category">Flowing sound</h5>
                                    </div>
                                    <div id="water_river" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="River" class="music-name">River</h4>
                                        <h5 class="music-category">River sound</h5>
                                    </div>
                                    <div id="water_waterfalls" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Waterfalls" class="music-name">Waterfalls</h4>
                                        <h5 class="music-category">Waterfalls sound</h5>
                                    </div>
                                    <div id="water_whale" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Whale" class="music-name">Whale</h4>
                                        <h5 class="music-category">Whale sound</h5>
                                    </div>
                                    <div id="water_wind" class="sleewell-item" style="cursor: pointer;" onclick="updateFooterMusic(this.id)">
                                        <img class="music-img" src="img/leprouscover.png"/>
                                        <h4 id="Wind" class="music-name">Wind</h4>
                                        <h5 class="music-category">Wing sound</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-presence">
                            <div class="vl-list-left"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 modif-halo">
                    <h3 class="textMango EmailText" style="margin-top:4vw"><?php echo $lang['config-halo'];?></h3>
                    <input type="text" id="background" data-wcp-autoresize="false" data-wcp-cssclass="custom-size1"/>
                    <style type="text/css">
                    @media only screen and (max-width: 992px) {
                        .custom-size1 {
                        width: 80vw;
                        height: 48vw;
                        margin-bottom: 5vh;
                        }
                    }
                    @media only screen and (min-width: 768px) {
                        .custom-size1 {
                        width: 60vw;
                        height: 36vw;
                        margin-bottom: 5vh;
                        }
                    }
                    @media only screen and (min-width: 992px) {
                        .custom-size1 {
                        width: 20vw;
                        height: 12vw;
                        margin-bottom: 5vh;
                        }
                    }
                    </style>
                    <div class="col-xxl-4 textMango">
                        <h4 class="EmailText">Hex</h4>
                        <input type="text" readonly id="color-input">
                    </div>
                    <div class="col-xxl-4 textMango">
                        <h4 class="EmailText"><?php echo $lang['choose-with-RGB'];?></h4>
                        <input type="text" readonly id="event-color">
                    </div>
                </div>
            </div>
        </div>

        
        <!--################################-->
        <!--          PIED DE PAGE          -->
        <!--################################-->
        <footer>
            <form action="">
                <div class="row" style="text-align:center">
                    <div class="col-3">
                        <div id="musicFooter" class="spotify-pos-footer">
                            <img type="image" class="music-cover-footer" src="img/leprouscover.png"/>
                            <img id="spotify_logo" type="image" class="spotify-logo-footer" src="img/spotify_logo.png"/>
                            <h4 class="Emailtext"></h4>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="vl1"></div>
                    </div>
                    <div class="col-4">
                        <div class="md-form mb-0">
                            <input style="color:white;" type="text" id="ProtocolTitle" value="" class="form-control validate" required>
                            <label style="color:white;" for="form82" data-error="Incorrect" class=""><?php echo $lang['protocole-title'];?></label>
                        </div>
                        <a id="addRoutine" href="javascript:void(0)" class="btn-validate"><p class="text-validate"><?php echo $lang['validate-btn'];?></p></a>
                    </div>
                    <div class="col-1">
                        <div class="vl"></div>
                    </div>
                    <div class="col-3">
                        <div id="ProtocolHalo" class="halo-footer"></div>
                    </div>
                </div>
            </form>
        </footer>


        <!--################################-->
        <!--             SCRIPT             -->
        <!--################################-->

    <script type="text/javascript">
        $(function() {
            $('#background').on('sliderup', function() {
                $('#color-input').val($(this).wheelColorPicker('getValue', 'hex'));
            });
            $('#background').on('sliderup', function() {
                $('#event-color').val($(this).wheelColorPicker('getValue', 'rgb'));
            });
            $('#background').on('sliderup', function() {
                $('.halo-footer').css("background-color", "#" + $(this).wheelColorPicker('getValue', 'hex'));
            });
        });

        $('#sleewellClick').on('click',function(){
            if($('#1').css('display')!='none'){
                $('#2').show();$('#1').hide();
                $('.text-sleewell').css("color", "white");
                $('.text-spotify').css("color", "black");
            }
        });

        $('#spotifyClick').on('click',function(){
            if($('#2').css('display')!='none'){
                $('#1').show();$('#2').hide();
                $('.text-spotify').css("color", "white");
                $('.text-sleewell').css("color", "black");
            }
        });

        $('#cat_selector').change(function() {
            $("#" + this.value).show().siblings().hide();
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

        function updateFooterMusic(clicked_id) {
            var parent = document.getElementById(clicked_id);
            var musicFooter = document.getElementById("musicFooter");
            var player = $('#' + clicked_id).attr('class');
            if (player == "sleewell-item") {
                musicFooter.childNodes[1].setAttribute('src', "img/leprouscover.png");
                musicFooter.childNodes[1].setAttribute('id', clicked_id);  //Name
                musicFooter.childNodes[2].textContent = parent.childNodes[3].id;
                $('#spotify_logo').hide();
            }
            else {
                var uri = clicked_id;
                musicFooter.childNodes[1].setAttribute('src', parent.childNodes[0].id);
                musicFooter.childNodes[1].setAttribute('id', clicked_id);  //Uri
                musicFooter.childNodes[2].textContent = parent.childNodes[1].id; //Name
                $('#spotify_logo').show();
            }
        }
    </script>

    </body>
</html>