<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);



$id = $data['id'];
$info = $data['info'];

$sql = "UPDATE helpcenter SET feedback = '$info' WHERE helpid = '$id' ";
$result = $conn->query($sql);

if ($result) {
    
echo "1";


}else{
    echo "0";
}   