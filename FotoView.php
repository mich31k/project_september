<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Vote</title>

    <link rel="alternate" type="application/json+oembed" href="https://codepen.io/api/oembed?url=https://codepen.io/gschier/pen/jkivt&amp;format=json" title="Simple Typing Carousel ">


    <link rel="stylesheet" media="all" href="hide_files/editor.css">

    <link rel="stylesheet" media="all" href="text-anim.css">
    <link rel="stylesheet" media="all" href="fotogoat.css">
    <link rel="stylesheet" media="all" href="responsive.css">


</head>

<body class="room-editor editor state-htmlOn-cssOn-jsOn   layout-top     logged-out">
        <div class="header">
    <div class="logo-left">
        <div class="small-logo"></div>
        <div class="logo-txt">FOTOGOAT</div>
    </div>

    <div class="filter-area">
                       <ul class="filters">
                
            <li>
                <a class="filt-btn all"  href="Browse.php?fotoType=ALL"></a>
            </li>
            <li>
                <a class="filt-btn love" href="Browse.php?fotoType=LOVE"></a>
            </li>
            <li>
                <a class="filt-btn like" href="Browse.php?fotoType=LIKE"></a>
            </li>
            <li>
                <a class="filt-btn laugh" href="Browse.php?fotoType=LAUGH"></a>
            </li>
            <li>
                <a class="filt-btn hate" href="Browse.php?fotoType=HATE"></a>
            </li>
        </ul>
    </div>
                <div class="auth-area">
        <?php
            require_once './Classes/Controller.php';
            include_once './Scripts/ShowHideScript.html';
            
            $c = new Controller();
            
            if($c->isLoggedIn()){
                echo '<a class="signin-btn" href="./Page_inc/SignOut.php" >Sign Out</a>';
                echo '<a class="signin-btn" onClick="div_show(' . "'UploadDiv'". ')">Upload</a>';
            }
            else {
                echo '<a class="signin-btn" onClick="div_show(' . "'SignUpDiv'". ')">Sign Up</a>';
                echo '<a class="signin-btn" onClick="div_show(' . "'SignInDiv'". ')">Sign In</a>';
            }
        ?>
    </div>
</div>
    
        <?php
        echo '<div id="SignUpDiv" class="dialog-overlay" style="display:none;">';
        include_once './Page_inc/SignupForm.php';
        echo '</div>';
        
        echo '<div id="SignInDiv" class="dialog-overlay" style="display:none;">';
        include_once './Page_inc/SignInForm.php';
        echo '</div>';
        
        echo '<div id="UploadDiv" class="dialog-overlay" style="display:none;">';
        include_once './Page_inc/UploadForm.php';
        echo '</div>';

    ?>
    
        <div class="center-area">
            <div>
                
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
                        
                        echo "<center><table><tr>";
                        echo '<td><a class="filt-btn love" href="./Page_inc/Vote.php?fotoid=' . $foto->getId() . '&votetype=love"></a> x' . $foto->getLoves() . " </td>";
                        echo '<td><a class="filt-btn like" href="./Page_inc/Vote.php?fotoid=' . $foto->getId() . '&votetype=like"></a> x' . $foto->getLikes() . " </td>";
                        echo '<td><a class="filt-btn laugh" href="./Page_inc/Vote.php?fotoid=' . $foto->getId() . '&votetype=funny"></a> x' . $foto->getFunnys() . " </td>";
                        echo '<td><a class="filt-btn hate" href="./Page_inc/Vote.php?fotoid=' . $foto->getId() . '&votetype=dislike"></a> x' . $foto->getDislikes() . " </td>";
                        echo "</tr></table></center>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>