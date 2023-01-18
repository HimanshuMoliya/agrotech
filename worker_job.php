
<?php
require "db/db.php";
// $loggedin = true;

require_once 'db/config.php';
if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
    header("location: login.php");
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


<!-- Mirrored from jobboard.websitelayout.net/job-grid-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:05 GMT -->
<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Job Portal HTML Template" />
    <meta name="description" content="Job Board - Job Portal HTML Template" />

    <!-- title  -->
    <title>Aggregate Agro</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/logos/logo.png" />
    <link rel="apple-touch-icon" href="img/logos/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/logos/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/logos/apple-touch-icon-114x114.png" />

    <!-- plugins -->
    <link rel="stylesheet" href="css/plugins.css" />

    <!-- search css -->
    <link rel="stylesheet" href="search/search.css" />

    <!-- quform css -->
    <link rel="stylesheet" href="quform/css/base.css">

    <!-- core style css -->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        a.navbar-brand.logodefault {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    font-family: cursive;
}

.profile_img {
    width: 100%;
    max-width: 50px;
}

.job_offer{
    overflow: scroll;
    height: 100vh;
    overflow-x: hidden;
}

.farmer_con {
    position: relative;
    left: -30px;
    top: 30px;
}

.farmer_con ul{

    display: flex;
    list-style: none;
    gap: 20px;
    
    font-size: 18px;

}

a.footer-logo {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    color: white;
    font-family: cursive;
}

.footer_info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

