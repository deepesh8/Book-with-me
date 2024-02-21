<?php
    include "dbcon.php";
    $mysql = opencon();
    
    $user = htmlspecialchars($_GET['user']);
    $reqby = htmlspecialchars($_GET['reqby']);
    $bid = htmlspecialchars($_GET['bid']);
    $event = htmlspecialchars($_GET['event']);
    $id = htmlspecialchars($_GET['id']);
    $oseat = htmlspecialchars($_GET['oseat']);
    $rseat = htmlspecialchars($_GET['rseat']);
    $action = htmlspecialchars($_GET['action']);

    if($reqby===""){
        $qry = "update booking set seat='$rseat' where seat='$oseat' and user='$user' and bookingid='$bid' and eventid='$id' and eventname='$event';
            update details set seat1='$rseat' where seat1='$oseat' and bookingid='$bid' and user='$user' and eventname='$event' and eventid='$id';
            update details set seat2='$rseat' where seat2='$oseat' and bookingid='$bid' and user='$user' and eventname='$event' and eventid='$id';
            update details set seat3='$rseat' where seat3='$oseat' and bookingid='$bid' and user='$user' and eventname='$event' and eventid='$id';
            update details set seat4='$rseat' where seat4='$oseat' and bookingid='$bid' and user='$user' and eventname='$event' and eventid='$id';
            update details set seat5='$rseat' where seat5='$oseat' and bookingid='$bid' and user='$user' and eventname='$event' and eventid='$id';
            update requests set status='ACCEPTED' where user='$user' and requestfrom='$reqby' and event='$event' bookingid='$bid' and originalseat='$oseat' and requestforseat='$rseat' and status='ACTION_PENDING';";
            $mysql = opencon();
            if(mysqli_multi_query($mysql,$qry)){
                header("Location: ../view_events.php");
                echo $user;
                echo $reqby;
                echo $bid;
                echo $event;
                echo $id ;
                echo $oseat;
                echo $rseat;
                echo $action;
            }
            else{
                echo "error";
            }
    }
    else{
        if ($action === 'ACCEPT') {    
            $qry = "update booking set seat='$rseat' where seat='$oseat' and user='$reqby' and bookingid='$bid' and eventid='$id' and eventname='$event';
            update booking set seat='$oseat' where user='$user' and seat='$rseat';
            update details set seat1='$rseat' where seat1='$oseat' and bookingid='$bid' and user='$reqby' and eventname='$event' and eventid='$id';
            update details set seat2='$rseat' where seat2='$oseat' and bookingid='$bid' and user='$reqby' and eventname='$event' and eventid='$id';
            update details set seat3='$rseat' where seat3='$oseat' and bookingid='$bid' and user='$reqby' and eventname='$event' and eventid='$id';
            update details set seat4='$rseat' where seat4='$oseat' and bookingid='$bid' and user='$reqby' and eventname='$event' and eventid='$id';
            update details set seat5='$rseat' where seat5='$oseat' and bookingid='$bid' and user='$reqby' and eventname='$event' and eventid='$id';
            update details set seat1='$oseat' where seat1='$rseat' and user='$user' and eventname='$event' and eventid='$id';
            update details set seat2='$oseat' where seat2='$rseat' and user='$user' and eventname='$event' and eventid='$id';
            update details set seat3='$oseat' where seat3='$rseat' and user='$user' and eventname='$event' and eventid='$id';
            update details set seat4='$oseat' where seat4='$rseat' and user='$user' and eventname='$event' and eventid='$id';
            update details set seat5='$oseat' where seat5='$rseat' and user='$user' and eventname='$event' and eventid='$id';
            update requests set status='ACCEPTED' where user='$reqby' and requestedfrom ='$user' and event='$event' and bookingid='$bid' and originalseat='$oseat' and requestforseat='$rseat'";
            $mysql = opencon();
            if(mysqli_multi_query($mysql,$qry)){
                header("Location: ../view_events.php");
                echo $user."<br>";
                echo $reqby."<br>";
                echo $bid."<br>";
                echo $event."<br>";
                echo $id ."<br>";
                echo $oseat."<br>";
                echo $rseat."<br>";
                echo $action."<br>";
            }
            else{
                echo "error";
            }
        }
        else{
            $qry = "update requests set status='DECLINED' where user='$reqby' and requestedfrom ='$user' and event='$event' and bookingid='$bid' and originalseat='$oseat' and requestforseat='$rseat'";
            if(mysqli_query($mysql,$qry)){
                header("Location: ../view_events.php");
                echo $user."<br>";
                    echo $reqby."<br>";
                    echo $bid."<br>";
                    echo $event."<br>";
                    echo $id ."<br>";
                    echo $oseat."<br>";
                    echo $rseat."<br>";
                    echo $action."<br>";
            }
        }
    }
?>


<!-- update details set seat1='146' where seat1='191' and bookingid='423830761922422' and user='asd' and eventname='TT' and eventid='23';
update details set seat2='146' where seat2='191' and bookingid='423830761922422' and user='asd' and eventname='TT' and eventid='23';
update details set seat3='146' where seat3='191' and bookingid='423830761922422' and user='asd' and eventname='TT' and eventid='23';
update details set seat4='146' where seat4='191' and bookingid='423830761922422' and user='asd' and eventname='TT' and eventid='23';
update details set seat5='146' where seat5='191' and bookingid='423830761922422' and user='asd' and eventname='TT' and eventid='23'; -->