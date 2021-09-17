$(document).ready(function() {
    $("#DownloadApk").click(function(){
        const token = document.cookie
        .split('; ')
        .find(row => row.startsWith('token='))
        .split('=')[1];
//url a changer
        var settings = {
            "url": "https://api.sleewell.fr/user/update",
            "method": "SET",
            "headers" : {
                "Authorization": token
            },
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false
        };
        $.ajax(settings).done(function (response) {
            console.log(response);
            location.href = "index.php";
        });
    });
});