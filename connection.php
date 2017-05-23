<?php
/**
 * Created by IntelliJ IDEA.
 * User: Matthew
 * Date: 15/03/2017
 * Time: 17:52
 */


$servername = "Danu6.it.nuigalway.ie";
$username = "mydb2450bm";
$password = "bu3tyc";
$dbname = "mydb2450";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn ->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

echo "Connected Successfully";