<?php
    session_start();
    include "dbcon.php";
    if(isset($_SESSION["user"]) && $_SESSION["user"]!=""){
        $user = $_SESSION["user"];
    }
    else{
        header('Location: login.html');
    }
    $user = htmlspecialchars($_GET['user']);
    
    $qry = "select * from login where username='$user'";
    $mysql = opencon();

    if(mysqli_query($mysql, $qry)){
      $result = mysqli_query($mysql, $qry);
      $row = mysqli_fetch_assoc($result);
 
      $name = $row["name"];
      $email = $row["email"];
      $user = $row["username"];
    }else{
      header("Location: signup.html");
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
    <style>
        .scroll{
            height: 500px;
            overflow-y:scroll;
        }
    </style>
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
                <a class="navbar-brand" href="landing.php">BWM</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="create_event.php">Create event</a></li>
                    <li><a href="view_events.php">Explore events</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="account.php/?user=<?php echo $user;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="jumbotron text-center">
      <h1><b><i>Request inbox</i></b></h1>
      <p>Request details are listed below you can either accept or decline a request </p>
    </div>
    <div class="container">
        <hr>
        <div class="scroll">
            <?php
                $qry = "select * from requests";
                if(mysqli_query($mysql,$qry)){
                    $results = mysqli_query($mysql,$qry);
                    while($row = mysqli_fetch_assoc($results)){
                        $reqfrom = $row["requestedfrom"];
                        $event = $row["event"];
                        $bid = $row["bookingid"];
                        $oseat = $row["originalseat"];
                        $reqseat = $row["requestforseat"];
                        $status = $row["status"];
                        $id = $row["eventid"];
                        $by = $row["user"];

                        if($user===$reqfrom){
                          if($status=="ACCEPTED" || $status=="DECLINED"){
                            echo"
                                <section>
                                    <div class='container-fluid'>
                                        <h2><b>Event: $event (Event ID:$id)</b></h2>
                                        <br>
                                        REQUEST<br>
                                        Requested by: $by<br>
                                        <b>BOOKING ID: $bid</b> <br>
                                        Original Seat: $oseat<br>
                                        Requested Seat: $reqseat<br>
                                        Status: <b>$status</b><br>
                                        <a href='updateseat.php/?user=$user&reqby=$by&bid=$bid&event=$event&id=$id&oseat=$oseat&rseat=$reqseat&status=$status&action=ACCEPT'><button disabled>Accept</button></a> <a href='updateseat.php/?user=$user&reqby=$by$&bid=$bid&event=$event&id=$id&oseat=$oseat&rseat=$reqseat&status=$status&action=DECLINE'><button disabled>Decline</button></a>
                                    </div>
                                </section>
                                <hr>";
                          }
                          else{
                            echo"
                                <section>
                                    <div class='container-fluid'>
                                        <h2><b>Event: $event (Event ID:$id)</b></h2>
                                        <br>
                                        REQUEST<br>
                                        Requested by: $by<br>
                                        <b>BOOKING ID: $bid</b> <br>
                                        Original Seat: $oseat<br>
                                        Requested Seat: $reqseat<br>
                                        Status: <b>$status</b><br>
                                        <a href='updateseat.php/?user=$user&reqby=$by&bid=$bid&event=$event&id=$id&oseat=$oseat&rseat=$reqseat&status=$status&action=ACCEPT'><button>Accept</button></a> <a href='updateseat.php/?user=$user&reqby=$by&bid=$bid&event=$event&id=$id&oseat=$oseat&rseat=$reqseat&status=$status&action=DECLINE'><button>Decline</button></a>                                    </div>
                                </section>
                                <hr>";
                            }
                        }
                        else{
                          echo"
                          <section>
                              <div class='container-fluid'>
                                  <h2><b>Event: $event (Event ID:$id)</b></h2>
                                  <br>
                                  REQUEST<br>
                                  Requested from: $reqfrom<br>
                                  <b>BOOKING ID: $bid</b> <br>
                                  Original Seat: $oseat<br>
                                  Requested Seat: $reqseat<br>
                                  Status: <b>$status</b><br>
                              </div>
                          </section>
                          <hr>";
                        }
                    }
                }
                else{
                    echo "There are no requests!";
                }
            ?>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.navbar-collapse a').click(function(){
            $(".navbar-collapse").collapse('hide');
        });
    });
</script>
</body>
</html>
