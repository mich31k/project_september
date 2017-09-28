<form action="database_uploader.php" method="post" enctype="multipart/form-data">
	<input type="file" name="image" />
        <input type="submit" name="btn_save" value="Upload" />             
</form> 
<?php
include 'inc/dbconfig.php';
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
        $insert = $db->prepare("INSERT INTO gallery VALUES ('','$image_name','$image','$image_type')");
        if($insert->execute()){
            $lastid = $db->lastInsertId();
            echo "Image uploaded.<p/>";
        }else{
            echo "There was a problem uploading the picture";
        }
    }
};
