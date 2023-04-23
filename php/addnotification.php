<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);


$id = $data['id'];
$info = $data['info'];
$target = $data['target'];


$sql = "INSERT INTO notifications VALUES ('', '$id', '$target', '$info', '')  ";
$result = $conn->query($sql);

if ($result) {
    
echo "1";


}else{
    echo "0";
}   