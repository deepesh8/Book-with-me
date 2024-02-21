<?php
    session_start();
    include "dbcon.php";
    $event = htmlspecialchars($_GET['event']);
    $host = htmlspecialchars($_GET['host']);
    $id = htmlspecialchars($_GET['eventid']);
    $_SESSION["id"] = htmlspecialchars($_GET['eventid']);
    $_SESSION["eventhost"] = htmlspecialchars($_GET['host']);
    $_SESSION["eventname"] = htmlspecialchars($_GET['event']);

    if(isset($_SESSION["user"]) && $_SESSION["user"]!=""){
      $user = $_SESSION["user"];
    }
    else{
      header('Location: ../login.html');
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
          background-color: rgb(163, 159, 159);
          padding-top: 20px;
          padding-bottom: 20px;
          background-image: linear-gradient(to bottom, rgb(156, 156, 156), rgb(0, 0, 0));
          color:white;
      }
      .jumbotron{
        color:black;
        background-color:grey;
      }
       .toolbox {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color:black;
        }
        form{
          color:black;
          font-family: 'Lexend', sans-serif;
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
                    <li><a href="../create_event.php">Create event</a></li>
                    <li><a href="../view_events.php">Explore events</a></li>
                </ul> 
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../account.php/?user=<?php echo $user;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center">
      <h1><b><?php echo"$event"?></b></h1>
      <p class="dets" style="font-size:15px;"><i><?php echo"(Event id: $id) ~hosted by $host"?></i></p>
      <p>Booking details can be filled below</p>
    </div>
    <form method="POST" action="../check.php" id="myForm">
      <div class="container-fluid" style="font-size:20px;">
        <div class="col-md-6" style="border-right:1px solid black;">
          How many people are attending the event? 
          <button id="inc" type="button">+</button><span id="people"> 1 </span><button id="dec" type="button">-</button>
          <div id="msg"></div>
          <br>
          <table border="1" id="dets">
            <thead><tr><td width="200px" style="text-align:center;">NAME</td><td width="200px" style="text-align:center;">PHONE NUMBER</td><td width="200px" style="text-align:center;">SEAT</td></tr></thead>
            <tbody>
              <tr><td><input type="text" name="custname1" required></td><td><input type="number" name="custnum1" required></td><td><textarea name="custseat1" style="height:28px;" readOnly required></textarea></td></tr>
            </tbody>
          </table>
          <br>
          <br>
          SEATS LEFT TO BOOK:<div id="seatmsg">1</div>
          <br>
          <br>
          SEATS CHOSEN:<div id="seatarray"></div>
          <br>
          <br>
          TOTAL PRICE:<br><textarea id="price" style="height:28px;" name="totalamount" readOnly required>0</textarea>
          <br><br>
          <button type="button" id="formbut">PROCEED TO PAYMENT</button>
        </div>
        <div class="col-md-6" style="border-left:1px solid black;">
          <b style="margin-left:50%;">STAGE</b>
          <hr style="border-top:1px solid black; margin-left:2%;">
          <table border="1" id="seats" style="margin:auto;">
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <?php 
        $mysql = opencon();
        $qry = "select * from events where eventname='$event' and user='$host' and eventid='$id'";
        if(mysqli_query($mysql,$qry)){
          $result = mysqli_query($mysql,$qry);
          $row = mysqli_fetch_assoc($result);
          $pass = $row['passbased'];
          $sdate = $row['startdate'];
          $edate = $row['enddate'];
        }
        else{
          echo "no";
        }
      ?>
      <input type="hidden" name="eventname" id="ename" value="<?php echo $event?>">
      <input type="hidden" name="eventid" value=<?php echo $id?>>
      <input type="hidden" name="eventhost" value=<?php echo $host?>>
      <input type="hidden" name="eventsdate" value=<?php echo $sdate?>>
      <input type="hidden" name="eventedate" value=<?php echo $edate?>>
    </form>
      <br>
    <div id="toolbox" class="toolbox"></div>

    <footer class="navbar-bottom bg-dark text-light text-center py-3" style="margin-top:10vh;!important">
      BOOKWITHME.COM X made with 💗 in MIT
      <p>&copy; 2023 GEN 3 | Contact: +91 12334 12334</p>
    </footer>
    <?php
      $qry = "select * from booking where eventname='$event' and eventid='$id'";
      $res = mysqli_query($mysql,$qry);
      if ($res) {
        $data = array();
        $user = array();
        $names = array();
        $bids = array();
        while ($row = $res->fetch_assoc()) {
            $data[] = $row["seat"];
            $user[] = $row["name"];
            $names[] = $row["user"];
            $bids[] = $row["bookingid"];
        }
      }
    ?> 
  <script>
      console.log(document.getElementById("ename").value);
      <?php
        $query = "select seatingcapa,seat1price,seat2price,seat3price from events where
        eventname='$event' and eventid='$id' and user='$host'";
        $result1 = mysqli_query($mysql,$query);
        $row = mysqli_fetch_assoc($result1);
        $totseats = $row["seatingcapa"];
      ?>
    var seat1price = <?php echo $row['seat1price'];?>;
    var seat2price = <?php echo $row['seat2price'];?>;
    var seat3price = <?php echo $row['seat3price'];?>;
    var limit = <?php echo $totseats;?>;
      
    function showTooltip(button) {
      const tooltip = document.getElementById('tooltip');
      tooltip.style.display = 'block';
      tooltip.textContent = button.textContent;
      document.onmousemove = function(e) {
        const x = e.pageX;
        const y = e.pageY;
        tooltip.style.left = (x + 10) + 'px';
        tooltip.style.top = (y + 10) + 'px';
      };
    }
    var toolbox = document.getElementById("toolbox");
    function hideTooltip(button) {
      const tooltip = document.getElementById('tooltip');
      tooltip.style.display = 'none';
    }
    var people = document.getElementById("people");
    var inc = document.getElementById("inc");
    var dec = document.getElementById("dec");

    var cnt1 = 1;

    inc.addEventListener("click",function(){
      if(parseInt(people.textContent)<5){
        var msg =document.getElementById("seatmsg");
        people.textContent= " "+(parseInt(people.textContent)+1)+" ";
        msg.textContent= (parseInt(people.textContent));
        var table = document.getElementById("dets").getElementsByTagName("tbody")[0];
        var newrow = document.createElement("tr");

        var namecell = document.createElement("td");
        var inputname = document.createElement("input");

        var phcell = document.createElement("td");
        var inputph = document.createElement("input");

        var seatcell = document.createElement("td");
        var seat =document.createElement("textarea");

        inputname.type="text";
        inputname.name="custname"+(cnt1+1);
        inputname.required = true;

        inputph.type="number";
        inputph.name="custnum"+(cnt1+1);
        inputph.required=true;

        seat.setAttribute("name","custseat"+(cnt1+1));
        seat.setAttribute("style","height:28px;")
        seat.readOnly=true;
        
        namecell.appendChild(inputname);
        phcell.appendChild(inputph);
        seatcell.appendChild(seat);

        newrow.appendChild(namecell);
        newrow.appendChild(phcell);
        newrow.appendChild(seatcell);

        table.appendChild(newrow);
        cnt1++;
      }
      else{
        var msg = document.getElementById("msg");
        msg.textContent = "MAX PEOPLE REACHED";
        setTimeout(function(){
          msg.textContent = "";
        },1500);
      }
    })

    dec.addEventListener("click",function(){
      if(parseInt(people.textContent)>1){
        var msg =document.getElementById("seatmsg");
        people.textContent= " "+(parseInt(people.textContent)-1)+" ";
        msg.textContent= (parseInt(msg.textContent)-1);
        var table = document.getElementById("dets").getElementsByTagName("tbody")[0];
        var row = table.getElementsByTagName("tr")[0];
        table.removeChild(row);
        cnt1--;
      }
      else{
        var msg = document.getElementById("msg");
        msg.textContent = "ATLEAST ONE PARTICIPANT HAS TO BE ENTERED";
        setTimeout(function(){
          msg.textContent = "";
        },1500);
      }
    })

    var finalseats = [];

    function show(button){
      const toolbox = document.getElementById('toolbox');
      toolbox.style.display = 'block';
      toolbox.textContent = "BOOKING ID:"+button.getAttribute('data-bookingid');
      document.onmousemove = function(e) {
          const x = e.pageX;
          const y = e.pageY;
          toolbox.style.left = (x + 10) + 'px';
          toolbox.style.top = (y + 10) + 'px';
      };
    }

    function hide(button){
      const tooltip = document.getElementById('toolbox');
      tooltip.style.display = 'none';
    }

    var flag=false
    var seatcount=0;
    function deallot(button){
      button.style.backgroundColor = "lightgreen";
      button.setAttribute("data-flag",false);
      var orig = parseInt(people.textContent);
      var msg =document.getElementById("seatmsg");
      if(seatcount>0){
        seatcount--;
        finalseats.pop();
        var s =document.getElementById("seatarray");
          s.textContent = finalseats;
        msg.textContent = orig-seatcount;
      }
      document.getElementsByName("custseat"+(seatcount+1))[0].textContent="";
      if(button.value<=100){
        document.getElementById("price").textContent=parseInt(document.getElementById("price").textContent)-seat1price;
      }
      else if(button.value>100 && button.value<=150){
        document.getElementById("price").textContent=parseInt(document.getElementById("price").textContent)-seat2price;
      }
      else{
        document.getElementById("price").textContent=parseInt(document.getElementById("price").textContent)-seat3price;
      }
    }
    
    function allot(button){
      button.style.backgroundColor = "orange";
      button.setAttribute("data-flag",true);
      var orig = parseInt(people.textContent);
      var msg =document.getElementById("seatmsg");
      if(seatcount<orig){
        seatcount++;
        finalseats.push(button.value);
        msg.textContent = orig-seatcount;
      }
      if(button.value<=100){
        document.getElementById("price").textContent=parseInt(document.getElementById("price").textContent)+seat1price;
      }
      else if(button.value>100 && button.value<=150){
        document.getElementById("price").textContent=parseInt(document.getElementById("price").textContent)+seat2price;
      }
      else{
        document.getElementById("price").textContent=parseInt(document.getElementById("price").textContent)+seat3price;
      }
    }

    function check(button){
      if(button.getAttribute("data-flag")=="true"){
        deallot(button);
      }
      else{
        if(parseInt(people.textContent)!=seatcount){
          allot(button);
        }
        else{
          var msg =document.getElementById("seatmsg");
          msg.textContent = "NO MORE SEATS LEFT TO ALLOT";
        }
      }
      var s =document.getElementById("seatarray");
      s.textContent = finalseats;
      console.log(seatcount);
      for(let i=0;i<seatcount;i++){
        document.getElementsByName("custseat"+(i+1))[0].textContent=finalseats[i];
      }
    }

    var seats = document.getElementById("seats").getElementsByTagName("tbody")[0];
    cnt = 1;
    var arr = <?php echo json_encode($data); ?>;
    var user = <?php echo json_encode($user); ?>;
    var names = <?php echo json_encode($names); ?>;
    var bids = <?php echo json_encode($bids); ?>;
    console.log(arr);
    console.log(arr.length);
    console.log(user);
    console.log(user[0]);
    console.log(names);
    console.log(names[0]);
    console.log(bids);
    console.log(bids[0]);
    if(limit/20==20){
      for(let i=0;i<limit/20;i++){
        var newrow = document.createElement("tr");
        for(let j=0;j<limit/20;j++){
          var seat = document.createElement("td");
          var but1 = document.createElement("button");
          but1.style="background-color:lightgreen; height:100%; width:100%; border-radius:25% 25% 25% 25%";
          but1.textContent = cnt;
          but1.value = cnt;
          but1.type="button";
          for(let a=0;a<arr.length;a++){
            if(cnt==arr[a]){
              but1.setAttribute("data-name",user[a]);
              but1.setAttribute("data-user",names[a]);
              but1.setAttribute("data-bookingid",bids[a]);
              but1.setAttribute("onmouseover","show(this)");
              but1.setAttribute("onmouseout","hide(this)");
              but1.disabled=true;
              seat.appendChild(but1);
              but1.style="background-color:red; width:100%;height:100%;border-radius:25% 25% 25% 25%";
              newrow.appendChild(seat);
            }
          }
          but1.setAttribute("onclick","check(this)");
          but1.setAttribute("data-flag",false);
          seat.appendChild(but1);
          seat.style="text-align:center;";
          newrow.appendChild(seat);
          cnt++;
        }
        seats.appendChild(newrow);
      }
    }
    else{
      for(let i=0;i<20;i++){
        var newrow = document.createElement("tr");
        for(let j=0;j<10;j++){
          var seat = document.createElement("td");
          var but1 = document.createElement("button");
          but1.style="background-color:lightgreen; height:100%; width:100%; border-radius:25% 25% 25% 25%";
          but1.textContent = cnt;
          but1.value = cnt;
          but1.type="button";
          for(let a=0;a<arr.length;a++){
            if(cnt==arr[a]){
              but1.setAttribute("data-name",user[a]);
              but1.setAttribute("data-user",names[a]);
              but1.setAttribute("data-bookingid",bids[a]);
              but1.setAttribute("onmouseover","show(this)");
              but1.setAttribute("onmouseout","hide(this)");
              but1.disabled=true;
              seat.appendChild(but1);
              but1.style="background-color:red; width:100%;height:100%;border-radius:25% 25% 25% 25%";
              newrow.appendChild(seat);
            }
          }
          but1.setAttribute("onclick","check(this)");
          but1.setAttribute("data-flag",false);
          seat.appendChild(but1);
          seat.style="text-align:center;";
          newrow.appendChild(seat);
          cnt++;
        }
        seats.appendChild(newrow);
      }
    }

    var subbut =document.getElementById("formbut");
    subbut.addEventListener("click",function(){
      var form = document.getElementById("myForm");
      var elements = form.elements;
      var isValid = true;

      for (var i = 0; i < elements.length; i++) {
          if (elements[i].hasAttribute("required") && elements[i].value === "") {
              isValid = false;
              break; 
          }
      }

      if(isValid){
        document.getElementById("myForm").submit();
      }
      else{
        var msg = document.getElementById("msg");
        msg.textContent="PLEASE FILL IN THE DETAILS AND SELECT A SEAT";
        setTimeout(() => {
          msg.textContent="";
        }, 1500);
      }
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
</html>