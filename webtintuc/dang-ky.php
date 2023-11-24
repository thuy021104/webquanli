<?php
  // open session
  session_start();
// include layouts

?>
<?php


  if(isset($_SESSION['not_admin_user']))
  {
      echo "<script>location.href='index.php';</script>";
  }
  else
  {
    // include db
    include('admin/pages/modules/config.php');

    // include function
    require('admin/pages/modules/functions.php');

    // login function
    if(isset($_POST['dangky']))
    {
        $target_dir = "public/images/avatars/";
        $name = $_POST['name'];
        $email_reg = $_POST['email_reg'];
        $password = $_POST['password'];
        $repass = $_POST['repass'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $date_create = date("Y-m-d H:i:s");

        // create var to check image
        $image = $_FILES['image']['name'];
        $name_code = name_code($image);
        $file_type = strtolower(pathinfo($name_code,PATHINFO_EXTENSION));
        $target_file = $target_dir . $name_code;

        // create var to check email exists
        $e = "SELECT email FROM account WHERE email = '$email_reg'";
        $rs_e = mysqli_query($conn, $e);

        if($image)
        {
            if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif")
            {
                echo "<script>alert('Chỉ nhận file dạng: jpg, jpeg, png, gif.');</script>";
            }
            else
            {
                if($name && $email_reg)
                {
                    if(mysqli_num_rows($rs_e) > 0)
                    {
                        echo "<script>alert('Email đã được sử dụng!. Vui lòng chọn email khác.');</script>";
                    }
                    else
                    {
                        if($password != $repass)
                        {
                            echo "<script>alert('Mật khẩu không trùng nhau!.');</script>";
                        }
                        else
                        {
                            // move file to folder
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                            $ins = "INSERT account(name, email, password, phone, address, image, date_create, level) VALUES('$name', '$email_reg', '$password', '$phone', '$address', '$name_code', '$date_create', 3)";
                            mysqli_query($conn, $ins);
                            // create session
                            $_SESSION['not_admin_user'] = $email_reg;

                            echo "<script>alert('Đăng ký thành công');</script>";
                            echo "<script>location.href='index.php';</script>";
                        }
                        // end check pass
                    }
                    // end check email exists
                    }
                    else
                    {
                        echo "<script>alert('Vui lòng điền đầy đủ thông tin!.');</script>";
                    }
                }
            }
            else
            {
                if($name && $email_reg)
                {
                    if(mysqli_num_rows($rs_e) > 0)
                    {
                        echo "<script>alert('Email đã được sử dụng!. Vui lòng chọn email khác.');</script>";
                    }
                    else
                    {
                        if($password != $repass)
                        {
                            echo "<script>alert('Mật khẩu không trùng nhau!.');</script>";
                        }
                        else
                        {
                            // move file to folder
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                            $ins = "INSERT account(name, email, password, phone, address, image, date_create, level) VALUES('$name', '$email_reg', '$password', '$phone', '$address', 'no-image.jpg', '$date_create', 3)";
                            mysqli_query($conn, $ins);
                            // create session
                            $_SESSION['not_admin_user'] = $email_reg;
                            
                            echo "<script>alert('Dang ky thành công');</script>";
                            echo "<script>location.href='index.php';</script>";
                        }
                        // end check pass
                    }
                    // end check email exists
                }
                else
                {
                    echo "<script>alert('Vui lòng điền đầy đủ thông tin!.');</script>";
                }
            }
    }
    // end funtion
  }
?>

<div style="margin-top: 60px; margin-bottom: 50px">
<content class="content">
  <div class="container">
    <div class="card">
      <div class="card-header text-center"><a href="index.html"></a><h1><span class="splash-description">Đăng ký tài khoản</span></h1></div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Họ tên*:</label>
            <input type="text" name="name" class="form-control" value="<?php if(isset($name)){ echo $name; } ?>">
          </div>
          <div class="form-group">
            <label>Email*:</label>
            <input type="email" name="email_reg" class="form-control" value="<?php if(isset($email_reg)){ echo $email_reg; } ?>">
          </div>
          <div class="form-group">
            <label>Mật khẩu*:</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label>Nhập lại mật khẩu*:</label>
            <input type="password" name="repass" class="form-control">
          </div>
          <div class="form-group">
            <label>Số điện thoại:</label>
            <input type="text" name="phone" class="form-control" value="<?php if(isset($phone)){ echo $phone; } ?>">
          </div>
          <div class="form-group">
            <label>Địa chỉ:</label>
            <textarea name="address" class="form-control"><?php if(isset($address)){ echo $address; } ?></textarea>
          </div>
          <div class="form-group">
            <label>Ngày tạo:</label>
            <input type="date" name="date_create" class="form-control" value="<?php echo date("Y-m-d"); ?>" disabled>
          </div>
          <div class="form-group">
            <div class="card-body">
              <h3 class="card-title" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh đại diện</h3>
              <input type="file" name="image" class="form-control">
            </div>
          </div>
          <div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button>
  <p style="width:10px"></p>
  <a href="/myblog/dang-nhap.php" class="btn btn-secondary">Đăng nhập</a>
</div>
        </form>
      </div>
    </div>
  </div>
</content>
</div>
<!-- content -->
<?php
// include layouts

?>