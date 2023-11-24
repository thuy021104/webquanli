<?php
    session_start();

    if(isset($_SESSION['not_admin_user'])) {
        unset($_SESSION['not_admin_user']); 
    }

    echo "<script>
            location.href='index.php'; 
            alert('Đăng xuat thành công.');
        </script>";
?>