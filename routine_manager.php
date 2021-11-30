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
        
        <!-- TOOLKIT -->
        <script type="text/javascript" src="js/toolkit/jquery.js"></script>
        <script type="text/javascript" src="js/toolkit/jquery.min.js"></script>
        <script type="text/javascript" src="js/toolkit/popper.min.js"></script>
        <script type="text/javascript" src="js/toolkit/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/toolkit/mdb.min.js"></script>
        <script type="text/javascript" src="js/toolkit/jquery.wheelcolorpicker.js"></script>
        <script type="text/javascript" src="js/toolkit/anime.min.js"></script>

        <!-- OUR SCRIPTS -->
        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript" src="js/routine_manager_get.js"></script>
        <script src="js/delete_routine.js"></script>

        <!-- FROM WEB -->
        <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour-standalone.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour-standalone.min.js"></script>
    </head>
    <body id="routine-manager-page">

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
                            <li><a href="javascript:void(0)" class="language-link-item textMango" id="lang-fr" onclick="changeLanguage('fr');"><span> <img src="img/fra.png"></span> Français</a></li>
                            <li><a href="javascript:void(0)" class="language-link-item textMango" id="lang-en" onclick="changeLanguage('en');"><span> <img src="img/eng.png"></span> English</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        <div>
	    <br/>
        <a id="guidetourlaunch" style="margin-left:3%" href="javascript:void(0)" onclick="launchTour2()"><i class="far fa-question-circle text-center"><br/><?php echo $lang['begin-tour'];?></i></a>
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
            <table id="routineFullList" style="width:100%"><tr>
                <td class="fit-table-routine">
                    <a class="fit-routine" href="create_routine.php">
                        <div id="to-create-routine" class="crea-bg">
                            <img type="image" class="create-routine" src="img/plus.png"/>
                        </div>
                    </a>
                </td>
            </tr></table>
        </div>

        <!--################################-->
        <!--      MODAL MODIF / DELETE      -->
        <!--################################-->
        <div class="modal"  id="modalRoutine" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content GlobalBackground" style="border-radius: 10px;">
                    <div class="modal-header textMango">
                        <button id="haloColor" type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#FF8F00">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body AmberText">
                        <p id="modal_protocoltitle" class="modal-title"></p></br>
                        <table style="width:100%"><tr>
                            <td width=50%>
                                <h3><?php echo $lang['halo-popup'];?></h3>
                                <div class="halo-modal"></div>
                            </td>
                            <td width=50%>
                                <h3><?php echo $lang['sound-popup'];?></h3>
                                <div class="spotify-pos">
                                    <img id="modal_musiccover" type="image" class="music-cover" src="img/leprouscover.png"/>
                                </div>
                            </td>
                        </tr></table>
                    </div>
                    <div class="modal-footer">
                    <table style="width:100%"><tr>
                        <td width=20%></td>
                            <td width=20%>
                            <span class="waves-input-wrapper waves-effect waves-light" style="text-align:center"><a href="routine_modify.php" class="btn Mango btn-rounded" style="text-decoration: none;"><?php echo $lang['modify-popup'];?></a><span>
                            </td> <td width=20%></td>
                            <td width=20%>
                            <span class="waves-input-wrapper waves-effect waves-light" style="text-align:center"><a id="deletebtn" class="btn Mango btn-rounded" style="text-decoration: none;"><?php echo $lang['delete-popup'];?></a><span>
                            </td><td width=20%></td>
                        </tr></table>
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
        var globalPopup = "<div class='popover tour' style='background-color:#00112F;text-align:center'><h3 class='popover-title' style='background-color:#00112F'></h3><div class='popover-content'></div><div class='popover-navigation'><button class='btn waves-effect ml-auto Mango' data-role='prev'>« <?php echo $lang['previous-tour'];?></button><span data-role='separator'>  |  </span><button class='btn waves-effect ml-auto Mango' data-role='next'><?php echo $lang['next-tour'];?> »</button></div></br><button class='btn waves-effect ml-auto Mango' data-role='end'><?php echo $lang['end-tour'];?></button></div>";
        var lastPopup = "<div class='popover tour' style='background-color:#00112F;text-align:center'><h3 class='popover-title' style='background-color:#00112F'></h3><div class='popover-content'></div><button class='btn waves-effect ml-auto Mango' data-role='end'><?php echo $lang['end-tour'];?></button></div>";
        var selectPopup = "<div class='popover tour' style='background-color:#00112F;text-align:center'><div class='arrow'></div><h3 class='popover-title' style='background-color:#00112F'></h3><div class='popover-content'></div><div class='popover-navigation'><button class='btn waves-effect ml-auto Mango' data-role='prev'>« <?php echo $lang['previous-tour'];?></button><span data-role='separator'>  |  </span><button class='btn waves-effect ml-auto Mango' data-role='next'><?php echo $lang['next-tour'];?> »</button></div></br><button class='btn waves-effect ml-auto Mango' data-role='end'><?php echo $lang['end-tour'];?></button></div>";

        var tourpart2 = new Tour({
            steps: 
            [{
                element: "#routine-manager-page",
                title: "<?php echo $lang['tour-title-6'];?>",
                content: "<?php echo $lang['tour-content-6'];?>",
                placement: "top",
                template: globalPopup,
            },
            {
                element: "#to-create-routine",
                title: "<?php echo $lang['tour-title-7'];?>",
                content: "<?php echo $lang['tour-content-7'];?>",
                template: selectPopup,
                placement: "top",
                backdrop: true,
            }]
        });

        var tourpart4 = new Tour({
            steps: 
            [{
                element: "#routine-manager-page",
                title: "<?php echo $lang['tour-title-12'];?>",
                content: "<?php echo $lang['tour-content-12'];?>",
                placement: "top",
                template: lastPopup,
            }]
        });

        if (localStorage.getItem("last_step")) {
            localStorage.removeItem("tour_end");
            localStorage.removeItem("tour_current_step");
            localStorage.removeItem("last_step");
            document.cookie ="newUser=" + false;
            // Initialize the tourpart2
            tourpart4.init();
            // Start the tourpart2
            tourpart4.start();
        } else {
            localStorage.removeItem("tour_end");
            localStorage.removeItem("tour_current_step");

            // Initialize the tourpart2
            tourpart2.init();
        }

        function launchTour2()
        {
            tourpart2.restart();
        };

        function changeLanguage(lang) {
            if(lang=='en') {
                location = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=eng";
            } else if(lang=='fr') {
                location = "<?php echo $_SERVER['PHP_SELF']; ?>?lang=fre";
            }
        }

        function sendIdToModal(id) {
            document.cookie = "routineId=" + id;
            var style = getComputedStyle(document.getElementById(id));
            document.cookie = "haloColor=" + style['background-color'];
            var parent = document.getElementById(id);
            var haloColor = document.getElementById("haloColor");
            if (parent.childNodes[1].id == "Spotify") {
                document.cookie = "musicName=" + parent.childNodes[0].id.split(';')[0];
                document.cookie = "musicUri=" + parent.childNodes[0].id.split(';')[1];
            } else {
                document.cookie = "musicName=" + parent.childNodes[0].id.split(';')[0];
                document.cookie = "musicUri=";
            }
            document.cookie = "routineName=" + document.getElementById(id + "Name").textContent;

            $('.halo-modal').css("background-color", style['background-color']);
            deletebtn.setAttribute('val', id);
            document.getElementById("modal_protocoltitle").innerHTML = document.getElementById(id + "Name").textContent;
            parent.nextSibling;
        }
    </script>
</html>