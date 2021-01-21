<?php
include_once './config/config.php';
$result = mysqli_query($Conn,"SELECT * FROM orders");

?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Mr.Broo's - Admin Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- plugin css -->
        <link href="../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
		<link href="../assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
		<!-- icons -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    </head>

    <body class="loading">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="../assets/images/logo.PNG" alt="" height="97">
                            <!-- <span class="logo-lg-text-light">Minton</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="../assets/images/logo.PNG" alt="" height="97">
                            <!-- <span class="logo-lg-text-light">M</span> -->
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="../assets/images/logo.PNG" alt="" height="97">
                        </span>
                        <span class="logo-lg">
                            <img src="../assets/images/logo.PNG" alt="p" height="97">
                        </span>
                    </a>
                </div>

                <div class="h-100" data-simplebar>
                     <!--- Sidemenu -->
                     <div id="sidebar-menu">

<ul id="side-menu">

    <!-- <li class="menu-title">Navigation</li> -->

    <li>
        <a href="index.html" >
            <i class="fa fa-home"></i>
            <span> Dashboards </span>
        </a>
    </li>
    <li class="menu-title mt-2">Manage</li>

    <li>
        <a href="product.html">
            <i class="far fa-gem"></i>
            <span> Products</span>
        </a>
    </li>
    <li>
        <a href="orders.html">
            <i class="fas fa-paste"></i>
            <span> Orders </span>
        </a>
    </li>
    <li>
        <a href="payment.html">
            <i class="far fa-credit-card"></i>
            <span> Payment </span>
        </a>
    </li>

    <li>
        <a href="orders.html">
            <i class="far fa-star"></i>
            <span> Review </span>
        </a>
    </li>
    <li>
        <a href="analytics.html">
            <i class="fas fa-signal"></i>
            <span> Analytics </span>
        </a>
    </li>
    <li>
        <a href="post.html">
            <i class="far fa-plus-square"></i>
            <span> Post </span>
        </a>
    </li>
    <li>
        <a href="settings.html">
            <i class="fas fa-cog"></i>
            <span> Settings</span>
        </a>
    </li>
    </li>
</ul>
</div>
</div>
<!-- End Sidebar -->

                    

                   
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <div class="container-fluid">
                            <ul class="list-unstyled topnav-menu float-right mb-0">
                             <li class="d-none d-lg-block">
                                    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <button id="button-addon2" type="submit" class="btn btn-link text-warning"><i class="fa fa-search"></i></button>
                                          </div>
                                          <input type="search" placeholder="Search"  class="form-control border-0 bg-light">
                                        </div>
                                      </div>
                                     
                                </li>
    
                                <!-- <li class="">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="../assets/images/flags/us.jpg" alt="user-image" height="14">
                                    </a>
                                   
                                </li> -->
    
                            </ul>

                            <!-- LOGO -->
                            <div class="logo-box">
                                <a href="index.html" class="logo logo-dark text-center">
                                    <span class="logo-sm">
                                        <img src="../assets/images/logo.PNG" alt="" height="97">
                                        <!-- <span class="logo-lg-text-light">Minton</span> -->
                                    </span>
                                    <span class="logo-lg">
                                        <img src="../assets/images/logo.PNG" alt="" height="97">
                                        <!-- <span class="logo-lg-text-light">M</span> -->
                                    </span>
                                </a>

                                <a href="index.html" class="logo logo-light text-center">
                                    <span class="logo-sm">
                                        <img src="../assets/images/logo.PNG" alt="" height="97">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="../assets/images/logo.PNG" alt="" height="97">
                                    </span>
                                </a>
                            </div>
    
                            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                                <!-- <li>
                                    <button class="button-menu-mobile waves-effect waves-light">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </li> -->

                                <li>
                                    <!-- Mobile menu toggle (Horizontal Layout)-->
                                    <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                        <div class="lines">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <!-- End mobile menu toggle-->
                                </li>   
            
                               
    
                                    </div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- end Topbar -->
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"> <i class="far fa-credit-card"></i> Payment</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           
                                            <li class="breadcrumb-item active">payment</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>    

                        <!-- <div class="row"> -->
                            <!-- User Input -->
                            <div class="col-lg-4">
                                <div class="card" style="height:6rem">
                                    <div class="card-body">
                                        <div>
                                            <h2 class="header-title"> Balance</h4>
                                            <h3 class="my-2 py-1"><span >₦0.00</span></h3>
                                           
                                        </div>
                                        
    
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card" style="height:4rem;">
                                    <div class="card-body">
                                        <div>
                                            <h2 class="header-title"> Transactions
                                                <span class="header-title" style="margin-left:48rem;"><i class="fas fa-download"></i><a href="#"> Download </a></span></h4>

                                        </div>
                                        
    
                                    </div>

                                </div>
                            </div>

                                <!-- end page title --> 

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        
    
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-12 text-sm-center form-inline">
                                                    <div class="form-group mr-2">
                                                        <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                            <option value="">Show all</option>
                                                            <option value="active">Active</option>
                                                            <option value="disabled">Disabled</option>
                                                            <option value="suspended">Suspended</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                          
                                           if (mysqli_num_rows($result) > 0) {
                                           ?>
                                        
                                          <div class="table-responsive">

                                            <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                <thead>
                                                <tr>
                                                    <th data-toggle="true">S/N</th>
                                                    <th>Description</th>
                                                    <th data-hide="phone">Amount</th>
                                                    <th data-hide="phone, tablet">Status</th>
                                                   
                                                </tr>
                                                </thead>
                                                <?php
                                                    $i=0;
                                                    while($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                <tbody>
                                                <tr>
                                                <td><?php echo $row["ID"]; ?></td>
                                                <td><?php echo $row["product"]; ?></td>
                                                <td><?php echo $row["cost"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                            </tr>
                                               
                                                </tbody>
                                               <?php $i++;
                                               }
                                                ?>
                                                <?php
                                                    }
                                                    else{
                                                        echo "No result found";
                                                    }
                                                    ?>
                                                <tfoot>
                                                <tr class="active">
                                                    <td colspan="5">
                                                        <div class="text-right">
                                                            <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                       
                                        </div> <!-- end .table-responsive-->
                                   
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                         
                        </div>
                                        
    
                                    </div>

                                </div>
                            </div>
                        </div> 
                        </div>
                        <!-- end row -->

                       
                       

                            
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <script>document.write(new Date().getFullYear())</script> &copy; Minton theme by <a href="#">Coderthemes</a>  -->
                            </div>
                            <div class="col-md-6">
                                <!-- <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- KNOB JS -->
        <script src="../assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <!-- Apex js-->
        <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Plugins js-->
        <script src="../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

        <!-- Dashboard init-->
        <script src="../assets/js/pages/dashboard-sales.init.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
    
    </body>

<!-- Mirrored from coderthemes.com/minton/layouts/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Dec 2020 15:54:16 GMT -->
</html>