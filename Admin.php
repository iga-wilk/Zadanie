<!DOCTYPE html>
<html>
 <head>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="js/funkcjeAdmin.js" type="text/javascript"></script>
  <title>Administracja</title>
 </head>
<body>
<?php
 include_once 'klasy/Baza.php';
$db = new Baza("localhost", "root", "", "Uzytkownicy");
$wyswietl=$db->Wyswietl();
echo $wyswietl;

?>
<div id="edycja" style="display:none ;">
    <form action="Admin.php" method="post">
    <input type="text" id="edycjaImie" name="edycjaImie">
    </form>
</div>
<!-- <div id="usunDane" style="display:none ;">
    Czy na pewno chcesz usunąć?
   
    <button onClick=Usun(0)>Tak</button>
    <button onClick=Usun(1)>Nie</button>
    <input type="hidden" id="idUsun">
</div> -->

<div id="usunDane" style="display:none ;">
    Czy na pewno chcesz usunąć?
   <form action="Admin.php" method="post">
     <input type="hidden" id="idUsun">
     <input type="submit" name="usun" value="Tak">
     <input type="submit" name="nieUsun" value="Nie">
 </form>
    
</div>