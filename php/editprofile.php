<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);

$valueget = $data['toget'];
$id = $data['id'];
$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];




if ($valueget == "student"){
$sql = "UPDATE studentstable SET name = '$name', email = '$email', phone = '$phone' WHERE studid = '$id'";
$result = $conn->query($sql);
if ($result) {
    
echo "1";

}else{
    echo "0";
}    
}
elseif($valueget == "admin"){
    $sql = "UPDATE admin SET name = '$name', email = '$email', phone = '$phone' WHERE adminid = '$id'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "medic"){
    $sql = "UPDATE medical SET name = '$name', email = '$email', phone = '$phone' WHERE med_id = '$id'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }
}
elseif($valueget == "staff"){
 
    $sql = "UPDATE staff SET name = '$name', email = '$email', phone = '$phone' WHERE staff = '$id'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "gud"){

    $sql = "UPDATE gud SET name = '$name', email = '$email', phone = '$phone' WHERE gud_id = '$id'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }

}
else{
    echo "2";
}
