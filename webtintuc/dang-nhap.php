<?php
session_start();
// include layouts

?>
<?php
  

  
    // include db
    include('admin/pages/modules/config.php');

    // login function
    if(isset($_POST['dangnhap']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email)
        {

            if($password) // check space
            {

                $sql = "SELECT * FROM account WHERE email = '$email' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $level = $row['level'];
                $name = $row['name'];
                $id_acc = $row['id_acc'];
                if(mysqli_num_rows($result) == 1)
                {
                    // create session
                    $_SESSION['not_admin_user'] = $email;
                    $_SESSION['quyen'] = $level;
                    $_SESSION['name'] = $name;
                    $_SESSION['id_acc'] = $id_acc;
                    echo "<script>
                                location.href='index.php'; 
                                alert('Đăng nhập thành công.');
                        </script>";


                }
                else
                {
                    echo "<script>alert('Tài khoản không tồn tại!.');</script>";
                }
            }
            else
            {
               echo "<script>alert('Vui lòng nhập mật khẩul!.');</script>";
            }
        }
        else
        {
            echo "<script>alert('Vui lòng nhập email!.');</script>";
        }
    }
    // end funtion
  
?>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Viết về code kèm theo những trải nghiệm của bản thân mà mình trả qua.">
  <meta name="keywords" content="Code, Dev">
  <meta name="author" content="Công Quỳnh">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHƯƠNG TRÌNH ĐÀO TẠO BÀI GIẢNG</title>
  <!-- Style -->

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Fonts Awesome -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
  <!-- owlCarousel -->
  <link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.min.css">
  <!-- Fonts Google -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" type="text/css">
</head>

<div style="margin-top: 60px; margin-bottom: 50px">
<content class="content">
  <div class="card p-3">
    <div class="card-header text-center"><a href="index.html"></a><span class="splash-description">Đăng nhập tài khoản </span></div>
    <div class="card-body">
      <form method="POST">
        <div class="form-group mb-3">
          <input class="form-control form-control-lg" id="username" type="email" placeholder="Nhập email" name="email" value="<?php if(isset($email)){ echo $email; } ?>">
        </div>
        <div class="form-group mb-3">
          <input class="form-control form-control-lg" id="password" type="password" placeholder="Nhập mật khẩu" name="password">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block mb-3" name="dangnhap">Đăng nhập</button>
        <a href="/blogcanhan/Blogcanhan/myblog/myblog/dang-ky.php" class="btn btn-secondary btn-lg btn-block">Đăng ký</a>
      </form>
    </div>
  </div>
</content>
</div>
<style>


.card {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  max-width: 400px;
  margin: 0 auto;
}

.card-header {
  font-size: 24px;
  font-weight: bold;
  color: #333;
  padding: 10px;
  border-bottom: 1px solid #ccc;
  margin-bottom: 20px;
}

.form-control {
  border-radius: 5px;
  font-size: 18px;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  font-size: 18px;
}

.btn-secondary {
  background-color: #6c757d;
  border-color: #6c757d;
  font-size: 18px;
}


</style>

<!-- content -->
<?php
// include layouts

?>