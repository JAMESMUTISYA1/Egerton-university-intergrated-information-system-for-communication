<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);

$valueget = $data['register'];
$adminid = $data['adminid'];
$regno = $data['regno'];
$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$gender = $data['gender'];
$dofbirth = $data['dofbirth'];
$facultyvalue = $data['facultyvalue'];
$staffrole = $data['staffrole'];

if ($valueget == "student"){
$sql = "INSERT studentstable (studid, name, email, facultyid, dateofbirth, phone, gender, password) VALUES ('$regno', '$name', '$email', '$facultyvalue','$dofbirth','$phone', '$gender','$regno')";
$result = $conn->query($sql);
if ($result) {
    
echo "1";

}else{
    echo "0";
}    
}

elseif($valueget == "medic"){
    $sql = "INSERT medical (med_id, name, email, phone, gender, adminid, dateofbirth, password) VALUES ('$regno', '$name', '$email', '$phone', '$gender', '$adminid', '$dofbirth','$regno')";

    $result = $conn->query($sql);
 
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }
}
elseif($valueget == "staff"){
 
    $sql = "INSERT staff (staffid, name, email, phone, gender, adminid, dateofbirth, password, s_role) VALUES ('$regno', '$name', '$email', '$phone', '$gender', '$adminid', '$dofbirth','$regno', '$staffrole')";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }

}
elseif($valueget == "gud"){

    $sql = "INSERT gud (gud_id, name, email, phone, gender, adminid, dateofbirth, password) VALUES ('$regno', '$name', '$email', '$phone', '$gender', '$adminid', '$dofbirth','$regno')";
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