i.fa.fa-search {
    font-size: 20px;
}


    </style>

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
            <?php 
                include "nav.php";
            ?>


        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="h2 mb-4">Aggregate Agro</h1>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="page-title-list">
                                    <ol class="breadcrumb d-inline-block mb-0">
                                        <li class="breadcrumb-item d-inline-block active"><a href="#!" class="text-primary">Get Your Opportunities</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- JOB GRID 1 - LEFT SIDEBAR
        ================================================== -->
        <section>
            <div class="container">
                <div class="row mt-n6">
                    <!-- job-grid left -->
                    <div class="col-lg-3 order-2 order-lg-1 mt-6">
                        <div class="sidebar">
                            <div class="sidebar-title">Search By</div>
                            <div class="widget search">
                                <form action="#!" class="search-bar">
                                    <div class="quform-element form-group">
                                        <label for="search">Search By State</label>
                                        <div class="quform-input">
                                            <input class="form-control border-radius-10" id="search" type="text" name="search" placeholder="search State" />
                                        </div>
                                    </div>

                                    <div class="quform-element form-group">
                                        <label for="search">Search By City</label>
                                        <div class="quform-input">
                                            <input class="form-control border-radius-10" id="search" type="text" name="search" placeholder="search City" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="sidebar-title">Salary Range</div>
                            <div class="widget">
                                <div class="price-range"></div>
                            </div>
                            <div class="sidebar-title">Job Type</div>
                            <div class="widget">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="full-time">
                                    <label class="form-check-label mb-0" for="full-time">Full Time</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="part-time">
                                    <label class="form-check-label mb-0" for="part-time">Part Time</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="temporary">
                                    <label class="form-check-label mb-0" for="temporary">Temporary</label>
                                </div>
                            </div>
                            <div class="sidebar-title">Experience</div>
                            <div class="widget">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="fresher">
                                    <label class="form-check-label mb-0" for="fresher">Fresher</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="oneyear">
                                    <label class="form-check-label mb-0" for="oneyear">Less than 1 year</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="twoyear">
                                    <label class="form-check-label mb-0" for="twoyear">2 Year</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="threeyear">
                                    <label class="form-check-label mb-0" for="threeyear">3 Year</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="fouryear">
                                    <label class="form-check-label mb-0" for="fouryear">4 Year</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="fouryear">
                                    <label class="form-check-label mb-0" for="fouryear">Above 4 Year</label>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <!-- end job-grid left -->

                    <!-- job-grid right -->
                    <div class="col-lg-9 order-1 order-lg-2 mt-6 job_offer">
                        <div class="ps-lg-1-6 ps-xl-1-9">

                            <div class="row mt-n1-9">
                                <?php
                                    $select = "SELECT * FROM `user_profile` WHERE `occupation` = 'farmer'";
                                    $select_r = mysqli_query($con,$select);
                                
                                    $num3 = mysqli_num_rows($select_r);
                                    if($num3 > 0){
                                        while($row = mysqli_fetch_assoc($select_r)){
                                            ?>
                                            <div class="col-md-6 mt-1-9">
                                                <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                                    <div class="card-body p-1-6 p-xl-1-9">
                                                        <div class="d-flex mb-3">
                                                            <div class="flex-shrink-0">
                                                                <?php
                                                                if($row['picture'] != NULL ){
                                                                ?>
                                                                <img src="<?php echo $row['picture']; ?>" class="border-radius-50 w-40px" alt="...">
                                                                <?php 
                                                                }else{
                                                                    ?>
                                                                    <img src="img/avatar/user.png" class="border-radius-50 w-40px" alt="...">
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="mb-0"><?php echo $row['fullname']; ?></h6>
                                                                <span class="text-muted display-31">Nov 18, 2021</span>
                                                            </div>
                                                        </div>
                                                        <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                                        <div class="mb-4">
                                                            <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                            <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                                        </div>
                                                        <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                                        <div class="farmer_con">
                                                            <ul>
                                                                <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                                <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                                <li >  <i class="fa-solid fa-circle"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                            <?php
                                        }
                                    }else{
                                        echo "no data found";
                                    }
                                ?>
                                
                                <!-- <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1-9">
                                    <div class="card border-color-extra-light-gray h-100 border-radius-5">
                                        <div class="card-body p-1-6 p-xl-1-9">
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Michelle Herz</h6>
                                                    <span class="text-muted display-31">Nov 18, 2021</span>
                                                </div>
                                            </div>
                                            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                            <div class="mb-4">
                                                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                                <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                            </div>
                                            <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                            <div class="farmer_con">
                                                <ul>
                                                    <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                                    <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                                    <li >  <i class="fa-solid fa-circle"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                           
                        </div>
                    </div>
                    <!-- end job-grid right -->
                </div>
            </div>
        </section>

        <!-- FOOTER
        ================================================== -->
        <footer class="pt-0">
            <div class="container border-bottom border-color-light-white py-2-5 py-md-6 mb-6 mb-md-8 mb-lg-10">
                <div class="row justify-content-center align-items-center mt-n1-9">
                    <div class="col-xl-6 mt-1-9">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-1-6 mb-sm-0">
                                <a href="index.html" class="footer-logo"><img src="img/logos/logo.png" alt="...">Aggregate Agro</a>
                            </div>
                            <div class="flex-grow-1 border-sm-start border-color-light-white ms-sm-4 ps-sm-4 border-width-2">
                                <p class="mb-0 display-30 text-white opacity9 w-lg-95">Create a free account to discover lots of Jobs & Career Opportunities around you!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-n2-6 footer_info">
                    <div class="col-sm-6 col-lg-3 mt-2-6">
                        <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Contact Us</h3>
                        <ul class="contact-list">
                            <li class="d-flex"><span class="fa fa-home pe-3 text-white"></span><a href="#!">B-110 Royal Arcadess, Mota Varachha, Surat, Gujarat</a></li>
                            <li class="d-flex"><span class="fa fa-phone-alt pe-3 text-white"></span><a href="#!">(+44) 123 456 789</a></li>
                            <li class="d-flex"><span class="fa fa-envelope pe-3 text-white"></span><a href="#!">info@example.com</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <div class="ps-sm-1-9">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Explore</h3>
                            <ul class="footer-list-style1">
                                <li><i class="fa-solid fa-house-user"></i> &nbsp; <a href="aboutus.html">Home</a></li>
                                <li> <i class="fa-solid fa-briefcase"></i> &nbsp; <a href="blog-grid.html">Job</a></li>
                                <li><i class="fa-solid fa-a"></i> &nbsp; <a href="how-it-works.html">About Us</a></li>
                                <li><i class="fa-solid fa-address-card"></i> &nbsp; <a href="pricing-plans.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="col-sm-6 col-lg-3 mt-2-6">
                        <div class="ps-lg-2-2 ps-xl-2-5">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Subscribe</h3>
                            <p class="text-white mb-4">Subscribe to get the latest jobs posted, candidates...</p>
                            <form class="quform newsletter-form" action="https://jobboard.websitelayout.net/quform/newsletter-two.php" method="post" enctype="multipart/form-data" onclick="">
                                <div class="quform-elements">
                                    <div class="row">
                                        <!-- Begin Text input element -->
                                        <div class="col-md-12">
                                            <div class="quform-element">
                                                <div class="quform-input">
                                                    <input class="form-control" id="email_address" type="text" name="email_address" placeholder="Subscribe with us" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="btn btn-white text-primary m-0" type="submit"><span><i class="fas fa-paper-plane text-primary"></i></span></button>
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar borders-top border-color-light-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 text-center text-md-start mt-3 mt-md-0 order-2 order-md-1">
                            <p class="d-inline-block text-white mb-0">&copy; <span class="current-year"></span> 
                                <a href="https://www.chitrakootweb.com/" target="_blank" class="text-primary white-hover">Aggregate Agro</a>
                            </p>
                        </div>
                        <div class="col-md-5 text-center text-md-end order-1 order-md-2">
                            <p class="text-white d-inline-block mb-0 align-middle">Follow Us :</p>
                            <ul class="footer-social-style1">
                                <li>
                                    <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- BUY TEMPLATE
    ================================================== -->
    <div class="buy-theme alt-font d-none d-lg-inline-block"><a href="https://wrapbootstrap.com/theme/job-board-job-portal-html-template-WB0S2FC71" target="_blank"><i class="fa-solid fa-user"></i><span>My Profile</span></a></div>

    <div class="all-demo alt-font d-none d-lg-inline-block"><a href="https://www.chitrakootweb.com/contact.html" target="_blank"><i class="fa-solid fa-right-from-bracket"></i><span>Log out</span></a></div>

    <!-- start scroll to top -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- popper js -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- core.min.js -->
    <script src="js/core.min.js"></script>

    <!-- search -->
    <script src="search/search.js"></script>

    <!-- custom scripts -->
    <script src="js/main.js"></script>

    <!-- form plugins js -->
    <script src="quform/js/plugins.js"></script>

    <!-- form scripts js -->
    <script src="quform/js/scripts.js"></script>

    <!-- all js include end -->

</body>


<!-- Mirrored from jobboard.websitelayout.net/job-grid-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:05 GMT -->
</html>