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
    <link rel="stylesheet" type="text/css" media="screen" href="bmi.css" />
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
                    <a class="nav-link btn-pink" href="bmi.php">BMI</a>
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
                <h1 class="jumbotron-heading"> Poznaj wskaźnik masy swojego ciała  </h1>
                <p class="lead text-muted"> To łatwy i skuteczny sposób na obliczenie wskaźnika masy ciała. Body Mass Index dostarcza podstawowych informacji o tym, czy grozi Ci niedowaga lub otyłość. Używaj powyższego kalkulatora BMI dla kobiet lub mężczyzn, aby kontrolować czy Twoja waga jest prawidłowa.</p> 
            </div>
        </section>


    <div class="album py-5 bg-light">
        <div class="container">


                <script type="text/javascript">

                    function computeBMI() {
                        // user inputs
                        var height = Number(document.getElementById("height").value);
                        var heightunits = document.getElementById("heightunits").value;
                        var weight = Number(document.getElementById("weight").value);
                        var weightunits = document.getElementById("weightunits").value;
            
            
                        //Convert all units to metric
                        if (heightunits == "inches") height /= 39.3700787;
                        if (weightunits == "lb") weight /= 2.20462;
            
                        //Perform calculation
            
                        //        var BMI = weight /Math.pow(height, 2)*10000;
                        var BMI = Math.round(weight / Math.pow(height, 2) * 10000);
            
                        //Display result of calculation
                        document.getElementById("output").innerText = Math.round(BMI * 100) / 100;
            
                        var output = Math.round(BMI * 100) / 100
                        if (output < 18.5)
                            document.getElementById("comment").innerText = "Niedowagę";
                        else if (output >= 18.5 && output <= 25)
                            document.getElementById("comment").innerText = "Wartość prawidłową";
                        else if (output >= 25 && output <= 30)
                            document.getElementById("comment").innerText = "Nadwagę";
                        else if (output > 30)
                            document.getElementById("comment").innerText = "Otyłość";
                        // document.getElementById("answer").value = output; 
                    }
                </script>
          
                <body  class="naglowek">

                    <!-- przerobić styl nizej -->

                    <h1 class="jumbotron-heading">Kalkulator "<b>B</b>ody <b>M</b>ass <b>I</b>ndex"</h1>
                        <p>Podaj swój wzrost: <input type="text" id="height"/>
                            <select type="multiple" id="heightunits">
                                <option value="centimeters" selected="selected">centymetry</option>
                            </select>
                        </p>
                    <p>Podaj swoją wagę: <input type="text" id="weight"/>
                        <select type="multiple" id="weightunits">
                            <option value="kg" selected="selected">kilogramy</option>
                        </select>
                    </p>
                    <input type="submit" value="Oblicz BMI" onclick="computeBMI();">
                    <h2 class="jumbotron-heading">Twoje BMI wynosi: <span id="output">?</span></h1>
                
                    <h2 class="jumbotron-heading">To oznacza, że masz: <span id="comment"> ?</span> </h2> 
                

                    <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Kalkulator BMI
                                        </button>
                                    </h5>
                                </div>
                            
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row featurette">
                                            <div class="col-md-7 order-md-2">
                                                <h2 class="featurette-heading">Kalkulator BMI <span class="text-muted">(Body Mass Index)</span></h2>
                                                <p class="lead">Daje każdemu możliwość szybkiego i wygodego obliczenia własnego wskaźnika masy ciała. BMI obliczamy dzieląc masę ciała (w kilogramach) przez wzrost do kwadratu (w metrach).</p>
                                                <p class="lead">Wskaźnik ten wykorzystywany jest przede wszystkim do oceny ryzyka pojawienia się groźnych chorób: miażdżycy, choroby niedokrwiennej serca, udaru mózgu, czy nawet nowotworów. Większość tych chorób jest związana z otyłością i dlatego kalkulator BMI to tak przydatne narzędzie.</p>
                                            </div>
                                            <div class="col-md-5 order-md-1">
                                                <img class="featurette-image img-fluid mx-auto" src="resources/photos/bmi_centymetr2.jpg" alt="Generic placeholder image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Czym jest BMI?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row featurette">
                                            <div class="col-md-7">
                                                <h2 class="featurette-heading">Czym jest <span class="text-muted">BMI?</span></h2>
                                                <p class="lead">BMI jest jednym z ważnych wskaźniów określających nasz stan fizyczny, ale niestety nie wystarczającym. Bardzo ważnym uzupełnieniem BMI jest wskaźnik ilości tłuszczu brzusznego - zbyt duży może oznaczać niebezpieczną otyłość brzuszną i to nawet przy prawidłowym BMI! </p>
                                                <p class="lead">Ponadto, paradoksalnie, badania naukowe wskazują, że osoby z lekką nadwagą zwykle są zdrowsze i żyją dłużej od osób z tzw. "prawidłową wagą". Pojawiają się nawet głosy, że ustalony arbitralnie przez WHO próg nadwagi (25) jest zbyt niski.</p>
                                            </div>
                                            <div class="col-md-5">
                                                <img class="featurette-image img-fluid mx-auto" src="resources/photos/bmi_czymjest.jpg" alt="Generic placeholder image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Pamiętaj
                                            </button>
                                        </h5>
                                    </div>
                                
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row featurette">
                                                <div class="col-md-7 order-md-2">
                                                    <h2 class="featurette-heading">Kalkulator BMI <span class="text-muted">obrazuje przybliżoną zawartość tłuszczu w organiźmie.</span></h2>
                                                    <p class="lead">W przypadku niektórych osób wskaźnik BMI może sugerować błędne wnioski. Osoby aktywne fizycznie, uprawiający sport, mogą posiadać zawyżoną wagę związaną z tkanką mięśniową a nie z ilością tłuszczu w organiźmie.</p>
                                                    <p class="lead">Ponadto nie zaleca się stosowania wskaźnika BMI do oznaczania wagi ciała dla dzieci do ok. 14 roku życia oraz dla kobiet w ciąży.</p>
                                                </div>
                                                <div class="col-md-5 order-md-1">
                                                    <img class="featurette-image img-fluid mx-auto" src="resources/photos/bmi_pamietaj.jpg" alt="Generic placeholder image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                        Zakresy wartości BMI
                                                </button>
                                            </h5>
                                        </div>
                                    
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row featurette">
                                                    <div class="col-md-7 order-md-2">
                                                        <h2 class="featurette-heading">Zakresy wartości BMI:</h2>
                                                        <p class="lead">mniej niż 16 - wygłodzenie</p>
                                                        <p class="lead">16 - 16.99 - wychudzenie</p>
                                                        <p class="lead">17 - 18.49 - niedowaga</p>
                                                        <p class="lead">18.5 - 24.99 - wartość prawidłowa</p>
                                                        <p class="lead">25 - 29.99 - nadwaga</p>
                                                        <p class="lead">30 - 34.99 - I stopień otyłości</p>
                                                        <p class="lead">35 - 39.99 - II stopień otyłości</p>
                                                        <p class="lead">powyżej 40 - otyłość skrajna</p>
                                                    </div>
                                                    <div class="col-md-5 order-md-1" style="visibility: visible">
                                                        <a class="popup-image" href="resources/photos/bmi_tabelabmi.gif">
                                                        <img class="featurette-image img-fluid mx-auto img-responsive" src="resources/photos/bmi_zakresy.png" alt="Generic placeholder image">
                                                        
                                                            
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                    </div>
                </body>
            
            
        </div>
    </div>


    </main>


    <footer class="container-fluid py-4 footer">
      <small>&copy; 2018 | Planner Urodowy. Designed with ♡ by Katarzyna Mural</small>
    </footer>


  </body>
</html>
