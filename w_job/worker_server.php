<?php

    include "../db/db.php";
    // $query = mysqli_query($con, "SELECT * FROM register WHERE occupation = 'farmer'");
	// while($row = mysqli_fetch_array($query)){
        // $email = $row['email'];
        $query1 = mysqli_query($con, "SELECT * FROM user_profile WHERE occupation = 'farmer' AND requested = 1");

        $row1 = mysqli_fetch_assoc($query1);
        ?>

<div class="col-md-6 mt-1-9">
    <div class="card border-color-extra-light-gray h-100 border-radius-5">
        <div class="card-body p-1-6 p-xl-1-9">
            <div class="d-flex mb-3">
                <div class="flex-shrink-0">
                    <img src="img/logos/person1.jpg" class="border-radius-50 w-40px" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0"><?php echo $row1['fullname']; ?></h6>
                    <span class="text-muted display-31">Nov 18, 2021</span>
                </div>
            </div>
            <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
            <div class="mb-4">
                <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i><?php
                if(isset($row1['address'])){
                    echo $row1['address'];
                }else{
                    echo "Not set";
                }
                ?></span>
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
    // }
?>