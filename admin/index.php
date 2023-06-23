<?php
session_start();
if(isset($_SESSION['admin'])){
  header('Location: dashboard/index.php');
}else{
  header('Location: ./login.php');
}
?>