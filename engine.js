window.addEventListener("load", load);
document.getElementsByClassName("antwort")[0].addEventListener("click", auswahl);
document.getElementsByClassName("antwort")[1].addEventListener("click", auswahl);
document.getElementsByClassName("antwort")[2].addEventListener("click", auswahl);
document.getElementsByClassName("antwort")[3].addEventListener("click", auswahl);
//document.getElementById("btn_weiter").addEventListener("click", weiter);

// Variablen

var ant1 = "Rot Grün Blau";
var ant2 = "Rot Gelb Blau";
var ant3 = "Rosa Gelb Blau";
var ant4 = "Rot Grün Braun";
var frage = "Für welche Farben steht die Abkürzung RGB?";
var ant_richtig = 3;
var selected;
var category;

var doc_frage = document.getElementById("Frage");
var doc_antworten = document.getElementsByClassName("ant_text");
var doc_antworten_div = document.getElementsByClassName("antwort");

function load()
{
    // Frage + Antworten aus der Datenbank laden
    
    
}

function auswahl()
{
    for(var i = 0; i < doc_antworten_div.length; i++)
    {
        doc_antworten_div[i].style += "background-color: #449d44;";
    }

    this.style = "background-color: #c12e2a;";
    selected = this.getAttribute('name');
}
