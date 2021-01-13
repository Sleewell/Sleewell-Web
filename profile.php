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
    <title>Votre profil</title>
    <link rel="icon" href="./css/icons/sleewell.ico">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/cssanimation.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/font_color_sleewell.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
</head>

<header>
    <div id="langSelect">
        <a id="mainpage_btn" href="index.php"><img src="img/logo_sleewell.png" style="float:left;width:40px;height:50px;margin-left:5px;"/></a>
        <form>
            <label for="change_lang" style="display:none">Langage</label>
            <select id="change_lang" class="select-css" name="choose-lang" onchange="location = this.value;">
                <option value=""><?php echo $lang['selected-lang'];?></option>
                <option class="fr" value="<?php echo $_SERVER['PHP_SELF']; ?>?lang=fre" style="background-image:url('img/eng.png');" >French</option>
                <option class="en" value="<?php echo $_SERVER['PHP_SELF']; ?>?lang=eng" style="background-image:url('img/fra.png');" >English</option>
            </select>
        </form>
        <img src=<?php echo $lang['img_path'];?> style="float:right;width:20px;height:15px;margin-left:5px;margin-top: 21px;"/>
    </div>
</header>

<body class="GlobalBackground">
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
                            <h3 class="mb-0 font-weight-bold">Votre profile</h5>
                        </div>
                        <!-- End of Card image -->
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <img src="https://randomuser.me/api/portraits/lego/6.jpg" alt="User Photo" class="z-depth-1 mb-3 mx-auto">
                            <p class="text-muted"><small>Votre superbe avatar</small></p>
                            <div class="row flex-center">
                            <button class="btn Mango btn-rounded btn-sm waves-effect waves-light">Nouvel avatar</button><br>
                            <button class="btn btn-danger btn-rounded btn-sm waves-effect waves-light">Supprimer</button>
                            </div>
                        </div>
                        <!-- End of  Card content -->
                        </div>
                        <!-- End of  Card -->
                    </div>
                    <!-- End of  First column -->
                    <!-- Second column -->
                    <div class="col-lg-8 mb-4">
                        <!-- Card -->
                        <div class="card card-cascade narrower SecondBackground " style="border:2px solid; border-color:#EF952C;">
                        <!-- Card image -->
                        <div style="display: flex;justify-content: center;align-items: center;" class="view view-cascade gradient-card-header Amber">
                            <h3 class="mb-0 font-weight-bold">Votre compte</h5>
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
                                    <input style="color:white;"  type="text" id="form1" class="form-control validate" value="<?php echo $_POST['id'];?>" disabled="">
                                    <label style="color:white;" for="form1" class="active">Votre identifiant</label>
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
                                    <input style="color:white;" type="text" id="form81" class="form-control validate">
                                    <label style="color:white;" for="form81" data-error="Incorrect" data-success="Super" class="">Prénom</label>
                                </div>
                                </div>
                                <!-- Second column -->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input style="color:white;" type="text" id="form82" class="form-control validate">
                                    <label style="color:white;" for="form82" data-error="Incorrect" data-success="Incroyable" class="">Nom</label>
                                </div>
                                </div>
                            </div>
                            <!-- End of First row -->
                            <!-- Second row -->
                            <div class="row">

                                <!-- First column -->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input style="color:white;" type="email" id="form76" class="form-control validate">
                                    <label style="color:white;" data-error="Incorrect" data-success="Excellent" for="form76">E-mail</label>
                                </div>
                                </div>
                                <!-- Second column -->
                                <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input style="color:white;" pattern="[0-9]{10}" type="tel" id="form77" class="form-control validate">
                                    <label style="color:white;" data-error="Incorrect" data-success="Brillant" for="form77">Numéro de téléphone</label>
                                </div>
                                </div>
                            </div>
                            <!-- End of  Second row -->
                            <!-- Third row -->
                            <div class="row">
                                <!-- First column -->
                                <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <textarea style="color:white;" type="text" id="form78" class="md-textarea form-control" rows="3"></textarea>
                                    <label style="color:white;" for="form78">A propos de vous</label>
                                </div>
                                </div>
                            </div>
                            <!-- End of Third row -->
                            <!-- Fourth row -->
                            <div class="row">
                                <div class="col-md-12 text-center my-4">
                                <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" value="Update Account" class="btn Mango btn-rounded"></span>
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
                </div>    
            <td>
            <td style="width:10%;"></td>
        <tr>
    </table>
</body>