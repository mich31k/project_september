<!DOCTYPE html>
<!--[if lte IE 9]>
<html class="ie" lang="en">
<![endif]-->
<!--[if gt IE 9]><!-->
<html class="cookie_used_true js mac js" lang="en"><!--<![endif]--><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="UTF-8">

    <title>Browse</title>

    <link rel="alternate" type="application/json+oembed" href="https://codepen.io/api/oembed?url=https://codepen.io/gschier/pen/jkivt&amp;format=json" title="Simple Typing Carousel ">


    <link href="hide_files/css.css" rel="stylesheet">

    <link rel="stylesheet" media="all" href="hide_files/editor.css">

    <link rel="stylesheet" media="all" href="text-anim.css">
    <link rel="stylesheet" media="all" href="fotogoat.css">
    <link rel="stylesheet" media="all" href="responsive.css">


</head>

<body class="room-editor editor state-htmlOn-cssOn-jsOn   layout-top     logged-out">



<div class="browse">
<div class="header">
    <div class="logo-left">
        <div class="small-logo"></div>
        <div class="logo-txt">FOTOGOAT</div>
    </div>

    <div class="filter-area">
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
            if($type == "LOVE"){
                $love = " class='selected'";
            }
            elseif($type == "HATE"){
                $hate = " class='selected'";
            }
            elseif($type == "LAUGH"){
                $fun = " class='selected'";
            }
            elseif($type == "LIKE"){
                $like = " class='selected'";
            }
            else{
                $all = " class='selected'";
            }
            
            ?>
        
            <ul class="filters">
                
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