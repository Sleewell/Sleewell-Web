<?php 

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function frontpageWorks(AcceptanceTester $I)
    {
        /* Testing Main page */
        $I->amOnPage("/");
        $I->see("Find back a golden sleep and invigorating nights");
        $I->see("Find back more efficient nights thanks to total disconnection at bedtime");
        $I->see("Farewell regular nighttime distractions");
        $I->see("Your phone become your clock in one move, so your phone won't harm your sleep.");
        $I->see("Relax and quiclky fall into Morpheus's arms");
        $I->see("Thanks to ambient sounds and halo available on the application, choose an asleep protocole that will suit you perfectly");
        $I->see("Be aware of your sleep quality evolution");
        $I->see("It will take into account your sleep information to give you an evolutionnary curve of your night's beneficials effects");
        $I->see("How to contact us:");
        $I->see("Beta tester :");
        $I->see("Copyright © 2020. All rights reserved Sleewell");

        /* Testing Contact us Page */

        $I->amOnPage("/contact_us.php");
        $I->see("If you need more informations or wanted to send us a feedback about one of our products, contact us :");
        $I->fillField("email_address","fabien.brosset@epitech.eu");
        $I->fillField("sujet","Acceptance Test");
        $I->fillField("feedback","Ceci est le mail test des tests.");
        $I->click(["id" => "mainpage_btn"]);


        /* Testing Login Modal */
        $I->click(["id" => "logInBtn"]);
        $I->see("Votre identifiant");
        $I->see("Votre superbe mot de passe");
        $I->click(["id" => "CloseButton"]);
        $I->click(["id" => "logInBtn"]);


        /* Testing Register Modal */
        $I->click(["id" => "registerTab"]);
        $I->see("Votre nom");
        $I->see("Votre prénom");
        $I->see("Votre identifiant");
        $I->see("Votre email");
        $I->see("Votre mot de passe");
        $I->see("Votre superbe mot de passe doit au moins contenir 8 caractères et 1 chiffre");
        $I->see("(le même)");
        $I->submitForm('#loginForm', array('user' => array(
            'Votre nom' => 'Bertrand',
            'Votre prénom' => 'LeMoine',
            'Votre identifiant' => 'Bertrand',
            'Votre email' => 'LeMoinedu12@gmail.com',
            'Votre mot de passe' => 'azerty123456',
            'Votre mot de passe (le même)' => 'azerty123456',
        )));
        $I->amOnPage("/profile.php");
        $I->see("Your profile");
        $I->see("Your account");
        $I->see("Your username");
        $I->see("Firstname");
        $I->see("Lastname");
        $I->see("E-mail");
        $I->see("Your sleep statistics");
        $I->see("How to contact us:");
        $I->see("Beta tester :");
        $I->see("Copyright © 2020. All rights reserved Sleewell");
        $I->click(["id" => "RoutineManagerBtn"]);

        /* Testing Routine Manager */
        $I->amOnPage("/routine_manager.php");
        $I->see("Manage your favorite routines easily and quickly. Here, it's possible to create, to modify and to delete your routines. It is also possible to share it with your relatives.");
        $I->see("How to contact us:");
        $I->see("Beta tester :");
        $I->see("Copyright © 2020. All rights reserved Sleewell");
        $I->click(["id" => "CreateRoutine"]);

        /* Testing Routine Creation */
        $I->see("Choose the music for the sleep protocol");
        $I->see("Choose ambient sound selected by Sleewell's team");
        $I->see("Choose a playlist on Spotify");
        $I->see("No category selected");
        $I->see("Choose luminous halo's color");
        $I->see("Hex");
        $I->see("Selected color (RGB)");
        $I->see("Validate");
        $I->click(["id" => "mainpage_btn"]);
        $I->see("leewell");
    }
}
