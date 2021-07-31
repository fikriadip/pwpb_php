<?php

require_once("includes/connection.php");
require_once("../Login/function.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../Login/login.php");
    exit;
}

// $data = mysqli_query("SELECT * FROM pesan_masuk"); 

require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$print = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Message From Client</h1>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr class="bg-light text-center">
            <th>No</th>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Created At</th>
        </tr>';

        $no = 1;
        $stmt = $conn->prepare('SELECT * FROM pesan_masuk');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
            $print .= '<tr>
                <td>'.$no++.'</td>
                <td>'.$row["id"].'</td>
                <td>'.$row["name"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["subject"].'</td>
                <td>'.$row["message"].'</td>
                <td>'.$row["created_at"].'</td>
            </tr>';
        endwhile;

$print .= '</table>
</body>
</html>';
$mpdf->WriteHTML($print);
$mpdf->Output('data message.pdf', \Mpdf\Output\Destination::DOWNLOAD);
// $mpdf->Output();

?>