/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("under-header").style.display = "";
    document.getElementById("logo-web").style.width = "90px";
    document.getElementById("logo-web").style.height = "70px";

  } else {
    document.getElementById("logo-web").style.width = "50px";
    document.getElementById("logo-web").style.height = "40px";
    document.getElementById("under-header").style.display = "none";
    document.getElementById("logo-web").style.transition = "width 1s, height 1s";
  }
  prevScrollpos = currentScrollPos;
}