<?php
session_start();
include('inc/dbconfig.php');
$session_uid='';
$_SESSION['uid']=''; 
if(empty($session_uid) && empty($_SESSION['uid']))
{
$url=BASE_URL.'index.php';
header("Location: index2.php");
//echo "<script>window.location='$url'</script>";
}
?>

