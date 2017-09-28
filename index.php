<?php
session_start();
$session_uid = $_SESSION['uid'];
if(empty($session_uid)){
    echo '<form action="log_reg.php">
                <input type="submit" value="Login and Registration" style="position:fixed;margin-top:300px"/>
            </form>';
}else{
    echo '<form action="database_uploader.php">
                <input type="submit" value="Upload" style="position:fixed;margin-top:300px"/>
            </form>';
    echo '<form action="logout.php">
                <input type="submit" value="Logout" name="Submit" style="position:fixed;margin-top:350px"/>
            </form>';
};
include 'inc/dbconfig.php';
?>
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="plugins/jquery.gallerie.js"></script>
<link rel="stylesheet" type="text/css" href="plugins/gallerie.css"/>
<link rel="stylesheet" type="text/css" href="plugins/gallerie-effects.css"/>

<script type="text/javascript">
$(document).ready(function(){
	$('#gallery').gallerie();
});

</script>

<style>
	body {
		background-color: black;
	}
	
	#gallery {
		margin-left: auto;
		margin-right: auto;
	}
</style>
</head>

<body>

<?php
    include 'inc/body.php';
    
?>
    </body>
</html>
