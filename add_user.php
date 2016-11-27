<?php session_start(); ?>

<?php require_once('common.inc'); ?> 
<?php require_once('authenticate_user.inc'); ?> 

<?php


$first_name = "";
$last_name = "";
$username = "";
$password = "";

$error_message = "";
$info_message = "";


if(post_var_sent("submitted")){
	
	
	if(post_var_sent("first_name")){

		$first_name = $_POST["first_name"];

		}
		
	else{
		
		$error_message = con_cat($error_message, "First Name: Please enter a value", "<br />");
		
	}
	
	
	if(post_var_sent("last_name")){

		$last_name = $_POST["last_name"];

		}
		
	else{
		
		$error_message = con_cat($error_message, "Last Name: Please enter a value", "<br />");
		
	}
	
	
	if(post_var_sent("username")){

		$username = $_POST["username"];

		if(is_duplicate_user_name($username)){
			
			$error_message = con_cat($error_message, "Username: That username is already taken", "<br />");			
			
		}
		
	}
		
	else{
		
		$error_message = con_cat($error_message, "Username: Please enter a value", "<br />");
		
	}	
	
	
	if(post_var_sent("password")){

		$password = $_POST["password"];
				
		$containsLetter = preg_match('/[A-Z]/', $password);
		$containsDigit = preg_match('/\d/', $password);
		$longEnough = (strlen($password)>=8);
		
		if(!$containsLetter || !$containsDigit || !$longEnough){
			
			$error_message = con_cat($error_message, "Password: Please enter a value that has at least one number and one letter, and one capital letter and is at least 8 characters long.", "<br />");			
			
		}

		
	}
		
	else{
		
		$error_message = con_cat($error_message, "Password: Please enter a value", "<br />");
		
	}	
	
	
	
	if(strlen($error_message) == 0){
		
		add_user(
		$first_name,
		$last_name,
		$username,
		$password);
		
		$info_message = con_cat($info_message, "User successfully added", "<br />");		
		
		$first_name = "";
		$last_name = "";
		$username = "";
		$password = "";
		
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
            Add User</h1>
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
		
		
		
					
				<div class="tcl_left_col">
				
				





<div class="form_input_field_label_std">First Name
</div>
<div class="form_input_field_input_std">

  <input name="first_name" id="first_name" type="text" value="<?php echo esc_chr_o($first_name) ?>" class="form_input_field_first_name"/>
  
</div>
     <div style="clear: both">
                </div>		




<div class="form_input_field_label_std">Last Name
</div>
<div class="form_input_field_input_std">

  <input name="last_name" id="last_name" type="text" value="<?php echo esc_chr_o($last_name) ?>" class="form_input_field_last_name"/>

</div>
     <div style="clear: both">
                </div>		
				
				
				</div>
				<div class="tcl_middle_col">&nbsp;
				
				
				
				
				
				</div>
				<div class="tcl_right_col">




<div class="form_input_field_label_std">Username
</div>
<div class="form_input_field_input_std">

  <input name="username" id="username" type="text" value="<?php echo esc_chr_o($username) ?>" class="form_input_field_username"/>


</div>
     <div style="clear: both">
                </div>




<div class="form_input_field_label_std">Password
</div>
<div class="form_input_field_input_std">

  <input name="password" id="password" type="text" value="<?php echo esc_chr_o($password) ?>" class="form_input_field_password"/>


</div>
     <div style="clear: both">
                </div>
				
				
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


	