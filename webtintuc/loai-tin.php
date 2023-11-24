<?php
  // include layouts
  include('layouts/header.php');

  // type
  if(isset($_GET['type']))
  {
    $id_type = $_GET['type'];
    $type = "SELECT * FROM loai_bai_viet WHERE id_type = $id_type";
    $result2 = mysqli_query($conn, $type);
    $row2 = mysqli_fetch_array($result2);

    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
    $sql = "SELECT count(id_blog) as total FROM bai_viet WHERE id_type = $id_type";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    if($total_records != 0){


      // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 15;

      // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
      // tổng số trang
      $total_page = ceil($total_records / $limit);

      // Giới hạn current_page trong khoảng 1 đến total_page
      if ($current_page > $total_page){
          $current_page = $total_page;
      }
      else if ($current_page < 1){
          $current_page = 1;
      }

      // Tìm Start
      $start = ($current_page - 1) * $limit;

      $data = "SELECT * FROM bai_viet WHERE id_type = $id_type ORDER BY date_upload DESC LIMIT $start, $limit";
      $result = mysqli_query($conn, $data);
      $arrItem = array();
      while ($row = mysqli_fetch_array($result)) {
        $arrItem[] = $row;
      }
    
  }
    else  
      echo "<script>
              alert('Chưa có bản ghi nào.');
              location.href='index.php';
            </script>";
}
?>
    <!-- header -->
    <content class="content">
        <div class="section-breadcrum">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row2['typename']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- section breabcrum -->
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="type-section">
                        <h2><?php echo $row2['typename']; ?></h2>
                        <?php foreach ($arrItem as $key) { ?>
                        <div class="row section-article">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 section-image-article">
                                <a href="chi-tiet.php?id=<?php echo $key['id_blog']; ?>"><img src="admin/pages/public/images/blogs/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" title="<?php echo $key['title']; ?>" class="w-100"/></a>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-4 col-xs-12 detail-article">
                                <h2><a href="chi-tiet.php?id=<?php echo $key['id_blog']; ?>">
                                  <?php
                                      if(strlen($key['title']) > 80)
                                        echo mb_substr($key['title'], 0, 80, 'UTF-8')."...";
                                      else
                                        echo $key['title'];
                                  ?></a></h2>
                                <span>Ngày đăng: <?php echo date_format(date_create($key['date_upload']), "d-m-Y"); ?></span>
                                <p>
                                  <?php
                                    if(strlen($key['summary']) > 150)
                                      echo mb_substr($key['summary'], 0, 150, 'UTF-8')."...";
                                    else
                                      echo $key['summary'];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <!-- section article -->
                        <?php } ?>
                        <div class="pagination-section">
                            <nav aria-label="...">
                                <ul class="pagination">
                                <?php
                                  // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                  if ($current_page > 1 && $total_page > 1){
                                    echo '<li class="page-item"><a class="page-link" href="loai-tin.php?type='.$id_type.'"><i class="fas fa-angle-double-left"></i></a></li>';
                                    echo '<li class="page-item"><a class="page-link" href="loai-tin.php?type='.$id_type.'&page='.($current_page - 1).'"><i class="fas fa-angle-left"></i></a></li>';
                                  }

                                  // Lặp khoảng giữa
                                  for ($i = 1; $i <= $total_page; $i++){
                                      // Nếu là trang hiện tại thì hiển thị thẻ span
                                      // ngược lại hiển thị thẻ a
                                      if ($i == $current_page){
                                          echo '<li class="page-item active" aria-current="page"><span class="page-link">'.$i.'</span></li>';
                                      }
                                      else{
                                          echo '<li class="page-item"><a class="page-link" href="loai-tin.php?type='.$id_type.'&page='.$i.'">'.$i.'</a></li>';
                                      }
                                  }

                                  // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                  if ($current_page < $total_page && $total_page > 1){
                                      echo '<li class="page-item"><a class="page-link" href="loai-tin.php?type='.$id_type.'&page='.($current_page + 1).'"><i class="fas fa-angle-right"></i></a></li>';
                                      echo '<li class="page-item"><a class="page-link" href="loai-tin.php?type='.$id_type.'&page='.$total_page.'"><i class="fas fa-angle-double-right"></i></a></li>';
                                  }

                                ?>
                                </ul>
                            </nav>
                        </div>
                        <!-- pagination section -->
                    </div>
                    <!-- type section -->
                </div>
                <!-- col-9 left -->
                <?php include('layouts/left-content.php'); ?>
            </div>
        </div>
    </content>
    <!-- content -->
<?php
  // include layouts
  include('layouts/footer.php');
?>
