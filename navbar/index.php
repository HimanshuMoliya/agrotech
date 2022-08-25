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
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>

      #cont{
        background-color: #f9fafe;
      }

      #navbar{
        background-color: #f9fafe;
      }

      #navbar{
        background: #ecf5ff;
        background-size: 300% 300%;
        color: black;
        }

      button::before{
          background: white;
      }

      #search_btn{
        border: 1px solid rgb(134, 141, 134);
        background: #0675e8;
        border-radius: 2rem;
        box-shadow: 2px 4px 3px 1px #b3cccc;
      }

      #profile_img {
      width: 50px;
      border: 1px solid black;
      margin-right: 20px;
      height: 48px;
    }

    #logo{
      width: 100%;
    }
    #logo_div{
        width: 100%;
        max-width: 60px;
    }


    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light" id="navbar">
        <div class="container-fluid" id="cont">
            <div id="logo_div">
              <a class="navbar-brand" href="#"><img src="navbar/images/logo.png" id="logo"></a>
            </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> 
          <div class="collapse navbar-collapse menu_items" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-dark" aria-current="page" href="/index1.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="#">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Services
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link text-dark" href="#">Contact Us</a>
              </li>
            </ul>
               
            <form class="d-flex" role="search" id="search_icon">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn w-50 text-light" type="submit" id="search_btn">Search</button>
            </form>
            <a href="/myprofile.php">
            <!-- <img src="/agrotech/assets/navbar/images/person1.jpg" class="rounded-circle" id="profile_img"> -->

            <?php 
                if(!isset($userinfo['picture'])){
                ?>
                <img
                  src="assets/css/img/user-default.png"
                  alt="avatar"
                  class="rounded-circle img-fluid"
                  style="width: 150px"
                />
                
                <?php
                }else{
                  ?>
                  <img src="<?php 
             echo $userinfo['picture']; ?>" alt="" width="90px" height="90px" class="rounded-circle" id="profile_img"> 
                <?php
                }
                ?>
             
            <!-- <img src="https://lh3.googleusercontent.com/a/AItbvmnKBcTr6lqh3jV224BUJ8LUQjnAaAtB8CKw2264=s96-c" alt="error"> -->

            </a>
          </div>
        </div>
      </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>