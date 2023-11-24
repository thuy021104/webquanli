<?php 
	
    session_start();

	if($_SESSION['level']==1)
    {
    	// go to admin
    	header('Location: pages/index.php');
    }
    else
    {
    	// comeback home
    	header('Location: pages/dang-nhap.php');
    }
?>