<!DOCTYPE html>
<html>
 <head>
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
<div>
<div id="edycja" style="display:none ;">
Edytuj dane:
    <form action="Admin.php" method="post">
    <input type="hidden" id="idUzytkownika" name="idUzytkownika">
    <table>
    <tr>
        <th> <label for="imie">Imie: </th>
        <th> <input type="text" id="imie" name="imie"></th>
    </tr>

    <tr>
     <th> <label for="nazwisko">Nazwisko: </th>
     <th> <input type="text" id="nazwisko" name="nazwisko"></th>
    </tr>

    </table>
    </form>
</div>

<div id="usunDane" style="display:none ;">
    Czy na pewno chcesz usunąć?
   <form action="Admin.php" method="post">
     <input type="hidden" id="idUsun" name="idUsun">
     <input type="submit" name="usun" value="Tak">
     <input type="submit" name="nieUsun" onClick="Zamknij(1)" value="Nie">
 </form>
    
</div>
<?php
if (filter_input(INPUT_POST, "usun"))
{
    $id = $_POST['idUsun'];
    $sql = "Delete from uzytkownik where id='$id'";
    $db->usunUzytkownika($sql);
    header('Location: Admin.php');
}
// elseif (filter_input(INPUT_POST, "edycja"))
// {

// }
