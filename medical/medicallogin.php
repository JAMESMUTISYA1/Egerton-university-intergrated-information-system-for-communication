
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/fontlink.css" />
    <link rel="stylesheet" type="text/css" href="../css/fonts.css" />
  
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js" integrity="sha512-pBoUgBw+mK85IYWlMTSeBQ0Djx3u23anXFNQfBiIm2D8MbVT9lr+IxUccP8AMMQ6LCvgnlhUCK3ZCThaBCr8Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   
</head>
<body>

    <!--header-->
<div class="nav-bar">
    <div class="perfectwriters" ><label class="logo"> Egerton  University</label> </div>
    <div class="offlinee"> not logged in </div>
</div>
<!--/header-->
<!--login area-->
<div class="login-area" id="login-area">
    <div class="center">
        <h1>  Medic Login</h1>
        <form name="form" method="post" >
            <div class="text-field">
                <input type="text" id="email" required>
                <span></span>
                <label >Medical number</label>
            </div>
            <div class="text-field">
                <input type="password" id="password" required>
                <span></span>
                <label >Password</label>
            </div>
            <div class="pass">
                <a href="forgotpass.php" class="pass-a">Forgot Password? </a>
            </div>
            <input type="submit" class="input"  id="login" value="Login" >
        </form>

    </div>
</div>
<!--/login area-->
<!--footer-->
<div class="footer">
    <p style="color: white;" >
        &copy;  2023 &nbsp;  &nbsp;   &nbsp;  developed by Group 1
    </p>
</div>
<!--/footer-->

<script>
    const login = document.getElementById("login");


    login.addEventListener("click", (e) => {
      e.preventDefault();
      var email = document.forms["form"]["email"];
      var password = document.forms["form"]["password"];
      email = email.value;
      password = password.value;
      var data = {
        toget:  "medic",
        id: email,
        password: password
      };

      function validate(data) {
          return true;
        }
      if (validate(email)) {
      
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/login.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(JSON.stringify(data));
        
        xhr.onload = function () {
          
          if (this.response == 1) {
            document.cookie = "id="+email;
            $.bootstrapGrowl(
              "login successful.", // Messages
              {
                // options
                type: "success", // info, success, warning and danger
                ele: "body", // parent container
                offset: {
                  from: "top",
                  amount: 20,
                },
                align: "right", // right, left or center
                width: 250,
                delay: 2000,
                allow_dismiss: true, // add a close button to the message
                stackup_spacing: 10,
              }
            );
           //sessionstart
           let xhr = new XMLHttpRequest();
          xhr.open("POST", "../php/sessionstart.php", true);
          xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
          xhr.send(JSON.stringify(email));
          xhr.onload = function () {
            console.log( this.response);
          }

              //sessionstart
              setTimeout( ()=>{
                window.location.href = "chats.php";
              }, 1000
                )


          } else if (this.response == 0) {
            $.bootstrapGrowl(
              "Sorry! Wrong Id or Password!!", // Messages
              {
                // options
                type: "danger", // info, success, warning and danger
                ele: "body", // parent container
                offset: {
                  from: "top",
                  amount: 20,
                },
                align: "right", // right, left or center
                width: 250,
                delay: 2000,
                allow_dismiss: true, // add a close button to the message
                stackup_spacing: 10,
              }
            );
          }
        };

        xhr.onerror = function () {
          // only triggers if the request couldn't be made at all
          $.bootstrapGrowl(
            "Error Please Try Again", // Messages
            {
              // options
              type: "danger", // info, success, warning and danger
              ele: "body", // parent container
              offset: {
                from: "top",
                amount: 20,
              },
              align: "right", // right, left or center
              width: 250,
              delay: 2000,
              allow_dismiss: true, // add a close button to the message
              stackup_spacing: 10,
            }
          );
        };
      } else {
        $.bootstrapGrowl(
          "Sorry! Wrong Id or Password", // Messages
          {
            // options
            type: "danger", // info, success, warning and danger
            ele: "body", // parent container
            offset: {
              from: "top",
              amount: 20,
            },
            align: "right", // right, left or center
            width: 250,
            delay: 2000,
            allow_dismiss: true, // add a close button to the message
            stackup_spacing: 10,
          }
        );
      }
    });
    
  
  </script>

</body>
</html>