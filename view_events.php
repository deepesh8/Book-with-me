<?php
    session_start();
    include "dbcon.php";

    if(isset($_SESSION["user"]) && $_SESSION["user"]!=""){
        $user = $_SESSION["user"];
    }
    else{
        $user = "";
    }
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
    <link href="./assets/viewstyle.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica&display=swap" rel="stylesheet">
</head>
<body>
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
                    <li><a href="create_event.php">Create event</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="account.php/?user=<?php echo $user;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center">
      <h1><b><i>Explore events, let the wanderer inside you breathe.</i></b></h1>
      <p>Here are some of the events in and around your locality</p>
    </div>
    <hr>
    <?php
        $mysql = opencon();

        $qry = "select * from events order by startdate desc";                                  // where startdate >= CURRENT_DATE
        $results = mysqli_query($mysql,$qry);
            if(mysqli_query($mysql,$qry) && mysqli_num_rows($results)>0){
                while($row = mysqli_fetch_assoc($results)){
                    $ename = $row['eventname'];
                    $seats = $row['seatingcapa'];
                    $starttime = $row['starttime'];
                    $startdate = $row['startdate'];
                    $enddate = $row['enddate'];
                    $seat1type = $row['seat1type'];
                    $seat1price = $row['seat1price'];
                    $seat1qty = $row['s1qty'];
                    $seat2type = $row['seat2type'];
                    $seat2price = $row['seat2price'];
                    $seat2qty = $row['s2qty'];
                    $seat3type = $row['seat3type'];
                    $seat3price = $row['seat3price'];
                    $seat3qty = $row['s3qty'];

                    $age = $row['age'];
                    $loc = $row['location'];
                    $desc = substr($row['description'],0,200);
                    $host = $row['user'];
                    $id = $row['eventid'];
                    $pass = $row['passbased'];
                    $img = $row['image'];

                    $date = date("Y-m-d");

                    if($pass=='true'){
                        $booktype = "PASS BASED";
                    }
                    else{
                        $booktype = "SEAT BASED";
                    }
                    if($row["startdate"]> $date){
                        echo"
                        <section>
                            <div class='container-fluid'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='dish_container'>
                                            <div>
                                                <img src='images/$img' alt='event-img' style='height:300px;width:450px'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <h2><b>$ename</b></h2>
                                        <hr class='das'>
                                        <i>$desc...</i><br>
                                        Start date:$startdate Start time:$starttime<br>
                                        End date:$enddate <br>
                                        Seat Type-1: $seat1type cost: Rs.$seat1price seats left: $seat1qty<br>
                                        Seat Type-2: $seat2type cost: Rs.$seat2price seats left: $seat2qty<br>
                                        Seat Type-3: $seat3type cost: Rs.$seat3price seats left: $seat3qty<br>
                                        Age criteria: $age+<br>
                                        Venue: $loc<br>
                                        Booking type: $booktype<br><br>
                                        Hosted by: $host (Event id:$id)<br>
                                        <a href='./booknow.php/?event=$ename&host=$host&eventid=$id'><button> BOOK NOW!</button></a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <hr>";
                    }
                    else{
                        echo"
                        <section>
                            <div class='container-fluid' style='background-color:rgb(233, 233, 233);>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='dish_container'>
                                            <div>
                                                <img src='images/$img' alt='event-img' style='height:300px;width:450px'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <h2><b>$ename</b></h2>
                                        <hr class='das'>
                                        <i>$desc...</i><br>
                                        Start date:$startdate Start time:$starttime<br>
                                        End date:$enddate <br>
                                        Seat Type-1: $seat1type cost: Rs.$seat1price seats left: $seat1qty<br>
                                        Seat Type-2: $seat2type cost: Rs.$seat2price seats left: $seat2qty<br>
                                        Seat Type-3: $seat3type cost: Rs.$seat3price seats left: $seat3qty<br>
                                        Age criteria: $age+<br>
                                        Venue: $loc<br>
                                        Booking type: $booktype<br><br>
                                        Hosted by: $host (Event id:$id)<br> <b style='color:red'>THE EVENT HAS FINISHED</b>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <hr>";
                    }
                }
            }
            else{
                echo "
                    <section>
                        <div class='container-fluid'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h1><b>COMING SOON</b></h1>
                                </div>
                            </div>
                        </div>
                    </section>";
            }
    ?>
    <footer class="navbar-bottom bg-dark text-light text-center py-3">
        BOOKWITHME.COM X made with 💗 in MIT
        <p>&copy; 2023 GEN 3 | Contact: +91 12345 43123</p>
    </footer>
    
<script>
  $(document).ready(function() {
    $('.navbar-collapse a').click(function(){
      $(".navbar-collapse").collapse('hide');
    });
  });
</script>
</body>
</html>