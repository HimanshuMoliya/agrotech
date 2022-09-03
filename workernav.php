

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


            <div class="right_search" style="margin-right:55px;">
                <input type="text" placeholder="Search" class="ip_1">

                <!-- <input type="submit" value="Search" placeholder="Search" class="ip_2"> -->

                <button type="submit" id="search_btn" class="button1" style="margin-right:0px;">Search</button>

                
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

   