$(document).ready(function() {
    console.log( "ready!" );
    $("#sendForgotPassword").click(function(){

        var form = new FormData();
        console.log("hello ?");
        var email = $("#forgotEmail").val();
        console.log(email)
        form.append("mail", email);

        var settings = {
        "url": "https://api.sleewell.fr/user/account-recovery-mail",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
        };

        $.ajax(settings).done(function (response) {
            $('#SecondStepRecoveryAccount').submit();
            console.log(response);
            console.log("hello");
        });
        // $.ajax(settings).fail(function(response) {
        //     console.clear();
        //     alert("This email is not valid !");
        // });
    });
    $('#forgotEmail').keypress(function(e){
        if(e.which == 13){
            $('#sendForgotPassword').click();
        }
    });



    $("#ChangePassword").click(function(){

        console.log("hello ?");
        var password = $("#forgotPassword1").val();
        console.log(password)

        var url = window.location;
        
        var token = new URLSearchParams(url.search).get('recovery_token');
        console.log("token :");
        console.log(token);

        var form = new FormData();
        form.append("password", password);
        form.append("token", token);
        
        var settings = {
          "url": "https://api.sleewell.fr/user/password-recovery",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };
        
        $.ajax(settings).done(function (response) {
          console.log(response);
        });
    });
    $('#forgotEmail').keypress(function(e){
        if(e.which == 13){
            $('#sendForgotPassword').click();
        }
    });
});