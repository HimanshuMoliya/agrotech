<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/css/img/logo.png">
    <title>Agrotech</title>
        <!-- FontAwesome Icons -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Google Fonts -->
      <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
        rel="stylesheet"
      />
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
      @media (max-width: 850px) {
        .box {
          height: 420px;
          max-width: 550px;
          overflow: auto;
          overflow-x: hidden;
        }
      }
      .login-with-google-btn {    text-align: center;
    display: inline-block;
    width: 100%;
    height: 43px;
    background-color: #151111;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 0.8rem;
    font-size: 0.8rem;
    margin-bottom: 1rem;
    transition: 0.3s;
    transition: background-color .3s, box-shadow .3s;
    padding: 12px 16px 12px 42px;
    border: none;
    border-radius: 3px;
    box-shadow: 0 -1px 0 rgb(0 0 0 / 4%), 0 1px 1px rgb(0 0 0 / 25%);
    color: #757575;
    font-size: 14px;
    font-weight: 500;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
    background-color: white;
    background-repeat: no-repeat;
    background-position: 12px 11px;
      }
  &:hover {
    box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
  }
  
  &:active {
    background-color: #eeeeee;
  }
  
  &:focus {
    outline: none;
    box-shadow: 
      0 -1px 0 rgba(0, 0, 0, .04),
      0 2px 4px rgba(0, 0, 0, .25),
      0 0 0 3px #c8dafc;
  }
  



      </style>
  </head>
  <body>
<?php
    require "db/db.php";
    session_start();
    if(!isset($_SESSION['email'])){
        header("location: login.php");
        // die();
      }else{
    if(isset($_POST['otp'])){
        $email = $_SESSION['email'];
        $v_code = $_POST['otp'];

        $sql = "SELECT * FROM `register` WHERE `email` = '$email'";
        $result = mysqli_query($con,$sql);

        $row = mysqli_fetch_assoc($result);
        if($row > 0){
            if($row['otp'] == $v_code){
                $update = "UPDATE `register` SET `verified` = '1' WHERE `register`.`email` = '$email'";
                $result_update = mysqli_query($con,$update);
                header("location: worker.php");
            }else{
                echo '<div class="alert alert-danger" role="alert">
                        Invalid verification code
                    </div>';
            }
            
        }else{
            echo '<div>Email not available </div>';
        }
    }
}
?>

    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="verifyotp.php" method="post" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="assets/css/img/logo.png" alt="easyclass" />
                <h4>Aggregte Agro</h4>
              </div>

              <div class="heading">
                <h3 style="text-align: center;">Verify otp</h3>
                <!-- <h6>Not registred yet?</h6> -->
                <!-- <a href="#" class="toggle">Sign up</a> -->
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="number" class="input-field" autocomplete="off" name="otp" required/>
                  <label>Otp</label>
                </div>

                

                <input type="submit" name="submit" value="Verify" class="sign-btn" />
                
                

                <p class="text" style="margin-top: 1rem;">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="verifyotp.php" method="post" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="assets/css/img/logo.png" alt="easyclass" />
                <h4>Aggregte Agro</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="text" minlength="4" class="input-field" autocomplete="off" name="first_name" required />
                  <label>First Name</label>
                </div>

                <div class="input-wrap">
                  <input type="text" minlength="4" class="input-field" autocomplete="off" name="last_name" required />
                  <label>Last Name</label>
                </div>

                <div class="input-wrap">
                  <input type="email" class="input-field" autocomplete="off" name="mail" required />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="number" class="input-field" autocomplete="off" name="phoneno" required />
                  <label>Mobile No</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" autocomplete="off" name="password" required />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" autocomplete="off" name="confirm_password" required />
                  <label>Confirm Password</label>
                </div>



                <input type="submit" name="submit1" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <!-- <div class="wrapper"> -->
              <div class="count_1">
              <div class="container">
                <!-- <i class="fa-solid fa-w"></i> -->
                <span class="num" data-val="400">000</span>
                <span class="text">Worker</span>
              </div>
        
              <div class="container">
                <!-- <i class="fa-solid fa-f"></i> -->
                <span class="num" data-val="340">000</span>
                <span class="text">Farmer</span>
              </div>

            </div>
        
              <div class="count_1">          
                    <div class="container">
                      <!-- <i class="fa-solid fa-s"></i> -->
                <span class="num" data-val="225">000</span>
                <span class="text">Seller</span>
              </div>
        
              <div class="container">
                <!-- <i class="fa-solid fa-y"></i> -->
                <span class="num" data-val="280">000</span>
                <span class="text">Yard</span>
              </div>
            </div>
          <!-- </div> -->

          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="assets/js/script.js"></script>
  </body>
</html>