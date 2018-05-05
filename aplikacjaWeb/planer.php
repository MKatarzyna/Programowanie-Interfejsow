<?php
   include('session.php');
?>

<?php
    $xml = simplexml_load_file('resources/xml/planerWizyty.xml') or die("Error: Cannot create object");
    $wizyty = $xml->xpath("//wizyty/wizyta");
    $ileWizyt = count($wizyty);

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['zastosuj']))
    { 
        $checked_arr = $_POST['checkbox'];
        $termin_tablica = $_POST['termin'];
        $adres_tablica = $_POST['adres'];
        $kontakt_tablica = $_POST['kontakt'];
        $notatka_tablica = $_POST['notatka'];

        $countChecked = count($checked_arr);

        if($countChecked == 0){
            echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h5><i class="icon fa fa-check"></i>Zaznacz wiersz, który chcesz edytować.</h5>
            </div>';
        } else {
            for($i = 0; $i < $countChecked; $i++)
            {
                $checkbox_sent = $checked_arr[$i];
                $values = explode("-", $checkbox_sent);
                $id = $values[0];
                $row = $values[1];

                foreach($xml->wizyta as $wizyta)
                {
                    if($wizyta['id'] == "$id") {
                        $dom = dom_import_simplexml($wizyta);
                        $dom->getElementsByTagName("termin")->item(0)->nodeValue = $termin_tablica[$row];
                        $dom->getElementsByTagName("adres")->item(0)->nodeValue = $adres_tablica[$row];
                        $dom->getElementsByTagName("kontakt")->item(0)->nodeValue = $kontakt_tablica[$row];
                        $dom->getElementsByTagName("notatka")->item(0)->nodeValue = $notatka_tablica[$row];
                    }
                }
            }
            $xml->asXml('resources/xml/planerWizyty.xml');

            echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h5><i class="icon fa fa-check"></i>Pomyślnie zapisano wprowadzone zmiany.</h5>
            </div>';
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['usun']))
    { 
        $checked_arr = $_POST['checkbox'];
        $countChecked = count($checked_arr);

        if($countChecked == 0){
            echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h5><i class="icon fa fa-check"></i>Zaznacz wiersz, który chcesz usunąć.</h5>
            </div>';
        } else {
            for($i = 0; $i < $countChecked; $i++)
            {
                $checkbox_sent = $checked_arr[$i];
                $values = explode("-", $checkbox_sent);
                $id = $values[0];
                $row = $values[1];

                foreach($xml->wizyta as $wizyta)
                {
                    if($wizyta['id'] == "$id") {
                        $dom=dom_import_simplexml($wizyta);
                        $dom->parentNode->removeChild($dom);
                    }
                }
            }
            $xml->asXml('resources/xml/planerWizyty.xml');

            echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h5><i class="icon fa fa-check"></i>Pomyślnie usunięto zaznaczone wpisy.</h5>
            </div>';
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['dodaj']))
    { 
        $termin_tablica = $_POST['termin'];
        $adres_tablica = $_POST['adres'];
        $kontakt_tablica = $_POST['kontakt'];
        $notatka_tablica = $_POST['notatka'];

        $lastElementTermin = end($termin_tablica);
        $lastElementAdres = end($adres_tablica);
        $lastElementKontakt = end($kontakt_tablica);
        $lastElementNotatka = end($notatka_tablica);

        $ostatniWpis = $xml->xpath("//wizyty/wizyta[not(@id <= preceding-sibling::wizyta/@id) and not(@id <=following-sibling::wizyta/@id)]");

        $id = $ostatniWpis[0]['id']+1;
        
        $doc = new DOMDocument();
        $doc->load('resources/xml/planerWizyty.xml', LIBXML_NOBLANKS);

        $wizyta = $doc->createElement('wizyta');      
        $domAttribute = $doc->createAttribute('id');
        $domAttribute->value = $id;
        $wizyta->appendChild($domAttribute);
        $wizyta = $doc->documentElement->appendChild($wizyta);

        $termin = $doc->createElement('termin');
        $termin = $wizyta->appendChild($termin);

        $termin_text = $doc->createTextNode($lastElementTermin);
        $termin_text = $termin->appendChild($termin_text);

        $adres = $doc->createElement('adres');
        $adres = $wizyta->appendChild($adres);

        $adres_text = $doc->createTextNode($lastElementAdres);
        $adres_text = $adres->appendChild($adres_text);

        $kontakt = $doc->createElement('kontakt');
        $kontakt = $wizyta->appendChild($kontakt);

        $kontakt_text = $doc->createTextNode($lastElementKontakt);
        $kontakt_text = $kontakt->appendChild($kontakt_text);

        $notatka = $doc->createElement('notatka');
        $notatka = $wizyta->appendChild($notatka);

        $notatka_text = $doc->createTextNode($lastElementNotatka);
        $notatka_text = $notatka->appendChild($notatka_text);
        

        $doc->formatOutput = true;
        $doc->preserveWhiteSpace = false;
        $doc->save("resources/xml/planerWizyty.xml");
    }
    
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Product example for Bootstrap</title>

    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/product.css" rel="stylesheet">
    <link href="resources/css/album.css" rel="stylesheet">
    
    <script src="resources/js/version331/jquery.min.js"></script>
    <script src="resources/js/popper.min.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    <script src="resources/js/holder.min.js"></script>

    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </head>

  <body>

    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column justify-content-between">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link btn-pink" href="planer.php">Planer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="porady.php">Porady</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="wyszukaj.php">Wyszukaj</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bmi.php">BMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt.php">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="wyloguj.php">Wyloguj</a>
                </li>
            </ul>
        </div>            
    </nav>


