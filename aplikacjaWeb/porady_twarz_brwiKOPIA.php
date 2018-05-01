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
            <h1 class="jumbotron-heading"> Brwi  </h1>
            <p class="lead text-muted">Klikając w przyc...</p> 
            <a href="porady.php"><button type="button" class="btn btn-outline-secondary btn-sm">Porady</button></a> &gt;
                <a href="porady_twarz.php"><button type="button" class="btn btn-outline-secondary btn-sm">Twarz</button></a> &gt; 
                <a href="porady_twarz_brwi.php"><button type="button" class="btn btn-outline-secondary btn-sm">Brwi</button></a> 

          </div>
          
        </section>

    <?php
        $xml = simplexml_load_file('resources/xml/abcd.xml') or die("Error: Cannot create object");
        $tytul = $xml->xpath("//porady/porada[@kategoria='twarz' and @podkategoria='brwi']/tytul");
        $tresc = $xml->xpath("//porady/porada[@kategoria='twarz' and @podkategoria='brwi']/tresc");
     //   print_r($tresc[0]);
        $linkdozdjecia = $xml->xpath("//porady/porada[@kategoria='twarz' and @podkategoria='brwi']/linkdozdjecia");
       // print_r($linkdozdjecia[0]);
    ?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div id="accordion">

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo $tytul[0] ?>                 </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row featurette">
                                        <div class="col-md-7 order-md-2">
                                            <h2 class="featurette-heading"><?php echo $tytul[0] ?></br> <span class="text-muted">See for yourself.</span></h2>
                                            <p class="lead">
                                                <?php echo $tresc[0] ?>
                                            </p>
                                        </div>
                                        <div class="col-md-5 order-md-1">
                                            <img class="featurette-image img-fluid mx-auto" src="<?php echo $linkdozdjecia[0] ?>" alt="Generic placeholder image">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <?php echo $tytul[1] ?>
                        </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                                <div class="row featurette">
                                  <div class="col-md-7">
                                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                                  </div>
                                  <div class="col-md-5">
                                    <img class="featurette-image img-fluid mx-auto" src="resources/photos/planer_twarz_brwi2.jpeg" alt="Generic placeholder image">
                                  </div>
                                </div>

                        </div>
                    </div>
                    </div>

                    <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><?php echo $tytul[2] ?>
                        </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>


    </main>



    <footer class="container-fluid py-4 footer">
      <small>&copy; 2018 | Planner Urodowy. Designed with ♡ by Katarzyna Mural</small>
    </footer>


  </body>
</html>
