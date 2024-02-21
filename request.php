<?php
    session_start();
    include "dbcon.php";
    $user = htmlspecialchars($_GET['user']);
    $event = htmlspecialchars($_GET['event']);
    $id = htmlspecialchars($_GET['id']);
    $bid = htmlspecialchars($_GET['bid']);
    
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&display=swap" rel="stylesheet">
    <style>
      body{
        font-family: 'Lexend', sans-serif;
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
          <a class="navbar-brand" href="../index.php">BWM</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
              <li><a href="create_event.php">Create event</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="../account.php/?user=<?php echo $user;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="jumbotron text-center">
      <h1><b>Request for a seat change</b></h1>
      <p>A request for seat change can be applied and is completely dependent on the person with whom you want to exchange seats with<br><b><i>*YOU CAN APPLY ONLY FOR 1 SEAT CHANGE AT THE MOMENT*</i></b></p>
    </div>

    <div class="container-fluid">
      <div class="col-md-6" style="border-right:1px solid black;">
        <?php
        $passedseats = array();
          if(isset($_GET['seat1'])){
            if(isset($_GET['seat2'])){
              if(isset($_GET['seat3'])){
                if(isset($_GET['seat4'])){
                  if(isset($_GET['seat5'])){
                    $seat1 = htmlspecialchars($_GET['seat1']);
                    $seat2 = htmlspecialchars($_GET['seat2']);
                    $seat3 = htmlspecialchars($_GET['seat3']);
                    $seat4 = htmlspecialchars($_GET['seat4']);
                    $seat5 = htmlspecialchars($_GET['seat5']);
                    $passedseats = array($seat1,$seat2,$seat3,$seat4,$seat5);
                    echo "<div class= 'col-md-12' style='font-size:30px;'>
                    <h2>Currently seats chosen for the events are listed below please select the desired seat from the grid shown beside it to confirm the request :</h2>
                            <p><b>$seat1</b><input type='radio' name='bg1' style='transform:scale(1.5);' value='$seat1'><br></p>
                            <p><b>$seat2</b><input type='radio' name='bg1' style='transform:scale(1.5);' value='$seat2'><br></p>
                            <p><b>$seat3</b><input type='radio' name='bg1' style='transform:scale(1.5);' value='$seat3'><br></p>
                            <p><b>$seat4</b><input type='radio' name='bg1' style='transform:scale(1.5);' value='$seat4'><br></p>
                            <p><b>$seat5</b><input type='radio' name='bg1' style='transform:scale(1.5);' value='$seat5'><br></p><br>
                          </div>
                      ";
                  }
                  else{
                    $seat1 = htmlspecialchars($_GET['seat1']);
                    $seat2 = htmlspecialchars($_GET['seat2']);
                    $seat3 = htmlspecialchars($_GET['seat3']);
                    $seat4 = htmlspecialchars($_GET['seat4']);
                    $passedseats = array($seat1,$seat2,$seat3,$seat4);
                    echo "<div class= 'col-md-12' style='font-size:30px;'>
                    <h2>Currently seats chosen for the events are listed below please select the desired seat from the grid shown beside it to confirm the request :</h2>
                            <p><b>$seat1</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat1'><br></p>
                            <p><b>$seat2</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat2'><br></p>
                            <p><b>$seat3</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat3'><br></p>
                            <p><b>$seat4</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat4'><br></p><br>
                          </div>
                      ";
                  }
                }
                else  {
                  $seat1 = htmlspecialchars($_GET['seat1']);
                  $seat2 = htmlspecialchars($_GET['seat2']);
                  $seat3 = htmlspecialchars($_GET['seat3']);
                  $passedseats = array($seat1,$seat2,$seat3);
                  echo "<div class= 'col-md-12' style='font-size:30px;'>
                  <h2>Currently seats chosen for the events are listed below please select the desired seat from the grid shown beside it to confirm the request :</h2>
                          <p><b>$seat1</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat1'><br></p>
                          <p><b>$seat2</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat2'><br></p>
                          <p><b>$seat3</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat3'><br></p><br>
                        </div>
                    ";
                }
              }
              else{
                $seat1 = htmlspecialchars($_GET['seat1']);
                $seat2 = htmlspecialchars($_GET['seat2']);
                $passedseats = array($seat1,$seat2);
                  echo "<div class= 'col-md-12' style='font-size:30px;'>
                  <h2>Currently seats chosen for the events are listed below please select the desired seat from the grid shown beside it to confirm the request :</h2>
                          <p><b>$seat1</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat1'><br></p>
                          <p><b>$seat2</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat2'><br></p><br>
                        </div>
                    ";
              }
            }
            else{
              $seat1 = htmlspecialchars($_GET['seat1']);
              $passedseats = array($seat1);
              echo "<div class= 'col-md-12' style='font-size:30px;'>
                      <h2>Currently seats chosen for the events are listed below please select the desired seat from the grid shown beside it to confirm the request :</h2>
                      <p><b>$seat1</b><input type='radio' name='bg1' style='transform:scale(1.5); margin:10px;' value='$seat1'><br></p>
                    </div>";
            }
          }
          else{
            echo "PLEASE GO TO MY ACCOUNT->PREVIOUS PURCHASES TIN ORDER TO APPLY FOR A SEAT CHANGE";
          }
        ?>
        <div class="col-md-12" id="displayarea"></div>
        <div class="col-md-12" id="confirmarea" style="display:none;">
          <br><b>PLEASE CHECK THE SEATS SELCTED BEFORE CONFIRMING.</b><br>
          <button type="button" id="confirm" onclick="check()">CONFIRM</button> <button id="cancel">CANCEL</button>
        </div>
        <form action="../swap.php" method="POST" id="swap">
          <input type="hidden" value="" id="selected" name="selected" required>
          <input type="hidden" value="" id="swapped" name="swapped" required>
          <input type="hidden" value="<?php echo $bid ?>" id="bid" name="bid" required>
          <input type="hidden" value="<?php echo $id ?>" id="id" name="id" required>
          <input type="hidden" value="<?php echo $user ?>" id="user" name="user" required>
          <input type="hidden" value="<?php echo $event ?>" id="event" name="event" required>
          <input type="hidden" value="" id="swappedaccount" name="swappedaccount" required>
        </form>
        
        <div class="col-md-12" id="errmsg" style="color:red;font-"></div>
      </div>
      <div class="col-md-6" style="border-left:1px solid black;">
        <div style='margin-left:50%;'><b>SCREEN</b></div>
        <hr style="border-top:1px solid black">
        <table border="1" id="seats" style="margin:auto;">
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
    <br><br><br><br>
    <hr>
    <br><br><br>
    <footer class="navbar-bottom bg-dark text-light text-center py-3" style="background-color: #f8f9fa;height:50px; margin-top:auto;">
        BOOKWITHME.COM X made with 💗 in MIT<br>
      <p>&copy; 2023 GEN 3 | Contact: +91 12345 54643</p>
    </footer>
  <script>
    <?php
      $qry = "select * from booking where eventname='$event' and eventid='$id'";
      $res = mysqli_query($mysql,$qry);

      if ($res) {
        $data = array();
        $user = array();
        $name = array();
        $bids = array();
        while ($row = $res->fetch_assoc()) {
            $data[] = $row["seat"];
            $user[] = $row["name"];
            $name[] = $row["user"];
            $bids[] = $row["bookingid"];
        }
      }
    ?> 
    var seats = document.getElementById("seats").getElementsByTagName("tbody")[0];
    cnt = 1;
    var arr = <?php echo json_encode($data); ?>;
    var user = <?php echo json_encode($user); ?>;
    var names = <?php echo json_encode($name); ?>;
    var bids = <?php echo json_encode($bids); ?>;

    var passedseats = <?php echo json_encode($passedseats); ?>;

    console.log(arr);
    console.log(arr.length);
    console.log(user);
    console.log(user[0]);
    console.log(names);
    console.log(names[0]);
    console.log(bids);
    console.log(passedseats);
    console.log(bids[0]);
    
    for(let i=0;i<20;i++){
      var newrow = document.createElement("tr");
      for(let j=0;j<20;j++){
        var seat = document.createElement("td");
        var but1 = document.createElement("button");
        but1.style="background-color:lightgreen; height:100%; width:100%; border-radius:25% 25% 25% 25%";
        but1.textContent = cnt;
        but1.value = cnt;
        but1.type="button";
        but1.setAttribute("data-flag",false);
        for(let a=0;a<arr.length;a++){
          if(cnt==arr[a]){
            but1.setAttribute("data-name",user[a]);
            but1.setAttribute("data-user",names[a]);
            but1.setAttribute("data-bookingid",bids[a]);
            but1.setAttribute("data-flag",true);
            seat.appendChild(but1);
            but1.style="background-color:red; width:100%;height:100%;border-radius:25% 25% 25% 25%";
            newrow.appendChild(seat);
          }
          for(let a = 0;a<passedseats.length;a++){
            if(cnt==passedseats[a]){
              but1.style="background-color:grey; width:100%;height:100%;border-radius:25% 25% 25% 25%";
              but1.setAttribute("data-flag","fixed");
              but1.disabled = true;
            }
          }
        }
        but1.setAttribute("onclick","display(this)");
        seat.appendChild(but1);
        seat.style="text-align:center;";
        newrow.appendChild(seat);
        cnt++;
      }
      seats.appendChild(newrow);
    }
    var prev;
    function deallot(button){
      if(button.getAttribute("data-flag")=="true"){
        button.style="background-color:red; width:100%;height:100%;border-radius:25% 25% 25% 25%";
      }
      else if(button.getAttribute("data-flag")=="false"){
        button.style="background-color:lightgreen; width:100%;height:100%;border-radius:25% 25% 25% 25%";
      }
    }
    var done=false;
    function display(button){
      var x = document.getElementById("displayarea");
      x.textContent ="The booking id of the selcted seat is "+button.getAttribute("data-bookingid")+" The seat number is "+button.value;
      x.style = "font-size:25px;";

      if(done){
        deallot(prev);
        button.style="background-color:orange; width:100%;height:100%;border-radius:25% 25% 25% 25%";
        prev=button;
      }
      else{
        button.style="background-color:orange; width:100%;height:100%;border-radius:25% 25% 25% 25%";
        done=true;
        prev = button;
      }

      var y = document.getElementById("confirmarea");
      y.style="display:block;font-size:20px;";
      document.getElementById("swapped").value = button.value;
      document.getElementById("swappedaccount").value = button.getAttribute("data-user");
      console.log(button.getAttribute("data-user"));
    }

    function check(){
      var buts = document.getElementsByName("bg1");
      var orig="";
      var selected = false;
      for(var i=0;i<buts.length;i++){
        if(buts[i].checked){
          selected = true;
          document.getElementById("selected").value = buts[i].value;
          break;
        }
      }
      
      if(selected){
        var checker = document.getElementById("swapped");
        if(checker.value==""){
          var c = document.getElementById("errmsg");
          c.textContent = "*PLEASE SELECT A SEAT TO EXCHANGE WITH FROM THE GRID BESIDE";
          setTimeout(() => {
            var c = document.getElementById("errmsg");
            c.textContent="";
          }, 1500);
        }
        else{
          var f = document.getElementById("swap");
          f.submit();
        }
      }
      else{
        var c = document.getElementById("errmsg");
        c.textContent = "*PLEASE SELECT A SEAT TO EXCHANGE";
        setTimeout(() => {
          var c = document.getElementById("errmsg");
          c.textContent="";
        }, 1500);
      }
    }
  </script>
  <script>
  $(document).ready(function() {
    $('.navbar-collapse a').click(function(){
      $(".navbar-collapse").collapse('hide');
    });
  });
</script>
</body>