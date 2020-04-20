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