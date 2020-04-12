require("../css/app.css");

//Affichage date et heure
var date = document.getElementById("date");
var aujourdhui = new Date();
var annee = aujourdhui.getFullYear(); // retourne le millésime
var mois = aujourdhui.getMonth() + 1; // date.getMonth retourne un entier entre 0 et 11 donc il faut ajouter 1
var jour = aujourdhui.getDate(); // retourne le jour (1à 31)
var joursemaine = aujourdhui.getDay(); // retourne un entier compris entre 0 et 6 (0 pour dimanche)
var tab_jour = new Array(
  "Dimanche",
  "Lundi",
  "Mardi",
  "Mercredi",
  "Jeudi",
  "Vendredi",
  "Samedi"
);
date.innerHTML =
  "Nous sommes le : " +
  tab_jour[joursemaine] +
  " " +
  jour +
  "/" +
  mois +
  "/" +
  annee;

//Message de confirmation(3sec)
var alertC = document.getElementById("alertC");
var time = setInterval(function () {
  alertC.style.display = "none";
  clearInterval(time);
}, 3000);

var alertS = document.getElementById("alertS");
var time = setInterval(function () {
  alertS.style.display = "none";
  clearInterval(time);
}, 3000);

var formC = document.getElementById("formC");
var btnC = document.getElementById("btnC");

formC.style.display = "none";
btnC.addEventListener("click", function (e) {
  e.preventDefault();
  if (formC.style.display == "block") {
    formC.style.display = "none";
  } else {
    formC.style.display = "block";
  }
});
