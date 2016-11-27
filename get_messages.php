<?php session_start(); ?>

<?php require_once('common.inc'); ?> 
<?php require_once('authenticate_user.inc'); ?> 

<?php

$id = $_SESSION["id"];
 
$messages = get_messages($id);



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
            Home</h1>
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
		
		
	
		<table style="width: 100%;border:1px" border="1">
			<tr>
				<td>&nbsp;</td>
				<td>Subject</td>
				<td>Sender</td>
			</tr>
			
<?php

foreach ($messages as $message){

$read_status = $message["read_status"];

?>

			
			<tr>
				<td><a href="get_message.php?id=<?php echo $message["id"] ?>">View</a></td>
				<td class="<?php echo($read_status==0?"bold":"" ); ?>"><?php echo esc_chr_o($message["subject"]) ?></td>
				<td><?php echo esc_chr_o($message["user_name"]) ?></td>
			</tr>
			
			
<?php

}

?>			
			
			
		</table>

	
		
 				
		</div>
		
              
    </div>
	
	
</form>

</body>

</html>


	