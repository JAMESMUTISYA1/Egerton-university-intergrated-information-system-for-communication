<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);


$todelete = $data['todelete'];


$sql = "DELETE FROM events WHERE eventid = '$todelete'  ";
$result = $conn->query($sql);

if ($result) {
    
echo "1";


}else{
    echo "0";
}   