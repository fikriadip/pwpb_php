<?php

require_once("connection.php");

// Insert Record 
function InsertRecord()
{
    global $conn;
    $mName = $_POST['MName'];
    $mEmail = $_POST['MEmail'];
    $mSubject = $_POST['MSubject'];
    $mMessage = $_POST['MMessage'];

    $query = "INSERT INTO pesan_masuk (name, email, subject, message) 
    values('$mName', '$mEmail', '$mSubject', '$mMessage')";
    $result = mysqli_query($conn,$query);

    if ($result) {
        echo "THANK YOU FOR SENDING MESSAGE";
    } else{
        echo "Please Double-Check Your Input";
    }
}
?>