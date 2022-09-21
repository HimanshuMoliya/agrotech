<?php
// echo "hello";
require "db/db.php";
// $loggedin = true;

// if(!isset($_SESSION['email'])){
//     $loggedin = false;
//     header("location: login.php");
// }else{
//     $loggedin = true;
//     $online = $_SESSION['online'];
//     $email = $_SESSION['email'];
//     $id = $_SESSION['id'];
    
   
// }
require_once 'db/config.php';
if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
    // header("location: login.php");
    // die();
  }else{
if(isset($_SESSION['user_token'])){

$sql = "SELECT * FROM user_profile WHERE token = '{$_SESSION['user_token']}'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0){
    $userinfo = mysqli_fetch_assoc($result);
    
 }
}
else{
    $sql = "SELECT * FROM user_profile WHERE email = '{$_SESSION['email']}' ";
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
    <link rel="icon" type="image/x-icon" href="assets/css/img/logo.png">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="workernav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="lamp/lamp.css">


    <style>
        #preloader  {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 50px;
    height: 50px;
    margin: -30px 0 0 -30px;
 }
#status {
    position: fixed;
    z-index: 999999;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: block;
    background: #fff;
    background-image: url(assets/css/img/pre-loader-1.gif);
    background-repeat: no-repeat;
    background-position: center;
}

section.sec_1 {
            margin-top: 120px;
            background-color: #222;
        }
       
        .h1_1 {
            font-size: 36px;
            text-align: center;
            color: white;

        }

        .made_for .row {
            margin-top: 70px;
            justify-content: center;
            align-items: center;
            display: flex;
            flex-wrap: wrap;
        }

        .wimg_1 {
            width: 100%;
            max-width: 450px;
            position: relative;
        }

        .wimg_1 img {
            width: 100%;
        }

        .wimg_2 {
            width: 100%;
            max-width: 450px;
            position: relative;
            margin-left: 20px;
        }

        .wimg_2 img {
            width: 100%;
        }


        .wimg_3 {
            width: 100%;
            max-width: 450px;
            position: relative;
            margin-left: 20px;
        }

        .wimg_3 img {
            width: 100%;
        }

        .wimg1_title {
            position: absolute;
            width: 100%;
            height: 99%;
            background: rgba(0, 0, 0, 0.6);
            top: 0;
            left: 0;
            color: white;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            letter-spacing: 2px;
            opacity: 0;
            transition: 0.6s;
        }

        .wimg1_title:hover {
            opacity: 1;
        }

        section.sec_2 {
            margin-top: 120px;
            background-color: #222;
        }

        .h1_2 {
            font-size: 23px;
            text-align: center;
            color: white;

        }

        @media (max-width:992px) {
            .wimg_2 {
                margin-left: 0px;
                margin-top: 10px;
            }

            .wimg_3 {
                margin-left: 0px;
                margin-top: 10px;
            }
        }

        @media (max-width: 1410px) {
            .wimg_3 {
                margin-top: 10px;
            }
        }

        .winfo_img {
            width: 100%;
            max-width: 700px;
        }

        .winfo_img img {
            width: 100%;
        }

        .winfo_img2 {
            width: 100%;
            max-width: 700px;
            margin-left: 46px;
        }

        .winfo_img2 img {
            width: 100%;
        }

        .worker_info {
            display: flex;
            flex-wrap: wrap;
            margin-top: 80px;
        }

        .winfo_title {
            width: 660px;
            margin-left: 46px;
        }

        .winfo_title2 {
            width: 660px;
        }

        .winfo_title p {
            font-size: 17px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            line-height: 30px;
        }

        .winfo_title2 p {
            font-size: 17px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            line-height: 30px;
        }

        .winfo_title p {
            color: rgba(255, 255, 255, 0.3);
        }

        .winfo_title2 p {
            color: rgba(255, 255, 255, 0.3);
        }


        .winfo_btn {
            margin-top: 40px;
        }

        button.winfo_btn1 {
            padding: 10px 25px 10px 25px;
            font-size: 14px;
            background-color: #bac964;
            color: white;
            border: none;
            border-radius: 6px;
            position: relative;
            transform: translate(0);
            overflow: hidden;
            cursor: pointer;
        }

        .winfo_btn1::before {
            content: "";
            position: absolute;
            background: white;
            width: 8px;
            top: 0;
            bottom: 0;
            left: -32px;
            transform: rotate(-16deg);
            filter: blur(6px);
        }

        .winfo_btn1:hover::before {
            left: calc(100% + 32px);
            transition: 1.75s;
        }

        @media (max-width:992px){
            .winfo_title {
            margin-left: 0px;
        }

        .winfo_img2 {
            margin-left: 0px;
            margin-top: 20px;
        }
        }
        
    </style>
    <title>Aggregate Agro</title>
</head>
<body>
    <header>
        
        <div class="row">

            <div class="main_nav">
                <div class="logo_div">
                    <a href="#" class="logo"><img src="assets/img/logo.png" alt=""></a>
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
                <!-- <input type="text" placeholder="Search" class="ip_1"> -->

               

                <a type="submit" style="text-decoration: none;" id="search_btn" href="login.php" class="button1">Login</a>

                

            </div>


        </div>

        </div>
    </header> 


