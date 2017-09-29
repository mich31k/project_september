<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Vote</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" media="all" href="hide_files/editor.css">
  <link rel="stylesheet" media="all" href="text-anim.css">
  <link rel="stylesheet" media="all" href="fotogoat.css">
  <link rel="stylesheet" media="all" href="responsive.css">
    </head>
    <body>
        <div class="header">
    <div class="logo-left">
        <div class="small-logo"></div>
        <div class="logo-txt">FOTOGOAT</div>
    </div>

    <div class="filter-area">
           
    </div>
</div>
        <div class="center-area">
            <div class="center-pic">
                
                <?php
                    require_once './Classes/Controller.php';
                    require_once './Classes/Photo.php';
                    require_once './Classes/Votes.php';

                    if(!isset($c)){
                        $c = new Controller();
                    }
                    
                    if(isset($_GET['fotoid'])){
                        $foto = $c->getPhoto($_GET['fotoid']);
                        if($foto){
                        echo "<img src='data:" . $foto->getMimeType() . ";base64," . base64_encode($foto->getImagedata()) 
                            . "'  style=''/>";
                        }
                    }
                ?>
                
            </div>
        </div>
        <div class="vote-area">
            
            <ul class="filters">
                
          
            <li class="selected">
                <a class="filt-btn love" href="/Page_inc/Vote.php"></a>
            </li>
            <li>
                <a class="filt-btn like" href="?fotoType=LIKE"></a>
            </li>
            <li>
                <a class="filt-btn laugh" href="?fotoType=LAUGH"></a>
            </li>
            <li>
                <a class="filt-btn hate" href="?fotoType=HATE"></a>
            </li>
        </ul>
        </div>
    </body>
</html>