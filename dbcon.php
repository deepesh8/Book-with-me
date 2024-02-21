<?php
    function opencon(){
        $user = "id21494750_aakash";
        $host = "localhost";
        $db = "id21494750_bwm";
        $pass = "Aakash@123";

        $mysql = new mysqli($host,$user,$pass,$db);
        if($mysql->connect_error){
            die("FAILED TO CONNECT");
        }
        return $mysql;
    }
    function closecon($conn){
        $conn->close();
    }
?>