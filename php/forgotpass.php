<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);

$valueget = $data['toget'];
$id = $data['id'];

if ($valueget == "student"){
$sql = "SELECT password FROM studentstable WHERE studid = '$id'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "1";
}else{
    echo "0";
}    
}
elseif($valueget == "admin"){
    $sql = "SELECT password FROM admin WHERE admin_no = '$id'  ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "medic"){
    $sql = "SELECT password FROM medical WHERE med_id = '$id'  ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }
}
elseif($valueget == "staff"){
    $sql = "SELECT password FROM staff WHERE staffid = '$id'  ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "gud"){
    $sql = "SELECT password FROM gud WHERE gud_id = '$id'  ";
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
