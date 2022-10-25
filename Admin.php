<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/admin.css">
    <script src="js/funkcjeAdmin.js" type="text/javascript"></script>
  <title>Administracja</title>
 </head>
<body>
    <div class="wyswietl">
        <?php
            include_once 'klasy/Baza.php';
            $db = new Baza("localhost", "root", "", "Uzytkownicy");
            $wyswietl=$db->Wyswietl();
            echo $wyswietl;
        ?>
    </div>
    <div id="edycja" id="EdytujDane" class="EdytujDane"style="display:none ;" >
       <h2> Edytuj dane:</h2>
         
             <table>
             <form action="Admin.php" method="post">
             <input type="hidden" id="idUzytkownika" name="idUzytkownika">
                <tr>
                    <th> <label for="imie">Imie: </th>
                   <th> <input type="text" id="imie" name="imie"></th>
                </tr>

                 <tr>
                     <th> <label for="nazwisko">Nazwisko: </th>
                     <th> <input type="text" id="nazwisko" name="nazwisko"></th>
                </tr>
                <tr>
                    <th><input type="submit" name="edytuj" value="Edytuj"></th>
                    </form>
                    <th><button name="Anuluj" onClick ="Zamknij(2)" value="Anuluj">Anuluj</button></th>
                </tr>
            </table>
           
           
    </div>

    <div id="usunDane" style="display:none ;" class="usunDane">
       Czy na pewno chcesz usunąć?
       <table>
       <form action="Admin.php" method="post">
         <input type="hidden" id="idUsun" name="idUsun">
       <tr>
        <th>  <input type="submit" name="usun" value="Tak"> </th>
       </form>  
      <th>  <button name="nie" onClick ="Zamknij(1)" value="nie">Nie</button> </th>
    </div>
</body>
<?php
if (filter_input(INPUT_POST, "usun"))
{
    $id = $_POST['idUsun'];
    $sql = "Delete from uzytkownik where id='$id'";
    $db->usunUzytkownika($sql);
    header('Location: Admin.php');
}
 elseif (filter_input(INPUT_POST, "edytuj"))
 {
    $id = $_POST['idUzytkownika'];
    $imie = $_POST['imie'];
    $nazwisko =$_POST['nazwisko'];
    $db->EdytujDane($id, $imie, $nazwisko);
    header('Location: Admin.php');
 }
