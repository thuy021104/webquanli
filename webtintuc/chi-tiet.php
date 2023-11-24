<?php
// include layouts
include('layouts/header.php');

// detail Blog
if (isset($_GET['id'])) {
  $id_tin = $_GET['id'];
  $data = "SELECT id_blog, b.id_type as id_type, typename, title, b.image as image, name, summary, content, date_upload, view FROM bai_viet b, loai_bai_viet tb, account a WHERE b.id_type = tb.id_type AND b.author = a.id_acc AND id_blog = $id_tin";
  $result = mysqli_query($conn, $data);
  $row = mysqli_fetch_array($result);
  $date_blog = $row['date_upload'];
  $id_type = $row['id_type'];
  $viewCurrent = $row['view'];

  // update view
  $upView = "UPDATE bai_viet SET view = $viewCurrent + 1 WHERE id_blog = $id_tin";
  mysqli_query($conn, $upView);
}

// Related postsda
$data2 = "SELECT * FROM bai_viet WHERE id_type = $id_type AND id_blog <> $id_tin AND date_upload < '$date_blog' ORDER BY date_upload DESC";
$result2 = mysqli_query($conn, $data2);
$arr2 = array();
while ($row2 = mysqli_fetch_array($result2)) {
  $arr2[] = $row2;
}

?>
<!-- header -->

<content class="content">
  <div class="section-breadcrum">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="#"><?php echo $row['typename']; ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- section breabcrum -->
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="detail-section">
          <img src="admin/pages/public/images/blogs/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" title="<?php echo $row['title']; ?>" class="w-100" />
          <div class="content-article">
            <h2><?php echo $row['title']; ?></h2>
            <div class="info-sm">
              <span> Người đăng: <?php echo $row['name']; ?> </span>
              <span> Ngày đăng: <?php echo date_format(date_create($row['date_upload']), "d-m-Y"); ?> </span>
              <span><i class="fas fa-eye"></i> <?php echo number_format($row['view']); ?> lượt xem</span>
            </div>
            <!-- info sm -->
            <div class="summary-article">
              <p><?php echo $row['summary']; ?></p>
            </div>
            <div class="content-article">
              <?php echo $row['content']; ?>
            </div>
          </div>
          <!-- content arctile -->
          <div class="relation-article">
            <h2>Bài viết liên quan</h2>
            <div class="relation-box">
              <div class="owl-relation owl-carousel owl-theme">
                <?php foreach ($arr2 as $key) : ?>
                  <div class="item">
                    <a href="./chi-tiet.php?id= <?php echo $key['id_blog']; ?>"><img src="admin/pages/public/images/blogs/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" title="<?php echo $key['title']; ?>" class="w-100" /></a>
                    <h2 align="justify"><a href="#">
                        <?php
                        if (strlen($key['title']) > 50)
                          echo mb_substr($key['title'], 0, 50, 'UTF-8') . "...";
                        else
                          echo $key['title'];
                        ?></a></h2>
                    <p class="date"><span>Ngày đăng: <?php echo date_format(date_create($key['date_upload']), "d-m-Y"); ?></span></p>
                    <p class="summary">
                      <?php
                      if (strlen($key['summary']) > 50)
                        echo mb_substr($key['summary'], 0, 50, 'UTF-8') . "...";
                      else
                        echo $key['summary'];
                      ?></p>
                  </div>
                  <!-- item -->
                <?php endforeach; ?>
              </div>
            </div>
            <!-- relation-box -->
          </div>
          <!-- relation article -->
          <div class="comment-section">
            <h2>Bình luận bài viết</h2>
            <div class="fb-comments" data-href="https://localhost:8080/<?php echo $id_tin ?>" data-width="100%" data-numposts="5"></div>
          </div>
          <!-- comment section -->
        </div>
       
       
        <!-- detail section -->
      </div>
      <!-- col-9 left -->
      <?php include('layouts/left-content.php') ?>
      <!-- col-3 right -->
    </div>
  </div>
</content>

<script>

  img
  {
    width= 300;
    height= 400;

  }

                  </script>
<!-- content -->
<?php
// include layouts
include('layouts/footer.php');
?>