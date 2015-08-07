<?php
	if(isset($_POST['submit'])){
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['email'] != ''){
			// register process
			echo $user->register($_POST['username'],$_POST['email'],$_POST['password']);
        }else
		{
			$app::redirect("index.php?page=welcome&register=failed");
		}
	}
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Inscription</h4>
      </div>
      <div class="modal-body">
      	<form id="register" name="register" method="POST">
	        <?php
	    		echo $form->input("username","Nom d'utilisateur","text");
	    		echo $form->input("email","Adresse email","email");
	            echo $form->input("password","Mot de passe","password");
	    	?>
      </div>
      <div class="modal-footer">
	        <button type="submit" name="submit" id="submit" class="btn btn-primary">S'inscrire</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      	</form>
      </div>
    </div>
  </div>
</div>