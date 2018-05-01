<?php

   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' AND pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      //echo $count;
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      //echo "juz JESTEMMM !!!!";
      if($count == 1) { 
        echo "juz jestem !!!! lalalalal";
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: planer.php");
      }else {
         $error = "Twój login lub hasło jest niepoprawne";
      }
   }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link rel="icon" href="../../../../favicon.ico"> -->

    <title>Strona logowania</title>

    <!-- Bootstrap core CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="resources/css/signin.css" rel="stylesheet">
  </head>
  
  <body class="text-center">
    <div class="container">
        <div class="row align-items-center">
            <form class="form-signin" action="" method="post">
            <!--   <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                
                <h1 class="h3 mb-3 font-weight-normal">Planer Urodowy</h1>

                <label for="inputEmail" class="sr-only">Adres e-mail</label>
                <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Adres e-mail" required autofocus>

                <label for="inputPassword" class="sr-only">Hasło</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Hasło" required>

            
                <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
                <small class="mt-5 d-block mb-3 text-muted">&copy; 2018 | Planner Urodowy.<hr> Designed with ♡ by Katarzyna Mural</a></small>
            </form>
        </div>
        <div id="komunikat">
                   <?php echo $error; ?>
                </div>
    </div>
    <script src="resources/jquery/jquery.min.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
  </body>
</html>