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
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $lang["profile-header1"]?></title>
    <link rel="icon" href="./css/icons/sleewell.ico">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/cssanimation.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/font_color_sleewell.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="js/profile.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/profileGraph.js"></script>
</head>

<body class="GlobalBackground">


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

    <!--################################-->
    <!--               FORM             -->
    <!--################################-->
    <table style="width:100%;">
        <tr>
            <br><br><br>
        </tr>
        <tr>
            <td style="width:10%;"></td>
            <td style="width:80%;">
                <div class="container-fluid">
                <!-- Section: Edit Account -->
                <section class="section">
                    <!-- First row -->
                    <div class="row">
                    <!-- First column -->
                    <div class="col-lg-4 mb-4">
                        <!-- Card -->
                        <div class="card card-cascade SecondBackground narrower" style="border:2px solid; border-color:#EF952C;">
                        <!-- Card image -->
                        <div style="display: flex;justify-content: center;align-items: center;" class="view view-cascade gradient-card-header Amber">
                            <h3 class="mb-0 font-weight-bold"><?php echo $lang["profile-header1"] ?></h5>
                        </div>
                        <!-- End of Card image -->
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <img src="https://randomuser.me/api/portraits/lego/6.jpg" alt="User Photo" class="z-depth-1 mb-3 mx-auto img-fluid">
                            <p class="text-muted"><small><?php echo $lang["profile_card1-txt1"] ?></small></p>
                            <div class="row flex-center">
                            <button class="btn Mango btn-rounded btn-sm waves-effect waves-light"><?php echo $lang["profile_card1-btn1"] ?></button><br>
                            <button class="btn btn-danger btn-rounded btn-sm waves-effect waves-light"><?php echo $lang["profile_card1-btn2"] ?></button>
                            </div>
                        </div>
                        <!-- End of  Card content -->
                        </div>
                        <!-- End of  Card -->
                        <span class="waves-input-wrapper waves-effect waves-light" style="width:100%;margin-top:1vw"><a href="routine_manager.php" class="btn Mango btn-rounded" style="width:100%;text-decoration: none;">Routines manager</a><span>
                    </div>
                    <!-- End of  First column -->
                    <!-- Second column -->
                    <div class="col-lg-8 mb-4">
                        <!-- Card -->
                        <div class="card card-cascade narrower SecondBackground " style="border:2px solid; border-color:#EF952C;">
                        <!-- Card image -->
                        <div style="display: flex;justify-content: center;align-items: center;" class="view view-cascade gradient-card-header Amber">
                            <h3 class="mb-0 font-weight-bold"><?php echo $lang["profile-header2"] ?></h5>
                        </div>
                        <!-- End of  Card image -->
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <!-- Edit Form -->
                            <form>
                            <!-- First row -->
                            <div class="row">
                                <!-- First column -->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input style="color:white;"  type="text" id="profileId" class="form-control validate" value="<?php echo $_COOKIE["login"]?>" disabled="">
                                    <label style="color:white;" for="form1" class="active"><?php echo$lang["profile_card2-inp1"] ?></label>
                                </div>
                                </div>
                                <!-- End of First column -->
                            </div>
                            <!-- End of  First row -->
                            <!-- First row -->
                            <div class="row">
                                <!-- First column -->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input style="color:white;" type="text" id="profileFirstname" value="<?php echo $_COOKIE["firstname"]?>" class="form-control validate">
                                    <label style="color:white;" for="form81" data-error="Incorrect" data-success="Super" class=""><?php echo$lang["profile_card2-inp2"] ?></label>
                                </div>
                                </div>
                                <!-- Second column -->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input style="color:white;" type="text" id="profileLastName" value="<?php echo $_COOKIE["lastname"]?>" class="form-control validate">
                                    <label style="color:white;" for="form82" data-error="Incorrect" data-success="Incroyable" class=""><?php echo$lang["profile_card2-inp3"] ?></label>
                                </div>
                                </div>
                            </div>
                            <!-- End of First row -->
                            <!-- Second row -->
                            <div class="row">

                                <!-- First column -->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input style="color:white;" type="email" id="profilEmail" value="<?php echo $_COOKIE["email"]?>" class="form-control validate">
                                    <label style="color:white;" data-error="Incorrect" data-success="Excellent" for="form76"><?php echo$lang["profile_card2-inp4"] ?></label>
                                </div>
                                </div>
                                <!-- Second column -->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input style="color:white;" pattern="[0-9]{10}" type="tel" id="profilePhoneNumber" class="form-control validate">
                                    <label style="color:white;" data-error="Incorrect" data-success="Brillant" for="form77"><?php echo$lang["profile_card2-inp5"] ?></label>
                                </div>
                                </div>
                            </div>
                            <!-- End of  Second row -->
                            <!-- Third row -->
                            <div class="row">
                                <!-- First column -->
                                <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <textarea style="color:white;" type="text" id="profilAbout" class="md-textarea form-control" rows="3"></textarea>
                                    <label style="color:white;" for="form78"><?php echo$lang["profile_card2-inp6"] ?></label>
                                </div>
                                </div>
                            </div>
                            <!-- End of Third row -->
                            <!-- Fourth row -->
                            <div class="row">
                                <div class="col-md-12 text-center my-4">
                                <span class="waves-input-wrapper waves-effect waves-light"><input id="UpdateProfil" type="button" value="<?php echo $lang["profile_card2-btn1"]?>" class="btn Mango btn-rounded"></span>
                                </div>
                            </div>
                            <!-- End of Fourth row -->
                            </form>
                            <!-- End of Edit Form -->
                        </div>
                        <!-- End of Card content -->
                        </div>
                        <!-- End of Card -->
                    </div>
                    <!-- End of Second column -->

                    </div>
                    <!-- First row -->
                </section>
                <!-- End of Section: Edit Account -->
                <div class="col-lg-12 mb-4">
                        <!-- Card -->
                        <div class="card card-cascade SecondBackground narrower" style="border:2px solid; border-color:#EF952C;">
                        <!-- Card image -->
                        <div style="display: flex;justify-content: center;align-items: center;" class="view view-cascade gradient-card-header Amber">
                            <h3 class="mb-0 font-weight-bold"><?php echo $lang["profile-header3"]?></h5>
                        </div>
                        <!-- End of Card image -->
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <div>
                                <canvas id="profileGraph"></canvas>
                            </div>
                            <div class="row flex-center">
                                <span class="waves-input-wrapper waves-effect waves-light" style="margin-right:1%;"><input id="days" type="button" value="<?php echo $lang["profile_card3-btn1"]?>" class="btn Mango btn-rounded"></span>
                                <span class="waves-input-wrapper waves-effect waves-light"><input id="week" type="button" value="<?php echo $lang["profile_card3-btn2"]?>" class="btn Mango btn-rounded"></span>
                                <span class="waves-input-wrapper waves-effect waves-light" style="margin-left:1%;"><input id="month" type="button" value="<?php echo $lang["profile_card3-btn3"]?>" class="btn Mango btn-rounded"></span>
                            </div>
                        </div>
                        <!-- End of  Card content -->
                        </div>
                        <!-- End of  Card -->
                    </div>
                </div>    
            <td>
            <td style="width:10%;"></td>
        <tr>
    </table>

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
<?php include 'footer.php';?>