$(document).ready(function() {
    $("#addRoutine").click(function(){
        const token = document.cookie
        .split('; ')
        .find(row => row.startsWith('token='))
        .split('=')[1];

        var musicFooter = document.getElementById("musicFooter");
        var player, musicname, music, halo, color;
        var color = $("#color-input").val();
        color = "#" + color;
        halo = 1;
        var music = 1;
        var duration = 60;

        if ($("#spotify_logo").is(":visible")) {
            musicuri = musicFooter.childNodes[1].id;
            musicname = musicFooter.childNodes[2].textContent;
            player = "Spotify"
        } else if ($("#spotify_logo").is(":hidden")) {
            musicuri = null;
            musicname = musicFooter.childNodes[1].id;
            player = "Sleewell"
        }
        var name = $("#ProtocolTitle").val();

        var form = new FormData();
        form.append("token", token);
        form.append("color", color);
        form.append("music", music);
        form.append("halo", halo);
        form.append("duration", duration);
        form.append("player", player);
        form.append("name", name);
        form.append("musicname", musicname);
        form.append("musicuri", musicuri);

        var settings = {
        "url": "https://api.sleewell.fr/addRoutine",
        "method": "POST",
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
            location.href = "routine_manager.php";
        });
    });
});