<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $config->get("blog_title"); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/flag-icon.min.css">
    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php require_once("../template/header.php"); ?>

    <!-- Main Content -->
    <div class="container">
        <?php
        	if(isset($_SESSION['admin'])){
        		echo $user::IfHeIsAdminLogHim($_SESSION['admin'],$_SESSION['uniqId']);
        	}

        	if(isset($_POST['submit'])){
        		if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] != '' && $_POST['password'] != ''){
					// login process
					$user->adminlogin($_POST['username'],$_POST['password']);
        		}else
        		{
        			echo $user::errorPw();
        		}
        	}

            if(isset($_GET['err']) && $_GET['err'] == "notallowed"){
                echo $user::errorNotAllowed();
            }
        	
        ?>
        <form id="login" name="login" method="POST">
			<?php
        		echo $form->input("username",$translator['USERNAME'],"text");
        		echo $form->input("password",$translator['PASSWORD'],"password");
        		echo $form->submit("submit",$translator['LOG_IN']);
        	?>
        </form>
    </div>

    <hr>

    <!-- Footer -->
    <?php require_once("../template/footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
