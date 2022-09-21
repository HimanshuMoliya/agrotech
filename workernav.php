
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
                            <li><a href="login.php">Login</a></li>
                            <?php
                                if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
                                    header("location: index1.php");
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

               

                <button type="submit" id="search_btn">Search</button>
                
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
                             
                                <img src="assets/img/person1.jpg" alt="">
                            
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


   