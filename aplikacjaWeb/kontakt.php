<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" type="text/css" media="screen" href="kontakt.css" />
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
                    <a class="nav-link" href="wyszukaj.php">Wyszukaj</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bmi.php">BMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-pink" href="kontakt.php">Kontakt</a>
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
                <h1 class="jumbotron-heading"> Planer Urodowy </h1>
                <p class="lead text-muted"> Strona kontaktowa </p> 
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="column">
                        <div id="map" style="width:100%;height:500px"></div>
                    </div>
                    <div class="column">
                    <form action="/action_page.php">
                        <p class="lead text-muted"><b>Projekt wykonała:</b> Katarzyna Mural</p><hr>
                        <p class="lead text-muted"><b>Tytuł projektu:</b> "Planer Urodowy"</p><hr>
                        <p class="lead text-muted"><b>Uczelnia:</b> Politechnika Koszalińska</p><hr>
                        <p class="lead text-muted"><b>Przedmiot:</b> "Projektowanie interfejsów"</p><hr>
                        <p class="lead text-muted"><b>Kontakt:</b> 123-456-789</p><hr>
                        <p class="lead text-muted"><b>Mail:</b> planer.urodowy@gmail.com</p>
                    </form>
                    </div>
                </div>
            </div>
                      
            <!-- Initialize Google Maps -->
            <script>
            function myMap() {
            var myCenter = new google.maps.LatLng(54.20362259,16.19740490);
            var mapCanvas = document.getElementById("map");
            var mapOptions = {center: myCenter, zoom: 12};
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({position:myCenter});
            marker.setMap(map);
            }
            </script>
            
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUNGjk7ghqvnE3_aFYqHh7P5MtBWxUXVM&callback=myMap"></script>

        </div>
    </main>



    <footer class="container-fluid py-4 footer">
      <small>&copy; 2018 | Planner Urodowy. Designed with ♡ by Katarzyna Mural</small>
    </footer>


  </body>
</html>
