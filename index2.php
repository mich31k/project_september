<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    require_once './Classes/DatabaseCon.php';
    require_once './Classes/Controller.php';
    require_once './Classes/Photo.php';
    require_once './Classes/Votes.php';
                 
    $c = new Controller();
?>


<html>
    <head>
        <meta charset="UTF-8">
           <link href="fotogoat.css" rel="stylesheet" type="text/css" />
        <title>Browse Photos</title>
    <link rel="alternate" type="application/json+oembed" href="https://codepen.io/api/oembed?url=https://codepen.io/gschier/pen/jkivt&amp;format=json" title="Simple Typing Carousel ">


    <link href="hide_files/css.css" rel="stylesheet">

    <link rel="stylesheet" media="all" href="hide_files/editor.css">

    <link href="fotogoat.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="responsive.css">

    <script async="" src="hide_files/analytics.js"></script>
        
    <script type="text/javascript">
        $(document).ready(function(){
                $('#gallery').gallerie();
        });

    </script>
<style>
	
	#gallery {
		margin-left: auto;
		margin-right: auto;
	}
</style>
    </head>
    <body  class="room-editor editor state-htmlOn-cssOn-jsOn   layout-top     logged-out">
        <div class="header">
    <div class="logo-left">
        <div class="small-logo"></div>
        <div class="logo-txt">FOTOGOAT</div>
    </div>

    <div class="filter-area">
        <ul class="filters">
            
            <?php
            $type = "ALL";
            if($_GET && $_GET['fotoType']){
                $type = $_GET['fotoType'];
            }
            
            $love = "";
            $hate = "";
            $fun = "";
            $like = "";
            $all = "";
            
            $num = 8;
            $fotos = NULL;
            if($type == "LOVE"){
                $fotos = $c->getLovedPhotos_random($num);
                $love = " class='selected'";
            }
            elseif($type == "HATE"){
                $fotos = $c->getDislikedPhotos_random($num);
                $hate = " class='selected'";
            }
            elseif($type == "LAUGH"){
                $fotos = $c->getFunnyPhotos_random($num);
                $fun = " class='selected'";
            }
            elseif($type == "LIKE"){
                $fotos = $c->getLikedPhotos_random($num);
                $like = " class='selected'";
            }
            else{
                $fotos = $c->getPhotos_random($num);
                $all = " class='selected'";
            }
            
            ?>
            
            <li <?php echo $all; ?>>
                <a class="filt-btn all"  href="?fotoType=ALL"></a>
            </li>
            <li <?php echo $love; ?>>
                <a class="filt-btn love" href="?fotoType=LOVE"></a>
            </li>
            <li <?php echo $like; ?>>
                <a class="filt-btn like" href="?fotoType=LIKE"></a>
            </li>
            <li <?php echo $fun; ?>>
                <a class="filt-btn laugh" href="?fotoType=LAUGH"></a>
            </li>
            <li <?php echo $hate; ?>>
                <a class="filt-btn hate" href="?fotoType=HATE"></a>
            </li>
        </ul>
    </div>
    <div class="auth-area">
        <a class="signin-btn" href="SignUp.php">Sign Up</a>
    </div>
</div>
        <?php
            if($fotos){
                $count = 1;
                echo "<center><div id='gallery'><table><tr>";
                foreach ($fotos as $foto){
                    $imageData = $foto->getimageData();
                    $image_type= $foto->getMimeType();
                    //$src = 'data:'.$image_type.';base64,'.$imageData;
                    
                    echo "<td><a href='data:$image_type;base64," . base64_encode($foto->imageData) 
                            . "'><img src='data:$image_type;base64," . base64_encode($foto->imageData) 
                            . "'  style='height: 200px; width: 200px; margin-left:3px'/></a></td>";
                    
                    if($count == 4){
                        echo "</tr><tr>";
                        $count = 0;
                    }
                    /*echo "Photo: $foto->id  Author:" . $foto->author->getFirstname() ." => ";
                    foreach ($foto->votes as $vote){
                        echo $vote->getType() . ": " . $vote->getNumberOfVotes() . " - ";
                    }
                    echo '<br/>';*/  
                    $count++;
                }
                echo "</tr></table></div></center>";
            } 
        ?>
        <!-- <form action="#" 
              method="post" 
              id='deform'
              enctype="multipart/form-data">
            <fieldset>
                <legend>Photo</legend>
            <p>
                
                <label>Image:</label><br/>
                <input type='file' name='img'/>
            </p>
            <p>
               <input type='submit' name='butt'/>
            </p>
            </fieldset>
        </form>-->
        
        <?php
            
           /* if($_POST){
                $image = file_get_contents($_FILES['img']['tmp_name']);
                $mime = $_FILES['img']['type'];
                
                $c->uploadPhoto("", $image, $mime, "Der var engang", "");
                //echo "<img src='data:image/jpeg;base64," . base64_encode(file_get_contents($_FILES['img']['tmp_name'])) . "'/>";
            }*/
        
        ?>
    </body>
</html>