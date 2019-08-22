<?php
session_start();

if(!isset($_SESSION['adminName'])) {
   header('location:../admin_login.php');
   exit();
}
session_destroy();
header('location:../admin_login.php');