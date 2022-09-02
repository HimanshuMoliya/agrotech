<?php
require "db/db.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="stylesheet" href="navbar/css/workernav.css"> -->
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #222;
}

.container {
    max-width: 1440px;
    padding: 0 15px;
    margin: 0 auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

header {
    background: transparent;
    width: 100%;
    padding: 2px;
    transition: 0.6s;
    position: fixed;
}

header .row {
    justify-content: space-between;
    align-items: center;
    margin-left: 30px;
}

.logo_div {
    width: 100%;
    max-width: 70px;
}

.logo_div img {
    width: 100%;
}

.logo {
    color: white;
    text-decoration: none;
}

nav ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
}

nav ul li {
    margin: 0px 13px;
}

nav ul li a {
    color: white;
    ;
    text-decoration: none;
}

.nav_btn {
    display: none;
}

.nav_btn2 {
    display: none;
}

.slide nav {
    left: 0%;
}

nav {
    z-index: 99;
    transition: all 0.5s;
    left: -100%;
}

.profile_img {
    width: 100%;
    max-width: 50px;
    /* position: absolute;
right: 25px;
top: 15px; */
}

.profile_img img {
    width: 100%;
    border-radius: 50%;

}

.right_search {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    transition: 0.6s;
}

input.ip_1 {
    padding: 10px;
    border: 1px solid #b3b3b3;
    border-radius: 8px;
    background-color: white;
}

/* .ip_2 {
margin-right: 20px;
margin-left: 14px;
padding: 10px 25px 10px 25px;
border-radius: 25px;
border: none;
box-shadow: 2px 2px 10px grey;
} */

.button1 {
    color: white;
    font-weight: 400;
    font-size: 12px;
    padding: 11px 22px;
    text-transform: uppercase;
    border: 2px solid #3bd9d9;
    border-radius: 32px;
    transform: translate(0);
    overflow: hidden;
    cursor: pointer;
    margin-right: 20px;
    margin-left: 10px;
}

.button1::before {
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

.button1:hover::before {
    left: calc(100% + 32px);
    transition: 1.75s;
}

#search_btn {
    border: 1px solid rgb(134, 141, 134);
    background: #bac964;
    border-radius: 2rem;
    /* box-shadow: 2px 4px 3px 1px #b3cccc; */
}

.nav_section {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.main_nav {
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.6s;
}


i.fa-solid.fa-bars {
    font-size: 20px;
    color: black;
}

header.sticky {
    background: #282828;;
    z-index: 1;
}

@media(max-width: 992px) {
    .nav_btn {
        display: block;
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        position: absolute;
        right: 20px;
    }

    .nav_btn2 {
        display: block;
        background: none;
        border: none;
        color: white;
        position: absolute;
        right: 20px;
        font-size: 20px;
        top: 5px;
    }

    nav {
        position: fixed;
        background-color: black;
        width: 100%;
        top: 70px;
        left: -100%;
        text-align: center;
    }

    nav ul {
        flex-direction: column;
    }

    nav ul li {
        padding: 20px 0;
    }

    input.ip_1 {
        display: none;
    }

    #search_btn {
        display: none;
    }

    .profile_img {
        position: absolute;
        right: 85px;
    }

}

