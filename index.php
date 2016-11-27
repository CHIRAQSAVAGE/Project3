<?php session_start(); ?>

<?php require_once('common.inc'); ?> 

<?php


$username = "";
$password = "";
$error_message = "";
$info_message = "";

if(post_var_sent("submitted")){
	

	if(post_var_sent("username")){

		$username = $_POST["username"];

		}
		
	else{
		
		$error_message = con_cat($error_message, "Username: Please enter a value", "<br />");
		
	}	

	if(post_var_sent("password")){

		$password = $_POST["password"];

		}
		
	else{
		
		$error_message = con_cat($error_message, "Password: Please enter a value", "<br />");		
		
	}
	
	
	
	if(strlen($error_message) == 0){
		
		
			
		$id = authenticate_user ($username, $password);	

		if($id == ""){
			
			$error_message = con_cat($error_message, "Innvalid username or password", "<br />");			
			
		}

		else{
				
			$_SESSION["id"] = $id;
				
			$info_message = con_cat($error_message, "Correct username and password", "<br />");	

			if($id == 1)
				go_to_page("add_user.php");
			else
				go_to_page("get_messages.php");
			
			
			
		}	
			
		
		
	}

	
	
	
		
		
}




		



?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
 
<head>

<link href="css.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="align_center underline">
        <h1>
            Login</h1>
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
            <div style="clear: both">
            </div>
            <div class="align_center" style="width: 100%">
                <div class="form_input_field_label_std">
                    Username
                </div>
                <div class="form_input_field_input_std">
				
				
  <input name="username" id="username" type="text" value="<?php echo $username ?>" />


			  </div>
                <div style="clear: both">
                </div>
                <div class="form_input_field_label_std">
                    Password
                </div>
                <div class="form_input_field_input_std">
  
	
	
	    <input id="password" type="password" name="password" />

                </div>
                <div>
                    &nbsp;</div>
                <div style="clear: both">
                </div>
                <div class="hr">
                    <hr />
                </div>
                <div style="clear: both">
                </div>
                <div class="align_center">
                    <input type="submit" value="Submit">
            </div>
        </div>
    </div>
	
	
</form>

</form>


</body>

</html>



