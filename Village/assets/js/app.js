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


// OpenStreetMap/Leaflet library
var cartediv = document.getElementById("cartediv");
cartediv.style.width = "300px";
cartediv.style.height = "300px";

// Initialise la carte(Coordonnées Nancy)
var carte = L.map("cartediv").setView([48.692054, 6.184417], 14);

// Charge les 'tuiles'
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(carte);

// Création d'un marqueur
var marqueur = L.marker([48.692054, 6.184417]).addTo(carte);
marqueur.bindPopup("<b>Hello Nancy!</b>.").openPopup();

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
// Afficher/Cacher formulaire de contact
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