<?php session_start(); ?>
<?php require_once('common.inc'); ?> 

<?php

    	
	session_unset();
	
	
if(session_status() == PHP_SESSION_ACTIVE){

    session_destroy();
	
	}	
		

	
	
 
    go_to_page("index.php");
		
 		


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
 


<head>

<link href="css.css" rel="stylesheet" type="text/css">

</head>



<body>

<div class="align_center underline">
        <h1>
            Log out</h1>
    </div>

	
	
</body>
</html>