  <?php
            
        if(isset($_FILES['img']['tmp_name'])){
            
            require_once dirname(__FILE__, 2) . "/Classes/Controller.php";
            $c = new Controller();
            
            $file_name = $_FILES['img']['tmp_name'];
            $mime = $_FILES['img']['type'];
            $source = imagecreatefromjpeg($file_name);

            $width = getimagesize($file_name)[0];
            $height = getimagesize($file_name)[1];

            $maxDim = 500;
            
            $target_filename = $file_name;
            
            $ratio = $width/$height;
            if( $ratio > 1) {
                $newWidth = $maxDim;
                $newHeight = $maxDim/$ratio;
            } else {
                $newWidth = $maxDim*$ratio;
                $newHeight = $maxDim;
            }

            $src = imagecreatefromstring(file_get_contents($file_name));
            $dst = imagecreatetruecolor($newWidth, $newHeight);

            imagecopyresampled($dst, $source, 0, 0, 0, 0,$newWidth, $newHeight, $width, $height);
            imagejpeg($dst,  $target_filename);
            imagedestroy($src);
            imagedestroy($dst);

            $c->uploadPhoto("", file_get_contents($target_filename), $mime, "...", "");
        }
        
        header("Location: ../Browse.php");
        die();