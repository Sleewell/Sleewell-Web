var redirect_uri = "http://localhost/Sleewell-Web/create_routine.php"; // change this your value

var client_id = "2250fa92c9794ecd8e0812806e516270"; 
var client_secret = "f2b21b5d9cd140569f1af0665e5b7479"; // In a real app you should not expose your client_secret to the user

var access_token = null;
var refresh_token = null;
var currentPlaylist = "";
var radioButtons = [];

const AUTHORIZE = "https://accounts.spotify.com/authorize"
const TOKEN = "https://accounts.spotify.com/api/token";
const PLAYLISTS = "https://api.spotify.com/v1/search";

function onPageLoad(){
    if ( window.location.search.length > 0 ){
        handleRedirect();
    }
    else{
        access_token = localStorage.getItem("access_token");
        if ( access_token == null ){
            // we don't have an access token so present token section
            document.getElementById("connectionSection").style.display = 'block';  
            document.getElementById("playlistsSection").style.display = 'none';  
        }
        else {
            // we have an access token so present device section
            document.getElementById("playlistsSection").style.display = 'block';  
            document.getElementById("connectionSection").style.display = 'none';  
            //refreshPlaylists();
        }
    }
}

function handleRedirect(){
    let code = getCode();
    fetchAccessToken( code );
    window.history.pushState("", "", redirect_uri); // remove param from url
}

function getCode(){
    let code = null;
    const queryString = window.location.search;
    if ( queryString.length > 0 ){
        const urlParams = new URLSearchParams(queryString);
        code = urlParams.get('code')
    }
    return code;
}

function requestAuthorization(){
    localStorage.setItem("client_id", client_id);
    localStorage.setItem("client_secret", client_secret); // In a real app you should not expose your client_secret to the user

    let url = AUTHORIZE;
    url += "?client_id=" + client_id;
    url += "&response_type=code";
    url += "&redirect_uri=" + encodeURI(redirect_uri);
    url += "&show_dialog=true";
    url += "&scope=user-read-private user-read-email user-modify-playback-state user-read-playback-position user-library-read streaming user-read-playback-state user-read-recently-played playlist-read-private";
    window.location.href = url; // Show Spotify's authorization screen
}

function fetchAccessToken( code ){
    let body = "grant_type=authorization_code";
    body += "&code=" + code; 
    body += "&redirect_uri=" + encodeURI(redirect_uri);
    body += "&client_id=" + client_id;
    body += "&client_secret=" + client_secret;
    callAuthorizationApi(body);
}

function refreshAccessToken(){
    refresh_token = localStorage.getItem("refresh_token");
    let body = "grant_type=refresh_token";
    body += "&refresh_token=" + refresh_token;
    body += "&client_id=" + client_id;
    callAuthorizationApi(body);
}

function callAuthorizationApi(body){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", TOKEN, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('Authorization', 'Basic ' + btoa(client_id + ":" + client_secret));
    xhr.send(body);
    xhr.onload = handleAuthorizationResponse;
}

function handleAuthorizationResponse(){
    if ( this.status == 200 ){
        var data = JSON.parse(this.responseText);
        console.log(data);
        var data = JSON.parse(this.responseText);
        if ( data.access_token != undefined ){
            access_token = data.access_token;
            localStorage.setItem("access_token", access_token);
        }
        if ( data.refresh_token  != undefined ){
            refresh_token = data.refresh_token;
            localStorage.setItem("refresh_token", refresh_token);
        }
        onPageLoad();
    }
    else {
        console.log(this.responseText);
        alert(this.responseText);
    }
}

$(document).ready(function() {
  $("#searchButton").click(function(){
        searchSpotify();
  });
  $('#searchPlaylistInput').keypress(function(e){
      if(e.which == 13){
          searchSpotify();
      }
  });
});
function searchSpotify() {
  var parent = document.getElementById("SpotifyItemsList");
  var search = $("#searchPlaylistInput").val();
  if (!search) {
    alert("Please fill the search playlist field");
    return;
  }
  var access_token = localStorage.getItem("access_token");
  var settings = {
      "url": PLAYLISTS,
      "method": "GET",
      "headers" : {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + access_token,
      },
      data: {
              'q' : search,
              'type' : "playlist",
              'limit' : "10",
              'offset' : "5",
      },
      "timeout": 0,
  };
  $.ajax(settings).done(function (response) {
    if (response.playlists.items.length == 0)
        console.log("no data")
    else {
        while (parent.firstChild) {
          parent.removeChild(parent.firstChild);
        }
        response.playlists.items.forEach(function(element) {
          var playlist = document.createElement('div');
          var img = document.createElement('img'); 
          var title = document.createElement('h5');

          playlist.setAttribute('id', element.uri);
          playlist.classList.add('spotify-item');
          playlist.setAttribute('style', 'cursor: pointer');
          playlist.setAttribute('onclick', 'updateFooterMusic(this.id)');
          playlist.onclick = function() {updateFooterMusic(this.id);};
          
          img.setAttribute('id', element.images[0].url);
          img.classList.add('playlist-img');
          img.setAttribute('src', element.images[0].url)

          title.setAttribute('id', element.name);
          title.classList.add('playlist-name');
          title.textContent = element.name;

          playlist.appendChild(img);
          playlist.appendChild(title);
          parent.appendChild(playlist);
        });
    }
  }).fail(function(response) {
    if (response.status == 401) {
      refreshAccessToken()
    }
    else {
      console.log(response);
      alert("Please fill the search playlist field");
    }
  });
}