$(document).ready(function() {
    $("#deletebtn").click(function(){
        const token = document.cookie
        .split('; ')
        .find(row => row.startsWith('token='))
        .split('=')[1];

        const id = document.cookie
        .split('; ')
        .find(row => row.startsWith('routineId='))
        .split('=')[1];

        var form = new FormData();
        form.append("id", id);

        var settings = {
        "url": "https://api.sleewell.fr/deleteRoutine",
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