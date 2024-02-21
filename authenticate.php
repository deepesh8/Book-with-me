<?php
    session_start();
    include "dbcon.php";

    $mysql = opencon();

    $u = $_POST['user'];
    $p = $_POST['password'];

    $qry = "select * from login where username ='$u' and password='$p'";
    $result = mysqli_query($mysql,$qry);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['user'])&&isset($_POST['password'])){
        if($u!="" && $p!=""){
            if($u==$row['username'] && $p==$row['password']){
                $_SESSION["user"] = $u;
                header("Location: index.php?user=$u");
            }
            else{
                header("Location: login.html");
            }
        }
        else{
            header("Location: login.html");
        }
    }
    else{
        header("Location: login.html");
    }
?>