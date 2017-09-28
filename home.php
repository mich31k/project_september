<?php
include('inc/dbconfig.php');
include('inc/session.php');
$userDetails=$userClass->userDetails($session_uid);
var_dump($_SESSION);
?>
<h1>Welcome <?php echo $userDetails->name; ?></h1>

<h4><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></h4>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL - Coding Cage</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>

<div class="container">


	<div class="page-header">
                <h1>add new user. <a   href="index.php">&nbsp; view all </a></h1>
        </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form action="database_uploader.php" method="post" enctype="multipart/form-data">
	<input type="file" name="image" />
        <input type="submit" name="btn_save" value="Upload" />             
</form> 
<?php
include 'dbconfig.php';
if(!isset($_POST['btn_save'])){
    echo "Please select an image to be uploaded";
}else{
    
    $file = $_FILES['image']['tmp_name'];
    $image = file_get_contents($_FILES['image']['tmp_name']);
    
    $image_name= addslashes($_FILES['image']['name']);
    $image_type= addslashes($_FILES['image']['type']);
    $image = base64_encode($image);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    
    if ($image_size==FALSE){
        echo "That's not an image!";
    }else{
        $insert = $DB_con->prepare("INSERT INTO gallery VALUES ('','$image_name','$image','$image_type')");
        if($insert->execute()){
            $lastid = $DB_con->lastInsertId();
            echo "Image uploaded.<p/>";
        }else{
            echo "There was a problem uploading the picture";
        }
    }
};?>
</body>
</html>