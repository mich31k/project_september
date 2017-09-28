<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once './Classes/DatabaseCon.php';
            require_once './Classes/Controller.php';
            require_once './Classes/Photo.php';
            require_once './Classes/Votes.php';
            
            
            $c = new Controller();
            
            $c->signIn('lene@mail.dk', '123456');
            
            $num = 4;
            $photos = $c->getPhotos_random($num);
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
