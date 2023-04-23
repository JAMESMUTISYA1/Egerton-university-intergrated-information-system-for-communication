<?php
session_start();
if (!isset($_SESSION['id'])){
header('location: adminlogin.php');
exit();
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
    <link rel="stylesheet" type="text/css" href="../css/notifications.css" />
    <link rel="stylesheet" type="text/css" href="../css/fontlink.css" />
    <link rel="stylesheet" type="text/css" href="../css/fonts.css" />
    



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
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
          $sql = "SELECT * FROM admin WHERE admin_no = '$id' ";
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

<li class="navigation-item"><a href="reports.php" class="navigation-link" >Reports &nbsp; &nbsp;</a></li>

<li class="navigation-item active"><a href="events.php"class="navigation-link" >Events Management&nbsp; </a></li>

<li class="navigation-item"><a href="notifications.php"class="navigation-link" >Notification Management&nbsp; </a></li>


<li class="navigation-item"><a href="user.php"class="navigation-link" >User Management&nbsp; </a></li>

<li class="navigation-item"><a href="help.php" style="display: block;" class="navigation-link"><i class="icon-newspaper"></i> <span>Help Management</span></a></li>

<li class="navigation-item"><a href="backup.php"class="navigation-link" >Backup Management&nbsp; </a></li>


<li class="navigation-item"><a href="profile.php" style="display: block;" class="navigation-link"><i class="icon-user"></i> <span>Profile</span></a></li>

</ul>
</div>
<!--/fixed left area-->
  <!--scrollable right area-->
  <div class="right-area" style="position: relative; left: 21%; width: 80%; height: 84vh; ">
    <div class="right-navigation">
        <a href="chats.php"><i class="icon-home2 mr-2"></i> Home </a>
        <span >/Events</span> 
    </div>
    
   
         <!--Table-->
         <div class="content_table">


         <div class="writersummaryheading">
            <div class="summaryheading bg bg-info" > Events </div>
            <div class="summaryheading bg bg-info" data-toggle="modal" data-target="#newnotification" > New Event </div>
            </div>

        
        <table class="table" >
            <thead>
              <?php
              echo ' <tr>
                    
                    <th>EVENT ID</th>
                    
                    <th>DESCRIPTION</th>
                    <th>EVENT DATE</th>
                    <th>EVENT TIME</th>
                    
                    
                </tr>
              ';
              ?>
               
            </thead>
            <tbody>
            <?php
            include "../php/db.php";
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM events   ORDER BY date ";
            $result2 = $conn->query($sql);

            if ($result2->num_rows > 0){
            //echo $result;
            while ($rows = $result2->fetch_assoc()){
            ?>
            <tr>
            <td><a href="#" id ="manageevent" data-toggle="modal" data-target="#deleteevent" ><?php echo $rows['eventid'];?></a></td>
            <td><?php echo $rows['decsription'];?></td>
            <td><?php echo $rows['date'];?></td>
            <td><?php echo $rows['time'];?></td>
            
            </tr>
               <?php
            } 
          }
            ?>
            </tbody>
           
        </table>
    </div>
    <!--/Table-->

    
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
 
<!-- newevent-->
<div class="modal fade" id="newnotification" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="placebid" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg bg-info">
        <h6 class="modal-title" id="sendmessage">New Event</h6>
      </div>
      <div class="modal-body">
      <div class="message-subject">
              <label>Event Date:</label>
             <input type="date" id = "date" placeholder="yyyy-mm-dd" min = "2023-04-21" >
            </div> 

            <div class="message-subject">
              <label>Event Time:</label>
             <input type="time" id = "time"  >
            </div> 
      
          <div class="message-subject">
              <label>Description:</label>
              <textarea name="help" id="info" cols="60" rows="10" spellcheck="false" >Describe here...
</textarea>
            </div>  
        
      </div>
      <div class="modal-footer">
        <button type="button"  data-dismiss="modal" class="btn  btn-outline-danger">Cancel</button>
        <button  type="button" id="closesave" data-dismiss="modal" style="display: none;" ></button>
        <button type="button" id="save"  class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!--/newevent-->
<!-- dltevent-->
<div class="modal fade" id="deleteevent" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="placebid" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg bg-info">
        <h6 class="modal-title" id="sendmessage">Delete Event</h6>
      </div>
      <div class="modal-body">
      <div class="message-subject">
              <label>Delete Event ?</label>
           
            </div> 

        
      </div>
      <div class="modal-footer">
        <button type="button"  data-dismiss="modal" class="btn  btn-outline-danger">NO</button>
        <button  type="button" id="closedlt" data-dismiss="modal" style="display: none;" ></button>
        <button type="button" id="dltbutton"  class="btn btn-danger">DELETE</button>
      </div>
    </div>
  </div>
</div>
<!--/dltevent-->
<script>
const closeedit = document.getElementById("closesave");
const savechangesbutton = document.getElementById("save");
savechangesbutton.addEventListener("click", ()=>{ 

  const info = document.getElementById("info").value;
  const time = document.getElementById("time").value;
  const date = document.getElementById("date").value;

const id = document.getElementById("inputid").value;
var data = {
          id: id,
          info: info,
          date: date,
          time: time
        };
let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/addevents.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


xhr.send(JSON.stringify(data));
xhr.onload = function () {
  if(this.response == 1){
    closesave.click();
    console.log(this.response)
    $.bootstrapGrowl("Saved Successfully", // Messages
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
    setTimeout( ()=>{
                  window.location.href = "events.php";
                }, 1000
                  )


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
 
}
})

const manageevent = document.querySelectorAll("#manageevent");
manageevent.forEach((item)=>{
item.addEventListener("click", ()=>{
    window.todelete = item.textContent;

  })

const dltbutton = document.getElementById("dltbutton");
const closedlt = document.getElementById("closedlt");
dltbutton.addEventListener("click", ()=>{


let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/deleteevent.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


var data = {
  todelete: todelete
}
xhr.send(JSON.stringify(data));
xhr.onload = function () {

  if(this.response == 1){
    closedlt.click();
    console.log(this.response)
    $.bootstrapGrowl("Deleted Successfully", // Messages
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
    setTimeout( ()=>{
                  window.location.href = "events.php";
                }, 1000
                  )


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
}

})

  })





</script>
</body>
</html>