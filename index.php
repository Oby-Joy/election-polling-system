<?php
  include("connect.php");
  include('modals.php');
  $selectquery=mysqli_query($connect, "SELECT * FROM positions");
  $countposition=mysqli_num_rows($selectquery);

  $selquery=mysqli_query($connect, "SELECT * FROM candidates");
  $countcandidates=mysqli_num_rows($selquery);

  $selquery=mysqli_query($connect, "SELECT * FROM voters");
  $countvoters=mysqli_num_rows($selquery);

  $selquery=mysqli_query($connect, "SELECT * FROM pvote");
  $countvote=mysqli_num_rows($selquery);

  $selquery=mysqli_query($connect, "SELECT * FROM pvote UNION ALL SELECT * FROM vpvote");
  $countvotes=mysqli_num_rows($selquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="css/owl.transitions.css" type="text/css">
    <link href="css/slick.css" rel="stylesheet">
    <title>Election Polling System | Dashboard</title>
    <style>
        *{
          font-size:15px;
        }
        .side-navbar {
            width: 180px;
            height: 100%;
            position: fixed;
            margin-left: -300px;
            background-color: #100901;
            transition: 0.5s;
            }

            .nav-link:active,
            .nav-link:focus,
            .nav-link:hover {
            background-color: #ffffff26;
            }

            .my-container {
            transition: 0.4s;
            }

            .active-nav {
            margin-left: 0;
            }
            /* for main section */
            .active-cont {
            margin-left: 180px;
            }

            #menu-btn {
            background-color: #100901;
            color: #fff;
            margin-left: -62px;
            }
            li{
                color:white;
            }

    </style>
</head>
<body>
    <!--sidebar-->
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <ul class="nav flex-column text-white w-100" style="font-size:13px;">
          <a href="#" class="nav-link h3 text-white my-2" style="font-size:20px;">
            Voting System
          </a>
          <li href="#" class="nav-link my-2">
            <img src="images/FB_IMG_15856364635622955.jpg" style="height:40px; width:40px; border-radius:50%;"> <span class="mx-2 text-white" style="font-size:12px;">Igbonekwu Joy</span>
          </li>

          <h6 style="background:rgb(70, 69, 69); padding:10px 50px 10px 50px; color:grey; font-size:12px;">REPORTS</h6>
          <a href="index.php" class="nav-link text-white">
            <i class="fa fa-home"></i><span class="mx-2">Dashboard</span>
          </a>
          <a href="votes.php" class="nav-link text-white">
            <i class="fa fa-lock"></i> <span class="mx-2">Votes</span>
          </a>

          <h6 style="background:rgb(70, 69, 69); padding:10px 50px 10px 50px; color:grey; font-size:12px;">MANAGE</h6>
          <a href="vlist.php" class="nav-link text-white">
            <i class="fa fa-users"></i> <span class="mx-2">Voters</span>
          </a>
          <a href="position.php" class="nav-link text-white">
            <i class="fa fa-calendar-o"></i> <span class="mx-2">Positions</span>
          </a>
          <a href="candidates.php" class="nav-link text-white">
            <i class="fa fa-check-square"></i> <span class="mx-2">Candidates</span>
          </a>

          <h6 style="background:rgb(70, 69, 69); padding:10px 50px 10px 50px; color:grey; font-size:12px;">SETTINGS</h6>
          <a href="ballot.php" class="nav-link text-white">
            <i class="fa fa-clock-o"></i> <span class="mx-2">Ballot Position</span>
          </a>
          <a href="" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#staticBackdro">
            <i class="fa fa-pencil"></i> <span class="mx-2">Election Title</span>
          </a>
        </ul>
    </div>

    <!--main content-->
    <div class="p-1 my-container active-cont">
        <a class="btn border-0 mx-1" id="menu-btn">
          <i class="fa fa-bars" style="padding:5px 1125px 0 0;"></i>
        </a><br/>

        <!--dashboard-->
        <h4 style="color:grey;">Dashboard</h4>
        <div class="row">
            <div class="col-lg-2 col-sm-4 col-xs-4 my-2 mx-3" style="background:orange; padding:10px 20px 10px 20px;">
                <i class="fa fa-calendar" style="float:right; font-size:70px;"></i>
                <p style="font-size:40px;"><?php echo htmlentities($countposition); ?></p>
                <p>No. of positions</p>
            </div>
            <div class="col-lg-2 col-sm-4 col-xs-4 my-2 mx-3" style="background:blue; padding:20px;">
                <i class="fa fa-check-square" style="float:right; font-size:70px;"></i>
                <p style="font-size:40px;"><?php echo htmlentities($countcandidates); ?></p>
                <p>No. of candidates</p>
            </div>
            <div class="col-lg-2 col-sm-4 col-xs-4 my-2 mx-3" style="background:green; padding:20px;">
                <i class="fa fa-users" style="float:right; font-size:70px;"></i>
                <p style="font-size:40px;"><?php echo htmlentities($countvoters); ?></p>
                <p>No. of voters</p>
            </div>
            <div class="col-lg-2 col-sm-4 col-xs-4 my-2 mx-3" style="background:red; padding:20px;">
                <i class="fa fa-lock" style="float:right; font-size:70px;"></i>
                <p style="font-size:40px;"><?php echo htmlentities($countvote); ?></p>
                <p>No. of votes</p>
            </div>
            <div class="col-lg-2 col-sm-4 col-xs-4 my-2 mx-3" style="background:yellow; padding:20px;">
                <i class="fa fa-users" style="float:right; font-size:70px;"></i>
                <p style="font-size:40px;"><?php echo htmlentities($countvotes); ?></p>
                <p>Total votes</p>
            </div>
        </div>
        

        <!--votes tally-->
        <h4 style="color:grey; margin-top:5px; margin-bottom:250px;">Votes Tally</h4><hr/>

        <footer>
            <p>&copy; 2021 | Designed by Joy Igbonekwu</p>
        </footer>
    </div>

    <!--<script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>-->
    <script src="js2/bootstrap.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/interface.js"></script> 
    <script>
        var menu_btn = document.querySelector("#menu-btn");
        var sidebar = document.querySelector("#sidebar");
        var container = document.querySelector(".my-container");
        menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
        });
    </script>
</body>
</html>