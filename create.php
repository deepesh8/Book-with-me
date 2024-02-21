<?php
session_start();
    include "dbcon.php";

    $mysql = opencon();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    else{
        $user = "admin";
    }


    $ename = $_POST["ename"];
    $seatcapa = $_POST["seatcapa"];
    $stime = $_POST["stime"];
    $sdate = $_POST["sdate"];
    $edate = $_POST["edate"];
    $pps = $_POST["pps"];
    $age = $_POST["age"];
    $loc = $_POST["location"];
    $desc = $_POST["desc"];

    $img_name = $_FILES["image"]["name"];
    $img_size = $_FILES["image"]["size"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
    $img_upload_path = 'images/'.$new_img_name;
    move_uploaded_file($tmp_name,$img_upload_path);

    if(isset($_POST['pass'])){
        if($_POST['pass']){
            $pass='true';
        }
    }
    else{
        $pass='false';
    }

    // $ename = 0;
    // $seatcapa =0;
    // $stime = 0;
    // $sdate = 0;
    // $edate = 0;
    // $pps = 0;
    // $age = 0;
    // $loc = 0;
    // $desc = 0;
    // $stype1=0;
    // $sprice1=0;
    // $sqty1=0;
    // $stype2=0;
    // $sprice2=0;
    // $sqty2=0;
    // $stype3=0;
    // $sprice3 =0;
    // $sqty3=0;
    // $sqty1 = 0;
    // $sqty2 = 0;
    // $sqty3 = 0;

    // $qry = "insert into events(user,eventname,seatingcapa,
    //         starttime,startdate,enddate,seat1type,seat1price,seat2type,
    //         seat2price,seat3type,seat3price,age,location,description,s1qty,
    //         s2qty,s3qty) values('$user','$ename','$seatcapa','$stime','$sdate',
    //         $edate','$stype1','$sprice1','$stype2','$sprice2','$stype3','$sprice3',
    //         '$age','$loc','$desc','$sqty1','$sqty2','$sqty3')";

    if(isset($_POST['stype1']) && $_POST['stype1']!=""){
        if(isset($_POST['stype2']) && $_POST['stype2']!=""){
            if(isset($_POST['stype3']) && $_POST['stype3']!=""){
                $stype1 = $_POST['stype1'];
                $sprice1 = $_POST['sprice1'];
                $sqty1 = $_POST['sqty1'];
                $stype2 = $_POST['stype2']; 
                $sprice2 = $_POST['sprice2'];
                $sqty2 = $_POST['sqty2'];
                $stype3 = $_POST['stype3']; 
                $sprice3 = $_POST['sprice3'];
                $sqty3 = $_POST['sqty3'];
                if($seatcapa===200){
                    $qry = "insert into events(user,eventname,seatingcapa,
                        starttime,startdate,enddate,seat1type,seat1price,seat2type,
                        seat2price,seat3type,seat3price,age,location,description,s1qty,
                        s2qty,s3qty,passbased,image) values('$user','$ename','$seatcapa','$stime','$sdate','$edate','$stype1','$sprice1','$stype2','$sprice2','$stype3','$sprice3','$age','$loc','$desc','100','50','50','$pass','$new_img_name')";
                }
                else{
                    $qry = "insert into events(user,eventname,seatingcapa,
                    starttime,startdate,enddate,seat1type,seat1price,seat2type,
                    seat2price,seat3type,seat3price,age,location,description,s1qty,
                    s2qty,s3qty,passbased,image) values('$user','$ename','$seatcapa','$stime','$sdate','$edate','$stype1','$sprice1','$stype2','$sprice2','$stype3','$sprice3','$age','$loc','$desc','100','50','250','$pass','$new_img_name')";
                }
            }
            else{
                $stype1 = $_POST['stype1'];
                $sprice1 = $_POST['sprice1'];
                $sqty1 = $_POST['sqty1'];
                $stype2 = $_POST['stype2']; 
                $sprice2 = $_POST['sprice2'];
                $sqty2 = $_POST['sqty2'];
                if($seatcapa===200){
                    $qry = "insert into events(user,eventname,seatingcapa,
                    starttime,startdate,enddate,seat1type,seat1price,seat2type,
                    seat2price,seat3type,seat3price,age,location,description,s1qty,
                    s2qty,s3qty,passbased,image) values('$user','$ename','$seatcapa','$stime','$sdate','$edate','$stype1','$sprice1','$stype2','$sprice2','REGULAR','$pps','$age','$loc','$desc','100','100','$seatcapa','$pass','$new_img_name')";
                }
                else{
                    $qry = "insert into events(user,eventname,seatingcapa,
                    starttime,startdate,enddate,seat1type,seat1price,seat2type,
                    seat2price,seat3type,seat3price,age,location,description,s1qty,
                    s2qty,s3qty,passbased,image) values('$user','$ename','$seatcapa','$stime','$sdate','$edate','$stype1','$sprice1','$stype2','$sprice2','REGULAR','$pps','$age','$loc','$desc','100','300','$seatcapa','$pass','$new_img_name')";
                }
            }
        }
        else{
            $stype1 = $_POST['stype1'];
            $sprice1 = $_POST['sprice1'];
            $sqty1 = $_POST['sqty1'];
            if($seatcapa===200){
                $qry = "insert into events(user,eventname,seatingcapa,
                    starttime,startdate,enddate,seat1type,seat1price,seat2type,
                    seat2price,seat3type,seat3price,age,location,description,s1qty,
                    s2qty,s3qty,passbased,image) values('$user','$ename','$seatcapa','$stime','$sdate','$edate','$stype1','$sprice1','REGULAR','$pps','REGULAR','$pps','$age','$loc','$desc','$seatcapa','$seatcapa','$seatcapa','$pass','$new_img_name')";
            }
            else{
                $qry = "insert into events(user,eventname,seatingcapa,
                    starttime,startdate,enddate,seat1type,seat1price,seat2type,
                    seat2price,seat3type,seat3price,age,location,description,s1qty,
                    s2qty,s3qty,passbased,image) values('$user','$ename','$seatcapa','$stime','$sdate','$edate','$stype1','$sprice1','REGULAR','$pps','REGULAR','$pps','$age','$loc','$desc','$seatcapa','$seatcapa','$seatcapa','$pass','$new_img_name')";
            }
        }
    }
    else{
        echo $seatcapa;
        $qry = "insert into events(user,eventname,seatingcapa,
                    starttime,startdate,enddate,seat1type,seat1price,seat2type,
                    seat2price,seat3type,seat3price,age,location,description,s1qty,
                    s2qty,s3qty,passbased,image) values('$user','$ename','$seatcapa','$stime','$sdate',
                    '$edate','REGULAR','$pps','REGULAR','$pps','REGULAR','$pps',
                    '$age','$loc','$desc',$seatcapa,$seatcapa,$seatcapa,'$pass','$new_img_name')";
    }

    try{
        if(mysqli_query($mysql,$qry)){
            echo " sucess";
            echo "$pass";
            //user who created event,event id,event name,seating capacity,start date,end date,price of seat type1, price of seat typ2,price of seat type3,age criteria,location,event description
            echo "<script>window.location='view_events.php'</script>";
        }
        else{
            echo " bruh1";
        }
    }
    catch(Exception $e){
        if(isset($_POST['stype1'])){
            echo"seat1";
            echo"$e";
        }
        else{
            echo"seat1 not opted yet";
            echo"$e";
        }
        echo " bruh";
    }
?>