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
    <link rel="stylesheet" type="text/css" href="../css/styles2.css" />
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

<li class="navigation-item"><a href="events.php"class="navigation-link" >Events Management&nbsp; </a></li>

<li class="navigation-item"><a href="notifications.php"class="navigation-link" >Notification Management&nbsp; </a></li>


<li class="navigation-item active"><a href="user.php"class="navigation-link" >User Management&nbsp; </a></li>

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
        <span >/Users</span> 
    </div>
    
   <div class = "usersheader" >

   <label for="users">Register:</label>
   <select name="usersoptions" id="usersoptions">
<option value="student">Student</option>
<option value="staff">Staff</option>
<option value="medic">Medic</option>
<option value="gud">Counselor</option>

   </select>

   </div>
   <!--student registration-->
   <div class = "registration" id = "student" >
    <form >
   <div>
      <label for="regno">Registration Number:</label>
      <input type="text" id = "regno" placeholder = "ie. reg no, staffno" required >
    </div>
    <div>
      <label for="name">Name:</label>
      <input type="text" id = "name" placeholder = "name" required >
    </div>
    <div>
      <label for="dofbirth">Date of Birth:</label>
      <input type="date" id = "dofbirth" placeholder = "Date of Birth" required >
    </div>
    <div>
      <label for="gender">Gender:</label>
      <select name="gender" id="gender">
          <option value="1">Male</option>
          <option value="0">Female</option>
   </select>
    </div>
    
    <div>
      <label for="email">Email:</label>
      <input type="email" id = "email" placeholder = "email" required >
    </div>
    <div>
      <label for="phone">Phone Number:</label>
      <input type="number" id = "phone" placeholder = "phone" required >
    </div>
    <div id = "faculty" >
      <label for="faculty">Faculty:</label>
      <select name="facultyvalue" id="facultyvalue">
          <option value="S12">Agriculture</option>
          <option value="S13">Computer Science</option>
       </select>
     
    </div>
    <div id = "staffrolecontainer" style= "display: none;" >
    <label for="faculty">Staff role:</label>
    <select name="staffrole" id="staffrole">
          <option value="lecturer">lecturer</option>
          <option value="Computer lab Technician">Computer lab Technician</option>
          <option value="Pysics lab Technician">Pysics lab Technician</option>
          <option value="Chemestry lab Technician">Chemestry lab Technician</option>
          <option value="Biology lab Technician">Biology lab Technician</option>
          <option value="Library Attendant">Library Attendant</option>
       </select>
    </div>
    
<div>
  <button class="bg bg-info" type = "submit" id = "submit" >REGISTER</button>
</div>
</form>
   </div>
   <!--student registration-->
      
      <!--ban user-->
      <br><br>
      <h2>Ban User</h2>
      <div class = "usersheader" >
        
<label for="banoptions">Ban:</label>
<select name="banoptions" id="banoptions">
<option value="student">Student</option>
<option value="staff">Staff</option>
<option value="medic">Medic</option>
<option value="gud">Counselor</option>

</select>

</div>
      <div class = "registration"  >
   <div>
      <label for="banregno">Enter Indentification Number:</label>
      <input type="text" id = "banregno" placeholder = "identification number" required > <input id = "continue" type="submit" style = "width: 70px; height: 40px; margin-left: 50px;" value = "continue" >
    </div>
   <div id = "banuserdetails" >

   </div>

</form>
   </div>
   <!--ban user-->

    
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
  
 


<script>
const ucontinue = document.getElementById("continue");
ucontinue.addEventListener("click", ()=>{
 
  const banoptions = document.getElementById("banoptions").value;
  const banregno = document.getElementById("banregno").value;

  var data1 = {
          id: banregno,
          toget: banoptions
        };
let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/getuserinfo.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
xhr.send(JSON.stringify(data1));
xhr.onload = function () {
console.log(this.response)
if(this.response != ""){
  var obj = this.response;
  var datat = JSON.parse(obj);
  
  var gender;
  if(datat[0].gender == 1){
    gender = "male";
  }else{
    gender = "female";
  }
  
  document.getElementById("banuserdetails").innerHTML = "<b>id:</b>  "+datat[0].id + " <br> <b>name:</b>  "+datat[0].name+
  " <br><b>email:</b>   "+datat[0].email+" <br> <b>phone:</b>   "+datat[0].phone+" <br> <b>gender: </b>  "+gender+"<br><div> <button class=\"bg bg-info\" type = \"submit\" id = \"banuserbutton\" >Ban User</button></div>";
 
const banuserbutton = document.getElementById("banuserbutton");
banuserbutton.addEventListener("click", ()=>{
  console.log("clicked")
  var banoptions = document.getElementById("banoptions").value;
  var banregno = document.getElementById("banregno").value;

  var data2 = {
          id: banregno,
          toget: banoptions
        };

let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/updateban.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
xhr.send(JSON.stringify(data2));
xhr.onload = function () {

console.log(this.response)

}




})




}else{
  document.getElementById("banuserdetails").innerHTML = `<div class="noresultcontainer" >
      <div><img src="../noresult.jfif" alt=""></div>
      <div class="noresulttext" style = "color: red;" >Sorry No Result</div>
 </div>
`;

}


}
})




//\banuser
const usersoptions = document.getElementById("usersoptions");
const staffrolecontainer = document.getElementById("staffrolecontainer");
usersoptions.addEventListener("click", ()=>{

const faculty = document.getElementById("faculty");
if(document.getElementById("usersoptions").value == "student"){

  faculty.style.display = "block";

} else{
  faculty.style.display = "none";
}
if(document.getElementById("usersoptions").value == "staff"){

  staffrolecontainer.style.display = "block";

} else{
  staffrolecontainer.style.display = "none";
}

})

const submit = document.getElementById("submit");
submit.addEventListener("click", (e)=>{
submit.disabled = true;
const adminid = document.getElementById("inputid").value;
const  regno = document.getElementById("regno").value;
const  name = document.getElementById("name").value;
const  email = document.getElementById("email").value;
const  dofbirth = document.getElementById("dofbirth").value;
const  gender = document.getElementById("gender").value;
const facultyvalue  = document.getElementById("facultyvalue").value;
const phone = document.getElementById("phone").value;
const staffrole= document.getElementById("staffrole").value;
var mailformat = /^([A-Za-z0-9_\-\.])+\@(@[A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

if(!regno || !name || !email || !phone || !dofbirth ){
  submit.disabled = false;
  $.bootstrapGrowl("Please fill out all the fields", // Messages
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
}else{

if (phone.toString().length != 10){
  submit.disabled = false;
  $.bootstrapGrowl("Phone number must contain 10 characterss", // Messages
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
}else{
  const regvalue = document.getElementById("usersoptions").value;
  var data = {
    adminid:  adminid,
          register: regvalue,
          regno: regno,
          name: name,
          email: email,
          dofbirth: dofbirth,
          gender: gender,
          facultyvalue: facultyvalue,
          staffrole: staffrole,
          phone: document.getElementById("phone").value
        };
let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/register.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


xhr.send(JSON.stringify(data));
xhr.onload = function () {
  submit.disabled = false;
  console.log(this.response)
  if(this.response == 1){
    
    submit.disabled = false;
    $.bootstrapGrowl("Registerd Successfully", // Messages
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

setTimeout(()=>{
  window.location.reload()
},2000);



  }else{
    submit.disabled = true;
    $.bootstrapGrowl("Error has occurerd or user is already registered!!", // Messages
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

}
}
})




</script>
</body>
</html>