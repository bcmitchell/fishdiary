
<div id="login_form">

<?php echo form_open('login/validate_credentials'); 
		echo form_input('username', 'Username');
		echo form_password('password', 'Password');
		echo form_submit('submit', 'Login');
		echo anchor('login/signup', 'Create Account');
	
?>
</div>

