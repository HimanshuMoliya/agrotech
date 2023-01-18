
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


<!-- Mirrored from jobboard.websitelayout.net/candidate-applied-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:19 GMT -->
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
    
    <link href="css/dashboard.css" rel="stylesheet" />
    <style>
        .list-style li {
            padding-left: 0px;
            margin-left: 0px;
        }
        .list-style li:before {
            position: inherit;
        }
        .list-style li button {
        border-color: rgba(38, 174, 97, 0.1);
        display: block;
        background: rgba(38, 174, 97, 0.1);
        color: #26ae61;
        border-radius: 10px;
        height: 34px;
        width: 34px;
        line-height: 36px;
        font-size: 15px;
        text-align: center;
        transition: all 300ms ease;
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

    
    <?php
    include "nav.php";
    ?>

    <!-- PAGE TITLE
        ================================================== -->
        <!-- <section class="page-title-section" style="    background: rgba(38, 174, 97, 0.1);
            padding: 100px 0 100px 0;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="h2 mb-4">Candidate Details</h1>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="page-title-list">
                                    <ol class="breadcrumb d-inline-block mb-0">
                                        <li class="breadcrumb-item d-inline-block"><a href="#!">Home</a></li>
                                        <li class="breadcrumb-item d-inline-block active"><a href="#!" class="text-primary">Candidate Details</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- CANDIDATE DETAILS
        ================================================== -->
        <section>
            <div class="container" id="actionblock">
                <div class="row mb-2-5 mb-lg-2-9">
                    <div class="col-lg-12">
                        <div class="p-1-6 p-lg-1-9 border border-color-extra-light-gray border-radius-10">
                            <div class="row align-items-center">
                                <div class="col-lg-9 mb-4 mb-lg-0">
                                    <div class="text-center text-lg-start d-lg-flex align-items-center">
                                        <div class="flex-shrink-0 mb-4 mb-lg-0">
                                        <?php
                                            $query = "SELECT * FROM user_profile WHERE email = '{$_SESSION['email']}'";
                                            $qres = mysqli_query($con,$query);
                                            $row = mysqli_fetch_assoc($qres);
                                            ?>
                                            <?php
                                            if(isset($row['picture'])){
                                                ?>
                                            <img src="<?php echo $row['picture']; ?>" class="border-radius-50" alt="...">
                                            <?php
                                            }else{
                                                ?>
                                            <img src="img/avatar/user.png" style="width: 96px;height:96px;" class="border-radius-50" alt="...">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="flex-grow-1 ms-lg-4">
                                            <div class="display-30 text-warning mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="px-2 py-1 bg-primary text-white ms-2 display-31 border-radius-10">5.0</span>
                                            </div>
                                            
                                            <h4 class="mb-3"><?php echo $row['fullname']; ?> </h4>
                                            <span class="me-2"><i class="ti-briefcase pe-2 text-secondary"></i><?php
                                             if(isset($row['occupation'])){
                                                echo $row['occupation'];  
                                             }else{
                                                echo "Not set";
                                             }
                                             ?> </span>
                                            <span class="me-2"><i class="ti-location-pin pe-2 text-secondary"></i><?php
                                             if(isset($row['address'])){
                                                echo $row['address'];
                                             }else{
                                                echo "Not set";
                                             }
                                             ?></span>
                                            <span class="me-2"><i class="ti-time pe-2 text-secondary"></i><?php
                                             if(isset($row['workhour'])){
                                                echo $row['workhour'];
                                             }else{
                                                echo "Not set";
                                             }
                                              ?> Hour </span>
                                            <span><i class="far fa-money-bill-alt pe-2 text-secondary"></i><?php
                                             if(isset($row['approxsalary'])){
                                                echo $row['approxsalary'];
                                             }else{
                                                echo "Not set";
                                             }
                                             ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- <a href="#!" class="butn mb-3 w-100 text-center">Apply For Job</a> -->
                                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered"  id="modal">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit profile</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                               

                                                <!-- <form enctype="multipart/form-data"> -->
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                                    <input type="text" id="name" class="form-control" aria-describedby="emailHelp" value="<?php echo $row['fullname'];  ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Address</label>
                                                    <input type="text" id="address" class="form-control" id="exampleInputPassword1" value="<?php echo $row['address'];  ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Gender</label>
                                                    <div class="options d-flex" >
                                                    <div class="form-check" style="padding-right:1rem">
    <input class="form-check-input gender" type="radio" name="gender" value="male" id="male"  <?php 
        if($row['gender'] == 'male'){
            echo "checked";
        }
    ?>>
    <label class="form-check-label" for="flexRadioDefault1">
    Male 
  </label>
</div>
<div class="form-check" style="padding-right:1rem">
    <input class="form-check-input gender" type="radio" name="gender" value="female" id="female" <?php 
        if($row['gender'] == 'female'){
            echo "checked";
        }
    ?>>
    <label class="form-check-label" for="flexRadioDefault2">
    Female
  </label>
</div>
    </div>
                    

                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Age</label>
                                                    <input type="number" id="age" class="form-control" id="exampleInputPassword1" value="<?php echo $row['age'];  ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Work Hours</label>
                                                    <input type="number" id="workhour" class="form-control" id="exampleInputPassword1" value="<?php echo $row['workhour'];  ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Occupation</label>
        <?php
        if(!isset($row['occupation'])){
            echo "not set";
        }else{
        ?>
                                                    <div class="options d-flex">
                                                    <div class="form-check" style="padding-right:1rem">
    <input class="form-check-input occupation "  type="radio" name="occupation" value="farmer"   <?php 
        if($row['occupation'] == 'farmer'){
            echo "checked";
        }
    ?>>
    <label class="form-check-label" for="flexRadioDefault1">
    Farmer 
  </label>
</div>
<div class="form-check" style="padding-right:1rem">
    <input class="form-check-input occupation" type="radio" name="occupation" value="worker"  <?php 
        if($row['occupation'] == 'worker'){
            echo "checked";
        }
    ?>>
    <label class="form-check-label" for="flexRadioDefault2">
    Worker
  </label>
</div>
<div class="form-check" style="padding-right:1rem">
    <input class="form-check-input occupation" type="radio" name="occupation" value="seller"   <?php 
        if($row['occupation'] == 'seller'){
            echo "checked";
        }
    ?>>
    <label class="form-check-label" for="flexRadioDefault1">
    Seller 
  </label>
</div>
</div>
<?php
        }
?>
                    

                                                    
                                                </div>
                                                
                                                <div id="loader" style="display: none;text-align: center;">  
                                                    <img src="img/gif/load.gif" alt="" style="height: 3rem;width: 3rem;">
                                                </div>
                                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                                <button id="follow" class="butn mb-3 w-100 text-center follow">Submit</button>
                                                <!-- </form> -->
                                                </div>
                                                
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Hide this modal and show the first with the button below.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <a class="butn mb-3 w-100 text-center" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Edit profile</a>
                                        </div>
                                        <div class="col-12">
                                            <a href="#!" class="butn w-100 text-center">Download CV</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2-5 mb-lg-2-9 pb-2-5 pb-lg-2-9 border-bottom border-color-extra-light-gray">
                    <div class="col-lg-8 mb-1-9 mb-lg-0">
                        <div class="pe-lg-1-6 pe-xl-1-9">
                            <div class="row">
                            <div class="col-lg-12 mb-1-9 mb-lg-2-5">
                                <div class="dashboard-title">
                                    <h5 class="mb-0">Recent Request</h5>
                                </div>
                                <div class="dashboard-widget">
                                    <div class="row mt-n1-9">
                                        <?php
                                        // $p_id = $_SESSION['sendto'];
                                        // $id = $_SESSION['sendfrom'];
                                        $id=  $_SESSION['id'];
                                        $query = "SELECT * FROM request WHERE receivingid = $id";
                                        $result = mysqli_query($con,$query);

                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                        
                            <div class="col-xxl-6 mt-1-9">
                                <div class="card-style2">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-center">
                                            <div class="d-sm-flex text-center text-sm-start mb-4 mb-sm-0">
                                                <div class="flex-shrink-0 mb-3 mb-sm-0">
                                                <?php
                                                if(isset($row['picture'])){
                                                    ?>
                                                <img src="<?php echo $row['picture']; ?>"  alt="..." class="border-radius-50">
                                                <?php
                                                }else{
                                                    ?>
                                                <img src="img/candidate/candidate-01.jpg" alt="..." class="border-radius-50">
                                                    <?php
                                                }
                                                ?>
                                                    
                                                </div>
                                                <div class="flex-grow-1 ms-sm-3  mt-4">
                                                    <h5><a href="employer-details.html"><?php echo $row['fullname']; ?></a></h5>
                                                    <div class="mb-3">
                                                        <span class="text-secondary me-2 display-30"><?php echo $row['occupation']; ?></span>
                                                        <span class="vertical-align-middle display-30"><i class="ti-location-pin pe-2 text-secondary"></i><?php echo $row['address']; ?></span>
                                                    </div>
                                                    <!-- <div>
                                                        <span class="company-info">App</span>
                                                        <span class="company-info">Development</span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <ul class="list-style pl-0">
                                                <!-- <li><a href="#!"><span class="ti-eye"></span></a></li> -->
                                                <li><button class="butn "><span class="ti-check"></span></button></li>
                                                <li><button class="butn"><span class="ti-check"></span></button></li>
                                                <!-- <li><button ><span class="ti-check"></span></button></li> -->
                                                <!-- <li><button ><span class="ti-close"></span></button></li> -->
                                                <!-- <li><a href="#!"><span class="ti-trash"></span></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-12 mb-1-9 mb-lg-2-5">
                                    <div class="p-1-6 border border-color-extra-light-gray border-radius-10">
                                        <h4 class="mb-3">Candidates About :</h4>
                                        <p>We're seeking out a person with the innovative spark, eye for example and layout, ardour for images and cappotential to supply excessive first-rate layout collaterals end-to-end. Draft mockups of internet site designs, brochures, iconography, and every other advertising and marketing substances required. Collaborate with advertising and marketing groups and control to speak about which mockups are effective, and use their remarks to expand very last drafts. Revise the paintings of preceding designers to create a unified aesthetic for our emblem substances. Work on a couple of initiatives at once, and continually meet draft deadlines. Communicate often with customers to replace them at the development of the venture and to reply any questions they may have.</p>
                                        <p class="mb-0">A talented professional with an educational heritage in IT and verified industrial improvement enjoy as C++ developer given that 1999. Has a valid understanding of the software program improvement lifestyles cycle. Was concerned in greater than one hundred forty software program improvement outsourcing projects.</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1-9 mb-lg-2-5">
                                    <div class="p-1-6 border border-color-extra-light-gray border-radius-10">
                                        <h4 class="mb-3">Education :</h4>
                                        <p class="mb-4">You want not less than a Bachelor's Degree in Marketing or Business Administration to paintings as a marketer. An organization can also additionally need you to get a master's diploma to develop your communication, income and public speakme talents earlier than getting into the workforce. Earning a master's diploma can growth your incomes ability and your eligibility to serve in management roles for an organization.</p>
                                        <div class="vertical-timeline">
                                            <div class="d-block d-sm-flex justify-content-between mb-1-9">
                                                <div class="left-side">
                                                    <h5 class="display-28">Modern College</h5>
                                                    <span class="text-primary display-28">1997 - 2001</span>
                                                </div>
                                                <div class="right-side">
                                                    <h5 class="display-28">Computer Science</h5>
                                                    <p class="mb-0">The first factor to keep in mind approximately achievement is that it's a process – not anything more, not anything less.</p>
                                                </div>
                                            </div>
                                            <div class="d-block d-sm-flex justify-content-between mb-1-9">
                                                <div class="left-side">
                                                    <h5 class="display-28">Harvard University</h5>
                                                    <span class="text-primary display-28">2002 - 2004</span>
                                                </div>
                                                <div class="right-side">
                                                    <h5 class="display-28">Bachlors in Fine Arts</h5>
                                                    <p class="mb-0">The first factor to keep in mind approximately achievement is that it's a process – not anything more, not anything less.</p>
                                                </div>
                                            </div>
                                            <div class="d-block d-sm-flex justify-content-between">
                                                <div class="left-side">
                                                    <h5 class="display-28">Diploma In Fine Arts</h5>
                                                    <span class="text-primary display-28">2004 - 2006</span>
                                                </div>
                                                <div class="right-side">
                                                    <h5 class="display-28">BBA at School of Design at University of Michigan</h5>
                                                    <p class="mb-0">The first factor to keep in mind approximately achievement is that it's a process – not anything more, not anything less.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1-9 mb-lg-2-5">
                                    <div class="p-1-6 border border-color-extra-light-gray border-radius-10">
                                        <h4 class="mb-3">Work & Experience :</h4>
                                        <p class="mb-4">The work experience you want relies upon at the kind of position you are making use of for. For most, it's miles encouraged to paintings in an Internship position and then, earn relevant certifications previous to being certified for an entry-stage position.</p>
                                        <div class="vertical-timeline">
                                            <div class="d-block d-sm-flex justify-content-between mb-1-9">
                                                <div class="left-side">
                                                    <h5 class="display-28">Web Designer</h5>
                                                    <span class="text-primary display-28">2001 - 2003</span>
                                                </div>
                                                <div class="right-side">
                                                    <h5 class="display-28">Sparks Ltd.</h5>
                                                    <p class="mb-0">The first factor to keep in mind approximately achievement is that it's a process – not anything more, not anything less.</p>
                                                </div>
                                            </div>
                                            <div class="d-block d-sm-flex justify-content-between">
                                                <div class="left-side">
                                                    <h5 class="display-28">Sr. Java Developer</h5>
                                                    <span class="text-primary display-28">2003 - 2008</span>
                                                </div>
                                                <div class="right-side">
                                                    <h5 class="display-28">Drive Due Ltd.</h5>
                                                    <p class="mb-0">The first factor to keep in mind approximately achievement is that it's a process – not anything more, not anything less.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1-9 mb-lg-2-5">
                                    <div class="p-1-6 border border-color-extra-light-gray border-radius-10">
                                        <h4 class="mb-3">Skills :</h4>
                                        <div class="mb-1-9">
                                            <div class="progress-text display-29 font-weight-600 mb-2">
                                                <div class="row">
                                                    <div class="col-7">Graphics Design</div>
                                                    <div class="col-5 text-end">80%</div>
                                                </div>
                                            </div>
                                            <div class="custom-progress progress progress-medium" style="height: 10px;border-radius: 10px">
                                                <div class="animated custom-bar progress-bar slideInLeft bg-primary" style="width: 80%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                            </div>
                                        </div>
                                        <div class="mb-1-9">
                                            <div class="progress-text display-29 font-weight-600 mb-2">
                                                <div class="row">
                                                    <div class="col-7">Development</div>
                                                    <div class="col-5 text-end">92%</div>
                                                </div>
                                            </div>
                                            <div class="custom-progress progress progress-medium" style="height: 10px;border-radius: 10px">
                                                <div class="animated custom-bar progress-bar slideInLeft bg-primary" style="width: 92%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                            </div>
                                        </div>
                                        <div class="mb-1-9">
                                            <div class="progress-text display-29 font-weight-600 mb-2">
                                                <div class="row">
                                                    <div class="col-7">UI/UX Design</div>
                                                    <div class="col-5 text-end">70%</div>
                                                </div>
                                            </div>
                                            <div class="custom-progress progress progress-medium" style="height: 10px;border-radius: 10px">
                                                <div class="animated custom-bar progress-bar slideInLeft bg-primary" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="progress-text display-29 font-weight-600 mb-2">
                                                <div class="row">
                                                    <div class="col-7">Photoshop</div>
                                                    <div class="col-5 text-end">75%</div>
                                                </div>
                                            </div>
                                            <div class="custom-progress progress progress-medium" style="height: 10px;border-radius: 10px">
                                                <div class="animated custom-bar progress-bar slideInLeft bg-primary" style="width: 75%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1-9 mb-lg-2-5">
                                    <div class="p-1-6 border border-color-extra-light-gray border-radius-10">
                                        <h4 class="mb-3">Awards :</h4>
                                        <p class="mb-4">The work experience you want relies upon at the kind of position you are making use of for. For most, it's miles encouraged to paintings in an Internship position and then, earn relevant certifications previous to being certified for an entry-stage position.</p>
                                        <div class="vertical-timeline">
                                            <div class="d-block d-sm-flex justify-content-between mb-1-9">
                                                <div class="left-side">
                                                    <h5 class="display-28">Web Developer</h5>
                                                    <span class="text-primary display-28">1998 - 2001</span>
                                                </div>
                                                <div class="right-side">
                                                    <h5 class="display-28">Perfect Attendance Programs</h5>
                                                    <p class="mb-0">The first factor to keep in mind approximately achievement is that it's a process – not anything more, not anything less.</p>
                                                </div>
                                            </div>
                                            <div class="d-block d-sm-flex justify-content-between">
                                                <div class="left-side">
                                                    <h5 class="display-28">Development</h5>
                                                    <span class="text-primary display-28">2001 - 2003</span>
                                                </div>
                                                <div class="right-side">
                                                    <h5 class="display-28">Top Performer Developer</h5>
                                                    <p class="mb-0">The first factor to keep in mind approximately achievement is that it's a process – not anything more, not anything less.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="p-1-6 border border-color-extra-light-gray border-radius-10">
                                        <h4 class="mb-3">Add Review:</h4>
                                        <!-- Form -->
                                        <form  action="#!" method="post" enctype="multipart/form-data" onclick="">
                                            <div class="quform-elements">
                                                <div class="row">

                                                    <!-- Begin Text input element -->
                                                    <div class="col-md-6">
                                                        <div class="quform-element mb-3">
                                                            <div class="quform-input">
                                                                <input class="form-control border-radius-10" type="text" name="name" placeholder="Your name here">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- End Text input element -->

                                                    <!-- Begin Text input element -->
                                                    <div class="col-md-6">
                                                        <div class="quform-element mb-3">
                                                            <div class="quform-input">
                                                                <input class="form-control border-radius-10" id="email" type="text" name="email" placeholder="Your email here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Text input element -->

                                                    <div class="col-md-12">
                                                        <div class="quform-element mb-3">
                                                            <div class="quform-input">
                                                                <select id="ratings" class="form-control form-select border-radius-10" name="ratings">
                                                                    <option selected>Ratings</option>
                                                                    <option>5 Stars</option>
                                                                    <option>4 Stars</option>
                                                                    <option>3 Stars</option>
                                                                    <option>2 Stars</option>
                                                                    <option>1 Star</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Begin Textarea element -->
                                                    <div class="col-md-12">
                                                        <div class="quform-element mb-3">
                                                            <div class="quform-input">
                                                                <textarea class="form-control border-radius-10" id="message" name="message" rows="4" placeholder="Tell us a few words"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Textarea element -->

                                                    <!-- Begin Submit button -->
                                                    <div class="col-md-12">
                                                        <div class="quform-submit-inner">
                                                            <button class="butn" type="submit">Send Message</button>
                                                        </div>
                                                        <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                                    </div>
                                                    <!-- End Submit button -->

                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="job-details-sidebar">
                           
                            <div class="widget">
                                <div class="card border-color-extra-light-gray border-radius-10">
                                    <div class="card-body p-4">
                                        <h4>Location</h4>
                                        <iframe class="map-h250" id="gmap_canvas" src="https://maps.google.com/maps?q=london&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="card border-color-extra-light-gray border-radius-10">
                                    <div class="card-body p-4">
                                        <h4>Contact Information</h4>
                                        <ul class="list-style5">
                                            <li><span>Phone</span> (+44) 123 456 789</li>
                                            <li><span>Email</span> info@example.com</li>
                                            <li><span>Address</span> 66 Guild Street 512B, Great North Town.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="card border border-color-extra-light-gray border-radius-10">
                                    <div class="card-body p-4">
                                        <h4>Quick Contacts</h4>
                                        <form class="contact quform" action="https://jobboard.websitelayout.net/quform/contact.php" method="post" enctype="multipart/form-data" onclick="">
                                            <div class="quform-elements">
                                                <div class="row">

                                                    <!-- Begin Text input element -->
                                                    <div class="col-md-6">
                                                        <div class="quform-element form-group">
                                                            <label for="name">Your Name <span class="quform-required">*</span></label>
                                                            <div class="quform-input">
                                                                <input class="form-control border-radius-10"type="text" name="name" placeholder="Your name here" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Text input element -->

                                                    <!-- Begin Text input element -->
                                                    <div class="col-md-6">
                                                        <div class="quform-element form-group">
                                                            <label for="email">Your Email <span class="quform-required">*</span></label>
                                                            <div class="quform-input">
                                                                <input class="form-control border-radius-10" type="text" name="email" placeholder="Your email here" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Text input element -->

                                                    <!-- Begin Text input element -->
                                                    <div class="col-md-6">
                                                        <div class="quform-element form-group">
                                                            <label for="subject">Your Subject <span class="quform-required">*</span></label>
                                                            <div class="quform-input">
                                                                <input class="form-control border-radius-10" type="text" name="subject" placeholder="Your subject here" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Text input element -->

                                                    <!-- Begin Text input element -->
                                                    <div class="col-md-6">
                                                        <div class="quform-element form-group">
                                                            <label for="phone">Contact Number</label>
                                                            <div class="quform-input">
                                                                <input class="form-control border-radius-10" type="text" name="phone" placeholder="Your phone here" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Text input element -->

                                                    <!-- Begin Textarea element -->
                                                    <div class="col-md-12">
                                                        <div class="quform-element form-group">
                                                            <label for="message">Message <span class="quform-required">*</span></label>
                                                            <div class="quform-input">
                                                                <textarea class="form-control border-radius-10" name="message" rows="3" placeholder="Tell us a few words"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Textarea element -->

                                                    <!-- Begin Captcha element -->
                                                    <div class="col-md-12">
                                                        <div class="quform-element">
                                                            <div class="form-group">
                                                                <div class="quform-input">
                                                                    <input class="form-control border-radius-10" id="type_the_word" type="text" name="type_the_word" placeholder="Type the below word" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="quform-captcha">
                                                                    <div class="quform-captcha-inner">
                                                                        <img src="quform/images/captcha/courier-new-light.png" alt="...">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Captcha element -->

                                                    <!-- Begin Submit button -->
                                                    <div class="col-md-12">
                                                        <div class="quform-submit-inner">
                                                            <button class="butn border-0" type="submit"><span>Send Message</span></button>
                                                        </div>
                                                    </div>
                                                    <!-- End Submit button -->

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="card border-color-extra-light-gray border-radius-10">
                                    <div class="card-body p-4">
                                        <h4>Social Profiles</h4>
                                        <ul class="candidate-social-icon">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="mb-4">Related Candidates :</h4>
                        <div class="featured-candidate owl-carousel owl-theme">
                            <div class="card card-style7 radius-10">
                                <div class="card-body">
                                    <a class="candidate-favourite" href="#!"><i class="far fa-heart"></i></a>
                                    <img src="img/candidate/candidate-02.jpg" class="border-radius-50 mb-3" alt="...">
                                    <div class="candidate-info">
                                        <h4 class="h5"><a href="candidate-details.html">Selma Kolkkala</a></h4>
                                        <span class="display-30 text-muted d-block mb-2 font-weight-500">UI/UX Specialist</span>
                                        <div class="display-30 text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="px-2 py-1 bg-primary text-white ms-2 display-31 border-radius-10">4.0</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span><i class="ti-location-pin text-secondary me-2 display-31 display-sm-30"></i><strong>Australia</strong></span>
                                        <span><i class="far fa-money-bill-alt text-secondary me-2 display-31 display-sm-30"></i><strong>$60 / hr</strong></span>
                                        <span><i class="ti-briefcase text-secondary me-2 display-31 display-sm-30"></i><strong>98%</strong></span>
                                    </div>
                                    <a href="candidate-details.html" class="butn w-100 radius-10">View Profile</a>
                                </div>
                            </div>
                            <div class="card card-style7 radius-10">
                                <div class="card-body">
                                    <a class="candidate-favourite" href="#!"><i class="far fa-heart"></i></a>
                                    <img src="img/candidate/candidate-03.jpg" class="border-radius-50 mb-3" alt="...">
                                    <div class="candidate-info">
                                        <h4 class="h5"><a href="candidate-details.html">Rens Westen</a></h4>
                                        <span class="display-30 text-muted d-block mb-2 font-weight-500">Research Assistant</span>
                                        <div class="display-30 text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="px-2 py-1 bg-primary text-white ms-2 display-31 border-radius-10">4.0</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span><i class="ti-location-pin text-secondary me-2 display-31 display-sm-30"></i><strong>USA</strong></span>
                                        <span><i class="far fa-money-bill-alt text-secondary me-2 display-31 display-sm-30"></i><strong>$35 / hr</strong></span>
                                        <span><i class="ti-briefcase text-secondary me-2 display-31 display-sm-30"></i><strong>80%</strong></span>
                                    </div>
                                    <a href="candidate-details.html" class="butn w-100 radius-10">View Profile</a>
                                </div>
                            </div>
                            <div class="card card-style7 radius-10">
                                <div class="card-body">
                                    <a class="candidate-favourite" href="#!"><i class="far fa-heart"></i></a>
                                    <img src="img/candidate/candidate-04.jpg" class="border-radius-50 mb-3" alt="...">
                                    <div class="candidate-info">
                                        <h4 class="h5"><a href="candidate-details.html">France Maheu</a></h4>
                                        <span class="display-30 text-muted d-block mb-2 font-weight-500">Digital Marketer</span>
                                        <div class="display-30 text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="px-2 py-1 bg-primary text-white ms-2 display-31 border-radius-10">5.0</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span><i class="ti-location-pin text-secondary me-2 display-31 display-sm-30"></i><strong>UK</strong></span>
                                        <span><i class="far fa-money-bill-alt text-secondary me-2 display-31 display-sm-30"></i><strong>$50 / hr</strong></span>
                                        <span><i class="ti-briefcase text-secondary me-2 display-31 display-sm-30"></i><strong>90%</strong></span>
                                    </div>
                                    <a href="candidate-details.html" class="butn w-100 radius-10">View Profile</a>
                                </div>
                            </div>
                            <div class="card card-style7 radius-10">
                                <div class="card-body">
                                    <a class="candidate-favourite" href="#!"><i class="far fa-heart"></i></a>
                                    <img src="img/candidate/candidate-05.jpg" class="border-radius-50 mb-3" alt="...">
                                    <div class="candidate-info">
                                        <h4 class="h5"><a href="candidate-details.html">Richard Bureau</a></h4>
                                        <span class="display-30 text-muted d-block mb-2 font-weight-500">Charted Accountant</span>
                                        <div class="display-30 text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="px-2 py-1 bg-primary text-white ms-2 display-31 border-radius-10">4.0</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span><i class="ti-location-pin text-secondary me-2 display-31 display-sm-30"></i><strong>Canada</strong></span>
                                        <span><i class="far fa-money-bill-alt text-secondary me-2 display-31 display-sm-30"></i><strong>$60 / hr</strong></span>
                                        <span><i class="ti-briefcase text-secondary me-2 display-31 display-sm-30"></i><strong>95%</strong></span>
                                    </div>
                                    <a href="candidate-details.html" class="butn w-100 radius-10">View Profile</a>
                                </div>
                            </div>
                            <div class="card card-style7 radius-10">
                                <div class="card-body">
                                    <a class="candidate-favourite" href="#!"><i class="far fa-heart"></i></a>
                                    <img src="img/candidate/candidate-06.jpg" class="border-radius-50 mb-3" alt="...">
                                    <div class="candidate-info">
                                        <h4 class="h5"><a href="candidate-details.html">Uta Fuerst</a></h4>
                                        <span class="display-30 text-muted d-block mb-2 font-weight-500">Marketing Advisor</span>
                                        <div class="display-30 text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="px-2 py-1 bg-primary text-white ms-2 display-31 border-radius-10">5.0</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span><i class="ti-location-pin text-secondary me-2 display-31 display-sm-30"></i><strong>London</strong></span>
                                        <span><i class="far fa-money-bill-alt text-secondary me-2 display-31 display-sm-30"></i><strong>$35 / hr</strong></span>
                                        <span><i class="ti-briefcase text-secondary me-2 display-31 display-sm-30"></i><strong>75%</strong></span>
                                    </div>
                                    <a href="candidate-details.html" class="butn w-100 radius-10">View Profile</a>
                                </div>
                            </div>
                            <div class="card card-style7 radius-10">
                                <div class="card-body">
                                    <a class="candidate-favourite" href="#!"><i class="far fa-heart"></i></a>
                                    <img src="img/candidate/candidate-07.jpg" class="border-radius-50 mb-3" alt="...">
                                    <div class="candidate-info">
                                        <h4 class="h5"><a href="candidate-details.html">Onuora Ubanwa</a></h4>
                                        <span class="display-30 text-muted d-block mb-2 font-weight-500">Marketing Manager</span>
                                        <div class="display-30 text-warning">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="px-2 py-1 bg-primary text-white ms-2 display-31 border-radius-10">4.0</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span><i class="ti-location-pin text-secondary me-2 display-31 display-sm-30"></i><strong>London</strong></span>
                                        <span><i class="far fa-money-bill-alt text-secondary me-2 display-31 display-sm-30"></i><strong>$35 / hr</strong></span>
                                        <span><i class="ti-briefcase text-secondary me-2 display-31 display-sm-30"></i><strong>75%</strong></span>
                                    </div>
                                    <a href="candidate-details.html" class="butn w-100 radius-10">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <a href="index.html" class="footer-logo"><img src="img/logos/logo-white.png" alt="..."></a>
                            </div>
                            <div class="flex-grow-1 border-sm-start border-color-light-white ms-sm-4 ps-sm-4 border-width-2">
                                <p class="mb-0 display-30 text-white opacity9 w-lg-95">Create a free account to discover lots of Jobs & Career Opportunities around you!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-1-9">
                        <div class="row">
                            <div class="col-sm-4 mb-1-9 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="img/icons/icon-09.png" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h3 class="h2 mb-1 countup font-weight-700 text-white">1327</h3>
                                        <p class="mb-0 font-weight-600 text-white opacity9 display-30">Job Posted</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-1-9 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="img/icons/icon-10.png" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h2 mb-1 countup font-weight-700 text-white">150</h3>
                                        <p class="mb-0 font-weight-600 text-white opacity9 display-30">Job Filled</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="img/icons/icon-11.png" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h2 mb-1 countup font-weight-700 text-white">220</h3>
                                        <p class="mb-0 font-weight-600 text-white opacity9 display-30">Companies</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-n2-6">
                    <div class="col-sm-6 col-lg-3 mt-2-6">
                        <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Contact Us</h3>
                        <p class="mb-1-6 text-white opacity9">Advertise your jobs to hundreds of thousands of monthly customers and seek 15.8 million CV in our database.</p>
                        <ul class="contact-list">
                            <li class="d-flex"><span class="fa fa-home pe-3 text-white"></span><a href="#!">66 Guild Street 512B, Great North Town.</a></li>
                            <li class="d-flex"><span class="fa fa-phone-alt pe-3 text-white"></span><a href="#!">(+44) 123 456 789</a></li>
                            <li class="d-flex"><span class="fa fa-envelope pe-3 text-white"></span><a href="#!">info@example.com</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <div class="ps-sm-1-9">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Information</h3>
                            <ul class="footer-list-style1">
                                <li><a href="aboutus.html">About us</a></li>
                                <li><a href="blog-grid.html">Blog</a></li>
                                <li><a href="how-it-works.html">Our Process</a></li>
                                <li><a href="pricing-plans.html">Our Pricing</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <div class="ps-lg-1-9">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Candidates</h3>
                            <ul class="footer-list-style1">
                                <li><a href="candidate-applied-job.html">Applied Job</a></li>
                                <li><a href="candidate-cv-manager.html">CV Manager</a></li>
                                <li><a href="candidate-shortlisted-jobs.html">Shortlisted Jobs</a></li>
                                <li><a href="candidate-job-alerts.html">Job Alerts</a></li>
                                <li><a href="candidate-dashboard.html">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <div class="ps-sm-1-9 ps-lg-2-2 ps-xl-2-5">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Employers</h3>
                            <ul class="footer-list-style1">
                                <li><a href="employer-packages.html">Job Packages</a></li>
                                <li><a href="employer-company-profile.html">Company Profile</a></li>
                                <li><a href="employer-manage-job.html">Manage Job</a></li>
                                <li><a href="employer-resume-alerts.html">Resume Alerts</a></li>
                                <li><a href="employer-post-job.html">Post a Job</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-6">
                        <div class="ps-lg-2-2 ps-xl-2-5">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Join Newsletter</h3>
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
                            <p class="d-inline-block text-white mb-0">&copy; <span class="current-year"></span> Job Board Powered by
                                <a href="https://www.chitrakootweb.com/" target="_blank" class="text-primary white-hover">Chitrakoot Web</a>
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
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        $(document).on('click', '.follow', function (e) {
            e.preventDefault();

            
                var student_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "editprofile.php",
                    data: {
                        'update_req': true,
                        'name': $('#name').val(),
                        'address': $('#address').val(),
                        'gender': $('input[name="gender"]:checked').val(),
                        'gender': $('input[name="occupation"]:checked').val(),
                        'age': $('#age').val(),
                        'workhour': $('#workhour').val(),
                        'approxsalary': $('#approxsalary').val(),
                        
                    },
                    beforeSend: function(){
                        $("#loader").css("display", "block");
                        $("#follow").css("display", "none");
                    },
                    
                    complete: function(){
                        $("#loader").css("display", "none");
                        $("#follow").css("display", "block");
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {
                            console.log("error");
                        }else{
                            // alertify.set('notifier','position', 'top-right');
                            // alertify.success(res.message);

                            console.log("success");

                            // $("#modal").css("display", "none");
                            $('#exampleModalToggle').modal('hide');
                            $('#actionBlock').load(location.href + " #actionBlock");
                            window.location = "myprofile.php";
                        }
                    }
                    
                });
        });
       

    </script>
<!-- all js include end -->

</body>


<!-- Mirrored from jobboard.websitelayout.net/candidate-applied-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:19 GMT -->
</html>

