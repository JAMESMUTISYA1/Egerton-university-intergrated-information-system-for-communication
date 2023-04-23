<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);

$valueget = $data['toget'];
$id = $data['id'];
$password = $data['password'];

if ($valueget == "student"){
$sql = "SELECT * FROM studentstable WHERE studid = '$id' AND password = '$password'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
echo "1";


}else{
    echo "0";
}    
}
elseif($valueget == "admin"){
    $sql = "SELECT * FROM admin WHERE admin_no = '$id' AND password = '$password'  ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "medic"){
    $sql = "SELECT * FROM medical WHERE med_id = '$id' AND password = '$password'  ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }
}
elseif($valueget == "staff"){
 
    $sql = "SELECT * FROM staff WHERE staffid = '$id' AND password = '$password'  ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "gud"){

    $sql = "SELECT * FROM passwords WHERE gud_id = '$id' AND password = '$password'  ";
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
