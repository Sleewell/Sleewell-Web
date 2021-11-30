function sendGoogleLoginForm(idToken)
{
    var form = new FormData();
    form.append("token", idToken);
	console.log(idToken);

    var settings = {
        "url": "https://api.sleewell.fr/user/oauth/google",
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
            console.log(response);
            var obj2 = jQuery.parseJSON(response);
            console.log(obj2);
            document.cookie ="login=" + obj2.login;
            document.cookie ="firstname=" + obj2.firstname;
            document.cookie ="lastname=" + obj2.lastname;
            document.cookie ="email=" + obj2.email;
            document.cookie ="checkEmail=" + obj2.updateMail;
            location.href = "index.php";
        }).fail(function(response) {
            console.clear();
            alert("Problem to get profile information");
        });
    }).fail(function(response) {
        //console.clear();
        alert("Failed to find your profile");
    });
}
