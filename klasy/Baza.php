<?php
class Baza {

private $mysqli; 

public function __construct($serwer, $user, $pass, $baza) {
    $this->mysqli = new mysqli($serwer, $user, $pass, $baza);

    if ($this->mysqli->connect_errno) 
    {
        printf("Nie udało sie połączenie z serwerem: %s\n", $mysqli->connect_error);
        exit();
      }
     
  }
  public function wyszukajStanowisko($id_stanowiska)
  {
    $sql="Select nazwa from stanowisko where id='$id_stanowiska'";
    $wynik = $this->mysqli->query($sql);
    if ($wynik->num_rows > 0)
    {
      while($wiersz = $wynik->fetch_assoc())
          {
           return $wiersz['nazwa'];
          }
    }
    else return "error";
   
  }
  public function umiejetnosciUzytkownika($id_uzytkownika)
  {
    $sql = "Select u.nazwa as Umiejetnosc , uUz.nazwa as Opis from umiejetnosciUzytkownika uUz join umiejetnosci u on uUz.id_umiejetnosc= u.id where id_uzytkownik= '$id_uzytkownika'";
    
    $wynik = $this->mysqli->query($sql);
    $tresc = "";
    if($wynik->num_rows > 0)
    {
      
        while($wiersz = $wynik->fetch_assoc())
        {
          $tresc .= $wiersz['Umiejetnosc'].": ".$wiersz['Opis']."<br/>";
        }
        return $tresc;
    }
    else
    {
      return "nie znaleziono umiejetnosci danego uzytkownika";
    }
  }

  public function Wyswietl()
  {
    $sql = "Select * from uzytkownik";
    $wynik = $this->mysqli->query($sql);
    $tresc = "";
    if ($wynik->num_rows > 0)
    {
      $tresc .= "<h1>Użytkownicy </h1>";
      $tresc .= "<table id='tabelaUzytkownicy'> <tr>".
                "<th> Imie i nazwisko</th>".
                "<th> E-mail </th>".
                "<th> Opis </th>".
                "<th> Stanowisko</th>".
                "<th> Umiejetnosci </th>".
                "</tr>"; 

        while($wiersz = $wynik->fetch_assoc())
          {
            $id = $wiersz['id'];
            $imie = $wiersz['imie'];
            $nazwisko = $wiersz['nazwisko'];
            $opis = $wiersz['opis'];
            $tresc .= "<tr>";
            $tresc .= "<th>". $imie." ".$nazwisko."</th>";
            $tresc .= "<th>".$wiersz['email']."</th>";
            $tresc .="<th>".$opis."</th>";
            $tresc .="<th>".$this->wyszukajStanowisko($wiersz['id_stanowisko'])."</th>";
            $tresc .="<th>".$this->umiejetnosciUzytkownika($id)."</th>";
            $tresc .="<th> <button name='edytuj' onClick=edytujDane('$id','$imie','$nazwisko')>Edytuj</button>";
            $tresc .=" <button name='usun' onClick=usunDane('$id') >Usun</button></th></tr>";
          }
        $tresc .= "</table>" ; 
    }
    else
    {
      $tresc = "Brak uzytkownikow";
    }
    return $tresc;
  }

  public function szukajEmail($email)
  {
    $sql = "Select * from uzytkownik WHERE email='$email'";
    $wynikWyszukiwania = $this->mysqli->query($sql);

    if ($wynikWyszukiwania->num_rows > 0)
    {
      return 1;
    }
    else return 0;
  }
  public function dodajUzytkownika($imie, $nazwisko, $email, $opis, $id_stanowisko)
  {
    $sql = $this->mysqli->prepare("insert into uzytkownik(imie,nazwisko,email,opis,id_stanowisko) values (?,?,?,?,?)");
    $sql->bind_param("ssssi",$imie,$nazwisko,$email,$opis,$id_stanowisko);
    $sql->execute();
    $wyszukanieUzytkownika ="Select id from uzytkownik WHERE email='$email'";
    $idNowegoUzytkownika = $this->mysqli->query($wyszukanieUzytkownika);
    if ($idNowegoUzytkownika->num_rows > 0)
    {
        while($wiersz = $idNowegoUzytkownika->fetch_assoc())
          {
            return $wiersz['id'];
          }
    }
    else
    {
      echo "Brak uzytkownikow";
      return -1;
    }
    
  }
  // public function dodajUzytkownika($sql,$email)
  // {
  //   $this->mysqli->query($sql);
  //   $wyszukanieUzytkownika ="Select id from uzytkownik WHERE email='$email'";
  //   $idNowegoUzytkownika = $this->mysqli->query($wyszukanieUzytkownika);
  //   if ($idNowegoUzytkownika->num_rows > 0)
  //   {
  //       while($wiersz = $idNowegoUzytkownika->fetch_assoc())
  //         {
  //           return $wiersz['id'];
  //         }
  //   }
  //   else
  //   {
  //     echo "Brak uzytkownikow";
  //     return -1;
  //   }
    
  // }

  public function dodajUmiejetnosci($sql)
  {
    $this->mysqli->query($sql);
  }

  public function usunUzytkownika($sql)
  {
    $this->mysqli->query($sql);
  }

  public function EdytujDane($id,$imie,$nazwisko)
  {
    $sql = "UPDATE uzytkownik SET imie='$imie', nazwisko='$nazwisko' WHERE id='$id'";
    $this->mysqli->query($sql);
  }

  
}