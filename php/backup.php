<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);



$date = $data['date'];
$time = $data['time'];

$sql = "INSERT INTO backup VALUES ( '','full', '$date', '$time', 'scheduled')  ";
$result = $conn->query($sql);

if ($result) {
    
echo "1";


}else{
    echo "0";
}   