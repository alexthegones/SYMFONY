import "../css/app.css";
import "../js/map.js";
import $ from "jquery";
import "select2";

var btnC = document.getElementById("btnC");
var formC = document.getElementById("formC");

btnC.addEventListener("click", function () {
  btnC.replaceWith(formC);
});

$("select").select2();

var blink = document.getElementById("blink");
var clignotement = function () {
  if (blink.style.visibility == "visible") {
    blink.style.visibility = "hidden";
  } else {
    blink.style.visibility = "visible";
  }
};
setInterval(clignotement, 1000);