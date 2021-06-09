$(document).ready(function() {
    const token = document.cookie
    .split('; ')
    .find(row => row.startsWith('token='))
    .split('=')[1];

    var parent = document.getElementById("routineFullList");

    var settings = {
        "url": "https://api.sleewell.fr/routines",
        "method": "GET",
        "headers" : {
            "Authorization": token
        },
        "timeout": 0,
    };
    $.ajax(settings).done(function (response) {
      if (response.data.length == 0)
          console.log("no data")
      else {
        for (var i = 0; i < response.data.length; i++) {
            if (i % 5 == 0)
                var tr = document.createElement('tr');
            var tdFit = document.createElement('td');
            var divFit = document.createElement('div');
            var button = document.createElement('button');
            var img_cover = document.createElement('img');
            var logo_spot = document.createElement('img');
            var title = document.createElement('h4');
  
            tdFit.classList.add('fit-table-routine');
            
            divFit.classList.add('fit-routine');
            
            button.classList.add('halo');
            button.setAttribute('id', response.data[i].id);
            button.setAttribute('style', "background-color: " + response.data[i].color);
            button.setAttribute('onclick', "sendIdToModal(this.id)");
            button.onclick = function() {sendIdToModal(this.id);};
            button.setAttribute('data-toggle', 'modal');
            button.setAttribute('data-target', '#modalRoutine');

            img_cover.classList.add('music-cover');
            img_cover.setAttribute('id', response.data[i].musicName + ";" + response.data[i].musicUri);
            img_cover.setAttribute('src', 'img/leprouscover.png');

            if (response.data[i].player == "Spotify") {
                logo_spot.classList.add('spotify-logo');
                logo_spot.setAttribute('id', response.data[i].player);
                logo_spot.setAttribute('src', 'img/spotify_logo.png');
            }

            title.classList.add('AmberText');
            title.setAttribute('id', response.data[i].id + "Name");
            title.textContent = response.data[i].name;
  
            button.appendChild(img_cover);
            button.appendChild(logo_spot);
            divFit.appendChild(button);
            divFit.appendChild(title);
            tdFit.appendChild(divFit);
            tr.appendChild(tdFit);
            parent.appendChild(tr);
        }
      }
    });
    $.ajax(settings).fail(function(response) {
      if (response.status == 401) {
        refreshAccessToken()
      }
      else {
        console.log(response);
        alert("Please fill the search playlist field");
      }
    });
});