function edytujDane($id = Array())
{
    var edycja = document.getElementById('edycja');
    var edycjaImie = document.getElementById('edycjaImie');
    edycja.style.display="block";
    edycjaImie.value=$id['imie'];
    
}
function usunDane($id)
{
    var usun = document.getElementById('usunDane');
    var idUsun = document.getElementById('idUsun');
    idUsun.value=$id;
    usun.style.display="block";  
}

function Usun($wybor)
{
   
    var usun = document.getElementById('usunDane');
   
    var idUsun = document.getElementById('idUsun').value;
  
    if ($wybor == 0)
    {
      $sql = "Delete from uzytkownik where id ="+idUsun;
    }
    else
    {
      usun.style.display="none";
    }
}