<?php
    session_start();
    include "dbcon.php";
    
    $host = $_SESSION["evenhost"];
    $id = $_SESSION["id"];
    $event = $_SESSION["eventname"];

    $apikey = "rzp_test_YqQdKvpYsoXih0";
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
       .toolbox {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
                <a class="navbar-brand" href="#">BWM</a>
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
      <h1><b><?php echo"$event"?></b></h1>
      <p class="dets" style="font-size:15px;"><i><?php echo"(Event id: $id) ~hosted by $host"?></i></p>
      <p>Booking details can be filled below</p>
    </div>
    <div class="container-fluid">
      <h1>PAYMENT DETAILS</h1>
      <div class="col-md-6" style="border-right:1px solid black;">
        <hr style="border-top:1px solid black;">
        <table class="paymentdets" border="1">
          <tbody >
              <tr style="font-size:20px;"><td>TOTAL AMOUNT</td><td id="amt"><?php echo $_POST["totalamount"]?></td></tr>
              <tr style="font-size:20px;"><td>GST:</td><td id="gstamt"></td></tr>
              <tr style="font-size:20px;"><td>PLATFORM CHARGES</td><td id="pformamt">40</td></tr>
              <tr style="font-size:35px;"><td><b>NET TOTAL AMOUNT</b></td><td id="finaltotal"></td></tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6" style="border-right:1px solid black;">
        <form action="../success.php" method="POST">
          <script
              src="https://checkout.razorpay.com/v1/checkout.js"
              data-key=<?php echo $apikey;?>// Enter the Test API Key ID generated from Dashboard → Settings → API Keys
              data-amount="100" //
              data-currency="INR"
              data-id=<?php echo "OID".rand(10,100)."END";?>
              data-buttontext="Pay with Razorpay"
              data-name="Acme Corp"
              data-description="A Wild Shep Chase"
              data-image=""
              data-prefill.name="Gaurav Kumar"
              data-prefill.email="gaurav.kumar@example.com"
              data-theme.color="#F37254"
          ></script>
          <input type="hidden" custom="Hidden Element" name="hidden"/>
        </form>
      </div>
    </div>
    <br><br><br><br>
    <footer class="navbar-bottom bg-dark text-light text-center py-3">
      BOOKWITHME.COM X made with 💗 in MIT
      <p>&copy; 2023 GEN 3 | Contact: BARIUM OBERAI</p>
    </footer>
    <script>
        var amt = parseInt(document.getElementById("amt").textContent);
        var x = amt*0.18;
        document.getElementById("gstamt").textContent = 0.18*amt;
        document.getElementById("finaltotal").textContent = amt+x+parseInt(document.getElementById("pformamt").textContent)
    </script>
    <script>
  $(document).ready(function() {
    $('.navbar-collapse a').click(function(){
      $(".navbar-collapse").collapse('hide');
    });
  });
</script>
</body>