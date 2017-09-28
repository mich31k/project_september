<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
           <link href="fotogoat.css" rel="stylesheet" type="text/css" />
        <title>Browse Photos</title>
    </head>
    <body>
        <div class="header">
    <div class="logo-left">
        <div class="small-logo"></div>
        <div class="logo-txt">FOTOGOAT</div>
    </div>

    <div class="filter-area">
        <ul class="filters">
            <li class="selected">
                <a class="filt-btn all"></a>
            </li>
            <li>
                <a class="filt-btn love"></a>
            </li>
            <li>
                <a class="filt-btn like"></a>
            </li>
            <li>
                <a class="filt-btn laugh"></a>
            </li>
            <li>
                <a class="filt-btn hate"></a>
            </li>
        </ul>
    </div>
    <div class="auth-area">
        <a class="signin-btn" href="SignUp.html">Sign Up</a>
    </div>
</div>
        <?php
            require_once './Classes/DatabaseCon.php';
            require_once './Classes/Controller.php';
            require_once './Classes/Photo.php';
            require_once './Classes/Votes.php';
            
            
            $c = new Controller();
            
            $c->signIn('lene@mail.dk', '123456');
            //$c->lovePhoto(26);
            
            $num = 4;
            $photos = $c->getPhotosByUser(1, 3);
            //$photos = $c->getLikedPhotos_random(10);
            if($photos){
                foreach ($photos as $photo){
                    echo "<img src='data:image/jpeg;base64," . base64_encode($photo->imageData) 
                            . "'  style='height: 200px; width: 200px;'/>";
                    echo "Photo: $photo->id  Author:" . $photo->author->getFirstname() ." => ";
                    foreach ($photo->votes as $vote){
                        echo $vote->getType() . ": " . $vote->getNumberOfVotes() . " - ";
                    }
                    echo '<br/>';
                }
            } 
            
        ?>
         <form action="#" 
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
        </form>
        
        <?php
            
            if($_POST){
                $image = file_get_contents($_FILES['img']['tmp_name']);
                $mime = $_FILES['img']['type'];
                
                $c->uploadPhoto("", $image, $mime, "Der var engang", "");
                //echo "<img src='data:image/jpeg;base64," . base64_encode(file_get_contents($_FILES['img']['tmp_name'])) . "'/>";
            }
        
        ?>
    </body>
</html>
