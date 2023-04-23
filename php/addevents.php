<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);


$id = $data['id'];
$info = $data['info'];
$date = $data['date'];
$time = $data['time'];

$sql = "INSERT INTO events VALUES ('','$info', '$date', '$time', '$id')  ";
$result = $conn->query($sql);

if ($result) {
    
echo "1";


}else{
    echo "0";
}   