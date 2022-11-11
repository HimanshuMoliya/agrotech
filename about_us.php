
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


<!-- Mirrored from jobboard.websitelayout.net/aboutus.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:47:59 GMT -->
<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Job Portal HTML Template" />
    <meta name="description" content="Job Board - Job Portal HTML Template" />

    <!-- title  -->
    <title>Job Board - Job Portal HTML Template</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/logos/favicon.png" />
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
                        <h1 class="mb-4">About Us</h1>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="page-title-list">
                                    <ol class="breadcrumb d-inline-block mb-0">
                                        <h6>Get Your Opportunities</h6>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ABOUTUS
        ================================================== -->
        <section class="about-style-01">
            <div class="container border-bottom border-color-extra-light-gray mb-1-9 mb-lg-6 pb-1-9 pb-lg-6">
                <div class="row align-items-center mt-n2-9">
                    <div class="col-lg-6 mt-2-9">
                        <div class="pe-xl-2-5">
                            <div class="row g-3">
                                <div class="col-8">
                                    <img src="img/bg/whome1.jpg" class="border-radius-10" alt="...">
                                </div>
                                <div class="col-4 mt-2-9 mt-sm-11 mt-md-16 mt-lg-9 mt-xl-2-5 mt-xxl-6">
                                    <div class="about-image-wrapper">

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="about-image">
                                        <img src="img/bg/whome3.jpg" class="border-radius-10" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2-9">
                        <div class="about-right ps-xl-1-6 ps-xxl-2-9">
                            <h2 class="mb-4 text-capitalize">We Care About Your Life For Better Future.</h2>
                            <p class="mb-4">Start taking a while for your job search to request and agenda informational interviews with human beings withinside the fields you’re interested by to find out about their profession paths and get profession advice.</p>
                            <div class="row border-bottom border-color-extra-light-gray mb-1-9 pb-1-9">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h4 class="mb-3"><span>01</span>What We Believe</h4>
                                    <p class="mb-0">Single one in all our jobs has a few sort of flexibility option.</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-3"><span>02</span>What We Offer</h4>
                                    <p class="mb-0">Single one in all our jobs has a few sort of flexibility option.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="img/content/author-sign.png" alt="...">
                                </div>
                                <div class="flex-grow-1 border-start border-width-2 border-color-extra-light-gray ps-3 ps-sm-4 ms-3 ms-sm-4">
                                    <h5>Svend Heilmann</h5>
                                    <p class="mb-0">Co-Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES
        ================================================== -->
        <section class="bg-very-light-gray">
            <div class="container">
                <div class="section-heading">
                    <h2>Our Best Services For You</h2>
                    <p>Know your really worth and find the job that qualify your life.</p>
                </div>
                <div class="row mt-n1-9">
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="service-wrapper">
                            <div class="service-icons">
                                <img src="img/icons/icon-18.png" alt="...">
                            </div>
                            <h4 class="h5 mb-3">Resume Upload</h4>
                            <p class="mb-0 w-90 mx-auto">If success is a process with a number of defined steps.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="service-wrapper">
                            <div class="service-icons">
                                <img src="img/icons/icon-19.png" alt="...">
                            </div>
                            <h4 class="h5 mb-3">CV Search</h4>
                            <p class="mb-0 w-90 mx-auto">If success is a process with a number of defined steps.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="service-wrapper">
                            <div class="service-icons">
                                <img src="img/icons/icon-20.png" alt="...">
                            </div>
                            <h4 class="h5 mb-3">Display Jobs</h4>
                            <p class="mb-0 w-90 mx-auto">If success is a process with a number of defined steps.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROCESS
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <h2>Our Working Process</h2>
                    <p>Know your really worth and find the job that qualify your life.</p>
                </div>
                <div class="row mt-n1-9">
                    <div class="col-sm-6 col-lg-3 mt-2-2">
                        <div class="process-style1">
                            <div class="line"></div>
                            <div class="number-wrapper">
                                <div class="number">01</div>
                            </div>
                            <h5 class="mb-lg-3">Create Account</h5>
                            <p class="mb-0 w-md-90 mx-auto">Search all the open positions on the web that suits you.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-2">
                        <div class="process-style1">
                            <div class="line"></div>
                            <div class="number-wrapper">
                                <div class="number">02</div>
                            </div>
                            <h5 class="mb-lg-3">CV / Resume Upload</h5>
                            <p class="mb-0 w-md-90 mx-auto">Search all the open positions on the web that suits you.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-2">
                        <div class="process-style1">
                            <div class="line"></div>
                            <div class="number-wrapper">
                                <div class="number">03</div>
                            </div>
                            <h5 class="mb-lg-3">Find Your Job</h5>
                            <p class="mb-0 w-md-90 mx-auto">Search all the open positions on the web that suits you.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-2">
                        <div class="process-style1">
                            <div class="number-wrapper">
                                <div class="number">04</div>
                            </div>
                            <h5 class="mb-lg-3">Apply Them</h5>
                            <p class="mb-0 w-md-90 mx-auto">Search all the open positions on the web that suits you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--EXTRA
        ================================================== -->
        <section class="bg-img cover-background" data-overlay-dark="5" data-background="img/bg/scene-20.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="bg-white-opacity p-1-9 border-radius-10">
                            <h2 class="h3 mb-3 text-capitalize">Find Your Job at Anytime...</h2>
                            <p class="mb-4">Just due to the fact you don’t recognise what profession you need doesn’t imply you don’t recognise what you’re right at. A first rate manner to attention to your capabilities is to make a listing of your strengths.</p>
                            <a href="contact-us.html" class="butn">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TESTIMONIAL
        ================================================== -->
        <section class="bg-very-light-gray">
            <div class="container">
                <div class="section-heading">
                    <h2>What Our Client Says</h2>
                    <p>Know your really worth and find the job that qualify your life.</p>
                </div>
                <div class="testimonial2-carousel owl-carousel owl-theme">
                    <?php
                        $sql = "SELECT * FROM review limit 5";
                        $result = mysqli_query($con,$sql);
                        $num = mysqli_num_rows($result);
                            
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="testimonial-wrapper">
                        <div class="testimonial-icon">
                            <i class="ti-quote-left"></i>
                        </div>
                        <p class="mb-4"><?php echo substr($row['description'],0,70).'..'; ?></p>
                        <div class="testimonial-box">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <div class="mb-2 mb-sm-0">
                                    <h4 class="h5"><?php echo substr($row['name'],0,6).'..' ?></h4>
                                    <!-- <span class="designation">Web Designer</span> -->
                                </div>
                                <div class="display-31 text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                    ?>
                </div>
            </div>
        </section>

        <!-- PRICING
        ================================================== -->

        <!-- FOOTER
        ================================================== -->
        <footer class="pt-0">
            <div class="container border-bottom border-color-light-white py-2-5 py-md-6 mb-6 mb-md-8 mb-lg-10">
                <div class="row justify-content-center align-items-center mt-n1-9">
                    <div class="col-xl-6 mt-1-9">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-1-6 mb-sm-0">
                               <a href="#">Aggregate Agro</a>
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
                            <p class="d-inline-block text-white mb-0">&copy; <span class="current-year"></span> Aggregate Agro 
                                <a href="https://www.chitrakootweb.com/" target="_blank" class="text-primary white-hover"></a>
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

    <!-- all js include end -->

</body>


<!-- Mirrored from jobboard.websitelayout.net/aboutus.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:01 GMT -->
</html>