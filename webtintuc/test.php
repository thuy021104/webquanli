<?php
session_start();
if(isset( $_SESSION['not_admin_user']))
{

  // include layouts
include('layouts/header.php');
}
if(isset($_GET['id']))
{
$id=$_GET['id'];
// Related postsda
$sql = "SELECT * FROM `questions` WHERE id_blog=$id";
$result2 = mysqli_query($conn, $sql);


?>



<!DOCTYPE html>
<html>
  <head>
    <title>Trang thi trắc nghiệm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
  <h1 class="mt-5 mb-5">Trang thi trắc nghiệm</h1>
  <?php if(isset($_POST['submit'])) {?>
    <a href="./test.php?id=<?php echo $id?>" class="btn btn-primary mb-3">Thi lại</a>
  <?php } else {?>
    <form method="POST" action="test.php?id=<?php echo $id?>" id="quiz-form" class="bg-light p-5 rounded-lg">
      <?php $stt=0; foreach($result2 as $kq) {?>
        <div class="row mb-4">
          <div class="col-md-12">
            <p class="h5 mb-3">Câu hỏi <?=$stt+1?>: <?php echo $kq['question']?></p>
            <div class="form-check">
              <input class="form-check-input" type="radio" checked name="answer<?=$stt+1?>" id="answer1-A" value="A">
              <label class="form-check-label" for="answer1-A"><?php echo $kq['option1']?></label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer<?=$stt+1?>" id="answer1-B" value="B">
              <label class="form-check-label" for="answer1-A"><?php echo $kq['option2']?></label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer<?=$stt+1?>" id="answer1-C" value="C">
              <label class="form-check-label" for="answer1-A"><?php echo $kq['option3']?></label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer<?=$stt+1?>" id="answer1-D" value="D">
              <label class="form-check-label" for="answer1-A"><?php echo $kq['option4']?></label>
            </div>
          </div>
        </div>
        <?php $stt++;}?>
      <div class="row mt-4">
        <div class="col-md-12 d-flex justify-content-center">
          <input type="submit" name="submit" value="Nộp bài" class="btn btn-primary" onsubmit="return validateForm()">
        </div>
      </div>
    </form>

  </div>
   
<?php
}}
if(isset($_POST['submit']))
{
    $id = $_GET['id'];
    $sql1 = "SELECT count(*) FROM `questions` WHERE id_blog=$id";
    $result2 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($result2);
    $count = $row[0];

    $answer = array();
    for ($i = 1; $i <= $count; $i++) {
        $answer[$i] = $_POST['answer' . $i];
        // sử dụng biến $answer để thực hiện các thao tác khác...
    }

    $sql2 = "SELECT answer FROM `questions` WHERE id_blog=$id";
    $result3 = mysqli_query($conn, $sql2);

    $cau = 0;
    $i = 1;
    while ($row = mysqli_fetch_array($result3)) {
        if ($answer[$i] == $row['answer']) {
            $cau++;
        }
        $i++;
    }
$diem=($cau/$count)*10;
      echo '<div class="row">
          <div class="col-md-12">
          Điểm số của bạn là: '.$diem.'
          </div>
        </div>';
$idacc=$_SESSION['id_acc'];
$ten=$_SESSION['name'];
$tenbaigiang = "SELECT title FROM `blog` WHERE id_blog=$id";
$ketbgiang = mysqli_query($conn, $tenbaigiang);
$rowbg = mysqli_fetch_array($ketbgiang);
$tenbai=$rowbg['title'];
        $testdiem = "INSERT INTO `lichsutest`(`diem`, `id_blog`, `id_acc`, `tenacc`, `tenbaigiang`) VALUES ('$diem','$id','$idacc','$ten','$tenbai')";
    mysqli_query($conn, $testdiem); 
     
 }

?>

 </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <script>
function validateForm() {
  var form = document.getElementById("quiz-form");
  var radios = form.querySelectorAll('input[type=radio]:checked');
  if (radios.length < <?php echo $count ?>) {
    alert("Vui lòng chọn tất cả đáp án trước khi nộp bài!");
    return false;
  }
}
</script>
</html>