.img_1 {
    width: 100%;
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

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

footer{
/* position: fixed; */
/* background: #140B5C; */
width: 100%;
bottom: 0;
left: 0;
background-color: #000;
margin-top: 120px;
}

footer::before{
content: '';
position: absolute;
left: 0;
top: 100px;
width: 100%;
background: #AFAFB6;
}
footer .content{
max-width: 1250px;
margin: auto;
padding: 30px 40px 40px 40px;
}
footer .content .top{
display: flex;
align-items: center;
justify-content: space-between;
margin-bottom: 50px;
}
.content .top .logo-details{
color: #fff;
font-size: 30px;
}
.content .top .media-icons{
display: flex;
}
.content .top .media-icons a{
height: 40px;
width: 40px;
margin: 0 8px;
border-radius: 50%;
text-align: center;
line-height: 40px;
color: #fff;
font-size: 17px;
text-decoration: none;
transition: all 0.4s ease;
}
.top .media-icons a:nth-child(1){
background: #4267B2;
}
.top .media-icons a:nth-child(1):hover{
color: #4267B2;
background: #fff;
}
.top .media-icons a:nth-child(2){
background: #1DA1F2;
}
.top .media-icons a:nth-child(2):hover{
color: #1DA1F2;
background: #fff;
}
.top .media-icons a:nth-child(3){
background: #E1306C;
}
.top .media-icons a:nth-child(3):hover{
color: #E1306C;
background: #fff;
}
.top .media-icons a:nth-child(4){
background: #0077B5;
}
.top .media-icons a:nth-child(4):hover{
color: #0077B5;
background: #fff;
}
.top .media-icons a:nth-child(5){
background: #FF0000;
}
.top .media-icons a:nth-child(5):hover{
color: #FF0000;
background: #fff;
}
footer .content .link-boxes{
width: 100%;
display: flex;
justify-content: space-between;
}
footer .content .link-boxes .box{
width: calc(100% / 5 - 10px);
}
.content .link-boxes .box .link_name{
color: #fff;
font-size: 18px;
font-weight: 400;
margin-bottom: 10px;
position: relative;
}
.link-boxes .box .link_name::before{
content: '';
position: absolute;
left: 0;
bottom: -2px;
height: 2px;
width: 35px;
background: #fff;
}
.content .link-boxes .box li{
margin: 6px 0;
list-style: none;
}
.content .link-boxes .box li a{
color: #fff;
font-size: 14px;
font-weight: 400;
text-decoration: none;
opacity: 0.8;
transition: all 0.4s ease
}
.content .link-boxes .box li a:hover{
opacity: 1;
text-decoration: underline;
}
.content .link-boxes .input-box{
margin-right: 55px;
}
.link-boxes .input-box input{
height: 40px;
width: calc(100% + 55px);
outline: none;
border: 2px solid #AFAFB6;
background: green;
border-radius: 4px;
padding: 0 15px;
font-size: 15px;
color: #fff;
margin-top: 5px;
}
.link-boxes .input-box input::placeholder{
color: #AFAFB6;
font-size: 16px;
}
.link-boxes .input-box input[type="button"]{
background: #fff;
color: #140B5C;
border: none;
font-size: 18px;
font-weight: 500;
margin: 4px 0;
opacity: 0.8;
cursor: pointer;
transition: all 0.4s ease;
}
.input-box input[type="button"]:hover{
opacity: 1;
}
footer .bottom-details{
width: 100%;
}

@keyframes AnimateBG { 
0%{background-position:0% 50%}
50%{background-position:100% 50%}
100%{background-position:0% 50%}
}


footer .bottom-details .bottom_text{
max-width: 1250px;
margin: auto;
padding: 20px 40px;
display: flex;
justify-content: center;
}
.bottom-details .bottom_text span,
.bottom-details .bottom_text a{
font-size: 14px;
font-weight: 300;
color: #fff;
opacity: 0.8;
text-decoration: none;
}
.bottom-details .bottom_text a:hover{
opacity: 1;
text-decoration: underline;
}
.bottom-details .bottom_text a{
margin-right: 10px;
}
@media (max-width: 900px) {
footer .content .link-boxes{
flex-wrap: wrap;
}
footer .content .link-boxes .input-box{
width: 40%;
margin-top: 10px;
}
}
@media (max-width: 700px){
footer{
position: relative;
}
.content .top .logo-details{
font-size: 26px;
}
.content .top .media-icons a{
height: 35px;
width: 35px;
font-size: 14px;
line-height: 35px;
}
footer .content .link-boxes .box{
width: calc(100% / 3 - 10px);
}
footer .content .link-boxes .input-box{
width: 60%;
}
.bottom-details .bottom_text span,
.bottom-details .bottom_text a{
font-size: 12px;
}
}
@media (max-width: 520px){
footer::before{
top: 145px;
}
footer .content .top{
flex-direction: column;
}
.content .top .media-icons{
margin-top: 16px;
}
footer .content .link-boxes .box{
width: calc(100% / 2 - 10px);
}
footer .content .link-boxes .input-box{
width: 100%;
}
}

.footer_logo {
width: 100%;
max-width: 60px;
}

.footer_logo img{
width: 100%;
}

.logo-details{
display: flex;
justify-content: center;
align-items: center;
}

.logo_name{
margin-left: 5px;
}
</style>
</head>
<body>

    <header>
        <!-- <div class="container"> -->
        <div class="row">

            <div class="main_nav">
                <div class="logo_div">
                    <a href="#" class="logo"><img src="assets/css/img/homepage/logo.png" alt=""></a>
                </div>

                <button class="nav_btn"> <i class="fa-solid fa-bars"></i> </button>

                <div class="nav_section">
                    <nav>

                        <button class="nav_btn2"> <i class="fa-solid fa-xmark"></i> </button>
                        <ul>
                            <li><a href="index1.php">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                            <?php
                                if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
                            ?>
                                <li><a href="#">Login</a></li>
                                <?php
                            }else{
                                ?>
                                
                                <?php
                            }
                            ?>

                        </ul>
                    </nav>
                </div>
            </div>


            <div class="right_search">
                <input type="text" placeholder="Search" class="ip_1">

                <!-- <input type="submit" value="Search" placeholder="Search" class="ip_2"> -->

                <button type="submit" id="search_btn" class="button1">Search</button>

                
                <div class="profile_img">
                        <a href="myprofile1.php">
                            <?php
                            if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
                                ?>
                                <form action="login.php">
                            <button type="submit" id="search_btn" class="button1">Login</button>
                            </form>

                                <?php
                            }
                        elseif(!isset($userinfo['picture'])){
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
                    </div>          </div>

            </div>


        </div>

        </div>
        <!-- </div> -->
    </header>

    

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