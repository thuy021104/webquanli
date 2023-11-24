<?php

    // open session
    session_start();

    if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
        // include
        include('includes/header.php');
        include('includes/navbar.php');
        include('includes/left-sidebar.php');

        // statistical

        

        // blog
        $blog = "SELECT count(id_blog) as tong_blog FROM bai_viet";
        $rs_blog = mysqli_query($conn, $blog);
        $row_blog = mysqli_fetch_array($rs_blog);
        $tong_blog = $row_blog['tong_blog'];

        // product
        $customer = "SELECT count(id_acc) as tong_customer FROM account WHERE level = 2";
        $rs_customer = mysqli_query($conn, $customer);
        $row_customer = mysqli_fetch_array($rs_customer);
        $tong_customer = $row_customer['tong_customer'];

        // product
        $admin = "SELECT count(id_acc) as tong_admin FROM account WHERE level = 1 OR level = 0";
        $rs_admin = mysqli_query($conn, $admin);
        $row_admin = mysqli_fetch_array($rs_admin);
        $tong_admin = $row_admin['tong_admin'];
?>

<body>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title" style="font-family: 'Roboto Condensed', sans-serif;">Thông kê</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Trang chính</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thống kê trang chính</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">Tổng số bài viết</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo number_format($tong_blog); ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
              
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted" style="font-family: 'Roboto Condensed', sans-serif;">Tài khoản quản trị</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo number_format($tong_admin); ?></h1>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                               
                            </div>
                        </div>

                        <div class="row">
                            
                        </div>
                        <div class="row">
                           
                        </div>
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                              
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            </div>   
                                
                        </div>
                    </div>
                </div>
            </div>
<?php
        // footer
        include('includes/footer.php');
    }
    else
    {
        echo "<script> location.href='dang-nhap.php'; </script>";
    }
?>
