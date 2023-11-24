<?php

  // new post
  $data2 = "SELECT * FROM bai_viet WHERE flag = 1 AND id_blog <> 29 AND id_blog <> 30 ORDER BY date_upload DESC LIMIT 4";
  $result2 = mysqli_query($conn, $data2);
  $arr2 = array();
  while ($row2 = mysqli_fetch_array($result2))
  {
    $arr2[] = $row2;
  }

  // Posts see the most
  $data3 = "SELECT * FROM bai_viet WHERE flag = 1 AND id_blog <> 29 AND id_blog <> 30 ORDER BY view DESC LIMIT 5";
  $result3 = mysqli_query($conn, $data3);
  $arr3 = array();
  while ($row3 = mysqli_fetch_array($result3))
  {
    $arr3[] = $row3;
  }

?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <!-- <div class="right-box">
                <h2 class="title-right-box">Thẻ Tag</h2>
                <ul class="category-right">
                  <?php foreach ($arr4 as $key) { ?>
                  <li><a href="loai-tin.php?type=<?php echo $key['id_type']; ?>"><?php echo $key['typename']; ?>
                  <?php
                    // count number bai_viet of type
                    $num = "SELECT count(id_blog) as total FROM bai_viet WHERE id_type = '". $key['id_type'] ."'";
                    $resultNum = mysqli_query($conn, $num);
                    $rowNum = mysqli_fetch_array($resultNum);
                    echo "(" . $rowNum['total'] . ")";
                  ?>
                  </a></li>
                  <?php } ?>
                </ul>
              </div> -->
              <!-- right box -->
             
              <div class="new-blog">
                <h2 class="title-right-box">Tìm kiếm</h2>
                <form class="input-group" action="tim-kiem.php" method="get">
                  <input class="form-control" type="text" placeholder="Search" name="search">
                  <div class="input-group-append">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </form>
              </div>

             

              <div class="new-blog">
                <h2 class="title-right-box">Bài viết mới</h2>
                <?php foreach ($arr2 as $key) { ?>
                <div class="post-right">
                  <div class="image-post-right">
                      <a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>"><img src="admin/pages/public/images/blogs/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" title="<?php echo $key['title']; ?>" width="80"/></a>
                  </div>
                  <div class="detail-post-right">
                    <h2 align="justify"><a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>">
                    <?php
                        if(strlen($key['title']) > 50)
                          echo mb_substr($key['title'], 0, 50, 'UTF-8')."...";
                        else
                          echo $key['title'];
                    ?>
                    </a></h2>
                    <span>Ngày đăng: <?php echo date_format(date_create($key['date_upload']), "d-m-Y"); ?></span>
                  </div>
                </div>
                <!-- item -->
                <?php } ?>
              </div>
              <!-- right box -->
              <div class="new-blog">
                <h2 class="title-right-box">Bài viết xem nhiều</h2>
                <?php $stt = 0; foreach ($arr3 as $key) { $stt++; ?>
                <div class="post-right">
                  <div class="number-post"><?php echo $stt; ?></div>
                  <div class="detail-post-right">
                    <h2 align="justify"><a href="chi-tiet.php?id=<?php echo $key['id_blog'];  ?>">
                    <?php
                        if(strlen($key['title']) > 80){
                          echo mb_substr($key['title'], 0, 80, 'UTF-8')."...";
						
						}	
                        else
                          echo $key['title'];
                    ?>
                    </a></h2>
					<span><i class="fas fa-eye"></i> <?php echo $key['view']; ?> lượt xem</span>
                  </div>
                </div>
                <!-- item -->
                <?php } ?>
              </div>
              <!-- right box -->
              <div class="right-box">
                <h2 class="title-right-box">Quảng cáo</h2>
              </div>
              <!-- right box -->
              <div class="new-blog">
                <h2 class="title-right-box">Kênh liên lạc</h2>
                <div class="post-right">
                  <div class="detail-post-right">
                    <h2><a href="https://www.facebook.com/profile.php?id=100041544231247" target="_blank">Facebook</a></h2>
                  </div>
                </div>
                <!-- post-right -->
                <div class="post-right">
                  <div class="detail-post-right">
                    <h2><a href="https://www.youtube.com/@TPTMusicForLife">Youtube</a></h2>
                  </div>
                </div>
                <!-- post-right -->
                <div class="post-right">
                  <div class="detail-post-right">
                    <h2><a href="#" target="_blank">Instagram</a></h2>
                  </div>
                </div>
                <!-- post-right -->
              </div>
              <!-- right box -->
              <!-- right box -->
				<div class="new-blog" id = "contactGG">
                <h2 class="title-right-box">Liên hệ</h2>
                <div class="post-right">
                  <div class="detail-post-right">
					 
                  </div>
                </div>
            </div>

