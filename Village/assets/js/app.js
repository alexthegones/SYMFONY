
require('../css/app.css');



var nom = document.getElementById("event_search_nom")
var lieu = document.getElementById("event_search_lieu")

nom.addEventListener('click', function(){
    nom.value = ""
});

lieu.addEventListener('click', function(){
    lieu.value = ""
});

