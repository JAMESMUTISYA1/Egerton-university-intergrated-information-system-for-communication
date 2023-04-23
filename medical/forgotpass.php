<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password recovery</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../css/fontlink.css" />
    <link rel="stylesheet" type="text/css" href="../css/fonts.css" />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"
      integrity="sha512-pBoUgBw+mK85IYWlMTSeBQ0Djx3u23anXFNQfBiIm2D8MbVT9lr+IxUccP8AMMQ6LCvgnlhUCK3ZCThaBCr8Ng=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </head>
  <body>
    <!--header-->
    <div class="nav-bar">
      <div class="perfectwriters">
        <label class="logo"> Egerton University</label>
      </div>
      <div class="offlinee">offline</div>
    </div>
    <!--/header-->
    <!--login area-->
    <div class="login-area" id="login-area">
      <div class="center">
        <h1>Forgot your Password ?</h1>
        <form name="form" method="post">
          <div class="text-field">
            <input type="text" id="email" required />
            <span></span>
            <label>Enter your Your Id </label>
          </div>

          <input
            type="submit"
            class="input"
            id="login"
            value="Recover password"
          />
        </form>
      </div>
    </div>
    <!--/login area-->
    <!--footer-->
    <div class="footer">
      <p style="color: white">
        &copy; 2023 &nbsp; &nbsp; &nbsp; developed by Group 1
      </p>
    </div>
    <!--/footer-->

    <script>
      const login = document.getElementById("login");
      login.addEventListener("click", (e) => {
        e.preventDefault();
        var email = document.forms["form"]["email"];
        email = email.value;
        var data = {
          toget:  "medic",
          id: email
        };
        console.log(data)

        function validate(data) {
            return true;
          }
        }
        if (validate(email)) {
          let xhr = new XMLHttpRequest();
          xhr.open("POST", "../php/forgotpass.php", true);
          xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
          xhr.send(JSON.stringify(data));
          xhr.onload = function () {
            console.log(this.response);
            if (this.response == 1) {

              
              $.bootstrapGrowl(
                "Password Sent successfully.", // Messages
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
            } else if (this.response == 0) {
              $.bootstrapGrowl(
                "Sorry! Email does not exist!!", // Messages
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
            "Enter a valid email ", // Messages
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
