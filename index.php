<?php 
  session_start();
  if(isset($_SESSION["user"]) && $_SESSION["user"]!=""){
    $user = $_SESSION["user"];
  }
  else{
    header("location: login.html");
  }
?>

<html>
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="./assets/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Orbitron:wght@500&family=Oswald:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Manrope&family=Merienda&family=Teko:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <script src="script.js"></script>
        <nav class="navbar navbar-fixed-top navbar-inverse" id="home">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>             
                </button>           
                <a class="navbar-brand" href="index.php">BWM</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <li><a>Welcome back <?php echo $user;?></a></li>
                    <li><a href="view_events.php">Explore events</a></li>
                    <li><a href="create_event.php">Create event</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="account.php/?user=<?php echo $user;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                    <li><a href="landing.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    <li><a href="aboutus.html">About us</a></li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="design">
            <img id="pic1" src="./assets/1.jpg">
            <img id="pic2" src="./assets/2.jpg">
            <img id="pic3" src="./assets/3.jpg">
            <img id="pic4" src="./assets/4.jpg">
            <h1 style="font-family:'Caveat'; font-size:82px;">Crafted For Explorers!</h1>
            <p class="container" id="landingpara" style="font-family:'Merienda'; font-size:20px;"> BookWithMe is a popular Indian online ticketing and entertainment platform that has transformed the way people book tickets for various events. BookWithMe offers a user-friendly website, allowing users to browse and book tickets for a wide range of entertainment options. Whether you want to catch the latest Bollywood blockbuster, attend a live music concert, or witness a sports match, BookWithMe provides a seamless and convenient booking experience.
                <br><br>
                The platform provides information on event schedules, venues, seating arrangements, and real-time availability, making it easy for users to select their preferred showtimes and seats.
                <br><br>
                The site comes with a unique feature to exchange seats if required. It also caters to the needs of event organizers to host their events.
          </div>
    </body>
<script>
        $(document).ready(function() {
            $('.navbar-collapse a').click(function(){
                $(".navbar-collapse").collapse('hide');
            });
        });
    </script>
</html>
