<?php

$con = new mysqli("localhost", "root","", "ecohub");
if (!$con) {
    die(mysqli_error($con));
}
$sql = "select * from org_sell ;";
$result=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <style>
        .jumbotron {
            background: url('https://media.istockphoto.com/id/1674129446/photo/green-young-plant.jpg?s=612x612&w=0&k=20&c=BUs2_hpD5RFeEEVmQfJ3dFp_YT8d5S_5Oec7kIQxAmk=');
            background-size: cover;
            color: white;
            
            
            
        }
        

        .btn,
        .active {
            transition: .4s;
            
        }
    </style>
    <link rel="icon" type="image/x-icon"
        href="C:\Users\YASODHARA\Downloads\startbootstrap-scrolling-nav-gh-pages\startbootstrap-scrolling-nav-gh-pages\images\logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img src="images/logo.png" class="logoimg" />
        <a class="navbar-brand ps-3" href="">EcoHub</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                
                    <li><a class="dropdown-item" href="index.html">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="org_dash.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="org_buy.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Buy
                        </a>
                        <a class="nav-link" href="org_sell.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Sell
                        
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Organisation
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard Organisation</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"></li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="jumbotron jumbotron-fluid bg-info">
                                <div class="container text-sm-center pt-3">
                                    <h1 class="display-2 hidden-sm-down">E-Waste India </h1>
                                    <br>
                                    
                                    <p class="lead">recycle@ewasteindia.com</p>
                                    <p class="lead">www.ewasteindia.com</p>
                                    <p class="lead">123 Enchanted Lane
                                        Dreamville, FCT 54321
                                        Fantasia Country</p>
                                    <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Total Cost Spent on e-waste</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <h1><?php
                                    $sql= "SELECT price from `org_sell`;";
                                    //print_r($s);
                                    //$quantity = $_POST['quantity'];
                                    $result = $con->query($sql);

                                    // Check if there are rows in the result
                                    if ($result->num_rows > 0) {
                                        // Initialize sum
                                        $sum = 0;

                                        // Loop through the rows
                                        while ($row = $result->fetch_assoc()) {
                                            // Add each value to the sum
                                            $sum += $row["price"];
                                        }

                                        // Display the sum
                                        echo $sum ;
                                    } 
                                    
                                    ?></h1>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Quantity of e-waste generated</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <h1><?php
                                    $sql= "SELECT quantity from `org_sell`;";
                                    //print_r($s);
                                    //$quantity = $_POST['quantity'];
                                    $result = $con->query($sql);

                                    // Check if there are rows in the result
                                    if ($result->num_rows > 0) {
                                        // Initialize sum
                                        $sum = 0;

                                        // Loop through the rows
                                        while ($row = $result->fetch_assoc()) {
                                            // Add each value to the sum
                                            $sum += $row["quantity"];
                                        }

                                        // Display the sum
                                        echo $sum ;
                                    } 
                                    
                                    ?></h1>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <!--<div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <h1>500</h1>
                                    
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <div class="row">
                        
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Monthly Staterstics
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; EcoHub 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
                
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>