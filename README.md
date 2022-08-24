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


background color 
#ecf5ff

button color 
#0675e8


code for access google photo name email etc...
<img src="<?php echo $userinfo['picture'];?>" alt="" width="90px" height="90px">
    
    <ul>
        <li>Full name: <?php echo $userinfo['fullname']; ?></li>
        <li>Email: <?php echo $userinfo['email']; ?></li>
        <li>Gender: <?php echo $userinfo['gender']; ?></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>