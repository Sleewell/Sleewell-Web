$(document).ready(function() {
    $("#DownloadApk").click(function(){
        console.log("Heho");
        var settings = {
            "url": "https://api.sleewell.fr/global/apk",
            "method": "POST",
            "timeout": 0,
        };
        $.ajax(settings).done(function (response) {
            console.log(response);
            location.href = "index.php";
        });
    });
});