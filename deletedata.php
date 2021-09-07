<?php

$sid = $_GET['id'];

$conn =mysqli_connect("localhost", "root", "", "task2") or die("coonection Error");
$sql ="delete from user_info where id={$sid}";

if(mysqli_query($conn, $sql)){
    header("Location: http://localhost/project/task2/view_data.php");
}else{
    echo "Error";
}
?>