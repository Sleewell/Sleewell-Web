$(document).ready(function() {
    console.log( "ready!" );
    console.log(window.location.href);

    $("#UpdateProfil").click(function(){
        const token = document.cookie
        .split('; ')
        .find(row => row.startsWith('token='))
        .split('=')[1];
        console.log("token is :" + token);

        var login = $("#profileId").val();
        var firstname = $("#profileFirstname").val();
        var lastname = $("#profileLastName").val();
        var email = $("#profilEmail").val();
        var phoneNumber = $("#profilePhoneNumber").val();
        var about = $("#profilAbout").val();

        var form = new FormData();
        form.append("token", token);
        form.append("login", login);
        form.append("firstname", firstname);
        form.append("lastname", lastname);
        
        var settings = {
          "url": "https://api.sleewell.fr/user/update",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };
        
        $.ajax(settings).done(function (response) {
            document.cookie ="firstname=" + firstname;
            document.cookie ="lastname=" + lastname;
            console.log(response);
            location.reload();
        });
        $.ajax(settings).fail(function(response) {
            console.clear();
            alert("One of your information is not correct !");
        });
    });
});