<div>
        <img src="assets/css/img/homepage/Scene-20.jpg" alt="Aggregate Agro" class="img_1">
    </div>

    <section class="sec_1">
        <div class="container">
            <h1 class="h1_1">Our Website Made For</h1>


            <div class="made_for">
                <div class="row">

                    <div class="wimg_1">
                        <img src="assets/css/img/homepage/worker.jpeg" alt="Aggregate Agro">
                        <div class="wimg1_title">
                            Worker
                        </div>

                    </div>

                    <div class="wimg_2">
                        <img src="assets/css/img/homepage/farmer.jpg" alt="Aggregate Agro">
                        <div class="wimg1_title">
                            Farmer
                        </div>

                    </div>

                    <div class="wimg_3">
                        <img src="assets/css/img/homepage/seller.jpg" alt="Aggregate Agro">
                        <div class="wimg1_title">
                            Seller
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="sec_2">
        <div class="container">
            <div class="h1_2">
                <h1>Worker's Role</h1>
            </div>

            <div class="worker_info">

                <div class="winfo_img">
                    <img src="assets/css/img/homepage/worker2.jpg" alt="Aggregate Agro">
                </div>

                <div class="winfo_title">

                    <p>
                        Agricultural workers maintain crops and tend to livestock. They perform physical labor and operate machinery under the supervision of farmers, ranchers, and other agricultural managers.
                        <br><br>
                        Agriculture labourer can be defined as the involvement of any person in connection with cultivating the soil, or in connection with raising or harvesting any agricultural or horticultural commodity, management of livestock, bees, poultry etc.
                        <br><br>
                       in our website, Worker can find their job as per their requirement and they can also send the request for
                        their appropriate work to the farmer.

                        They can accept the job request which are send by farmer.

                        For more information they can communicate with farmer.

                        They can also edit their profile.
                    </p>

                    <div class="winfo_btn">

                        <button class="winfo_btn1">For More Info</button>

                    </div>

                </div>


            </div>
        </div>
    </section>

    <section class="sec_2">
        <div class="container">
            <div class="h1_2">
                <h1>Farmer's Role</h1>
            </div>

            <div class="worker_info">

                <div class="winfo_title2">

                    <p>
                        A farmer is a person engaged in agriculture, raising living organisms for food or raw materials.
                        in other words definitions a farmer was a person who promotes or improves the growth of plants, land or crops or raises animals (as livestock or fish) by labor and attention.
                        <br><br>
                        Over half a billion farmers are smallholders, most of whom are in developing countries, and who economically support almost two billion people
                        <br><br>
                        in our website, Farmer can Hire worker as per their requirement.
                        Which crop when to grow.
                        Edit profile.
                        If crops get infected then farmer can track reasons of infection and get diagnosis of that
                        infection.
                        sell crops online.
                        Buy equipment's from seller.
                        Find details of seller of specific states.

                    </p>

                    <div class="winfo_btn">

                        <button class="winfo_btn1">For More Info</button>

                    </div>

                </div>
                <div class="winfo_img2">
                    <img src="assets/css/img/homepage/worker2.jpg" alt="Aggregate Agro">
                </div>

  

            </div>
        </div>
    </section>
                

    <section class="sec_2">
        <div class="container">
            <div class="h1_2">
                <h1>Seller's Role</h1>
            </div>

            <div class="worker_info">

                <div class="winfo_img">
                    <img src="assets/css/img/homepage/worker2.jpg" alt="Aggregate Agro">
                </div>

                <div class="winfo_title">

                    <p>
                        Agricultural marketing covers the services involved in moving an agricultural product from the farm to the consumer. These services involve the planning, organizing, directing and handling of agricultural produce in such a way as to satisfy farmers, intermediaries and consumers. Numerous interconnected activities are involved in doing this, such as planning production, growing and harvesting, grading, packing and packaging, transport, storage, agro- and food processing, provision of market information, distribution, advertising and sale.
                        <br><br>
                        Selling of any agricultural produce depends on couple of factors like the demand of the product at that time, availability of storage etc. The products may be sold directly in the market or it may be stored locally for the time being.
                        <br><br>
                        in our website, seller can Add and delete product.
                        Accept and deliver order.
                        Request to add product in a panel to the admin.
                        Edit their product.
                    </p>


                    <div class="winfo_btn">

                        <button class="winfo_btn1">For More Info</button>

                    </div>

                </div>


            </div>
        </div>
    </section>


<?php
    include "footer.php";
?>

<div id="preloader">
          <div id="status">&nbsp;</div>
        </div>
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load",function(){
            loader.style.display = "none";
        })
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $(".nav_btn").click(function () {
            $("header").toggleClass("slide");
        });
    });

    $(document).ready(function () {
        $(".nav_btn2").click(function () {
            $("header").toggleClass("slide");
        });
    });


</script>

<script type="text/javascript">

    window.addEventListener("scroll", function () {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })

</script>
</body>
</html>