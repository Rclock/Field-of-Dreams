

window.onload = rotate;

var adImages = new Array("SU.png","SUseal.png","sammy.png");
var thisAd = 0;

function rotate() {
thisAd++;
if (thisAd == adImages.length) {
thisAd = 0;
}
document.getElementById("adBanner").src = adImages[thisAd];

setTimeout("rotate()", 3 * 1000);
}
