<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);


$id = $data['id'];
$valueget = $data['toget'];

if ($valueget == "student"){
    $sql = "SELECT * FROM studentstable WHERE studid = '$id' ";
    $result = mysqli_query($conn, $sql);
    $messages = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['studid'];
      $name = $row['name'];
      $email = $row['email'];
      $phone = $row['phone'];
      $gender = $row['gender'];
    
      $userinfo[] = array(
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'gender' => $gender
      );
      // Return the messages as JSON
      header('Content-Type: application/json');
      echo json_encode($userinfo);
    }

    }
    
    elseif($valueget == "medic"){
        $sql = "SELECT * FROM medical WHERE med_id = '$id' ";
        $result = mysqli_query($conn, $sql);
        $messages = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['med_id'];
          $name = $row['name'];
          $email = $row['email'];
          $phone = $row['phone'];
          $gender = $row['gender'];
        
          $userinfo[] = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender
          );
          // Return the messages as JSON
          header('Content-Type: application/json');
          echo json_encode($userinfo);
        }
    }
    elseif($valueget == "staff"){
     
        $sql = "SELECT * FROM staff WHERE staffid = '$id' ";
        $result = mysqli_query($conn, $sql);
        $messages = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['staffid'];
          $name = $row['name'];
          $email = $row['email'];
          $phone = $row['phone'];
          $gender = $row['gender'];
        
          $userinfo[] = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender
          );
          // Return the messages as JSON
          header('Content-Type: application/json');
          echo json_encode($userinfo);
        }
    
    }
    elseif($valueget == "gud"){
    
        $sql = "SELECT * FROM gud WHERE gud_id = '$id' ";
$result = mysqli_query($conn, $sql);
$messages = array();
while ($row = mysqli_fetch_assoc($result)) {
  $id = $row['gud_id'];
  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $gender = $row['gender'];

  $userinfo[] = array(
    'id' => $id,
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'gender' => $gender
  );
  // Return the messages as JSON
  header('Content-Type: application/json');
  echo json_encode($userinfo);
}
    
    }



