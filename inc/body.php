<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
