<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];
$valueget = $data['toget'];

$value = 1;

if ($valueget == "student"){
$sql = "UPDATE studentstable SET ban = '$value' WHERE studid = '$id'";
$result = $conn->query($sql);
if ($result) {
    
echo "1";

}else{
    echo "0";
}    
}
elseif($valueget == "medic"){
    $sql = "UPDATE medical SET ban = '$value' WHERE med_id = '$id'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }
}
elseif($valueget == "staff"){
 
    $sql = "UPDATE staff SET ban = '$value' WHERE staffid = '$id'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "gud"){

    $sql = "UPDATE gud SET ban = '$value' WHERE gud_id = '$id'";
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
