function edytujDane($id,$imie,$nazwisko)
{
    var edycja = document.getElementById('edycja');
    var edycjaImie = document.getElementById('imie');
    var idUzytkownika = document.getElementById('idUzytkownika');
    var edycjaNazwisko = document.getElementById('nazwisko');
    var edycjaOpis= document.getElementById('opis');
    edycja.style.display="block";
     idUzytkownika.value=$id;
     edycjaImie.value=$imie;
     edycjaNazwisko.value=$nazwisko;

}
function usunDane($id)
{
    var usun = document.getElementById('usunDane');
    var idUsun = document.getElementById('idUsun');
    idUsun.value=$id;
    usun.style.display="block";  
}

function Zamknij($blok)
{
      var usun = document.getElementById('usunDane');
      var edycja = document.getElementById('edycja');
      if ($blok == 1)
      {
        usun.style.display="none";
      }
      else if ($blok == 2)
      {
        edycja.style.display="none";
      }
   
}