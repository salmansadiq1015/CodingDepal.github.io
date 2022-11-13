<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// DataBase connecction------>
$conn = new mysqli('locolhost', 'root', '', 'codingdepal');
if($conn->connect_error){
    die('Connection Fielded : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into cd_message(name, email, subject, message)
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    echo "Message send Seccessfully...";
    $stmt->close();
    $conn->close();
}

?>