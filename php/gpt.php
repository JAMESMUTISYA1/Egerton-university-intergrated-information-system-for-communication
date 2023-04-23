<?php

// Connect to the database
$host = 'localhost';
$user = 'username';
$pass = 'password';
$dbname = 'database';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check for connection error
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the current user's ID
$user_id = 1; // This would typically come from a login system

// If the user submitted a message
if (isset($_POST['message'])) {
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  $sql = "INSERT INTO messages (user_id, message) VALUES ('$user_id', '$message')";
  mysqli_query($conn, $sql);
}

// Get the latest messages
$sql = "SELECT messages.*, users.username FROM messages JOIN users ON messages.user_id = users.id ORDER BY messages.id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

// Display the messages
while ($row = mysqli_fetch_assoc($result)) {
  $message_id = $row['id'];
  $username = $row['username'];
  $message = $row['message'];
  $time = date('h:i A', strtotime($row['timestamp']));
  
  // Determine if the message was sent or received
  $class = ($row['user_id'] == $user_id) ? 'message-sent' : 'message-received';
  
  // Display the message
  echo '<li class="' . $class . '">';
  echo '<span class="message-time">' . $time . '</span>';
  echo '<p class="message-text">' . $message . '</p>';
  echo '</li>';
}

// Close the database connection
mysqli_close($conn);

?>











// Connect to the database
$host = 'localhost';
$user = 'username';
$pass = 'password';
$dbname = 'database';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check for connection error
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the current user's ID
$user_id = 1; // This would typically come from a login system

// If the user submitted a message
if (isset($_POST['message'])) {
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  $sql = "INSERT INTO messages (user_id, message) VALUES ('$user_id', '$message')";
  mysqli_query($conn, $sql);
}

// If the user requested messages via AJAX
if (isset($_GET['get_messages'])) {
  $sql = "SELECT messages.*, users.username FROM messages JOIN users ON messages.user_id = users.id ORDER BY messages.id DESC LIMIT 10";
  $result = mysqli_query($conn, $sql);
  $messages = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $message_id = $row['id'];
    $username = $row['username'];
    $message = $row['message'];
    $time = date('h:i A', strtotime($row['timestamp']));

    // Determine if the message was sent or received
    $class = ($row['user_id'] == $user_id) ? 'message-sent' : 'message-received';

    // Add the message to the array
    $messages[] = array(
      'id' => $message_id,
      'username' => $username,
      'message' => $message,
      'time' => $time,
      'class' => $class
    );
  }

  // Return the messages as JSON
  header('Content-Type: application/json');
  echo json_encode($messages);
}

// Close the database connection
mysqli_close($conn);

?>


- id (primary key)
- sender_id (foreign key to either students, staff, or medic table)
- receiver_id (foreign key to either students, staff, or medic table)
- message
- timestamp



<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		#message-container {
			max-height: 500px;
			overflow-y: scroll;
		}

		.message {
			margin-bottom: 10px;
		}

		.sender-name {
			font-weight: bold;
			margin-right: 5px;
		}

		.timestamp {
			font-size: 12px;
			color: gray;
			margin-left: 10px;
		}
	</style>
</head>
<body>
	<h1>Messages</h1>

	<div id="message-container">
		<!-- messages will be displayed here -->
	</div>

	<form id="message-form">
		<h2>Send a Message</h2>
		<div>
			<label for="sender-type">Sender Type:</label>
			<select id="sender-type" name="sender-type">
				<option value="student">Student</option>
				<option value="staff">Staff</option>
				<option value="medic">Medic</option>
			</select>
		</div>
		<div>
			<label for="sender-id">Sender ID:</label>
			<input type="text" id="sender-id" name="sender-id">
		</div>
		<div>
			<label for="receiver-type">Receiver Type:</label>
			<select id="receiver-type" name="receiver-type">
				<option value="student">Student</option>
				<option value="staff">Staff</option>
				<option value="medic">Medic</option>
			</select>
		</div>
		<div>
			<label for="receiver-id">Receiver ID:</label>
			<input type="text" id="receiver-id" name="receiver-id">
		</div>
		<div>
			<label for="message">Message:</label>
			<textarea id="message" name="message"></textarea>
		</div>
		<button type="submit">Send</button>
	</form>

	<script>
		$(document).ready(function() {
			// get initial messages
			getMessages();

			// submit form to send message
			$('#message-form').submit(function(event) {
				event.preventDefault();

				// get form data
				var formData = {
					'sender-type': $('#sender-type').val(),
					'sender-id': $('#sender-id').val(),
					'receiver-type': $('#receiver-type').val(),
					'receiver-id': $('#receiver-id').val(),
					'message': $('#message').val()
				};

				// send data to server with ajax
				$.ajax({
					type: 'POST',
					url: 'send-message.php',
					data: formData,
					dataType: 'json',
					encode: true
				})
				.done(function(data) {
					// clear form and get updated messages
					$('#message-form').trigger('reset');
					getMessages();
				});
			});
		});

		// function to get messages from server with ajax
		function getMessages() {
			$.ajax({
				type: 'GET',
				url: 'get-messages.php',
				dataType: 'json',
				encode: true
			})
			.done(function(data) {
				// display messages in message container
			
                $('#message-container').empty();
			$.each(data, function(index, message) {
				var senderName;
				if (message.sender_type == 'student') {
					senderName = 'Student ' + message.sender_id;
				} else if (message.sender_type == 'staff') {
					senderName = 'Staff ' + message.sender_id;
				} else if (message.sender_type == 'medic') {
					senderName = 'Medic ' + message.sender_id;
				}

				var receiverName;
				if (message.receiver_type == 'student') {
					receiverName = 'Student ' + message.receiver_id;
				} else if (message.receiver_type == 'staff') {
					receiverName = 'Staff ' + message.receiver_id;
				} else if (message.receiver_type == 'medic') {
					receiverName = 'Medic ' + message.receiver_id;
				}

				var timestamp = new Date(message.timestamp * 1000).toLocaleString();

				var messageHTML = '<div class="message">' +
								   '<span class="sender-name">' + senderName + ':</span>' +
								   '<span>' + message.message + '</span>' +
								   '<span class="timestamp">' + timestamp + '</span>' +
								   '<br>' +
								   '<span class="receiver-name">To: ' + receiverName + '</span>' +
								   '</div>';

				$('#message-container').append(messageHTML);
			});

			// scroll to bottom of message container
			$('#message-container').scrollTop($('#message-container')[0].scrollHeight);
		});
	}
</script>
