<?php
   include('session.php');
?>

<!doctype html>
<html lang="en">
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
                    <a class="nav-link" href="planer.php">Planer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-pink" href="porady.php">Porady</a>
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
            <h1 class="jumbotron-heading"> Peelingi  </h1>
            <p class="lead text-muted">Mogłoby się wydawać, że peeling jeszcze bardziej wysusza skórę i nie powinno się go stosować na twarzy. Nic bardziej mylnego. Naskórek naturalnie złuszcza się, a stosowanie regularnie zabiegów złuszczających (raz – dwa razy w tygodniu) pomoże Ci uzyskać piękną, gładką cerę.</p> 
            <a href="porady.php"><button type="button" class="btn btn-outline-secondary btn-sm">Porady</button></a> &gt; 
                <a href="porady_twarz.php"><button type="button" class="btn btn-outline-secondary btn-sm">Twarz</button></a> &gt; 
                <a href="porady_twarz_peelingi.php"><button type="button" class="btn btn-outline-secondary btn-sm">Peelingi</button></a> 
<!--  < < -->
          </div>
          
        </section>


    <?php
        $xml = simplexml_load_file('resources/xml/abcd.xml') or die("Error: Cannot create object");
        $kategoria = "twarz";
        $podkategoria = "peelingi";
        $tytul = $xml->xpath("//porady/porada[@kategoria='".$kategoria."' and @podkategoria='".$podkategoria."']/tytul");
        $tresc = $xml->xpath("//porady/porada[@kategoria='$kategoria' and @podkategoria='".$podkategoria."']/tresc");
        $linkdozdjecia = $xml->xpath("//porady/porada[@kategoria='$kategoria' and @podkategoria='".$podkategoria."']/linkdozdjecia");
       $ileporad = count($tytul);
    ?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div id="accordion">

                <?php
                    for ($i = 0; $i < $ileporad; $i++) {
                    echo '<div class="card">
                            <div class="card-header" id="heading'.$i.'">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">'.$tytul[$i].'</button>
                                </h5>
                            </div>
                            <div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row featurette">
                                        <div class="col-md-7 order-md-2">
                                            <h2 class="featurette-heading">'.$tytul[$i].'</br></h2>
                                            <p class="lead">'.$tresc[$i].'</p>
                                        </div>
                                        <div class="col-md-5 order-md-1">
                                            <img class="featurette-image img-fluid mx-auto" src="'.$linkdozdjecia[$i].'" alt="Generic placeholder image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                ?>

            </div>
        </div>
    </div>


    </main>



    <footer class="container-fluid py-4 footer">
      <small>&copy; 2018 | Planner Urodowy. Designed with ♡ by Katarzyna Mural</small>
    </footer>


  </body>
</html>