<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Witaj na stronie planowania :)</h1>
            <p class="lead text-muted"></br>1. Uzupełnij wiersz i kliknij przycisk "Dodaj", aby zapisać termin wizyty.</br></br>2. Edytuj wybrany wiersz, po czym zaznacz pole po lewej stronie w tej samej linii, a następnie kliknij przycisk "Zastosuj", aby zapisać zmiany.</br></br>3. Zaznacz pola po lewej stronie, które chcesz usunąć, a następnie kliknij przycisk "Usuń", aby dokonać zmian.</p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <form class="form"  action="" method="post">
      


                <table class="table table-striped mb-5">
                    <thead>
                        <tr>
                            <th> </th>
                            <!-- <th>ID</th> -->
                            <th>Termin wizyty</th>
                            <th>Miejsce wizyty</th>
                            <th>Kontakt</th>
                            <th>Notatka</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $xml = simplexml_load_file('resources/xml/planerWizyty.xml') or die("Error: Cannot create object");
                            $wizyty = $xml->xpath("//wizyty/wizyta");
                            $ileWizyt = count($wizyty);

                            for ($i = 0; $i < $ileWizyt; $i++) 
                            {
                                // echo $i;
                                $id = $wizyty[$i]['id'];
                                $termin = $wizyty[$i]->termin;
                                $adres = $wizyty[$i]->adres;
                                $kontakt = $wizyty[$i]->kontakt;
                                $notatka = $wizyty[$i]->notatka;

                                echo 
                                    '<tr>
                                        <td><input type = "checkbox" value = "'.$id.'-'.$i.'" name = "checkbox[]"/></td>
                                        <td><input style="width: 120px" name="termin[]" type="text" placeholder="YYYY-MM-DD" value="'.$termin.'"></td>
                                        <td><input style="width: 220px" name="adres[]" type="text" placeholder="adres" value="'.$adres.'"></td>
                                        <td><input style="width: 120px" name="kontakt[]" type="text" placeholder="kontakt" value="'.$kontakt.'"></td>
                                        <td><input style="width: 280px" name="notatka[]" type="text" placeholder="notatka" value="'.$notatka.'"></td>
                                    </tr>';
                            }
                        ?>
                        <tr>
                            <td></td>
                            <td><input style="width: 120px" name="termin[]" type="text" placeholder="YYYY-MM-DD" value=""></td>
                            <td><input style="width: 220px" name="adres[]" type="text" placeholder="adres" value=""></td>
                            <td><input style="width: 120px" name="kontakt[]" type="text" placeholder="kontakt" value=""></td>
                            <td><input style="width: 280px" name="notatka[]" type="text" placeholder="notatka" value=""></td>
                        </tr>
                    </tbody>
                </table>

                
                <div class="row">
                    <div class="col">
                        Zastosuj zmiany:</br></br><button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="zastosuj">Zastosuj</button>
                    </div><div class="col">
                        Dodaj wizytę:</br></br><button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="dodaj">Dodaj</button>
                    </div>
                    <div class="col">
                        Usuń zaznaczoną wizytę:</br></br><button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="usun">Usuń</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
    </main>

    <footer class="container-fluid py-4 footer">
      <small>&copy; 2018 | Planner Urodowy. Designed with ♡ by Katarzyna Mural</small>
    </footer>


  </body>
</html>
