<?php
include_once 'klasy/Baza.php';
include_once 'klasy/Uzytkownik.php';
if (filter_input(INPUT_POST, "wyslij")){
     
    $db = new Baza("localhost", "root", "", "Uzytkownicy");
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $opis = $_POST['opis'];
    $uzytkownik = new Uzytkownik();   
    $stanowisko =$uzytkownik->wybraneStanowisko($_POST['stanowisko']);
    $sprawdzoneDane = $uzytkownik->sprawdzenieDanych();
    if ($db->szukajEmail($_POST['email']) === 0 &&  $sprawdzoneDane === 0)
    {
 //   $sql = "insert into uzytkownik (imie,nazwisko,email,opis,id_stanowisko) values('$imie','$nazwisko','$email','$opis',$stanowisko)";
   //    $id_Uzytkownika= $db->dodajUzytkownika($sql,$email);
   $id_Uzytkownika= $db->dodajUzytkownika($imie, $nazwisko, $email, $opis, $stanowisko);
       $dodajUmiejetnosci = $uzytkownik->umiejetnosciUzytkownika($stanowisko,$id_Uzytkownika);
      $db->dodajUmiejetnosci($dodajUmiejetnosci);
       echo "Dodano do bazy";    
    }
    else
    {
        echo "taki e-mail już jest w bazie lub wprowadzono złe dane";
    }
}
else
    header('Location: Rejestracja.html');

 ?>