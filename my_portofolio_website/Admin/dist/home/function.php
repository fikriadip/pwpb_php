<?php

require_once("../includes/connection.php");

// Insert Record 
function InsertHome()
{
    global $conn;
    $homeTitle = $_POST['HTitle'];
    $homeName = $_POST['HName'];
    $homeDesc = $_POST['HDesc'];
    $homeJob = $_POST['HJob'];

    $query = "INSERT INTO home (title, my_name, my_description, my_job) 
    values('$homeTitle', '$homeName', '$homeDesc', '$homeJob')";
    $result = mysqli_query($conn,$query);

    if ($result) {
        echo "Data Home Berhasil Ditambah";
    } else{
        echo "Please Double-Check Your Input";
    }
}

// Display Data Function
function displayTable_home()
{
    global $conn;
    $value ="";
    $value = '<table class="table hover table-bordered nowrap" style="width:100%">
    <thead>
        <tr class="bg-light text-center">
            <th>No</th>
            <th>Id</th>
            <th>Title</th>
            <th>My Name</th>
            <th>My Description</th>
            <th>My Job</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-light text-center">
            <th>No</th>
            <th>Id</th>
            <th>Title</th>
            <th>My Name</th>
            <th>My Description</th>
            <th>My Job</th>
            <th>Action</th>
        </tr>
    </tfoot>
';

$query = "SELECT * FROM home";
$result = mysqli_query($conn,$query);
$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $value .=' 
    <tbody>
    <th class="text-center">'. $no.'</th>
    <td class="text-center">'. $row['id'].'</td>
    <td>'. $row['title'].'</td>
    <td>'. $row['my_name'].'</td>
    <td>'. $row['my_description'].'</td>
    <td>'. $row['my_job'].'</td>
    <td align="center"><a href="update_home.php?id='.$row['id'].'" class="btn btn-warning btn-m m-1 mt-2 mr-2"
            title="Edit Home" id="btn_edit"><i
                class="mdi mdi-square-edit-outline"></i></a>
        <a href="delete_home.php?id='.$row['id'].'" class="btn btn-danger btn-m m-1 mt-2 mr-2"
            title="Delete Home"><i
                class="mdi mdi-trash-can"></i></a>
    </td>
</tbody>';
    $no++;
}
$value.='</table>';
echo json_encode(['status'=>'success','html'=>$value]);
}



?>