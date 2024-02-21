<?php
    session_start();
    echo "success";
    include "dbcon.php";

    $mysql = opencon();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    else{
        echo "<script> window.location='index.php';</script>";
    }
    $event  = $_POST["eventname"];
    $eventid = $_POST["eventid"];
    $host = $_POST["eventhost"];
    $amt = $_POST["totalamount"];
    $sdate = $_POST["eventsdate"];
    $edate = $_POST["eventedate"];

    $bid = rand(1,999999999999999); 

    if(isset($_POST["custname2"]) && isset($_POST["custnum2"])){
        if(isset($_POST["custname3"]) && isset($_POST["custnum3"])){
            if(isset($_POST["custname4"]) && isset($_POST["custnum4"])){
                if(isset($_POST["custname5"]) && isset($_POST["custnum5"])){
                    $name1 = $_POST['custname1'];
                    $ph1 = $_POST['custnum1'];
                    $seat1 =  $_POST['custseat1'];
                    $name2 = $_POST['custname2'];
                    $ph2 = $_POST['custnum2'];
                    $seat2 =  $_POST['custseat2'];
                    $name3 = $_POST['custname3'];
                    $ph3 = $_POST['custnum3'];
                    $seat3 =  $_POST['custseat3'];
                    $name4 = $_POST['custname4'];
                    $ph4 = $_POST['custnum4'];
                    $seat4 =  $_POST['custseat4'];
                    $name5 = $_POST['custname5'];
                    $ph5 = $_POST['custnum5'];
                    $seat5 =  $_POST['custseat5'];

                    $qry = "insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name1','$ph1','$event','$eventid','$seat1','$amt','$sdate','$edate');
                        insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name2','$ph2','$event','$eventid','$seat2','$amt','$sdate','$edate');
                        insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name3','$ph3','$event','$eventid','$seat3','$amt','$sdate','$edate');
                        insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name4','$ph4','$event','$eventid','$seat4','$amt','$sdate','$edate');
                        insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name5','$ph5','$event','$eventid','$seat5','$amt','$sdate','$edate');
                        insert into details(user,bookingid,name1,name2,name3,name4,name5,phno1,phno2,phno3,phno4,phno5,eventname,eventid,seat1,seat2,seat3,seat4,seat5,totalamount,startdate,enddate) values
                        ('$user','$bid','$name1','$name2','$name3','$name4','$name5','$ph1','$ph2','$ph3','$ph4','$ph5','$event','$eventid','$seat1','$seat2','$seat3','$seat4','$seat5','$amt','$sdate','$edate')";
                    try{
                        if(mysqli_multi_query($mysql,$qry)){
                            echo "<script> window.location='success.php'; </script>";
                        }
                    }catch(Exception $e){
                        echo "$e";
                    }
                }
                else{
                    $name1 = $_POST['custname1'];
                    $ph1 = $_POST['custnum1'];
                    $seat1 =  $_POST['custseat1'];
                    $name2 = $_POST['custname2'];
                    $ph2 = $_POST['custnum2'];
                    $seat2 =  $_POST['custseat2'];
                    $name3 = $_POST['custname3'];
                    $ph3 = $_POST['custnum3'];
                    $seat3 =  $_POST['custseat3'];
                    $name4 = $_POST['custname4'];
                    $ph4 = $_POST['custnum4'];
                    $seat4 =  $_POST['custseat4'];

                    $qry="insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name1','$ph1','$event','$eventid','$seat1','$amt','$sdate','$edate');
                        insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name2','$ph2','$event','$eventid','$seat2','$amt','$sdate','$edate');
                        insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name3','$ph3','$event','$eventid','$seat3','$amt','$sdate','$edate');
                        insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                        ('$user','$bid','$name4','$ph4','$event','$eventid','$seat4','$amt','$sdate','$edate');
                        insert into details(user,bookingid,name1,name2,name3,name4,phno1,phno2,phno3,phno4,eventname,eventid,seat1,seat2,seat3,seat4,totalamount,startdate,enddate) values
                        ('$user','$bid','$name1','$name2','$name3','$name4','$ph1','$ph2','$ph3','$ph4','$event','$eventid','$seat1','$seat2','$seat3','$seat4','$amt','$sdate','$edate')";
                    try{
                        if(mysqli_multi_query($mysql,$qry)){
                            echo "<script> window.location='success.php'; </script>";
                        }
                    }catch(Exception $e){
                        echo "$e";
                    }
                }
            }
            else{
                $name1 = $_POST['custname1'];
                $ph1 = $_POST['custnum1'];
                $seat1 =  $_POST['custseat1'];
                $name2 = $_POST['custname2'];
                $ph2 = $_POST['custnum2'];
                $seat2 =  $_POST['custseat2'];
                $name3 = $_POST['custname3'];
                $ph3 = $_POST['custnum3'];
                $seat3 =  $_POST['custseat3'];

                $qry="insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                ('$user','$bid','$name1','$ph1','$event','$eventid','$seat1','$amt','$sdate','$edate');
                insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                ('$user','$bid','$name2','$ph2','$event','$eventid','$seat2','$amt','$sdate','$edate');
                insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                ('$user','$bid','$name3','$ph3','$event','$eventid','$seat3','$amt','$sdate','$edate');
                insert into details(user,bookingid,name1,name2,name3,phno1,phno2,phno3,eventname,eventid,seat1,seat2,seat3,totalamount,startdate,enddate) values
                ('$user','$bid','$name1','$name2','$name3','$ph1','$ph2','$ph3','$event','$eventid','$seat1','$seat2','$seat3','$amt','$sdate','$edate')";
                
                try{
                    if(mysqli_multi_query($mysql,$qry)){
                        echo "<script> window.location='success.php'; </script>";
                    }
                }catch(Exception $e){
                    echo "$e";
                }
            }
        }
        else{
            $name1 = $_POST['custname1'];
            $ph1 = $_POST['custnum1'];
            $seat1 =  $_POST['custseat1'];
            $name2 = $_POST['custname2'];
            $ph2 = $_POST['custnum2'];
            $seat2 =  $_POST['custseat2'];

            $qry="insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                ('$user','$bid','$name1','$ph1','$event','$eventid','$seat1','$amt','$sdate','$edate');
                insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values
                ('$user','$bid','$name2','$ph2','$event','$eventid','$seat2','$amt','$sdate','$edate');
                insert into details(user,bookingid,name1,name2,phno1,phno2,eventname,eventid,seat1,seat2,totalamount,startdate,enddate) values
                ('$user','$bid','$name1','$name2','$ph1','$ph2','$event','$eventid','$seat1','$seat2','$amt','$sdate','$edate')";
            
            try{
                if(mysqli_multi_query($mysql,$qry)){
                    echo "<script> window.location='success.php'; </script>";
                }
            }catch(Exception $e){
                echo "$e";
            }
        }
    }
    else{
        $name1 = $_POST['custname1'];
        $ph1 = $_POST['custnum1'];
        $seat1 =  $_POST['custseat1'];
        $qry = "insert into booking(user,bookingid,name,phno,eventname,eventid,seat,totalamount,startdate,enddate) values ('$user','$bid','$name1','$ph1','$event','$eventid','$seat1','$amt','$sdate','$edate');insert into details(user,bookingid,name1,phno1,eventname,eventid,seat1,totalamount,startdate,enddate) values ('$user','$bid','$name1',$ph1,'$event','$eventid','$seat1',$amt,'$sdate','$edate');update events set s1qty=s1qty-1 where eventname='$event' and eventid='$eventid' and startdate='$sdate' and enddate='$edate'";
        if(mysqli_multi_query($mysql,$qry)){
            echo "<script> window.location='success.php'; </script>";
            echo $name1;
            echo $ph1;
            echo $seat1;
            echo $event;
            echo $eventid;
            echo $host;
            echo $amt;
            echo $sdate;
            echo $edate;
        }
        else{
            echo mysqli_error($mysql);
        }
    }
?>