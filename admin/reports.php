<?php
session_start();
if (!isset($_SESSION['id'])){
header('location: adminlogin.php');
}?>
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
            
        }
        ?>
        </div>
    </div>
    <ul class="navigation " >

        <li class="navigation-item active"><a href="reports.php" class="navigation-link" >Reports &nbsp; &nbsp;</a></li>

        <li class="navigation-item"><a href="events.php"class="navigation-link" >Events Management&nbsp; </a></li>

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
        <a href="reports.php"><i class="icon-home2 mr-2"></i> Home </a>
        <span >/Reports</span> 
    </div>
    <div>
<!--top area-->
<br>
<h1 >Total Users</h1> 
<div id="totals" >
         
        <div class="staff  container" >
            <div class="header">STAFF</div> <br>
            <div class=" amount"> <?php 
             $sql2 = "SELECT * FROM staff  ";
             $result2 = $conn->query($sql2);
             echo $result2->num_rows;
            ?> </div>
        </div>
        <div class="medics container" >
            <div class="header">Medics</div>
            <div class=" amount"><?php 
             $sql2 = "SELECT * FROM medical  ";
             $result2 = $conn->query($sql2);
             echo $result2->num_rows;
            ?></div>
        </div>
        <div class="medics container" >
            <div class="header">Counselors</div>
            <div class=" amount"><?php 
             $sql2 = "SELECT * FROM gud  ";
             $result2 = $conn->query($sql2);
             echo $result2->num_rows;
            ?></div>
        </div>
        <div class="students container" >
            <div class="header">Students</div>
            <div class=" amount"><?php 
             $sql2 = "SELECT * FROM studentstable  ";
             $result2 = $conn->query($sql2);
             echo $result2->num_rows;
            ?></div>
        </div>
    </div>
    <!--top area-->
    <br>
    <br>
    <!--Frequent Users-->
    <h1 >Frequent Users</h1> 

    <div class="content-navigation" >
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-info active">
                  <input type="radio" name="options" id="option1" autocomplete="off" checked> Staff
                </label>
                <label class="btn btn-info">
                  <input type="radio" name="options" id="option2" autocomplete="off">Students
                </label>
                <label class="btn btn-info">
                  <input type="radio" name="options" id="option3" autocomplete="off"> Medics
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="options" id="option3" autocomplete="off"> Counselors
                  </label>
              </div>
        </div>
 <!--Table-->
 <div class="content_table">
        
        <table class="table" >
            <thead>
                <tr>
                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
    <!--/Table-->
     <!--Frequent Users-->


    </div>
   
    
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

//universal 


// \universal 

</script>
</body>
</html>