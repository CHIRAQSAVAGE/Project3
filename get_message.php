<?php session_start(); ?>

<?php require_once('common.inc'); ?> 
<?php require_once('authenticate_user.inc'); ?> 

<?php






$recipient_id = $_SESSION["id"];
 
$id = 0;


if(get_var_sent("id") && is_numeric($_GET["id"])){

	$id = $_GET["id"];

	} 

 
$messages = get_message($recipient_id, $id);


if(sizeof($messages) == 1){
	$message = $messages[0];
	
	add_message_read($id, $recipient_id);
	
	
}




?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
 


<head>

<link href="css.css" rel="stylesheet" type="text/css">

</head>



<body>


<?php require_once('navigation.inc'); ?> 



<div class="align_center underline">
        <h1>
            Message</h1>
    </div>


	
	
	
<div class="error_msg <?php echo strlen($error_message)==0?"hidden":"" ?>"><?php echo $error_message ?></div>		
<div class="info_msg <?php echo strlen($info_message)==0?"hidden":"" ?>"><?php echo $info_message ?></div>	
		
	
	
<form method="post" name='credentials'>	
	
	
	<input type="hidden" value="submitted" name="submitted">
	
    <div class="form_container">
        <div class="header1">
            &nbsp;
        </div>
        <div class="form_content">
		
		
		
 				





<div class="form_input_field_label_std">Subject
</div>
<div class="form_input_field_input_std2">


<?php echo $message["subject"]; ?>


</div>
     <div style="clear: both">
                </div>		



 
 

</div>
     <div style="clear: both">
                </div>



 
				
				 
		
    <div class="header1">
            Body
        </div>		
		
	    <div class="form_content">	
		
 		
<?php echo $message["body"]; ?>



		
		
		</div>
		 
		
		
           
            
        </div>
   	
	
</form>

</body>

</html>


	