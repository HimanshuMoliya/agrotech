<?php
require "db/db.php";
require_once 'db/config.php';
if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
    header("location: login.php");
    die();
  }else{
if(isset($_SESSION['user_token'])){

$sql = "SELECT * FROM user_profile WHERE token = '{$_SESSION['user_token']}'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0){
    $userinfo = mysqli_fetch_assoc($result);
    
 }
}
else{
    $sql = "SELECT * FROM register WHERE email = '{$_SESSION['email']}' ";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        $userinfo = mysqli_fetch_assoc($result);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar/css/workernav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>
    <header>
        <!-- <div class="container"> -->
            <div class="row">

                <div class="main_nav">
                <div class="logo_div">
                    <a href="#" class="logo"><img src="navbar/images/logo.png" alt=""></a>
                </div>

                <button class="nav_btn"> <i class="fa-solid fa-bars"></i> </button>

                <div class="nav_section">
                <nav>
                    
                <button class="nav_btn2"> <i class="fa-solid fa-xmark"></i> </button>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                
                    </ul>
                </nav>
            </div>
            </div>


                        <div class="right_search">
                            <input type="text" placeholder="Search" class="ip_1">

                            <!-- <input type="submit" value="Search" placeholder="Search" class="ip_2"> -->

                            <button  type="submit" id="search_btn">Search</button>
                        
                    <div class="profile_img">
                        <a href="myprofile1.php">
                    <?php
                if(!isset($userinfo['picture'])){
                    ?>
                <figure><img src="assets/css/img/person1.jpg" alt="profile" width="250px" height="50px"></figure>
                    <?php
                }else{
                    ?>
                    <figure><img src="<?php echo $userinfo['picture']; ?>" alt="profile" width="250px" height="50px"></figure>
                    
                    <?php
                }
                    ?>
                        <!-- <img src="navbar/images/person1.jpg" alt=""> -->
                        </a>
                    </div>
               
                </div>

               
            </div>

            </div>
        <!-- </div> -->
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".nav_btn").click(function(){
                $("header").toggleClass("slide");
            });
        });

        $(document).ready(function(){
            $(".nav_btn2").click(function(){
                $("header").toggleClass("slide");
            });
        });


    </script>
</body>
</html>