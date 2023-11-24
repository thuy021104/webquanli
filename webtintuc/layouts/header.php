<?php

// database
require_once("admin/pages/modules/config.php");


// categories
$data4 = "SELECT * FROM loai_bai_viet WHERE id_type <> 25 AND id_type <> 26";
$result4 = mysqli_query($conn, $data4);
$arr4 = array();
while ($row4 = mysqli_fetch_array($result4)) {
  $arr4[] = $row4;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Viết về code kèm theo những trải nghiệm của bản thân mà mình trả qua.">
  <meta name="keywords" content="Code, Dev">
  <meta name="author" content="Công Quỳnh">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRANG WEB TIN TỨC SHOPEE</title>
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

<body>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId: '447220409877863',
        xfbml: true,
        version: 'v10.0'
      });
      FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {
        return;
      }
      js = d.createElement(s);
      js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=462828234866674" nonce="J8ZIdpDC"></script>
   <div id="wrapper">
    <header class="header fixed">
      <!-- <div class="top-header sm-hidden py-4">
          <div class="container">
            <div class="row">
             <span> Chỗ này để chèn quảng cáo này</span>
            </div>
          </div>
        </div> -->
      <!-- top header -->
      <div class="menu-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 nav-sm-fuild">
              <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                          <a class="nav-link" href="index.php">TRANG CHỦ</a>
                      </li>

                    <li class="nav-item">
                      <a class="nav-link" href="./loai-tin.php?type=34">TIN TỨC VÀ SỰ KIỆN</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./loai-tin.php?type=32">HƯỚNG DẪN VÀ TIPS<Noscript></Noscript></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./loai-tin.php?type=35">ĐÁNH GIÁ SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./loai-tin.php?type=28">CẨM NANG MUA SẮM</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./loai-tin.php?type=30">TUYỂN DỤNG</a>
                    </li>
                    
                   
                    
                  </ul>
                  <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form> -->
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
      
      <!-- menu header -->
    </header>
 