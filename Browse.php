<?php
    include_once './Page_inc/BrowseHeader.php';
    
    require_once './Classes/Controller.php';
    require_once './Classes/Photo.php';
    require_once './Classes/Votes.php';
     
    if(!isset($c)){
        $c = new Controller();
    }
    
    $num = 8;
    $fotos = array();

    if($type == "LOVE"){
        $fotos = $c->getLovedPhotos_random($num);
    }
    elseif($type == "HATE"){
        $fotos = $c->getDislikedPhotos_random($num);
    }
    elseif($type == "LAUGH"){
        $fotos = $c->getFunnyPhotos_random($num);
    }
    elseif($type == "LIKE"){
        $fotos = $c->getLikedPhotos_random($num);
    }
    else{
        $fotos = $c->getPhotos_random($num);
    }
    
    $i = 1;
    echo "<wrapper><center><table><tr>";
    foreach ($fotos as $foto){
        $photoId = $foto->getId();
        echo "<td><div style='text-align='center' height: 200px; width: 200px;'><a href='Fotoview.php?fotoid=". $foto->getId() . "'><img src='data:" . $foto->getMimeType() . ";base64," . base64_encode($foto->getImagedata()) 
                            . "'  style='border:1px solid #999; max-height: 200px; max-width: 200px; margin-left:3px'/></a>"
                . ""
                . "</div></td>";
        if($i == 4){
            echo "</tr></table><table><tr>";
            $i = 0;
        }
        $i++;
    }
    echo "</tr></table></center></wrapper>";
    
    include_once './Page_inc/BrowseFooter.php';
