<?php
require "db/db.php";
require_once 'db/config.php';
if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
    header("location: index1.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="assets/css/img/logo.png">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            background-color: #f7fbff;
            width: 100%;
            padding: 2px;
            transition: 0.6s;
            position: fixed;
            top: 0;
            transition-timing-function: ease-in-out;
        }

        header.sticky {
            background: #fff0f0;
            z-index: 1;
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
            color: black;
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
            justify-content: center;
            align-items: center;
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

        button {
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

        button::before {
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

        button:hover::before {
            left: calc(100% + 32px);
            transition: 1.75s;
        }

        #search_btn {
            border: 1px solid rgb(134, 141, 134);
            background: blue;
            border-radius: 2rem;
            box-shadow: 2px 4px 3px 1px #b3cccc;
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
        }


        i.fa-solid.fa-bars {
            font-size: 20px;
            color: black;
        }

        @media(max-width: 992px) {
            .nav_btn {
                display: block;
                background: none;
                border: none;
                color: white;
                font-size: 20px;
                position: absolute;
                right: 0;
            }

            .nav_btn2 {
                display: block;
                background: none;
                border: none;
                color: black;
                position: absolute;
                right: 0;
                font-size: 20px;
            }

            nav {
                position: fixed;
                background-color: #f3f3f3;
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

        .sec1_filter {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 50px;
            border: none;
            background-color: white;
            border-radius: 10px;
            padding: 20px 10px 20px 0px;
            width: 100%;
            max-width: 700px;
            overflow: hidden;
        }

        input.filterip_1 {
            margin-top: 8px;
            padding: 10px 10px 10px 10px;
            border: none;
        }

        .sec_1 .container {
            background-image: url("assets/img/bg1.jpg");
            background-position: center;
            background-size: cover;
            border-radius: 40px;
        }

        .sec1_info {
            padding: 100px 0px 100px 100px;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }

        .sec1info_h1 {
            font-size: 25px;
            width: 100%;
        }

        .sec1info_p1 {
            margin-top: 35px;
            width: 100%;
        }

        .secinfo_p2 {
            margin-top: 20px;
            width: 100%;
        }

        section.sec_1 {
            margin-top: 100px;
        }

        .sec1_filter1 {
            margin-left: -20px;
        }

        hr#hr_1 {
            /* width: 0px; */
            background-color: gray;
            height: 60px;
        }

        .filter_btn {
            position: relative;
            left: 45px;
        }

        .filter_btn button {
            padding: 20px 30px 20px 30px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 10px;
        }

        @media (max-width: 800px) {
            .sec1_filter {
                display: flex;
                flex-direction: column;
            }

            hr#hr_1 {
                display: none;
            }

            .sec1_filter1 {
                margin-left: 0px;
            }

            .filter_btn {
                position: relative;
                left: 0px;
            }

            .sec1_info {
                padding: 50px;
            }

            section.sec_1 {
                margin-top: 70px;
            }

            .sec_1 .container {
                border-radius: 0px;
            }
        }

        @media (max-width: 350px) {
            .sec1_filter {
                padding-left: 30px;
            }

            .filter_btn {
                position: relative;
                left: -25px;
            }
        }

        /* section.sec_2 {
            margin-top: 200px;
        } */

        .sec_2 .container {
            /* border: 1px solid black; */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .sec2_info {
            width: 100%;
            max-width: 500px;
        }

        .sec2_h1 {
            width: 100%;
            font-size: 25px;
        }

        .sec2_p1 {
            margin-top: 30px;
            line-height: 26px;
            font-size: 17px;
        }

        .sec2_points {
            margin-top: 25px;
            line-height: 33px;
            font-size: 17px;
        }

        .sec2_btn1 button {
            margin-top: 50px;
            padding: 15px 25px 15px 25px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 10px;
        }

        .s2_img {
            width: 100%;
            max-width: 550px;
        }

        .s2_img img {
            width: 100%;
        }

        @media (max-width: 1079px) {
            .sec2_info {
                width: 100%;
                max-width: 428px;
            }
        }

        @media (max-width: 1000px) {
            .sec_2 .container {
                justify-content: center;
                align-items: center;
            }

            .s2_img {
                margin-top: 10px;
            }
        }

        @media (max-width: 550px) {

            section.sec_2 {
                margin-top: 50px;
            }

        }

        .bg_img1 {
            width: 100%;
            max-width: 490px;
        }

        img#train {
            width: 100%;
            position: relative;
        }

        #sec_3 {
            margin-top: 150px;
        }

        #sec_4 {
            margin-top: 150px;
        }

        .manual_icon {
            padding: 10px;
            /* border: 1px solid black; */
            border-radius: 100px;
            background-color: #dfdfdf;
            margin-top: 10px;
        }

        .job_dst {
            margin-left: 45px;
        }

        .sec_5 {
            margin-top: 175px;
        }

        .sec_5 .container {
            /* border: 1px solid black; */
            border-radius: 10PX;
            padding-left: 40px;
            background-color: #D6ECF4;
            padding: 10px;
            padding-bottom: 60px;
        }

        .sec5_info {
            margin-top: 60px;
        }

        .sec5_h1 {
            width: 100%;
            font-size: 25px;
            text-align: center;
        }

        .sec5_p1 {
            margin-top: 5px;
            color: #766b6b;
            font-size: 17px;
            text-align: center;
        }

        .user1_img {
            width: 100%;
            max-width: 60px;
        }

        .user1_img img {
            width: 100%;
            border-radius: 50%;
        }

        .user_rs {
            margin-top: 60px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 60px;
        }

        .review1 {
            /* border: 1px solid black; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 32px;
            width: 100%;
            max-width: 400px;
            height: 300px;
            overflow: hidden;
            background-color: white;
            border-radius: 10px;

        }

        .user_rp1 {
            margin-top: 25px;
            line-height: 23px;
        }

        .reviewer {
            margin-top: 25px;
        }

        section.sec_6 {
    margin-top: 60px;
}

.sec_6 .container {
    border: 1px solid black;
    padding: 20px;
    background-image: url(assets/img/bg2.jpg);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 45vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 32px;
}

.review_submit {
    text-align: center;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.sec6_h1 {
    margin-top: 60px;
    font-size: 25px;
    width: 100%;
    color: white;
}

.sec6_p1 {
    margin-top: 10px;
    font-size: 17px;
    color: #b7b7b7;
}

.review_ip {
    margin-top: 60px;
}

#rv_submit {
    padding: 20px 100px 20px 10px;
    width: 100%;
    max-width: 475px;
    border-radius: 10px;
}

.submit_review {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: baseline;
}

.submit_review button {
    padding: 22px 50px 22px 50px;
    border-radius: 10px;
    border: none;
    background-color: blue;
    font-size: 15px;
}

@media (max-width:992px){
    .submit_review button {
        margin-top: 10px
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
margin-top: 9px;
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

section.sec_7 {
    margin-top: 175px;
}

.sec2_btn1 {
    text-align: center;
}
    </style>
</head>

<body>
    <!-- <header>
        
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
                <input type="text" placeholder="Search" class="ip_1">

               

                <button type="submit" id="search_btn">Search</button>

                <div class="profile_img">
                    <img src="assets/img/person1.jpg" alt="">
                </div>

            </div>


        </div>

        </div>
    </header> -->
    <?php
    include "workernav.php";
    ?>

    <section class="sec_1">
        <div class="container">
            <div class="sec1_info">
                <div class="sec1info_h1">
                    <h1>Join us & Explore <br>
                        Thousands of Jobs</h1>
                </div>

                <div class="sec1info_p1">
                    <p> Find Jobs, Employment & Career Opportunities </p>
                </div>

                <div class="sec1_filter">
                    <div class="sec1_filter1">
                        <h3>What</h3>
                        <input type="text" placeholder="Job title, Keyword..." class="filterip_1"> <i
                            class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <hr id="hr_1">
                    <div class="sec1_filter2">
                        <h3>Where</h3>
                        <input type="text" placeholder="State, City..." class="filterip_1"> <i
                            class="fa-solid fa-location-dot"></i>
                    </div>

                    <div class="filter_btn">
                        <button>Find Jobs</button>

                    </div>
                </div>

                <div class="secinfo_p2">
                    <p>Popular Searches : &nbsp; Designer Developer Web IOS PHP Senior Engineer</p>
                </div>

            </div>
        </div>

    </section>

    <div class="bg_img1">
        <img id="train" src="assets/img/branch.png">
    </div>

    <section class="sec_2">
        <div class="container">
            <div class="sec2_info">
                <div class="sec2_h1">
                    <h1>Search for <br>
                        jobs</h1>
                </div>

                <div class="sec2_p1">
                    <p>To start searching for jobs, you can attend job fairs online or in <br> person, use job boards
                        and
                        career websites or reach out <br> directly to recruiters in a targeted company to broaden your
                        <br>
                        network.
                    </p>
                </div>

                <div class="sec2_points">

                    <p> <i class="fa-solid fa-check"></i> &nbsp; Bring to the table win-win survival</p>
                    <p> <i class="fa-solid fa-check"></i> &nbsp; Capitalize on low hanging fruit to identify
                    </p>
                    <p> <i class="fa-solid fa-check"></i> &nbsp; But I must explain to you how all this</p>

                </div>

                <div class="sec2_btn1">
                    <button>Discover More</button>
                </div>

            </div>

            <div class="sec2_img">
                <div class="s2_img">
                    <img src="assets/img/img1.jpg" alt="">
                </div>
            </div>
        </div>

    </section>

    <section class="sec_2" id="sec_3">
        <div class="container">
            <div class="sec2_img">
                <div class="s2_img">
                    <img src="assets/img/img2.jpg" alt="">
                </div>
            </div>
            <div class="sec2_info">
                <div class="sec2_h1">
                    <h1>
                        Build a good<br>
                        resume</h1>
                </div>

                <div class="sec2_p1">
                    <p>An efficient resume should promote your abilities and include <br> tangible accomplishments that
                        are relevant to the job you apply<br> dfor. You should also prepare a cover letter that is
                        concise and
                        <br>
                        elaborates on how you can put your skills to use in the <br> organization.
                    </p>
                </div>


                <div class="sec2_btn1">
                    <button>Discover More</button>
                </div>

            </div>


        </div>

    </section>

    <section class="sec_2" id="sec_4">
        <div class="container">
            <div class="sec2_info">
                <div class="sec2_h1">
                    <h1>You can Find Your Jobs<br>
                        in different State, District or City</h1>
                </div>

                <div class="sec2_points">

                    <p> <i class="fa-solid fa-a manual_icon"></i> &nbsp; <strong> Amreli </strong></p>
                    <p class="job_dst"> Amrapur, Babra, Babapur, Rampur, Tori, <br> Bhildi, Ranpar...</p>

                    <p> <i class="fa-solid fa-b manual_icon"></i> &nbsp; <strong> Bhavnagar </strong></p>
                    <p class="job_dst"> Amrapur, Babra, Babapur, Rampur, Tori, <br> Bhildi, Ranpar...</p>

                    <p> <i class="fa-solid fa-j manual_icon"></i> &nbsp; <strong> Jamnagar </strong></p>
                    <p class="job_dst"> Amrapur, Babra, Babapur, Rampur, Tori, <br> Bhildi, Ranpar...</p>


                </div>

                <div class="sec2_btn1">
                    <button>Discover More</button>
                </div>

            </div>

            <div class="sec2_img">
                <div class="s2_img">
                    <img src="assets/img/img3.jpg" alt="">
                </div>
            </div>
        </div>

    </section>


    <section class="sec_5">
        <div class="container">
            <div class="sec5_info">
                <div class="sec5_h1">
                    <h1>Reviews</h1>
                </div>

                <div class="sec5_p1">
                    <p>User's Reviews</p>
                </div>

                <div class="user_rs">
                    <div class="review1">
                        <div class="user1_img">
                            <img src="assets/img/person1.jpg" alt="">
                        </div>

                        <div class="reviewer">
                            <h2>Roshan Thummar</h2>
                        </div>

                        <div class="user_rp1">
                            <p>Awesome Work and Management. I was Jobless but one day i knew about this Website and now
                                i have job and i am satisfied for salary and others things. Thank You for make my life
                                Happily.</p>
                        </div>
                    </div>

                    <div class="review1">
                        <div class="user1_img">
                            <img src="assets/img/person1.jpg" alt="">
                        </div>

                        <div class="reviewer">
                            <h2>Roshan Thummar</h2>
                        </div>

                        <div class="user_rp1">
                            <p>Awesome Work and Management. I was Jobless but one day i knew about this Website and now
                                i have job and i am satisfied for salary and others things. Thank You for make my life
                                Happily.</p>
                        </div>
                    </div>

                    <div class="review1">
                        <div class="user1_img">
                            <img src="assets/img/person1.jpg" alt="">
                        </div>

                        <div class="reviewer">
                            <h2>Roshan Thummar</h2>
                        </div>

                        <div class="user_rp1">
                            <p>Awesome Work and Management. I was Jobless but one day i knew about this Website and now
                                i have job and i am satisfied for salary and others things. Thank You for make my life
                                Happily.</p>
                        </div>
                    </div>

                    <div class="review1">
                        <div class="user1_img">
                            <img src="assets/img/person1.jpg" alt="">
                        </div>

                        <div class="reviewer">
                            <h2>Roshan Thummar</h2>
                        </div>

                        <div class="user_rp1">
                            <p>Awesome Work and Management. I was Jobless but one day i knew about this Website and now
                                i have job and i am satisfied for salary and others things. Thank You for make my life
                                Happily.</p>
                        </div>
                    </div>

                    <div class="review1">
                        <div class="user1_img">
                            <img src="assets/img/person1.jpg" alt="">
                        </div>

                        <div class="reviewer">
                            <h2>Roshan Thummar</h2>
                        </div>

                        <div class="user_rp1">
                            <p>Awesome Work and Management. I was Jobless but one day i knew about this Website and now
                                i have job and i am satisfied for salary and others things. Thank You for make my life
                                Happily.</p>
                        </div>
                    </div>

                    <div class="review1">
                        <div class="user1_img">
                            <img src="assets/img/person1.jpg" alt="">
                        </div>

                        <div class="reviewer">
                            <h2>Roshan Thummar</h2>
                        </div>

                        <div class="user_rp1">
                            <p>Awesome Work and Management. I was Jobless but one day i knew about this Website and now
                                i have job and i am satisfied for salary and others things. Thank You for make my life
                                Happily.</p>
                        </div>

     
        
                    </div>

            
                </div>
                <div class="sec2_btn1">
                    <button>Discover More</button>
                </div>
            </div>
        </div>

    </section>

    <div class="bg_img1">
        <img id="train" src="assets/img/branch.png">
    </div>

    <section class="sec_6">
        <div class="container">
            <div class="review_submit">
                <div class="sec6_h1">
                    <h1>Submit Your Review</h1>
                </div>

                <div class="sec6_p1">
                    <p>“We all need people who will give us feedback.</p>
                </div>

                <div class="submit_review">
                <div class="review_ip">
                    <input type="text" placeholder="Write Your Feedback Here..." id="rv_submit">
                </div>

                <div class="review_subbtn">
                    <button class="">Submit</button>
                </div>
            </div>
            </div>
        </div>

    </section>

    <section class="sec_7">
        <footer>
            <div class="content">
              <div class="top">
                <div class="logo-details">
                  <div class="footer_logo">
                    <img src="assets/css/assets/img/homepage/logo.png" alt="">
                  </div>
                  <span class="logo_name">Aggregate Agro</span>
                </div>
                <div class="media-icons">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
              <div class="link-boxes">
                <ul class="box">
                  <li class="link_name">Worker</li>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Contact us</a></li>
                  <li><a href="#">About us</a></li>
                  <li><a href="#">Get started</a></li>
                </ul>
                <ul class="box">
                  <li class="link_name">Farmer</li>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Contact us</a></li>
                  <li><a href="#">About us</a></li>
                  <li><a href="#">Get started</a></li>
                </ul>
                <ul class="box">
                  <li class="link_name">Seller</li>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Contact us</a></li>
                  <li><a href="#">About us</a></li>
                  <li><a href="#">Get started</a></li>
                </ul>
                <ul class="box">
                  <li class="link_name">Yard</li>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Contact us</a></li>
                  <li><a href="#">About us</a></li>
                  <li><a href="#">Get started</a></li>
                </ul>
    
              </div>
            </div>
            <div class="bottom-details">
              <div class="bottom_text">
                <span class="copyright_text">Copyright © 2021  &nbsp;<a href="#"> Aggregate Agro </a>All rights reserved</span> &nbsp; &nbsp;
                <span class="policy_terms">
                  <a href="#">Privacy policy and T&C</a>
                </span>
              </div>
            </div>
          </footer>

    </section>

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

    <!-- <script>
        train.onclick = function () {
            let start = Date.now();

            let timer = setInterval(function () {
                let timePassed = Date.now() - start;

                train.style.left = timePassed / 5 + 'px';

                if (timePassed > 7000) clearInterval(timer);

            }, 20);
        }
    </script> -->

</body>

</html>