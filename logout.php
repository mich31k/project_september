<?php
include('inc/config.php');
$session_uid='';
$_SESSION['uid']=''; 
if(empty($_SESSION['uid']))
{
$url=BASE_URL.'index.php';
header("Location: index.php");
//echo "<script>window.location='$url'</script>";
}
?>
