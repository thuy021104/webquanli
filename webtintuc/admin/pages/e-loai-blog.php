<?php 
    
    // open session
    session_start();

    if(isset($_SESSION['user']) && isset($_SESSION['level']))
    {
        $level = $_SESSION['level'];
        $users = $_SESSION['user'];

        // include
        include('includes/header.php');
        include('includes/navbar.php');
        include('includes/left-sidebar.php');

        // include function
        require('modules/functions.php');

        // get date from session
        $session = "SELECT * FROM account WHERE email = '".$users."'";
        $rs_session = mysqli_query($conn, $session);
        $row_session = mysqli_fetch_array($rs_session);
        $id_acc = $row_session['id_acc'];
        $name_user = $row_session['name'];

        // get data
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $sql = "SELECT typename FROM loai_bai_viet WHERE id_type = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $delname = $row['typename'];
        }

        // create type
        if(isset($_POST['save']))
        {
            $name_type = $_POST['name_type'];
            $slug = generateURL($name_type);

            if($name_type)
            {
                // insert to history
                $text = " đã chỉnh sửa loại bài viết <b>". $delname . "</b> thành <b>". $name_type . "</b>";
                $time = date('Y-m-d H:i:s');
                $ins_his = "INSERT INTO history(text, time, id_acc, flag) VALUES('$text','$time', '$id_acc', 0)";
                mysqli_query($conn, $ins_his);

                // insert data
                $update = "UPDATE loai_bai_viet SET typename = '$name_type', slug_type = '$slug' WHERE id_type = $id";
                mysqli_query($conn, $update);
                echo "<script>alert('Sửa loại thành công');</script>";
                echo "<script>location.href='loai-blog.php';</script>";
            }
            else
            {
                echo "<script>alert('Vui lòng nhập tên loại!.');</script>";
            }
        }
?>
<body>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content " >
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header" >
                                <h2 class="pageheader-title" style="font-family: 'Roboto Condensed', sans-serif;">Danh sách bài giảng</h2>
                                <!--
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Trang chính</a></li>
                                            <li class="breadcrumb-item"><a href="blog.php" class="breadcrumb-link">Bài giảng</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa loại bài giảng</li>
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
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header" style="font-family: 'Roboto Condensed', sans-serif;">Chỉnh sửa loại bài giảng</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label>Tên loại*:</label>
                                                    <input type="text" name="name_type" class="form-control" value="<?php echo $row['typename']; ?>">
                                                </div>
                                                <button type="submit" class="btn btn-warning" name="save">Sửa</button>
                                            </form>
                                        </div>
                                        <!-- col-lg-12 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col-lg-12 -->
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