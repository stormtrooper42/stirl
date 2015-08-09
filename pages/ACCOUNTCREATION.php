<?php
	if(isset($_POST['Rsubmit'])){
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['email'] != ''){
			// register process
			echo $user->register($_POST['username'],$_POST['email'],$_POST['password']);
        }else
		{
			$app::redirect("index.php?page=welcome&register=failed");
		}
	}
?>
<form id="register" name="register" method="POST">
<?php
	echo $form->input("username","username","text");
	echo $form->input("email","email","email");
    echo $form->input("password","password","password");
?>
<button type="submit" name="Rsubmit" id="submit" class="btn btn-primary">Sign in</button>
</form>