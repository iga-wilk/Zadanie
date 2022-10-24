<?php

class Uzytkownik
{
    public function wybraneStanowisko($stanowisko)
    {
        switch ($stanowisko)
        {
            case "tester": return 1;break;
            case "developer": return 2;break;
            case "projectmanager": return 3; break;
            default: return 0;
        }
    }

    public function sprawdzenieDanych()
    {
        $args = [
            'imie'=> ['filter' =>FILTER_VALIDATE_REGEXP,  
                        'options'=> ['regexp'=>'/^[A-Za-ząęłńśćźżó-]{3,20}+\s*[A-Za-ząęłńśćźżó-]{0,20}$/']
                         ],
            'nazwisko'=> [ 'filter' =>FILTER_VALIDATE_REGEXP,  
                        'options'=> ['regexp'=>'/^[A-Za-ząęłńśćźżó-]{2,20}+\s*[A-Za-ząęłńśćźżó-]{0,20}$/'] 
                         ],          
			'email' =>  FILTER_VALIDATE_EMAIL  ];

       
            $dane = filter_input_array(INPUT_POST, $args);

        $errors = "";
        foreach ($dane as $key => $val)
          {    
          if ($val === false or $val === NULL) 
            {      
                 $errors .= $key. ", ";   
            }     
            
          }   
          if ($errors ==="")
          {
             return 0;
          }
          else {
                  $text = "<p>Błędne dane: $errors</p>";
                  return $text;
                 
          }   
        
    }


    public function umiejetnosciUzytkownika($stanowisko, $id)
    {
        switch($stanowisko)
        {
            case 1: $systemyTestujace = $_POST['systemyTestujace'];
                    $systemyRaportowe = $_POST['systemyRaportowe'];
                    if(isset($_POST['czyZnaSelenium'])) 
                          {$czyZnaSelenium = "tak";} 
                    else {$czyZnaSelenium = "nie";};
                    $sql = "Insert into umiejetnosciUzytkownika (id_uzytkownik, id_umiejetnosc, nazwa)".
                            "values ($id,1,'$systemyTestujace'),".
                            "($id,2,'$systemyRaportowe'),".  
                            "($id,3,'$czyZnaSelenium')";
                    return $sql;break;
            case 2: $srodowiskaIDE = $_POST['srodowiskaIDE'];
                    $jezykiProgramowania = $_POST['jezykiProgramowania'];
                    if(isset($_POST['czyZnaMysql'])) $czyZnaMysql = "tak"; else $czyZnaMysql = "nie";
                    $sql = "Insert into umiejetnosciUzytkownika (id_uzytkownik, id_umiejetnosc, nazwa)".
                            "values ($id,4,'$srodowiskaIDE'),".
                            "($id,5,'$jezykiProgramowania'),".  
                            "($id,6,'$czyZnaMysql')";
                    return $sql;break;
            case 3: $metodologie = $_POST['metodologie'];
                     $systemyRaportowe2 = $_POST['systemyRaportowe2'];
                     if(isset($_POST['czyZnaScrum'])) $czyZnaScrum = "tak"; else $czyZnaScrum = "nie";
                     $sql = "Insert into umiejetnosciUzytkownika (id_uzytkownik, id_umiejetnosc, nazwa)".
                             "values ($id,7,'$metodologie'),".
                            "($id,2,'$systemyRaportowe2'),".  
                            "($id,8,'$czyZnaScrum')";
                    return $sql;break;
            default: return 0;
        }
    }
}