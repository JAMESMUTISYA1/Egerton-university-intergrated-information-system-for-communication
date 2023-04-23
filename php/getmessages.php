<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);


$userid = $data['userid'];
$senderid = $data['senderid'];


$messages = array();
$sql = "SELECT * FROM messages WHERE senderid = '$senderid' ";
$result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $message_id = $row['id'];
    $senderid = $row['senderid'];
    $message = $row['message'];
    $time = date('h:i A', strtotime($row['timestamp']));

    // Determine if the message was sent or received
    $class = ($row['senderid'] == $userid) ? 'message-sent' : 'message-received';

    // Add the message to the array
    $messages[] = array(
      'id' => $message_id,
      'username' => $senderid,
      'message' => $message,
      'time' => $time,
      'class' => $class
    );
  }

  // Return the messages as JSON
  header('Content-Type: application/json');
  echo json_encode($messages);
