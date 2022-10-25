function edytujDane($id,$imie,$nazwisko)
{
    var edycja = document.getElementById('edycja');
    var edycjaImie = document.getElementById('imie');
    var idUzytkownika = document.getElementById('idUzytkownika');
    var edycjaNazwisko = document.getElementById('nazwisko');
    var usun = document.getElementById('usunDane');
    usun.style.display="none";
    edycja.style.display="block";
     idUzytkownika.value=$id;
     edycjaImie.value=$imie;
     edycjaNazwisko.value=$nazwisko;

}
function usunDane($id)
{
    var usun = document.getElementById('usunDane');
    var idUsun = document.getElementById('idUsun');
    var edycja = document.getElementById('edycja');
    edycja.style.display = "none";
  
    idUsun.value=$id;
    usun.style.display="block";  
}

function Zamknij($blok)
{
      var usun = document.getElementById('usunDane');
      var edycja = document.getElementById('edycja');
      switch($blok)
      {
        case 1:  usun.style.display="none";break;
        case 2:  edycja.style.display="none";break;
        default: usun.style.display="none";
                edycja.style.display="none";
      }
      
   
}