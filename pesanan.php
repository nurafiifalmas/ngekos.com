<?php 
    session_start();
    include 'conn.php';
	  if(!isset($_SESSION['email'])){
        echo"<script>
                alert('Mohon untuk melakukan login dahulu');
            </script>";
            echo "<script>location='index.php?p=login'</script>";
	}
?>