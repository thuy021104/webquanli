<?php
// open session
session_start();


  // include layouts
include('layouts/header.php');

// Featured article
$data1 = "SELECT * FROM bai_viet WHERE flag = 1 AND highlight = 1 ORDER BY date_upload DESC LIMIT 3";
$result1 = mysqli_query($conn, $data1);
$arr1 = array();
while ($row1 = mysqli_fetch_array($result1)) {
  $arr1[] = $row1;
}

// new post
$data2 = "SELECT * FROM bai_viet WHERE flag = 1 AND id_blog <> 29 AND id_blog <> 30 ORDER BY date_upload DESC LIMIT 4";
$result2 = mysqli_query($conn, $data2);
$arr2 = array();
while ($row2 = mysqli_fetch_array($result2)) {
  $arr2[] = $row2;
}

?>
<!-- header -->
<content class="content">
  <div class="container">
    <div class="row" style="padding-top:50px;">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <h1 class="title-blog">Tin tức nổi bật</h1>
        <div class="slider-blog">
          <div class="owl-slider owl-carousel owl-theme">
            <?php foreach ($arr1 as $key) { ?>
              <div class="item">
                <a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>">
                  <img style=" height: 350px;"  src="admin/pages/public/images/blogs/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" title="<?php echo $key['title']; ?>" class="w-100" />
                </a>
                <h2>
                  <a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>"><?php echo $key['title']; ?></a>
                </h2>
                <p class="date">
                  <span>Ngày đăng: <?php echo date_format(date_create($key['date_upload']), "d-m-Y"); ?></span>
                  <span>Lượt xem: <?php echo number_format($key['view']); ?></span>
                </p>
                <p class="summary">
                  <?php
                  if (strlen($key['summary']) > 150)
                    echo mb_substr($key['summary'], 0, 150, 'UTF-8') . "...";
                  else
                    echo $key['summary'];
                  ?>
                </p>
              </div>
              <!-- item -->
            <?php } ?>
          </div>
        </div>
        <!-- section 1 slider bai_viet -->
        <div class="section-2 section-image">
          <div class="row">
            <?php foreach ($arr1 as $key) { ?>
              <div class="col-md-4">
                <a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>">
                  <img style=" height: 150px; " src="admin/pages/public/images/blogs/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" title="<?php echo $key['title']; ?>" class="w-100" />
                </a>
                <h2 class="title-section-2">
                  <a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>">
                    <?php
                    if (strlen($key['title']) > 50)
                      echo mb_substr($key['title'], 0, 50, 'UTF-8') . "...";
                    else
                      echo $key['title'];
                    ?>
                  </a>
                </h2>
                <p class="date-section-2">Ngày đăng: <?php echo date_format(date_create($key['date_upload']), "d-m-Y"); ?></p>
              </div>
              <!-- item -->
            <?php } ?>
          </div>
        </div>
        <!-- section 2 section image -->
        <div class="section-3">
          <h1 class="title-blog">Tin tức mới nhất</h1>
          <?php foreach ($arr2 as $key) { ?>
            <div class="row section-article">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 section-image-article">
                <a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>">
                  <img  style=" height: 150px; "src="admin/pages/public/images/blogs/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" title="<?php echo $key['title']; ?>" class="w-100" />
                </a>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-4 col-xs-12 detail-article">
                <h2><a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>"><?php echo $key['title']; ?></a></h2>
                <span>Ngày đăng: <?php echo date_format(date_create($key['date_upload']), "d-m-Y"); ?></span>
                <p><?php
                    if (strlen($key['summary']) > 100)
                      echo mb_substr($key['summary'], 0, 100, 'UTF-8') . "...";
                    else
                      echo $key['summary'];
                    ?></p>
              </div>
            </div>
            <!-- section article -->
          <?php } ?>
        </div>
        <!-- section 3 -->
      </div>
      <!-- col-9 left -->
      <?php include('layouts/left-content.php'); ?>
      <!-- col-3 right -->
    </div>
  </div>
</content>
<!-- content -->
<?php
// include layouts
include('layouts/footer.php');
  

?>