<?php
   include('session.php');
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['wyszukaj']))
    { 
        $xml = simplexml_load_file('resources/xml/abcd.xml') or die("Error: Cannot create object");
        $kategoria = $_POST['kategoria'];
        $filtr = $_POST['filtr'];
        //echo $kategoria;
        $value = $_POST['inputWyszukaj'];
        //echo $value;
        $porady = $xml->xpath("//porady/porada[@kategoria='".$kategoria."']/".$filtr."[contains(text(), '".$value."')]/parent::*");
        // print_r($porady);
       $ileporad = count($porady);
    //    echo $ileporad;
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
    <link rel="stylesheet" type="text/css" media="screen" href="wyszukaj.css" />
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
                    <a class="nav-link" href="planer.php">Planer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="porady.php">Porady</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-pink" href="wyszukaj.php">Wyszukaj</a>
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

        <section class="jumbotron jumbotron-fluid">
            <div class="container-fluid koko justify-content-center text-muted">
                <div class="row justify-content-center">
                    <form class="form"  action="" method="post">
                        <div class="row mb-5">
                            <div class="col-md-8">
                                <input class="form-control mr-sm-2" type="text" name="inputWyszukaj" placeholder="Wyszukaj" aria-label="Search">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="wyszukaj">Wyszukaj</button>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12 mb-3">
                                Wybierz kategorię:
                            </div>
                            <div class="col">
                                <input name="kategoria" type="radio" value="twarz"></br>Twarz
                            </div>
                            <div class="col">
                                <input name="kategoria" type="radio" value="wlosy"></br>Włosy
                            </div>
                            <div class="col">
                                <input name="kategoria" type="radio" value="paznokcie"></br>Paznokcie
                            </div>
                            <div class="col">
                                <input name="kategoria" type="radio" value="cialo"></br>Ciało
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                Szukaj w:
                            </div>
                            <div class="col">
                                <input name="filtr" type="radio" value="tytul"></br>Tytuł porady
                            </div>
                            <div class="col">
                                <input name="filtr" type="radio" value="tresc"></br>Treść porady
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light text-muted">
            <div class="container">
                <?php echo "Ilosc wynikow: " . $ileporad; ?>
                <div id="accordion">


                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 5%">Nr.</th>
                            <th style="width: 10%">Podtyp</th>
                            <th style="width: 85%">Porada</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                       
                    <?php
                    
                        for ($i = 0; $i < $ileporad; $i++) {
                        // echo $i;
                        $tytul = $porady[$i]->tytul;
                        $tresc = $porady[$i]->tresc;
                        $linkdozdjecia = $porady[$i]->linkdozdjecia;
                        $podkategoria = $porady[$i]['podkategoria'];
                        echo '<tr>
                            <td>'.($i+1).'</td>
                            <td>'.$podkategoria.'</td>
                            <td>
                            
                                <div class="card">
                                    <div class="card-header" id="heading'.$i.'">
                                        <h5 class="mb-0">
                                            <button id="id'.$i.'" class="btn btn-link" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">'.$tytul.'</button>
                                        </h5>
                                    </div>
                                    <div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row featurette">
                                                <div class="col-md-7 order-md-2">
                                                    <h2 class="featurette-heading">'.$tytul.'</br></h2>
                                                    <p class="lead">'.$tresc.'</p>
                                                </div>
                                                <div class="col-md-5 order-md-1">
                                                    <img class="featurette-image img-fluid mx-auto" src="'.$linkdozdjecia.'" alt="Generic placeholder image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </td>
                            </tr>';
                        //echo $tytul . $tresc . $linkdozdjecia;
                        }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
  
      </main>



    <footer class="container-fluid py-4 footer">
      <small>&copy; 2018 | Planner Urodowy. Designed with ♡ by Katarzyna Mural</small>
    </footer>

  </body>
</html>
