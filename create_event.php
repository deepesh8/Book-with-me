<?php
  session_start();

  if(isset($_SESSION["user"]) && $_SESSION["user"]!=""){
    $user = $_SESSION["user"];
  }
  else{
    header("location: login.html");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">  

<!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./assets/homestyle.css?v=1.0" rel="stylesheet" type="text/css" />
    <style>
        .radio-container {
            display: flex;
            align-items: center;
            margin-bottom: 5px; /* Optional: Add margin for spacing */
        }

        /* Adjust styles for radio button */
        input[type="radio"] {
            margin-right: 100px; /* Optional: Add space between radio button and label */
        }

        /* Additional styles for the label */
        label {
            margin-top:10px;
            margin-right:80px;
            /* Additional label styles can be applied here */
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
                <li><a href="view_events.php">Explore event</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="account.php/?user=<?php echo $user;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>
  <div class="jumbotron text-center">
    <h1><b><i>Create and cator events like you own it!</i></b></h1>
    <p>Fill in the details about the event you want to create below</p>
  </div>
  <form action="create.php" method="POST" enctype="multipart/form-data">
    <div class="container">
      <div class="col-sm-6">
        <h2><b>Create event</b></h2>
        <table border="1">
          <tr><td><div>Event Name: </div></td><td><input type="text" name="ename" required></td></tr>
          <tr><td><div>Seating capacity required: </div></td><td><div class="radio-container">
          <input type="radio" id="option1" name="radioGroup" value="200" required><label for="option1">200</label></div><div class="radio-container"><input type="radio" id="option2" name="radioGroup" value="400" required><label for="option2">400</label></div></td></tr>
          <input type="hidden" name="seatcapa" required>
          <tr><td><div>Event start time: </div></td><td><input type="time" name="stime" required></td></tr>
          <tr><td><div>Start date of event </div></td><td><input type="date" name="sdate" required></td></tr>
          <tr><td><div>End date of event </div></td><td><input type="date" name="edate" required></td></tr>
          <tr><td><div>Price per seat :</div></td><td><input type="number" name="pps" required></td></tr>
          <tr><td><div>Eligible age: </div></td><td><input type="number" name="age" required></td></tr>
          <tr><td><div>Location of event</div></td><td><input type="text" name="location" required></td></tr>
          <tr><td><div>Event description: </div></td><td><textarea class="desc" name="desc" required></textarea></td></tr>
        
        <!--<input type="number" name="seatcapa" required>-->
        </table>
      </div>
      <div class="col-sm-6">
        <h2>Seat types:</h2>
          <div>
            Number of types of seats: <button id="inc" type="button">+</button><span id="seattype"> 0 </span><button id="dec" type="button">-</button><div id="msg"></div>
          </div>
          <table id="seattable" border=1>
            <thead>
              <tr><td width="200px">TYPE</td><td width="200px">QUANTITY</td><td width="200px">PRICE</td></tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <br>
          <form class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <label>
                    <input type="checkbox" name="pass"> PASS BASED<br>
                </label>
              </div>
              Upload event cover image: <input type="file" name="image" id="image" required>  <!-- CHECK FOR PROBLEMS HERE-->
            </div>
          </form>
        </div>
        <br>
        <div class="col-6">
          <br>
          <button class="btn btn-primary btn-block" type="submit">CREATE EVENT</button>
        </div>
    </div>
  </form>
<br>
  <footer class="navbar-bottom bg-dark text-light text-center py-3">
    BOOKWITHME.COM X made with 💗 in MIT
        <p>&copy; 2023 GEN 3 | Contact: +91 12345 43123</p>
  </footer>
  <script>
    var seattype = document.getElementById("seattype");
    var inc = document.getElementById("inc");
    var dec = document.getElementById("dec");

    var cnt=1;

    inc.addEventListener("click",function(){
      if(parseInt(seattype.textContent)<3){
        seattype.textContent= " "+(parseInt(seattype.textContent)+1)+" ";
        var table = document.getElementById("seattable").getElementsByTagName("tbody")[0];
        var newrow = document.createElement("tr");

        var seatcell = document.createElement("td");
        var inputseat = document.createElement("input");

        var qtycell = document.createElement("td");
        var inputqty = document.createElement("input");

        var pricecell = document.createElement("td");
        var sprice = document.createElement("input");

        inputseat.type="text";
        inputseat.name="stype"+cnt;
        inputseat.required = true;

        inputqty.type="number";
        inputqty.name="sqty"+cnt;
        inputqty.required=true;

        sprice.type="number";
        sprice.name="sprice"+cnt;
        sprice.required=true;

        
        seatcell.appendChild(inputseat);
        pricecell.appendChild(sprice);
        qtycell.appendChild(inputqty);

        newrow.appendChild(seatcell);
        newrow.appendChild(qtycell);
        newrow.appendChild(pricecell);

        table.appendChild(newrow);
        console.log(document.getElementsByName('sdate')[0].value);
        console.log(document.getElementsByName('stime')[0].value);
        cnt++;
      }
      else{
        var msg = document.getElementById("msg");
        msg.textContent = "MAX TYPES REACHED";
        setTimeout(function(){
          msg.textContent = "";
        },1500);
      }
    })

    dec.addEventListener("click",function(){
      if(parseInt(seattype.textContent)>0){
        seattype.textContent= " "+(parseInt(seattype.textContent)-1)+" ";
        var table = document.getElementById("seattable").getElementsByTagName("tbody")[0];
        var row = table.getElementsByTagName("tr")[0];
        table.removeChild(row);
        cnt--;
      }
      else{
        var msg = document.getElementById("msg");
        msg.textContent = "ALL SEATS SET AS REGULAR SEATS";
        setTimeout(function(){
          msg.textContent = "";
        },1500);
      }
    })

    document.getElementById("option1").addEventListener("change",function(){
      document.getElementsByName("seatcapa")[0].value = document.getElementById("option1").value;
      console.log(document.getElementsByName("seatcapa")[0].value);
    })
    document.getElementById("option2").addEventListener("change",function(){
      document.getElementsByName("seatcapa")[0].value = document.getElementById("option2").value;
      console.log(document.getElementsByName("seatcapa")[0].value);
    })
  </script>
  <script>
    $(document).ready(function() {
      $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
      });
    });
  </script>
</body>
