$(document).ready(function() {

    var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

    //Function to convert rgb color to hex format
    function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    return hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

    function hex(x) {
    return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
    }

    const name = document.cookie.split('; ').find(row => row.startsWith('routineName=')).split('=')[1];
    const color = document.cookie.split('; ').find(row => row.startsWith('haloColor=')).split('=')[1];
    const musicName = document.cookie.split('; ').find(row => row.startsWith('musicName=')).split('=')[1];
    const musicUri = document.cookie.split('; ').find(row => row.startsWith('musicUri=')).split('=')[1];

    var musicFooter = document.getElementById("musicFooter");
    document.getElementById("ProtocolTitle").value = name;
    musicFooter.childNodes[1].setAttribute('src', "img/leprouscover.png");
    if (musicUri == "") {
        musicFooter.childNodes[1].setAttribute('id', musicName);
        musicFooter.childNodes[2].textContent = musicName;
        $('#spotify_logo').hide();
    }
    else {
        musicFooter.childNodes[1].setAttribute('id', musicUri);
        musicFooter.childNodes[2].textContent = musicName;
        $('#spotify_logo').show();
    }
    if (color != "") {
        $('.halo-footer').css("background-color", color);
        var hexcolor = rgb2hex(color);
        document.getElementById("color-input").value = hexcolor;
    }
});