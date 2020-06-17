import "../css/app.css";
import "../js/map.js";



//Message de confirmation(3sec)
// var alertC = document.getElementsByClassName("alert alert-success");
// var time = setInterval(function () {
//   alertC.style.display = "none";
//   clearInterval(time);
// }, 3000);


var btnC = document.getElementById("btnC");
var formC = document.getElementById("formC");

btnC.addEventListener("click", function () {
  btnC.replaceWith(formC);
});
