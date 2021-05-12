$(document).ready(function() {
    
    $('#loginPassword').keypress(function(e){
        if(e.which == 13){
            $('#loginUsername').click();
        }
    });
    $('#loginPassword').keypress(function(e){
        if(e.which == 13){
            $('#LoginButton').click();
        }
    });
    $('#registerPassword').keypress(function(e){
        if(e.which == 13){
            $('#RegisterButton').click();
        }
    });
    $('#registerEmail').keypress(function(e){
        if(e.which == 13){
            $('#RegisterButton').click();
        }
    });
    $('#registerPasswordCheck').keypress(function(e){
        if(e.which == 13){
            $('#RegisterButton').click();
        }
    });
    $("#LoginButton").click(function(){
        sendLoginForm();
    });
    $("#RegisterButton").click(function(){
        sendRegisterForm();
    });
    $("#Deconnexion").click(function(){
        document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = "login=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = "firstname=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = "lastname=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        // document.cookie = "phonenumber=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        // document.cookie = "about=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        location.reload();
    });
});

function sendLoginForm()
{
    var form = new FormData();
    var login = $("#loginUsername").val();
    var password = $("#loginPassword").val();
    form.append("login", login);
    form.append("password", password);

    var settings = {
        "url": "https://api.sleewell.fr/user/login",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };
    $.ajax(settings).done(function(response) {
        var obj = jQuery.parseJSON(response);
        token = obj.AccessToken;
        document.cookie ="token=" + token;

        form.append("token", token);
        var settings = {
            "url": "https://api.sleewell.fr/user/information",
            "method": "GET",
            "timeout": 0,
            "headers": {
              "Authorization": "Bearer " + token
            },
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };
        $.ajax(settings).done(function (response) {
            var obj2 = jQuery.parseJSON(response);
            console.log(obj2);
            document.cookie ="login=" + obj2.login;
            document.cookie ="firstname=" + obj2.firstname;
            document.cookie ="lastname=" + obj2.lastname;
            document.cookie ="email=" + obj2.email;
            // document.cookie ="phonenumber=" + obj2.lastname;
            // document.cookie ="about=" + obj2.lastname;
            $('#loginForm').submit();
        });
        $.ajax(settings).fail(function(response) {
            console.clear();
            alert("Problem to get profile information");
        });
    });
    $.ajax(settings).fail(function(response) {
        console.clear();
        alert("Your login or your password is incorrect !");
    });
}

function sendRegisterForm()
{
    var form = new FormData();
    var username = $("#registerUsername").val();
    var firstname = $("#registerFirstName").val();
    var lastname = $("#registerLastName").val();
    var email = $("#registerEmail").val();
    var password = $("#registerPasswordCheck").val();

    form.append("login", username);
    form.append("password", password);
    form.append("email", email);
    form.append("firstname", firstname);
    form.append("lastname", lastname);

    var settings = {
        "url": "https://api.sleewell.fr/user/register",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function(response) {
        var obj = jQuery.parseJSON(response);
        token = obj.AccessToken;

        document.cookie ="token=" + token;
        form.append("token", token);
        var settings = {
            "url": "https://api.sleewell.fr/user/information",
            "method": "GET",
            "timeout": 0,
            "headers": {
              "Authorization": "Bearer " + token
            },
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
        };
        $.ajax(settings).done(function (response) {
            var obj2 = jQuery.parseJSON(response);
            document.cookie ="login=" + obj2.login;
            document.cookie ="firstname=" + obj2.firstname;
            document.cookie ="lastname=" + obj2.lastname;
            document.cookie ="email=" + obj2.lastname;
            // document.cookie ="phonenumber=" + obj2.lastname;
            // document.cookie ="about=" + obj2.lastname;
            $('#registerForm').submit();
        });
        $.ajax(settings).fail(function(response) {
            // console.clear();
            alert("Problem to get profile information");
        });
    });
    $.ajax(settings).fail(function(response) {
        // alert("L'email ou le noom d'utilisateur est déjà utilisé !");
        console.clear();
        alert("Something went wrong");
    });
}

function checkRegisterMail()
{
    var email = $("#registerEmail").val();
    var help = $("#registerPasswordHelpBlock");

    if (email.length === 0)
        return;
    if (email.includes('@', 0) === true)
        help.hide();
    else
        help.show();
}

function updateLoginInput()
{
    var loginCheck = $("#loginUsername").val();
    var passwordCheck = $("#loginPassword").val();
    if (loginCheck.length === 0 || passwordCheck.length < 8) {
        $("#LoginButton").prop("disabled", true);
        return;
    }
    $("#LoginButton").prop("disabled", false);
}

function checkRegisterPassword()
{
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var same = document.getElementById("same");
    var pwd1 = document.getElementById("registerPassword");
    var pwd2 = document.getElementById("registerPasswordCheck");

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
        document.getElementById("RegisterButton").disabled = false;
    }
    else {
        document.getElementById("message").style.display = "block";
        document.getElementById("RegisterButton").disabled = true;
    }
}