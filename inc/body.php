<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once './Classes/DatabaseCon.php';
    require_once './Classes/Controller.php';
    require_once './Classes/Photo.php';
    require_once './Classes/Votes.php';
                 
    $c = new Controller();
    

/*$query = $db->prepare("SELECT * FROM 
                                (
                                    SELECT * FROM gallery ORDER BY rand() LIMIT 5
                                ) T1
                            ORDER BY id ");
                $query->execute();


                    $row = $query->fetchAll();*/
    
                        $photos = $c->getPhotos_random(2);
                        echo '<div id="gallery">';
                        foreach ($photos as $photo){
                            //$imageData = $photo->getImagedata();
                            //$image_type= $photo->getMimeType();
                            //$src = 'data:'.$image_type.';base64,'.$imageData;
                            
                            echo '<a href=""><img src="' . $src . '" style="width:200px;heigh:200px;margin-left:3px"/></a>';
                        }
                        
                        echo '</div>';
                        /*
                        foreach($row as $img){                  
                        $imageData = $img['image'];
                        $image_type= $img['extension'];
                        $src = 'data:'.$image_type.';base64,'.$imageData;

                        echo '<a href="' . $src . '"><img src="' . $src . '" style="width:200px;heigh:200px;margin-left:3px"/></a>';
                        
                    }
                    echo '</div>';
                    //header("Content-type: ".$row['type']);*/
                    die();

?>
