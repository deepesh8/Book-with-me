<?php
    include "dbcon.php";
    $mysql = opencon();

    $u = $_POST['user'];
    $p = $_POST['passkey'];
    $n = $_POST['fname']." ".$_POST["lname"];
    $e = $_POST["email"];

    $qry = "insert into login(name,username,password,email) values ('$n','$u','$p','$e')";

    try{
        if(mysqli_query($mysql,$qry)){
            header("Location: login.html");
        }
        else{
            header("Location: signup.html");
        }
    }catch(Exception $e){
        header("Location: signup.html");
    }
?>