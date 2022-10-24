
function WyborStanowisko()
{
    var wybraneStanowisko = document.getElementById("stanowisko").value;

     switch(wybraneStanowisko){
         case "tester": DodatkowyWybor(1); break;
         case "developer": DodatkowyWybor(2);break;
         case "projectmanager": DodatkowyWybor(3); break
       
        default: ;
    }
}

function DodatkowyWybor($wyborUzytkownika)
{
    
    var dodatkowyWyborTester = document.getElementById("dodatkowyWyborTester");
    var dodatkowyWyborDeveloper = document.getElementById("dodatkowyWyborDeveloper");
    var dodatkowyWyborProjectManager = document.getElementById("dodatkowyWyborProjectManager");
    var wyslij = document.getElementById("wyslij");
    wyslij.style.display = "block";
    dodatkowyWyborTester.style.display = "none";
    dodatkowyWyborProjectManager.style.display = "none";
    dodatkowyWyborDeveloper.style.display = "none";


    switch($wyborUzytkownika)
    {
        case 1: dodatkowyWyborTester.style.display = "block"; break;
        case 2: dodatkowyWyborDeveloper.style.display = "block"; break;
        case 3: dodatkowyWyborProjectManager.style.display ="block"; break;
        default:  dodatkowyWyborTester.style.display = "none";
        dodatkowyWyborProjectManager.style.display = "none";
        dodatkowyWyborDeveloper.style.display = "none";break;
    }

}