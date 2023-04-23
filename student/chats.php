<?php
session_start();
if (!isset($_SESSION['id'])){
header('location: studentlogin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egerton University</title>

    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../css/globalstyles.css" />
    <link rel="stylesheet" type="text/css" href="../css/fontlink.css" />
    <link rel="stylesheet" type="text/css" href="../css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="../css/chats.css" />



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl
    .min.js" integrity="sha512-pBoUgBw+mK85IYWlMTSeBQ0Djx3u23anXFNQfBiIm2D8MbVT9lr+Ix
    UccP8AMMQ6LCvgnlhUCK3ZCThaBCr8Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<!--header-->
<div class="nav-bar">
  <div class="perfectwriters" > <label class="logo"> Egerton University</label> </div>
    
    <div class="online"> logged in </div>
    <div class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <?php
          include "../php/db.php";
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM studentstable  WHERE studid = '$id' ";
          $result = $conn->query($sql);

          //echo $result;
          while ($row = $result->fetch_assoc()){
            
              echo $row['name'];
        
            
        ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="help.php">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
    </div>
  
    </div>
  </div>
  <!--/header-->
<div class="whole-area">
   <!--fixed left area-->
   <div class="fixedleftarea">
    <div class="writers-details">
        <div >Welcome</div>
        <div >
        <?php
              echo $row['name'];
        ?>
        </div>
        <div>
          <i class="icon-user font-size-sm"></i>
          <?php
              echo $row['email'];
            
        }
        ?>
        </div>
    </div>
    <ul class="navigation " >

        <li class="navigation-item active"><a href="chats.php" class="navigation-link" >Chats &nbsp; &nbsp;
          <span class="navigation-number" style="background-color: rgb(226, 103, 21);" id="delivered">
        <?php
          include "../php/db.php";
          $id = $_SESSION['id'];
          $read = 0;
          $sql = "SELECT * FROM messages  WHERE receiverid = '$id' AND mread = '$read' ";
          
          $result = $conn->query($sql);
         
              echo mysqli_num_rows($result);
        ?>
      </span></a></li>

        <li class="navigation-item"><a href="events.php"class="navigation-link" >Events&nbsp; </a></li>

        <li class="navigation-item"><a href="notifications.php"class="navigation-link" >Notifications&nbsp; </a></li>

        <li class="navigation-item"><a href="profile.php" style="display: block;" class="navigation-link">
        <i class="icon-user"></i> <span>Profile</span></a></li>

        <li class="navigation-item"><a href="help.php" style="display: block;" class="navigation-link">
        <i class="icon-newspaper"></i> <span>Help</span></a></li>

    </ul>
</div>
<!--/fixed left area-->
   <!--scrollable right area-->
  <div class="right-area" style="position: relative; left: 21%; width: 80%; height: 84vh; ">
    <div class="right-navigation">
        <a href="chats.html"><i class="icon-home2 mr-2"></i> Home </a>
        <span >/Chats</span>
    </div>

<!--chatarea-->
<div id = "chatarea" style = "" >
  <div id="chatpeople">
  <?php
          include "../php/db.php";
          $id = $_SESSION['id'];
          $read = 0;
          $sql = "SELECT senderid FROM messages  WHERE receiverid = '$id' ";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0){
            
            while ($rows = $result2->fetch_assoc()){
            ?>
            <input id = "messagesinput" type = "submit" value= "<?php echo $rows['senderid'];?>" >>
               <?php
            }
          }else {
            echo "<div > No New Messages</div>";
          }
            ?>
     <input type="submit" id = "messagesinput" value = "12345" >
      
  </div>
<div class="chat-container">
    <div class="chat-header">
      <h2>Chats Area</h2>
    </div>
    <div class="chat-messages">


      <ul class="message-list">
        <li class="message-received">
          <span class="message-time">12:30 PM</span>
          <p class="message-text">Hi there!</p>
        </li>
        <li class="message-sent">
          <span class="message-time">12:31 PM</span>
          <p class="message-text">Hey, how's it going?</p>
        </li>
      </ul>


    </div>
    <div class="chat-input">
      <input type="text" placeholder="Type your message...">
      <button>Send</button>
    </div>
  </div>
  </div>
<!--/chatarea-->

   
    
  </div>
   <!--/scrollable right area-->
</div>

  <!--footer-->
  <div class="footer">
    <p style="color: white">
      &copy; 2023 &nbsp; &nbsp; &nbsp; developed by Group 1
    </p>
  </div>
  <!--/footer-->
  <!--id input-->
<input type="hidden"  id= "inputid" value="
<?php
echo $_SESSION['id'];
?>
" >
<!--id input-->

<script>


const messagesinput = document.querySelectorAll("#messagesinput");
messagesinput.forEach((item)=>{
item.addEventListener("click", ()=>{
    window.id = item.value;
    //console.log(item.value);
    const userid = document.getElementById("inputid").value;
var data = {
  userid: userid,
  senderid: id
}
let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/getmessages.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
xhr.send(JSON.stringify(data));
xhr.onload = function () {
console.log(this.response)
if(this.response != ""){
  var obj = this.response;
  var datat = JSON.parse(obj);
  
  console.log(this.response)


}
}






  })})





</script>
</body>
</html>