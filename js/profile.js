$(document).ready(function() {
    const token = document.cookie
        .split('; ')
        .find(row => row.startsWith('token='))
        .split('=')[1];
    var settings = {
        "url": "https://api.sleewell.fr/user/get-picture",
        "method": "GET",
        "timeout": 0,
        "headers": {
          "Authorization": token
        },
    };
    $.ajax(settings).done(function (response) {
        console.log(response.file_path);

        // var  readerfile1 = new File([""], response);
        document.getElementById("imgProfile").src = response.file_path;
    });
    
    $("#UpdateProfil").click(function(){
        const token = document.cookie
        .split('; ')
        .find(row => row.startsWith('token='))
        .split('=')[1];

        var login = $("#profileId").val();
        var firstname = $("#profileFirstname").val();
        var lastname = $("#profileLastName").val();
        var email = $("#profilEmail").val();
        var phoneNumber = $("#profilePhoneNumber").val();
        var about = $("#profilAbout").val();
        var infoMail;
        if ($("#checkboxMail").is(":checked"))
            infoMail = 1;
        else
            infoMail = 0;

        console.log("Mail: " + infoMail);

        var form = new FormData();
        form.append("login", login);
        form.append("firstname", firstname);
        form.append("lastname", lastname);
        form.append("email", email);
        form.append("update", infoMail);
        var settings = {
            "url": "https://api.sleewell.fr/user/update",
            "method": "POST",
            "headers" : {
                "Authorization": token
            },
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };
        
        $.ajax(settings).done(function (response) {
            // console.log(response);
            document.cookie ="firstname=" + firstname;
            document.cookie ="lastname=" + lastname;
            document.cookie ="email=" + email;
            document.cookie ="checkEmail=" + infoMail;
            location.reload();
        }).fail(function(response) {
            console.clear();
            alert("One of your information is not correct !");
        });
    });
    
});

function uploadImage(input)
{   
    const token = document.cookie
    .split('; ')
    .find(row => row.startsWith('token='))
    .split('=')[1];

    var form = new FormData();
    // console.log(input.files[0]);
    form.append("picture", input.files[0]);

    var settings = {
        "url": "https://api.sleewell.fr/user/picture",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Authorization": token
        },
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };
    
    $.ajax(settings).done(function (response) {
        location.reload();
        // console.log(response);
    });
}