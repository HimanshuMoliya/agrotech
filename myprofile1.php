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
    <title>Profile</title>

    <!-- ===== ===== Custom Css ===== ===== -->
    <link rel="stylesheet" href="css/myprofilestyle.css">
    <link rel="stylesheet" href="css/myprofileresponsive.css">

    <!-- ===== ===== Remix Font Icons Cdn ===== ===== -->
    <link rel="stylesheet" href="fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="footer.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header{
            transition: 0.6s;
            position: fixed;
            width: 100%;
            top: 0;
            background-color: #f7fbff;
            color: black;
            
        }
        body {
            background-image: url("img/bg.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .user_reqname {
            margin-bottom: var(--m-1-8);
            font-size: var(--m-fs);
            color: rgba(0, 0, 0, 0.6);
            line-height: 1.6rem;
            margin-top: 5px;
        }

        section#user_reqsection {
            height: 485px;
            overflow-x: hidden;
            overflow-y: scroll;
            margin-top: 27px;
        }

        section#worker_pinfo {
            margin-top: 15px;
            height: 499px;
            margin-left: 10px;
        }

        section#worker_name {
            margin-left: 10px;
        }

        .rating {
            display: flex;
            align-items: center;
        }

        .contact_Info {
            line-height: 36px;
        }

        .contact_Info ul li {
            line-height: 22px;
            margin-top: 10px;
        }

        .basic_info {
            margin-top: 36px;
        }

        h1#basic_info {
            color: black;
            font-size: 13px;
        }

        .brandLogo{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

        /* ===================== Header ============================================ */

        .main_navigation {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    padding: 0px 20px 4px 20px;
}

.logo_img {
    width: 100%;
    max-width: 70px;
}

.logo_img img {
    width: 100%;
}

.logo_menu {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

/* .nav_menu{
    margin-left: 10px;
} */

.nav_menu ul {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 20px;
    list-style: none;
}

.nav_menu ul li a{
    color: gray;
}

/* .logo {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
} */

.nav_search {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

input.ip_1 {
    padding: 10px;
    border: 1px solid #b3b3b3;
    border-radius: 8px;
    background-color: white;
}

.p_img{
    width: 100%;
    max-width: 50px;
}

.p_img img{
    width: 100%;
    border-radius: 50%;
}

#search_btn {
    border: 1px solid rgb(134, 141, 134);
    background: #0675e8;
    border-radius: 2rem;
    box-shadow: 1px 1px 3px 1px #b3cccc;
}

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

header.sticky {
            background: #282828;;
            z-index: 1;
        }

        .nav_btn{
    display: none;
}

.nav_btn2{
    display: none;
}
.slide .nav_menu{
   left: 0%;
}

.nav_menu {
    z-index: 99;
    transition: all 0.5s;
    left: -100%;
}


        @media(max-width: 992px){
    .nav_btn{
        display: block;
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        position: absolute;
        right: 0;
    }

    .nav_btn2{
        display: block;
        background: none;
        border: none;
        color: black;
        position: absolute;
        right: 0;
        font-size: 20px;
    }
    .nav_menu{
        position: fixed;
        background-color: #f3f3f3;
        width: 100%;
        top: 70px;
        left: -100%;
        text-align: center;
    }
    .nav_menu ul{
        flex-direction: column;
        gap: 0px;
        
    }
    .nav_menu ul li{
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

        

    </style>
</head>

<body>

    <header>
        <div class="main_navigation">
            <div class="logo_menu">
                <div class="logo">
                    <div class="logo_img">
                        <img src="img/logo.png" alt="">
                    </div>
                </div>
                <button class="nav_btn"> <i class="fa-solid fa-bars"></i> </button>

                <div class="nav_menu">
                    <button class="nav_btn2"> <i class="fa-solid fa-xmark"></i> </button>
                    <ul>
                        <li><a href="worker.php">Home</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>


            <div class="nav_search">
                <div class="search_bar">
                    <input type="text" placeholder="Search" class="ip_1">
                </div>

                <div class="search_button">
                    <button  id="search_btn">Search</button>
                </div>

                <div class="profile_img">
                    <div class="p_img">
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
                             
                                <img src="assets/img/person1.jpg" alt="">
                            
                        <?php
                        }else{
                        ?>
                            <figure><img src="<?php echo $userinfo['picture']; ?>" alt="profile" width="250px" height="50px"></figure>
                    
                                <?php
                                }
                            ?>
                    </div>
                </div>
            </div>
                </div>
    </header>

    <!-- ===== ===== Body Main-Background ===== ===== -->
    <span class="main_bg"></span>


    <!-- ===== ===== Main-Container ===== ===== -->
    <div class="container">

        <!-- ===== ===== Header/Navbar ===== ===== -->
        <!-- <header> -->
            <!-- <div class="brandLogo">
                <figure><img src="img/logo.png" alt="logo" width="40px" height="40px"></figure>
                <span>Aggretech Agro</span>
            </div> -->
        <!-- </header> -->


        <!-- ===== ===== User Main-Profile ===== ===== -->
        <section class="userProfile card">
            <div class="profile">
            <?php
                if(!isset($userinfo['picture'])){
                    ?>
                <figure><img src="assets/css/img/person1.jpg" alt="profile" width="250px" height="250px"></figure>
                    <?php
                }else{
                    ?>
                    <figure><img src="<?php echo $userinfo['picture']; ?>" alt="profile" width="250px" height="250px"></figure>
                    
                    <?php
                }
                    ?>
                
            </div>
        </section>


        <!-- ===== ===== Work & Skills Section ===== ===== -->
        <section class="work_skills card" id="user_reqsection">

            <!-- ===== ===== Work Contaienr ===== ===== -->
            <div class="work">
                <h1 class="heading">Activity</h1>
                <div class="primary">
                    <h1>Roshan Thummar</h1>
                    <p class="user_reqname">Roshan Thummar <br> Requested You, 5 min Ago</p>
                </div>

                <div class="primary">
                    <h1>Renish Suriya</h1>
                    <p class="user_reqname">Renish Suriya <br> Requested You, 10 min Ago</p>
                </div>
            </div>

            <div class="primary">
                <h1>Patel Deep</h1>
                <p class="user_reqname">Patel Deep <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Gorasiya Jay</h1>
                <p class="user_reqname">Gorasiya Jay <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Harsh ujainiya</h1>
                <p class="user_reqname">Harsh Ujainiya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Dharmik Hingu</h1>
                <p class="user_reqname">Dharmik Hingu<br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Karan Chauhan</h1>
                <p class="user_reqname">Karan Chauhan <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Meet Dobariya</h1>
                <p class="user_reqname">Meet Dobariya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Kheni Heet</h1>
                <p class="user_reqname">Kheni Heet <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Arpit Vavaliya</h1>
                <p class="user_reqname">Arpit Vavaliya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Dhruv Vaghasiya</h1>
                <p class="user_reqname">Dhruv Vagashiya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Brij Lathiya</h1>
                <p class="user_reqname">Brij Lathiya <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Adnan Dadani</h1>
                <p class="user_reqname">Adnan Dadani <br> Requested You, 10 min Ago</p>
            </div>


            <div class="primary">
                <h1>Jadav Hardik</h1>
                <p class="user_reqname">Jadav Hardik <br> Requested You, 10 min Ago</p>
            </div>

            <div class="primary">
                <h1>Rana Neel</h1>
                <p class="user_reqname">Rana Neel <br> Requested You, 10 min Ago</p>
            </div>

            <!-- ===== ===== Skills Contaienr ===== ===== -->
            <!-- <div class="skills">
                <h1 class="heading">Skills</h1>
                <div class="primary">
                    <h1>Renish Suriya</h1>
                    <span>Primary</span>
                    <p>Renish Suriya <br> Requested You, 10 min Ago</p>
                </div>
            </div> -->
        </section>


        <!-- ===== ===== User Details Sections ===== ===== -->
        <section class="userDetails card" id="worker_name">
            <div class="userName">
                <h1 class="name"><?php
                if(isset($userinfo['fullname'])){
                    echo $userinfo['fullname'];
                 }else{
                    echo $userinfo['first_name'].' '.$userinfo['last_name'];
                 } ?></h1>
                <p>Surat, Gujarat</p>
            </div>

            <div class="rank">
                <h1 class="heading">Rankings</h1>
                <span>8.6</span>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="ri-star-fill rate underrate"></i>
                </div>
            </div>

            <div class="btns">
                <ul>

                    <li class="sendMsg active">
                        <i class="ri-check-fill ri"></i>
                        <a href="#">Edit Profile</a>
                    </li>

                    <!-- <li class="sendMsg">
                        <a href="#">Edit Profile</a>
                    </li> -->

                    <li class="sendMsg">
                        <i class="ri-check-fill ri"></i>
                        <a href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </section>


        <!-- ===== ===== Timeline & About Sections ===== ===== -->
        <section class="timeline_about card" id="worker_pinfo">
            <div class="tabs">
                <ul>


                    <li class="about active">
                        <i class="ri-user-3-fill ri"></i>
                        <span>About</span>
                    </li>
                </ul>
            </div>

            <div class="contact_Info">
                <h1 class="heading">Contact Information</h1>
                <ul>
                    <li class="phone">
                        <h1 class="label">Phone:</h1>
                        <span class="info"><?php echo $userinfo['phoneno']; ?></span>
                    </li>

                    <li class="address">
                        <h1 class="label">Address:</h1>
                        <span class="info">B-303 <br> Mota Varachha, Surat, Gujarat</span>
                    </li>

                    <li class="email">
                        <h1 class="label">E-mail:</h1>
                        <span class="info"><?php echo $userinfo['email']; ?></span>
                    </li>
                    <?php
                    if(isset($userinfo['first_name'])){
                    ?>
                    <li class="site">
                        <h1 class="label">Occupation</h1>
                        <span class="info"><?php echo $userinfo['occupation']; ?></span>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="basic_info">
                <h1 class="heading" id="basic_info">Basic Information</h1>
                <ul>
                    <li class="birthday">
                        <h1 class="label">Birthday:</h1>
                        <span class="info">14-July-2005</span>
                    </li>

                    <li class="sex">
                        <h1 class="label">Gender:</h1>
                        <span class="info">Male</span>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <?php
        include "footer.php";
    ?>
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

    
<script type="text/javascript">

    window.addEventListener("scroll", function () {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })

</script>

</body>

</html>