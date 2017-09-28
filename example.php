<!DOCTYPE html>
<?php
include 'inc/dbconfig.php';
?>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="plugins/jquery.gallerie.js"></script>
<link rel="stylesheet" type="text/css" href="plugins/gallerie.css"/>
<link rel="stylesheet" type="text/css" href="plugins/gallerie-effects.css"/>

<script type="text/javascript">
$(document).ready(function(){
	$('#gallery').gallerie();
});

</script>

<style>
	body {
		background-color: black;
	}
	
	#gallery {
		margin-left: auto;
		margin-right: auto;
	}
</style>
</head>

<body>

<?php
$query = $DB_con->prepare("SELECT * FROM 
                                (
                                    SELECT * FROM gallery ORDER BY rand() LIMIT 5
                                ) T1
                            ORDER BY id ");
                $query->execute();


                    $row = $query->fetchAll();
                        echo '<div id="gallery">';
                        foreach($row as $img){                  
                        $imageData = $img['image'];
                        $image_type= $img['extension'];
                        $src = 'data:'.$image_type.';base64,'.$imageData;

                        echo '<a href="' . $src . '"><img src="' . $src . '" style="width:200px;heigh:200px;margin-left:3px"/></a>';
                        
                    }
                    echo '</div>';
                    //header("Content-type: ".$row['type']);
                    die();

?>
</body>
</html>


