<?php
require_once './Classes/Controller.php';
require_once './Classes/Photo.php';
require_once './Classes/Votes.php';
require_once './Classes/DatabaseCon.php';

if(!isset($c)){
    $c = new Controller();
}
$emo_type = "ALL";
            if($_GET && $_GET['emoType']){
                $emo_type = $_GET['emoType'];
            }
            $emo_love = "";
            $emo_hate = "";
            $emo_fun = "";
            $emo_like = "";
            $emo_all = "";
            
            $emos = NULL;
            if($emo_type == "LOVE"){
                $fotos = $c->getLovedPhotos_random($num);
                voteLove($userId, $photoId);
            }
            elseif($emo_type == "HATE"){
                $fotos = $c->getDislikedPhotos_random($num);
                voteDislike($userId, $photoId);
            }
            elseif($emo_type == "LAUGH"){
                $fotos = $c->getFunnyPhotos_random($num);
                voteFunny($userId, $photoId);
            }
            elseif($emo_type == "LIKE"){
                $fotos = $c->getLikedPhotos_random($num);
                voteLike($userId, $photoId);
            }
            
                foreach ($emos as $foto){
                    $photoId = $foto->getId();
                    echo "<div>
                        <ul class=filters'>
                        <li <?php echo $all; ?>
                            <a class='filt-btn all'  href='?emoType=ALL'></a>
                        </li>
                        <li <?php echo $emo_love; ?>
                            <a class='filt-btn love' href='?emoType=LOVE'></a>
                        </li>
                        <li <?php echo $emo_like;?>
                            <a class='filt-btn like' href='?emoType=LIKE'></a>
                        </li>
                        <li <?php echo $emo_fun; ?>
                            <a class='filt-btn laugh' href='?emoType=LAUGH'></a>
                        </li>
                        <li <?php echo $emo_hate; ?>
                            <a class='filt-btn hate' href='?emoType=HATE'></a>
                        </li>
                    </ul>
                    </div>"
                    . "<img src='data:image/jpeg;base64," . base64_encode($foto->imageData) 
                            . "'  style='height: 200px; width: 200px;'/>";
                    echo "Photo: $foto->id  Author:" . $foto->author->getFirstname() ." => ";
                    foreach ($foto->votes as $vote){
                        echo $vote->getType() . ": " . $vote->getNumberOfVotes() . " - ";
                    }
                    echo '<br/>';
                }
            
                
                
                
                //
                ?>
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
</div>
            