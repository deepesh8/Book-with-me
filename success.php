<?php
    session_start();
    include "dbcon.php";
    $user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./assets/viewstyle.css?v=1.0" rel="stylesheet" type="text/css" />
</head>
<body>
    <nav class="navbar navbar-fisxed-top navbar-inverse" id="home">
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
                    <li><a href="#">Home</a></li>
                    <li><a href="create_event.php">Create event</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="account.php/?user=<?php echo $user;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center">
      <h1><b><i>Payment page</i></b></h1>
      <p>You can wait here till the page is redirected to the HOME page</p>
    </div>

    <div class="container" id="msg">
        PAYMENT IN PROCESS
    </div>

    <script>
        function out(){
            window.location='index.php';
        }
        var x=5;
        setInterval(() => {
            if(x==0){
                out();
            }
            else{
                document.getElementById("msg").textContent = "PAYEMENT COMPLETED SUCCESSFULLY redirecting you to home page in "+x;
                x--;
            }

        }, 1000);
                
        // setTimeout(() => {        
        //     window.location="index.php";
        // }, 5000);    
    </script>
</body>