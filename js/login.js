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
        console.log("HEHOOOOO");
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
        // if (obj.is_validate === "False") {
        //     alert("Your account is not validated");
        //     return;
        // }
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
            console.log(response);
            var obj2 = jQuery.parseJSON(response);
            console.log(obj2);
            document.cookie ="login=" + obj2.login;
            document.cookie ="firstname=" + obj2.firstname;
            document.cookie ="lastname=" + obj2.lastname;
            document.cookie ="email=" + obj2.email;
            document.cookie ="checkEmail=" + obj2.updateMail;
            // document.cookie ="phonenumber=" + obj2.lastname;
            // document.cookie ="about=" + obj2.lastname;
            $('#loginForm').submit();
        }).fail(function(response) {
            console.clear();
            alert("Problem to get profile information");
        });
    }).fail(function(response) {
        console.clear();
        alert("Your login or your password is incorrect !");
    });
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