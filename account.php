<?php
    session_start();
    include "dbcon.php";
    if(isset($_SESSION['user']) && $_SESSION['user']!=""){
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
    }
    else{
        header('location: ../logout.php');
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        body{
            font-family: 'Gabarito', sans-serif;
        }
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
                <a class="navbar-brand" href="../landing.php">BWM</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../view_events.php">Explore events</a></li>
                    <li><a href="../create_event.php">Create event</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="../req_page.php?user=<?php echo $user; ?>"><span class="glyphicon glyphicon-envelope"></span> Requests</a></li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="jumbotron text-center">
      <h1><b>Account details</b></h1>
      <p>Account details of <?php echo $user;?> can be found below </p>
    </div>
    <br><br>
    <div class="container-fluid">
        <div class="col-md-6" style="border-right:1px solid black;">
            <h1>NAME: <?php echo $name ?></h1>
            <h1>USERNAME: <?php echo $user ?></h1>
            <h1>E-MAIL: <?php echo $email ?></h1>
        </div>
        <div class="col-md-6" style="border-left:1px solid black;">
            <h1>PAST PURCHASE HISTORY</h1>
            <div class="scroll">
                <?php 
                    $qry = "select * from details where user='$user'";
                    if(mysqli_query($mysql,$qry)){
                        $results = mysqli_query($mysql,$qry);
                        while($row = mysqli_fetch_assoc($results)){
                            $user = $row["user"];
                            $name1 = $row["name1"];
                            $name2 = $row["name2"];
                            $name3 = $row["name3"];
                            $name4 = $row["name4"];
                            $name5 = $row["name5"];
                            $ph1 = $row["phno1"];
                            $ph2 = $row["phno2"];
                            $ph3 = $row["phno3"];
                            $ph4 = $row["phno4"];
                            $ph5 = $row["phno5"];
                            $event = $row["eventname"];
                            $eventid = $row["eventid"];
                            $seat1 = $row["seat1"];
                            $seat2 = $row["seat2"];
                            $seat3 = $row["seat3"];
                            $seat4 = $row["seat4"];
                            $seat5 = $row["seat5"];
                            $amt = $row["totalamount"];
                            $sdate =$row["startdate"];
                            $edate = $row["enddate"];
                            $bid = $row["bookingid"];

                            if($name2!=""){
                                if($name3!=""){
                                    if($name4!=""){
                                        if($name5!=""){
                                            if($edate >date("Y-m-d")){
                                                echo"
                                                <section>
                                                    <div class='container-fluid'>
                                                        <h2><b>$event</b></h2>
                                                        <br>
                                                        Start date:$sdate<br>
                                                        Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                                        Client-2: $name2 Seat Type-2: $seat2 phone2: $ph2<br>
                                                        Client-3: $name3 Seat Type-3: $seat3 phone3: $ph3<br>
                                                        Client-4: $name4 Seat Type-4: $seat4 phone4: $ph4<br>
                                                        Client-5: $name5 Seat Type-5: $seat5 phone5: $ph5<br>
                                                        EVENT ID: $eventid<br>
                                                        <b>BOOKING ID: $bid</b> <br>
                                                        TOTAL AMOUNT: $amt<br>
                                                        <a href='../request.php/?user=$user&event=$event&id=$eventid&seat1=$seat1&seat2=$seat2&seat3=$seat3&seat4=$seat4&seat5=$seat5&bid=$bid'><button>REQUEST FOR A SEAT CHANGE </button></a>
                                                    </div>
                                                </section>
                                                <hr>";
                                            }
                                            else{
                                                echo"
                                                <section>
                                                    <div class='container-fluid'>
                                                        <h2><b>$event</b></h2>
                                                        <br>
                                                        Start date:$sdate<br>
                                                        Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                                        Client-2: $name2 Seat Type-2: $seat2 phone2: $ph2<br>
                                                        Client-3: $name3 Seat Type-3: $seat3 phone3: $ph3<br>
                                                        Client-4: $name4 Seat Type-4: $seat4 phone4: $ph4<br>
                                                        Client-5: $name5 Seat Type-5: $seat5 phone5: $ph5<br>
                                                        EVENT ID: $eventid<br>
                                                        <b>BOOKING ID: $bid</b> <br>
                                                        TOTAL AMOUNT: $amt<br>
                                                    </div>
                                                </section>
                                                <hr>";
                                            }
                                        }
                                        else{
                                            if($edate >date("Y-m-d")){
                                                echo"
                                                <section>
                                                    <div class='container-fluid'>
                                                        <h2><b>$event</b></h2>
                                                        <br>
                                                        Start date:$sdate<br>
                                                        Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                                        Client-2: $name2 Seat Type-2: $seat2 phone2: $ph2<br>
                                                        Client-3: $name3 Seat Type-3: $seat3 phone3: $ph3<br>
                                                        Client-4: $name4 Seat Type-4: $seat4 phone4: $ph4<br>
                                                        EVENT ID: $eventid<br>
                                                        <b>BOOKING ID: $bid</b> <br>
                                                        TOTAL AMOUNT: $amt<br>
                                                        <a href='../request.php/?user=$user&event=$event&id=$eventid&seat1=$seat1&seat2=$seat2&seat3=$seat3&seat4=$seat4&bid=$bid'><button>REQUEST FOR A SEAT CHANGE </button></a>
                                                    </div>
                                                </section>
                                                <hr>";
                                            }
                                            else{
                                                echo"
                                                <section>
                                                    <div class='container-fluid'>
                                                        <h2><b>$event</b></h2>
                                                        <br>
                                                        Start date:$sdate<br>
                                                        Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                                        Client-2: $name2 Seat Type-2: $seat2 phone2: $ph2<br>
                                                        Client-3: $name3 Seat Type-3: $seat3 phone3: $ph3<br>
                                                        Client-4: $name4 Seat Type-4: $seat4 phone4: $ph4<br>
                                                        EVENT ID: $eventid<br>
                                                        <b>BOOKING ID: $bid</b> <br>
                                                        TOTAL AMOUNT: $amt<br>
                                                    </div>
                                                </section>
                                                <hr>";
                                            }
                                        }
                                    }
                                    else{
                                        if($edate >date("Y-m-d")){
                                            echo"
                                            <section>
                                                <div class='container-fluid'>
                                                    <h2><b>$event</b></h2>
                                                    <br>
                                                    Start date:$sdate<br>
                                                    Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                                    Client-2: $name2 Seat Type-2: $seat2 phone2: $ph2<br>
                                                    Client-3: $name3 Seat Type-3: $seat3 phone3: $ph3<br>
                                                    EVENT ID: $eventid<br>
                                                    <b>BOOKING ID: $bid</b> <br>
                                                    TOTAL AMOUNT: $amt<br>
                                                    <a href='../request.php/?user=$user&event=$event&id=$eventid&seat1=$seat1&seat2=$seat2&seat3=$seat3&bid=$bid'><button>REQUEST FOR A SEAT CHANGE </button></a>
                                                </div>
                                            </section>
                                            <hr>";
                                        }
                                        else{
                                            echo"
                                            <section>
                                                <div class='container-fluid'>
                                                    <h2><b>$event</b></h2>
                                                    <br>
                                                    Start date:$sdate<br>
                                                    Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                                    Client-2: $name2 Seat Type-2: $seat2 phone2: $ph2<br>
                                                    Client-3: $name3 Seat Type-3: $seat3 phone3: $ph3<br>
                                                    EVENT ID: $eventid<br>
                                                    <b>BOOKING ID: $bid</b> <br>
                                                    TOTAL AMOUNT: $amt<br>
                                                </div>
                                            </section>
                                            <hr>";
                                        }
                                    }
                                }
                                else{
                                    if($edate >date("Y-m-d")){
                                        echo"
                                        <section>
                                        <div class='container-fluid'>
                                            <h2><b>$event</b></h2>
                                            <br>
                                            Start date:$sdate<br>
                                            Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                            Client-2: $name2 Seat Type-2: $seat2 phone2: $ph2<br>
                                            EVENT ID: $eventid<br>
                                            <b>BOOKING ID: $bid</b> <br>
                                            TOTAL AMOUNT: $amt<br>
                                            <a href='../request.php/?user=$user&event=$event&id=$eventid&seat1=$seat1&seat2=$seat2&bid=$bid'><button>REQUEST FOR A SEAT CHANGE </button></a>
                                        </div>
                                        </section>
                                        <hr>";
                                    }
                                    else{
                                        echo"
                                        <section>
                                        <div class='container-fluid'>
                                            <h2><b>$event</b></h2>
                                            <br>
                                            Start date:$sdate<br>
                                            Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                            Client-2: $name2 Seat Type-2: $seat2 phone2: $ph2<br>
                                            EVENT ID: $eventid<br>
                                            <b>BOOKING ID: $bid</b> <br>
                                            TOTAL AMOUNT: $amt<br>
                                        </div>
                                        </section>
                                        <hr>";
                                    }
                                }

                            }
                            else{
                                if($edate >date("Y-m-d")){
                                    echo"
                                    <section>
                                        <div class='container-fluid'>
                                            <h2><b>$event</b></h2>
                                            <br>
                                            Start date:$sdate<br>
                                            Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                            EVENT ID: $eventid<br>
                                            <b>BOOKING ID: $bid</b> <br>
                                            TOTAL AMOUNT: $amt<br>
                                            <br>
                                            <a href='../request.php/?user=$user&event=$event&id=$eventid&seat1=$seat1&bid=$bid'><button>REQUEST FOR A SEAT CHANGE </button></a>
                                        </div>
                                    </section>
                                    <hr>";
                                }
                                else{
                                    echo"
                                    <section>
                                        <div class='container-fluid'>
                                            <h2><b>$event</b></h2>
                                            <br>
                                            Start date:$sdate<br>
                                            Client-1: $name1 Seat Type-1: $seat1 phone1: $ph1<br>
                                            EVENT ID: $eventid<br>
                                            <b>BOOKING ID: $bid</b> <br>
                                            TOTAL AMOUNT: $amt<br>
                                        </div>
                                    </section>
                                    <hr>";
                                }
                            }
                        }
                    }
                    else{
                        echo "You have't purchased any tickets yet,<br>Purchase tickets to view your purachase tickets";
                    }
                ?>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <hr>
    <br>
    <br>
    <br>
    <footer class="navbar-bottom bg-dark text-light text-center py-3" style="background-color: #f8f9fa;height:50px; margin-top:auto;">
        BOOKWITHME.COM X made with 💗 in MIT<br>
      <p>&copy; 2023 GEN 3 | Contact: +91 123 456 5421</p>
    </footer>
</body>

<!-- 
$qry="insert into details(user,name1,name2,name3,name4,phno1,phno2,phno3,phno4,eventname,eventid,seat1,seat2,seat3,seat4,totalamount,startdate) values
                    ('$user','$name1','$name2','$name3','$name4','$name5','$ph1','$ph2','$ph3','$ph4','$ph5','$event','$eventid','$seat1','$seat2','$seat3','$seat4','$seat5','$amt','$sdate')";
$qry="insert into details(user,name1,name2,name3,name4,phno1,phno2,phno3,phno4,eventname,eventid,seat1,seat2,seat3,seat4,totalamount,startdate) values
                    ('$user','$name1','$name2','$name3',$name4,'$ph1','$ph2','$ph3','$ph4','$event','$eventid','$seat1','$seat2','$seat3','$seat4','$amt','$sdate')";
$qry="insert into details(user,name1,name2,name3,phno1,phno2,phno3,eventname,eventid,seat1,seat2,seat3,totalamount,startdate) values
                ('$user','$name1','$name2','$name3','$ph1','$ph2','$ph3','$event','$eventid','$seat1','$seat2','$seat3','$amt','$sdate')";
$qry="insert into details(user,name1,name2,phno1,phno2,eventname,eventid,seat1,seat2,totalamount,startdate) values
                ('$user','$name1','$name2','$ph1','$ph2','$event','$eventid','$seat1','$seat2','$amt','$sdate')";
$qry = "insert into details(user,name1,phno1,eventname,eventid,seat1,totalamount,startdate) values
        ('$user','$name1','$ph1','$event','$eventid','$seat1','$amt','$sdate')"; -->