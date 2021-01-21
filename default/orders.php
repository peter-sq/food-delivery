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
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://coderthemes.com/minton/layouts/assets/images/favicon.ico">
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
                                <a href="index.php" >
                                    <i class="fa fa-home"></i>
                                    <span> Dashboards </span>
                                </a>
                            </li>
                            <li class="menu-title mt-2">Manage</li>

                            <li>
                                <a href="product.php">
                                    <i class="far fa-gem"></i>
                                    <span> Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="orders.php">
                                    <i class="fas fa-paste"></i>
                                    <span> Orders </span>
                                </a>
                            </li>
                            <li>
                                <a href="payment.php">
                                    <i class="far fa-credit-card"></i>
                                    <span> Payment </span>
                                </a>
                            </li>

                            <li>
                                <a href="orders.php">
                                    <i class="far fa-star"></i>
                                    <span> Review </span>
                                </a>
                            </li>
                            <li>
                                <a href="analytics.php">
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
                                <li>
                                    <button class="button-menu-mobile waves-effect waves-light">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </li>

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
                                    <h4 class="page-title"> <i class="fas fa-paste"></i> Orders</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           
                                            <li class="breadcrumb-item active">orders</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-danger  btn-sm"><i class="fas fa-plus" style="color: white;" > New Order</i> </a>
                                                <span class="col-sm-6">
                                                    <a href="" class="btn btn-outline-danger btn-sm" style="width: 7rem;"> Delete</a>
                                                
                                                </span>
                                            </div>
                                           
                                           
                                        </div>
                                        <!-- end row -->
                
                                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <?php 
                                          
                                          if (mysqli_num_rows($result) > 0) {
                                          ?>

                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Schedule</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Address</th>
                                                    <th>Cost</th>
                                                  
                                                    <th>Status</th>
                                                    <th>Note</th>
                                                    <th>Created</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                    $i=0;
                                                    while($row = mysqli_fetch_array($result)) {
                                                    ?>
                                        
                                            <tbody>
                                            <tr>
                                                <td><?php echo $row["ID"]; ?></td>
                                                <td><?php echo $row["schedule"]; ?></td>
                                                <td><?php echo $row["product"]; ?></td>
                                                <td><?php echo $row["quantity"]; ?></td>
                                                <td><?php echo $row["origin_address"]; ?></td>
                                                <td><?php echo $row["cost"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                                <td><?php echo $row["orderNote"]; ?></td>
                                                <td><?php echo $row["time_stamp"]; ?></td>
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
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Minton theme by <a href="#">Coderthemes</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
    
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link py-2" data-toggle="tab" href="#chat-tab" role="tab">
                            <i class="mdi mdi-message-text-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2" data-toggle="tab" href="#tasks-tab" role="tab">
                            <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>

            

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- third party js -->
        <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="../assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
        <!-- third party js ends -->

        <script src="../assets/js/pages/product-list.init.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>
        <script src="{{@BASE}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <!-- third party js -->
            <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
            <script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="../assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
            <script src="../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="../assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
            <script src="../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
            <script src="../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
            <script src="../assets/libs/pdfmake/build/pdfmake.min.js"></script>
            <script src="../assets/libs/pdfmake/build/vfs_fonts.js"></script>
          
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
</script>
            <!-- third party js ends -->
    
            <!-- Datatables init -->
            <script src="../assets/js/pages/datatables.init.js"></script>
            <script>
        $(document).ready(function() {

            $('#basic').DataTable({
                lengthMenu: [
                    [10, 50, 100, 500, 2000],
                    [10, 50, 100, 500, 2000]
                ],
                "order": [
                    [0, 'asc']
                ]
            });
    
         
    
        });
    
    </script>
        
    </body>

<!-- Mirrored from coderthemes.com/minton/layouts/default/ecommerce-products.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Dec 2020 15:54:39 GMT -->
</html>