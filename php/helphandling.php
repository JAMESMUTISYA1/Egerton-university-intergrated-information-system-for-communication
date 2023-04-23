<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);


$id = $data['id'];
$desc = $data['desc'];


$sql = "INSERT INTO helpcenter VALUES ('$id', '$desc')  ";
$result = $conn->query($sql);

if ($result) {
    
echo "1";


}else{
    echo "0";
}    


