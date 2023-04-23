<?php
session_start();
if (!isset($_SESSION['id'])){
header('location: stafflogin.php');
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egerton Umiversity</title>

    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../css/globalstyles.css" />



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/fontlink.css" />
    <link rel="stylesheet" type="text/css" href="../css/fonts.css" />
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js" integrity="sha512-pBoUgBw+mK85IYWlMTSeBQ0Djx3u23anXFNQfBiIm2D8MbVT9lr+IxUccP8AMMQ6LCvgnlhUCK3ZCThaBCr8Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
          $sql = "SELECT * FROM staff  WHERE staffid = '$id' ";
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

        <li class="navigation-item"><a href="chats.php" class="navigation-link" >Chats &nbsp; &nbsp;<span class="navigation-number" style="background-color: rgb(226, 103, 21);" id="delivered"> 0</span></a></li>

        <li class="navigation-item"><a href="events.php"class="navigation-link" >Events&nbsp; &nbsp;</a></li>

        <li class="navigation-item"><a href="notifications.php"class="navigation-link" >Notifications&nbsp; &nbsp;</a></li>

        <li class="navigation-item"><a href="profile.php" style="display: block;" class="navigation-link"><i class="icon-user"></i> <span>Profile</span></a></li>

        <li class="navigation-item active"><a href="help.php" style="display: block;" class="navigation-link"><i class="icon-newspaper"></i> <span>Help</span></a></li>

    </ul>
</div>
<!--/fixed left area-->
   <!--scrollable right area-->
  <div class="right-area" style="position: relative; left: 21%; width: 80%; height: 84vh; ">
    <div class="right-navigation">
        <a href="chats.html"><i class="icon-home2 mr-2"></i> Home </a>
        <span >/Help</span> 
    </div>
    
   <div>

<h2>Describe Your issue </h2>
<textarea name="help" id="help" cols="120" rows="20" spellcheck="false" >
  Describe here...
</textarea>


   </div>

<div  >
  <div class="summaryheading bg bg-info" data-toggle="modal" data-target="#submit" > submit </div>
</div>
   

  </div>
   <!--/scrollable right area-->
</div>
<!--id input-->
<input type="hidden"  id= "inputid" value="
<?php
echo $_SESSION['id'];
?>
" >
<!--id input-->
  <!--footer-->
  <div class="footer">
    <p style="color: white">
      &copy; 2023 &nbsp; &nbsp; &nbsp; developed by Group 1
    </p>
  </div>
  <!--/footer-->
  <!-- Change password-->
<div class="modal fade" id="submit" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="placebid" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg bg-info">
          <h6 class="modal-title" id="sendmessage">Submit</h6>
        </div>
        <div class="modal-body">
        
            <div class="message-subject">
              <label>Are you sure to submit ?</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button"  data-dismiss="modal" class="btn  btn-outline-danger">No</button>
          <button  type="button" id="closesubmit" data-dismiss="modal" style="display: none;" ></button>
          <button  type="button" id="submitbutton" data-dismiss="modal" class="btn btn-primary"> Yes</button>
        </div>
      </div>
    </div>
  </div>
  <!--/change password-->
<script>


const submitbutton = document.getElementById("submitbutton");
submitbutton.addEventListener("click", ()=>{
const id = document.getElementById("inputid").value;
const desc = document.getElementById("help").value;
const closesubmit = document.getElementById("closesubmit");
var data = {
          id: id,
          desc: desc
        };


let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/helphandling.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


xhr.send(JSON.stringify(data));
xhr.onload = function () {
console.log(this.response)
 
  if(this.response == 1){
    $.bootstrapGrowl("Request send Successfully", // Messages
{ // options
type: "success", // info, success, warning and danger
ele: "body", // parent container
offset: {
from: "top",
amount: 20
},
align: "right", // right, left or center
width: 250,
delay: 2000,
allow_dismiss: true, // add a close button to the message
stackup_spacing: 10
});
closesubmit.click();


  }else{
    $.bootstrapGrowl("Error Please Try Again Later!!", // Messages
{ // options
type: "danger", // info, success, warning and danger
ele: "body", // parent container
offset: {
from: "top",
amount: 20
},
align: "right", // right, left or center
width: 250,
delay: 2000,
allow_dismiss: true, // add a close button to the message
stackup_spacing: 10
});
  }


}})




</script>

</body>
</html>