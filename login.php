<?php
require "db/db.php";

require_once 'vendor/autoload.php';

require_once 'db/config.php';
$login = true;
$notv = false;
if(isset($_SESSION['user_token'])){
  // header("location: index.php");
  header("location: myprofile.php");

}else{
  $login = false;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$v_code = rand ( 1000 , 9999 );
// authenticate code from Google OAuth Flow




$invalid = false;
        if($_SERVER['REQUEST_METHOD'] = "post"){
            if(isset($_POST['submit'])){
                $email = $_POST['email1'];
                $pass = $_POST['password1'];

                $sql = "SELECT * FROM `register` WHERE `email` = '$email' AND `password` = '$pass'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);
                if(mysqli_num_rows($result) > 0 ){
                  if($row['verified']==1){
                
                  
                    echo '<div class="alert alert-success" role="alert">
                            Successfully Login.
                        </div>';
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['online'] = "true";
                    $_SESSION['id'] = $row['uid'];
                    // console.log($_SESSION['id']);
                    $_SESSION['verified'] = true;
                    setcookie('email',$email,time()+60*60*24*30);
                    header("location: worker.php");
                    // header("location: myprofile1.php");
                  
                
              }else{
                $notv = true;
              }
            }else{
                   
              $invalid = true;
              
              // header("location: login.php");
          }
                
                
                
            }
        }
    ?>

<?php

        if(isset($_POST['first_name'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $mail = $_POST['mail'];
            $phoneno = $_POST['phoneno'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
    
            $check = "SELECT * FROM `register` WHERE `email` = '$mail'";
            $result_check = mysqli_query($con,$check);
    
            $num_check = mysqli_num_rows($result_check);
            $row = mysqli_fetch_assoc($result_check);
            if($num_check > 0){
            $valid= true;
                
               
            }
            
            else{
            if($password == $confirm_password){
              
                $user_id = rand ( 1000 , 999999 ); 
                $insert = "INSERT INTO `register` ( `uid`,`occupation`, `first_name`, `last_name`, `email`, `phoneno`, `password`,`otp`,`verified`, `date`) VALUES ( $user_id,'farmer', '$first_name', '$last_name', '$mail', '$phoneno', '$password',$v_code,0, current_timestamp())";

                $fullname = $first_name . ' ' .$last_name;
                $sql = "INSERT INTO `user_profile` ( `picture`, `token`, `email`, `fullname`, `phoneno`, `address`, `gender`, `age`, `workhour`, `approxsalary`, `date`) VALUES ( NULL,NULL , '{$mail}', '{$fullname}', '{$phoneno}', NULL, NULL, NULL, NULL,NULL, CURRENT_TIMESTAMP);";
                // $insert_userprofile = "INSERT INTO `user_profile` (`id`, `email`, `fullname`, `profile_picture`, `about`, `birthdate`, `gender`, `city`, `mothertongue`, `hobbys`, `maritualstatus`, `ethencity`, `heighest_education`, `occupation`, `annual_income`, `height`, `weight`, `any_disability`, `my_habbits`, `verified`, `is_online`, `date`) VALUES ($user_id, '$mail', '$fullname', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, current_timestamp())";
                $_SESSION['email'] = $mail;
                $_SESSION['loggedin'] = true;
                $_SESSION['online'] = "true";
                $_SESSION['id'] = $row['uid'];

                $result_insert = mysqli_query($con,$insert);
                $result_user = mysqli_query($con,$sql);

                function sendMail($mail,$v_code) {
                  require("phpmailer/PHPMailer.php");
                  require("phpmailer/SMTP.php");
                  require("phpmailer/Exception.php");
              
                 $mail = new PHPMailer(true);
                  try {
                      $mail->isSMTP();                                            //Send using SMTP
                      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                      $mail->Username   = 'renishsuriya1441@gmail.com';                     //SMTP username
                      $mail->Password   = 'qjkptgghewmnwqdj';                               //SMTP password
                      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                  
                      //Recipients
                      $mail->setFrom('renishsuriya1441@gmail.com', 'Aggregate-Agro Notification');
              
                      $mail->addAddress($_POST['mail']);     //Add a recipient
              
              
                      //Content
                      $mail->isHTML(true);    //Set email format to HTML
                      
                      $mail->Subject = 'Aggregate-Agro: Verify your email';
                      $fname = $fullname;
                      $mail->Body    = "Dear $fname, <br>
              
                      <p>Your OTP for Contact details verification is $v_code.  This OTP is valid for 15 minutes.</p><br>
                      Please do not share OTP with anyone.<br>
                      <p>
                      This is a system generated e-mail and please do not reply. Add renishsuriya1441@gmail.com to your white list / safe sender list. Else, your mailbox filter or ISP (Internet Service Provider) may stop you from receiving e-mails.</p><br>
                      <br>
                      Regards,<br>
                      
                      Aggregate Agro team";
                  
                      $mail->send();
                      return true;
                  } catch (Exception $e) {
                      return false;
                  }
              }

              $result_mail = sendMail($_POST['mail'],$v_code);

              if($result_insert && $result_mail){
                header("location: verifyotp.php");
            }else{
                echo '<div class="alert alert-danger" role="alert">
                        server down
                    </div>';
            }

                // header("location: myprofile.php");
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Password Not match
                </div>
                <?php
            }
            }
        }
        

?>
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
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="login.php" method="post" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="assets/css/img/logo.png" alt="easyclass" />
                <h4>Aggregte Agro</h4>
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email" class="input-field" autocomplete="off" name="email1" required/>
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" autocomplete="off" name="password1" required/>
                  <label>Password</label>
                </div>
                <?php
                    if($invalid){
                        echo '<div class="alert alert-danger" role="alert">
                            Invalid Login Details!
                        </div>'; 
                    }
                    if($notv){
                      echo '<div class="alert alert-danger" role="alert">
                            Email Not verified
                        </div>'; 
                    }
                ?>

                <input type="submit" name="submit" value="Sign In" class="sign-btn" />
                <p style="margin-bottom: 1rem;text-align: center;">OR</p>
                    <?php
                    if($login == false){
                      echo "<a type='button' href='".$client->createAuthUrl()."' class='login-with-google-btn' style='text-decoration: none;'>
                      Sign in with Google
                    </a>";
                    }else{
                      echo "loggedin";
                    }
                    ?>
                

                <p class="text" style="margin-top: 1rem;">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="login.php" method="post" autocomplete="off" class="sign-up-form">
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
