# agrotech

# planetoid-vivah
git add .
git commit -m "commit" 
git push


# get latest update
git pull

INSERT INTO `user_profile` (`id`, `email`, `fullname`, `profile_picture`, `about`, `birthdate`, `gender`, `location`, `mothertongue`, `hobbys`, `maritualstatus`, `ethencity`, `heighest_education`, `occupation`, `annual_income`, `height`, `weight`, `any_disability`, `my_habbits`, `verified`, `is_online`, `date`) VALUES (NULL, 'pk@gmail.com', 'pk', 'pkj', 'pk', '2022-07-13', 'pk', 'pk', 'pk', 'pk', 'pk', 'pk', 'pk', 'pk', '120', '111', '55', 'no', 'no', '1', '1', CURRENT_TIMESTAMP);


client id
837007103942-jr4t61mr2h5d007p13sitc7ene3lo0ba.apps.googleusercontent.com

secret id
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

https://aggregate-agro.herokuapp.com/

google credential link
https://console.cloud.google.com/apis/credentials/oauthclient/837007103942-jr4t61mr2h5d007p13sitc7ene3lo0ba.apps.googleusercontent.com?authuser=2&project=agrotech-359105&supportedpurview=project

<<<<<<< HEAD
navbar

    background: #f9fafe!important;

footer

    #000;
=======

background color 
#ecf5ff

button color 
#0675e8


photo retrive url
<!-- https://photoserver.pythonanywhere.com/static/avatar/<?php echo $row_member['profile_picture']; ?> -->


atlu myprofile na page ma edit thay avu karvanu che
address
occupation 
gender
age
workhour
approxsalary



 <!-- <div class="col-lg-12 mb-1-9 mb-lg-2-5">
                                <div class="dashboard-title">
                                    <h5 class="mb-0">Recent Request</h5>
                                </div>
                                <div class="dashboard-widget">
                                    <div class="row mt-n1-9">
                                        <?php
                                        // $p_id = $_SESSION['sendto'];
                                        // $id = $_SESSION['sendfrom'];
                                        $query = "SELECT * FROM request ";
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

