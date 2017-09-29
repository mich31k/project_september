<!DOCTYPE html>
<!--[if lte IE 9]>
<html class="ie" lang="en">
<![endif]-->
<!--[if gt IE 9]><!-->
<html class="cookie_used_true js mac js" lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <meta charset="UTF-8">

  <title>Welcome</title>

  <link href="hide_files/css.css" rel="stylesheet">
  <link rel="stylesheet" media="all" href="hide_files/editor.css">
  <link rel="stylesheet" media="all" href="text-anim.css">
  <link rel="stylesheet" media="all" href="fotogoat.css">
  <link rel="stylesheet" media="all" href="responsive.css">

  <script async="" src="hide_files/analytics.js"></script>

</head>

<body class="room-editor editor state-htmlOn-cssOn-jsOn   layout-top     logged-out">



<div class="boxes">
  <div class="logo-area">
    <div class="logo-home"></div>
    <div class="logo-text">FOTOGOAT</div>
  </div>
<div class="output-area">
  <div class="output-container">
    <div class="output-sizer">

      <div id="result_div" class="result"><iframe id="iFrameKey-ec635d11-0a05-78e5-568f-1d14032db22f" src="Simple%20Typing%20Carousel_files/index.html" name="CodePen" allowfullscreen="true" sandbox="allow-scripts allow-pointer-lock allow-same-origin allow-popups allow-modals allow-forms" allowtransparency="true" class="result-iframe"></iframe>

      </div>
        
    </div>
  </div>
</div>
    
    <?php
        include_once './Scripts/ShowHideScript.html';
        
        echo '<div id="SignUpDiv" class="dialog-overlay" style="display:none;">';
        include_once './Page_inc/SignupForm.php';
        echo '</div>';
        
        echo '<div id="SignInDiv" class="dialog-overlay" style="display:none;">';
        include_once './Page_inc/SignInForm.php';
        echo '</div>';
    ?>
    
  <div class="button-area">
    <a class="prime-btn lrg" href="Browse.php">Browse</a>
    <div class="clear"></div>
    <a class="link-btn lrg" onClick="div_show('SignUpDiv')" >Sign Up</a>
    <span class="separator"></span>
    <a class="link-btn lrg" onClick="div_show('SignInDiv')">Sign In</a>
  </div>
</div>




</body>

</html>