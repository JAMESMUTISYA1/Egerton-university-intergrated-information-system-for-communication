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
    <link rel="stylesheet" href="../css/profile.css">
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
          $sql = "SELECT * FROM admin  WHERE admin_no = '$id' ";
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
        ?>
        </div>
    </div>
    <ul class="navigation " >

<li class="navigation-item"><a href="reports.php" class="navigation-link" >Reports &nbsp; &nbsp;</a></li>

<li class="navigation-item"><a href="events.php"class="navigation-link" >Events Management&nbsp; </a></li>

<li class="navigation-item"><a href="notifications.php"class="navigation-link" >Notification Management&nbsp; </a></li>


<li class="navigation-item"><a href="user.php"class="navigation-link" >User Management&nbsp; </a></li>

<li class="navigation-item"><a href="help.php" style="display: block;" class="navigation-link"><i class="icon-newspaper"></i> <span>Help Management</span></a></li>

<li class="navigation-item"><a href="backup.php"class="navigation-link" >Backup Management&nbsp; </a></li>


<li class="navigation-item active"><a href="profile.php" style="display: block;" class="navigation-link"><i class="icon-user"></i> <span>Profile</span></a></li>

</ul>
  </div>
  <!--/fixed left area-->
    <div class="right-area" style="position: relative; left: 21%; width: 80%; height: 84vh; ">
        <div class="right-navigation">
            <a href="chats.html"><i class="icon-home2 mr-2"></i> Home </a>
            <span > /Profile </span> 
        </div>
        <div class="profilearea">
            <div class="profilename">
                <h2>
                <?php     
              echo $row['name'];
          
        ?>
                </h2> 
                
            </div>
            <div class="profileid">
                <h2>
                <?php     
              echo $row['email'];
        }
        ?>

                </h2>
            </div>
        </div>
        <div class="writersummary">
            <div class="writersummaryheading">
            <div class="summaryheading bg bg-info" > Profile </div>
            <div class="summaryheading bg bg-info" data-toggle="modal" data-target="#editprofile" > Edit Profile </div>
            </div>
           
            <ul class="userlist">
                <li class="userli">
                    <li class="userli"><span>User ID</span><span class="writetvalue" style="background-color: blue;">
                    <?php
                    echo $_SESSION['id'];
                    ?>
                  </span>
                  </li>
                    <li class="userli"><span>Gender</span><span class="writetvalue" style="background-color: rgb(212, 121, 16);" >
                  
                    <?php
          include "../php/db.php";
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM admin  WHERE admin_no = '$id' ";
          $result = $conn->query($sql);
          //echo $result;
          while ($row = $result->fetch_assoc()){
                
              if($row['gender'] == 1 ){
                
                echo "Male";
        
              }else{
                echo "Female";
              }
        
        ?>
                  
                  </span></li>
                  <li class="userli"><span>Name</span><span class="writetvalue" style="background-color: rgb(144, 192, 10);" >
                    <?php echo $row['name']; ?>
                  </span></li>
                    <li class="userli"><span>Phone Number</span><span class="writetvalue" style="background-color: rgb(144, 192, 10);" >
                    <?php echo $row['phone']; ?>
                  </span></li>
                    
                
                
            </ul>
            <div class="writersummaryheading">

<button id="passwordbutton"class="summaryheading bg bg-info" data-toggle="modal" data-target="#changepassword" >Change Password</button>    

</div>

        </div>
    </div>

  </div>
</div>

<!--footer-->
<div class="footer">
    <p>
        &copy;  2023  PerfectWriters  developed by James Mutisya
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
 
  <!-- edit profile -->
 <div class="modal fade" id="editprofile" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg bg-primary">
        <h6 class="modal-title " id="staticBackdropLabel">Edit Profile</h6>
      </div>
      <div class="modal-body">
        <!---->
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-10 offset-md-1">
                <form id="profileupdate">       
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Name:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="name" value="<?php
          include "../php/db.php";
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM admin  WHERE admin_no = '$id' ";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()){
            echo $row['name'];
        
        ?>" >
                    <span class="text-danger" id="fname_error"></span> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Phone:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="phonenumber" value="<?php  echo $row['phone'];?>" >
                    <span class="text-danger" id="phone_error"></span>  
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Email:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="email" value="<?php echo $row['email']; }}?>" >
                    <span class="text-danger" id="phone_error"></span>  
                    </div>
                  </div>
  
                   
                  


                </form>
              </div>
            </div>
          </div>
        </div>


        <!---->
      </div>
      <div class="modal-footer">
        <button type="button"  data-dismiss="modal" class="btn  btn-outline-danger">Cancel</button>
        <button onclick="editprofilegrowl()" type="button" id="closechanges" data-dismiss="modal" style="display: none;" ></button>
        <button type="button" id="savechangesbutton"  class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>
<!--/editprofile-->
<!-- Change password-->
<div class="modal fade" id="changepassword" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="placebid" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg bg-info">
        <h6 class="modal-title" id="sendmessage">Change Password</h6>
      </div>
      <div class="modal-body">
      
          <div class="message-subject">
              <label>New Password:</label>
              <input type="password" id="password1" name="subject"  class="form-control" required>
            </div>
            <div class="message-subject">
              <label>Cornfirm New Password:</label>
              <input type="password" id="password2" name="subject"  class="form-control" required >
            </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button"  data-dismiss="modal" class="btn  btn-outline-danger">Cancel</button>
        <button  type="button" id="closechangepassword" data-dismiss="modal" style="display: none;" ></button>
        <button type="button" id="changepasswordbutton"  class="btn btn-primary">Change Password</button>
      </div>
    </div>
  </div>
</div>
<!--/change password-->
  <script>

 

const closeedit = document.getElementById("closechanges");
const savechangesbutton = document.getElementById("savechangesbutton");
savechangesbutton.addEventListener("click", ()=>{



const name = document.getElementById("name").value;
const email = document.getElementById("email").value;
const phone = document.getElementById("phonenumber").value;

const id = document.getElementById("inputid").value;
var data = {
          toget:  "admin",
          id: id,
          email: email,
          name: name,
          phone: phone
        };

let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/editprofile.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


xhr.send(JSON.stringify(data));
xhr.onload = function () {
console.log(this.response)
 
  if(this.response == 1){
    closeedit.click();
 console.log(this.response);
    setTimeout( ()=>{
                  window.location.href = "profile.php";
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

function editprofilegrowl(){
  $.bootstrapGrowl("Changes Made Succesfully", // Messages
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
}

//paswordchange

const changepasswordbutton = document.getElementById("changepasswordbutton");
const closechangepassword = document.getElementById("closechangepassword");

changepasswordbutton.addEventListener("click", ()=>{ 

const password1 = document.getElementById("password1").value;
const password2 = document.getElementById("password2").value;

if (password1 == password2){
  const id = document.getElementById("inputid").value;
  var data = {
          toget:  "admin",
          id: id,
          password: password1
        };

        let xhr = new XMLHttpRequest();
xhr.open("POST", "../php/editpassword.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


xhr.send(JSON.stringify(data));
xhr.onload = function () {
  $.bootstrapGrowl("Password Changed Succesfully", // Messages
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
closechangepassword.click();

}

}else{
  $.bootstrapGrowl("ERROR!! Password Mismatch", // Messages
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
closechangepassword.click();
}


})







//\password


</script>
</body>
</html>