<!-- It should show us : 
    -number of sells
    -how much euros we earned
    -most popular article
    -purcentage more/less since the last month

    + list of users
    - name / mail / gender / age - password - 
-->
<?php include 'connectdatabase.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/light-bootstrap-dashboard.css">
    <title></title>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                AWP Project
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="#">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="exportproducts.php"> Export products</a>
                </li>
                <li>
                    <a href="exportusers.php"> Export users</a>
                </li>
                <li>
                    <a href="exportsales.php"> Export sales</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>





        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <center><h4> Last purchase </h4></center>
                         <?php
                            $sql = " SELECT ProductCode as lastpurchase FROM sales ORDER BY id DESC";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total = $row['lastpurchase'];
                            echo "<h4><center>".$row['lastpurchase']."  </center></h4>";
                        ?>
                    </div>
                    <div class="col-lg-4">
                        <center><h4> Users </h4></center> </br>
                        <center><a href="usersinfos.php"><button> See all users</button></a></center>
                    </div>
                </div></br>
                 <div class="row" style="background-color: #976DD9; color:white;">
                    <div class="col-lg-6">
                        <center><h4> Money earned </h4></center>
                        <?php
                            $sql = "SELECT SUM(TotalPrice) as totalprice FROM sales";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total = $row['totalprice'];
                            echo "<h4><center>".$row['totalprice']."$  </center></h4>";
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <center><h4> Average product price</h4></center>
                        <?php
                            $sql = "SELECT AVG(buyPrice) as Average FROM products ";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total = $row['Average'];
                            echo "<h4><center>".$row['Average']." $ </center></h4>";
                        ?>
                    </div>

                </div>
                 <div class="row">
                    <div class="col-lg-4">
                        <center><h4> Total number of sales </h4></center>
                        <?php
                            $sql = "SELECT COUNT(QuantityProduct) as quantity FROM sales";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total = $row['quantity'];
                            echo "<h4><center>".$row['quantity']."  </center></h4>";
                        ?>
                    </div>
                    <div class="col-lg-4">
                        <center><h4> Total number of users </h4></center>

                        <?php 
                        $sql = "SELECT COUNT(id) as allusers FROM users ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total = $row['allusers'];
                        echo "<h4><center>".$row['allusers']."</center></h4>";
                        ?>

                    </div>
                    <div class="col-lg-4">
                        <center><h4> Total number of products </h4></center>
                        <?php 
                        $sql = "SELECT COUNT(productName) as allproducts FROM products ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total = $row['allproducts'];
                        echo "<h4><center>".$row['allproducts']."</center></h4>";
                        ?>
                    </div>
                    <div class="col-lg-4">
                    
                    </div>
                </div>

                <div class="row" style="background-color: #976DD9; color:white;">
                    <div class="col-lg-3">
                        <center><h4>Sell per month : </h4></center>
                    </div>
                    <div class="col-lg-3">
                        <center><h4>Total sell this month</h4></center>
                        <?php 
                        $sql = "SELECT COUNT(QuantityProduct) as allproducts
                                FROM sales
                                WHERE MONTH(CURRENT_TIMESTAMP) ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total = $row['allproducts'];
                        echo "<h4><center>".$row['allproducts']."</center></h4>";
                        ?>
                    </div>
                    <div class="col-lg-3">
                        <center><h4>Total earned this month</h4></center>
                        <?php 
                        $sql = "SELECT SUM(TotalPrice) as pricemonth
                                FROM sales
                                WHERE MONTH(CURRENT_TIMESTAMP) ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total = $row['pricemonth'];
                        echo "<h4><center>".$row['pricemonth']."$</center></h4>";
                        ?>
                    </div>
                    <div class="col-lg-3">
                        <center><h4>Last month</h4></center>
                         <?php 
                        $sql = "SELECT SUM(TotalPrice) as lastpricemonth
                                FROM sales
                                WHERE MONTH(CURRENT_TIMESTAMP) = MONTH(CURRENT_TIMESTAMP)-1 ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total = $row['lastpricemonth'];
                        echo "<h4><center>".$row['lastpricemonth']."0$</center></h4>"; //delete the 0 next month
                        ?>
                    </div>
                </div>
            </div>
        </div>



        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </footer>

    </div>
</div>
</body>
</html>
<?php

?>