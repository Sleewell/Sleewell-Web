$(document).ready(function() {
    $("#DownloadApk").click(function(){
        const token = document.cookie
        .split('; ')
        .find(row => row.startsWith('token='))
        .split('=')[1];
        var settings = {
            "url": "https://api.sleewell.fr/global/apk",
            "method": "PUT",
            "timeout": 0,
        };
        $.ajax(settings).done(function (response) {
            console.log(response);
            location.href = "index.php";
        });
    });
});