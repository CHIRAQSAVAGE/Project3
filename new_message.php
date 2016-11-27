<?php session_start(); ?>

<?php require_once('common.inc'); ?> 
<?php require_once('authenticate_user.inc'); ?> 

<?php


$error_message = "";
$info_message = "";


$subject = "";
$message_body = "";
$recipient_ids_array = Array();


if(post_var_sent("submitted")){
	
	
	
	if(post_var_sent("subject")){

		$subject = $_POST["subject"];

		}
		
	else{
		
		$error_message = con_cat($error_message, "Subject: Please enter a value", "<br />");
		
	}	
	
	
    if(isset($_POST["recipient_ids"]) and is_array($_POST["recipient_ids"]) and sizeof($_POST["recipient_ids"])>0){
    		
        $recipient_ids_array = $_POST["recipient_ids"];	

	}
	else{
		
		$error_message = con_cat($error_message, "Recipient: Please select a value", "<br />");		
		
	}	
	
	
	
	
	if(post_var_sent("message_body")){

		$message_body = $_POST["message_body"];

	}
		
	else{
		
		$error_message = con_cat($error_message, "Body: Please enter a value", "<br />");
		
	}		
	
	
	
	if(strlen($error_message) == 0){
		
		$id = $_SESSION["id"];
		
		foreach ($recipient_ids_array as $recipient){
			
			add_message(
			$recipient,
			$id,
			$subject,
			$message_body
			);
			
		}		

	$subject = "";
	$message_body = "";
	$recipient_ids_array = Array();	
	
	$info_message = "Message sent";	
		
		
	}
	
	
	
		
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
            New Message</h1>
    </div>


	
	
	
<div class="error_msg <?php echo strlen($error_message)==0?"hidden":"" ?>"><?php echo $error_message ?></div>		
<div class="info_msg <?php echo strlen($info_message)==0?"hidden":"" ?>"><?php echo $info_message ?></div>	
	     <div style="clear: both">
                </div>		
	
	
	
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

  <input name="subject" id="subject" type="text" value="<?php echo esc_chr_o($subject) ?>" class="form_input_field_subject"/>
  
</div>
     <div style="clear: both">
                </div>		



 
 

 
				
		 
				
		 




<div class="form_input_field_label_std">Recipients
</div>
<div class="form_input_field_input_std">



<?php

$recipients = get_recipient_list($_SESSION["id"]);
 
 
foreach ($recipients as $recipient){
	
$id = $recipient["id"];

echo $recipient["firstname"] . " " . $recipient["lastname"];
	
?>
<input type="checkbox" name="recipient_ids[]" <?php echo (in_array($id, $recipient_ids_array) ? "checked" : "") ?> value="<?php echo $id ?>"><br />
<?php

	
 }
 
 
?>


</div>
     <div style="clear: both">
                </div>



 
				
				
				</div>	
		
    <div class="header1">
            Body
        </div>		
		
	    <div class="form_content">	
		
 		
<textarea rows="4" cols="50" name="message_body" id="message_body" class="form_input_field_message_body">
<?php echo esc_chr_o($message_body) ?>
</textarea>



		
		
		</div>
		
                <div style="clear: both">
                </div>
                <div class="hr">
                    <hr />
                </div>
                <div style="clear: both">		
		
		
           
                <div class="align_center">
                    <input type="submit" value="Submit">
            </div>
        </div>
    </div>
	
	
</form>

</body>

</html>


	