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
            document.cookie ="email=" + obj2.email;
            // document.cookie ="phonenumber=" + obj2.lastname;
            // document.cookie ="about=" + obj2.lastname;
            console.log("Creation de compte");
//            $('#registerForm').submit();
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

    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);

    if (email.length === 0)
        return;
    if (email.includes('@', 0) === true)
        help.hide();
    else
        help.show();
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