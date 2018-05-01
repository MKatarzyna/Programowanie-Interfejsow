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
                    <a class="nav-link  btn-pink" href="porady.php">Porady</a>
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
            <h1 class="jumbotron-heading">Porady</h1>
            <p class="lead text-muted">Klikając w przycisk "Wybierz", w każdym z poniższych działów strona przeniesie Ciebie do podkategorii, w których znajdziesz najróżniejsze przepisy, wskazówki i informacje dotyczące dziedziny, którą wybierzesz.</p>
          </div>
        </section>
  
        <div class="album py-5 bg-light">
          <div class="container">
  
            <div class="row">
              <div class="col-md-6">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="resources/photos/porady_twarz.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text text-center">Twarz</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="porady_twarz.php"><button type="button" class="btn btn-sm btn-outline-secondary">Wybierz</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="resources/photos/porady_wlosy.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text text-center">Włosy</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="porady_wlosy.php"><button type="button" class="btn btn-sm btn-outline-secondary">Wybierz</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

  
              <div class="col-md-6">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="resources/photos/porady_paznokcie.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text text-center">Paznokcie</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="porady_paznokcie.php"><button type="button" class="btn btn-sm btn-outline-secondary">Wybierz</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="resources/photos/porady_cialo.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text text-center">Ciało</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="porady_cialo.php"><button type="button" class="btn btn-sm btn-outline-secondary">Wybierz</button></a>
                      </div>
                    </div>
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
