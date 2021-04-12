$(document).ready(function() {
    console.log( "ready!" );
    $("#sendForgotPassword").click(function(){

        var form = new FormData();
        var email = $("#forgotEmail").val();
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
            document.getElementById("displayable").style.display = "none";
            document.getElementById("waiting").style.display = "inline";
        });
        // $.ajax(settings).fail(function(response) {
        //     console.clear();
        //     alert("This email is not valid !");
        // });
    });
    $(function() {
        $("form").submit(function() { return false; });
    });
    $('#forgotEmail').keypress(function(e){
        if(e.which == 13){
            const email = $("#forgotEmail").val();
            if (validateEmail(email))
                $('#sendForgotPassword').click();
        }
    });



    $("#ChangePassword").click(function(){

        var password = $("#forgotPassword1").val();
        var url = window.location;
        var token = new URLSearchParams(url.search).get('recovery_token');

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
            $('#SecondStepRecoveryAccount').submit();
        });
    });
    // $(function() {
    //     $("form").submit(function() { return false; });
    // });
    $('#forgotPassword1').keypress(function(e){
        if(e.which == 13){
            if (checkForgotPassword() === true)
                $('#ChangePassword').click();
        }
    });
    $('#forgotPassword2').keypress(function(e){
        if(e.which == 13){
            if (checkForgotPassword() === true)
                $('#ChangePassword').click();
        }
    });
});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function checkForgotEmail()
{
    const email = $("#forgotEmail").val();

    if (validateEmail(email))
        document.getElementById("sendForgotPassword").disabled = false;
    else
        document.getElementById("sendForgotPassword").disabled = true;
}

function checkForgotPassword()
{
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var same = document.getElementById("same");
    var pwd1 = document.getElementById("forgotPassword1");
    var pwd2 = document.getElementById("forgotPassword2");

    var numbers = /[0-9]/g;
    var checker = 0;
    if(pwd1.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
        checker+=1;
    }else {
        number.classList.remove("valid");
        number.classList.add("invalid");
        checker = 0; 
    }
    if (pwd1.value.localeCompare(pwd2.value) === 0 && pwd1.value.length > 0) {
        same.classList.remove('invalid');
        same.classList.add("valid");
        checker+=1;
    }else {
        same.classList.remove("valid");
        same.classList.add("invalid");
        checker = 0;
    }
    if(pwd1.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
        checker+=1;
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
        checker = 0;
    }
    if (checker === 3) {
        document.getElementById("message").style.display = "none";
        document.getElementById("ChangePassword").disabled = false;
        return (true);
    }
    else {
        document.getElementById("message").style.display = "block";
        document.getElementById("ChangePassword").disabled = true;
    }
    return (false);
}