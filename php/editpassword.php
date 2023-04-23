<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);

$valueget = $data['toget'];
$id = $data['id'];
$password = $data['password'];



if ($valueget == "student"){
$sql = "UPDATE studentstable SET password = '$password' WHERE studid = '$id'";
$result = $conn->query($sql);
if ($result) {
    
echo "1";

}else{
    echo "0";
}    
}
elseif($valueget == "admin"){
    $sql1 = "UPDATE admin SET password = '$password' WHERE admin_no = '$id'";
    $result = mysqli_query($conn, $sql1)
    
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "medic"){
    $sql = "UPDATE medical SET password = '$password' WHERE med_id = '$id'"; 
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }
}
elseif($valueget == "staff"){
 
    $sql = "UPDATE staff SET password = '$password' WHERE staffid = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "gud"){

    $sql = "UPDATE gud SET password = '$password' WHERE gud_id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }

}
else{
    echo "2";
}
