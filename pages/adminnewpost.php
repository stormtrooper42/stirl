<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $config->get("blog_title"); ?> - Poster un article</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

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


    <?php
      if(!isset($_SESSION['admin'])){
        $app->redirect("index.php?page=welcome");
      }
    ?>
    <!-- Main Content -->
    <div class="container">
    <?php
        require("../template/adminmenu.php");
    ?>
    <h2>Ecrire un article</h2>

    	<?php 
    		if(isset($_SESSION['admin'])){
				if($user::isAdmin($_SESSION['admin'],$_SESSION['uniqId'])){
					if(isset($_POST['submit'])){
						$title = $app::destroyHTML($_POST['title']);
						$content = $app::destroyHTML($_POST['content']);
                        $category = $app::destroyHTML($_POST['category']);
                        $categories = new App\Table\Categories($category);

						if(!empty($title) && !empty($content)){

                            if(empty($category)){
                                $category = "Non classé";
                            }else{
                                $categories->registerCategoryIfDoesntExist();
                            }

							$db->insert("
								INSERT INTO articles(title,content,category,dateOfWriting)
								VALUES(:title,:content,:category,:dateOfWriting)
							",array(
								"title"=>$title,
								"content"=>$content,
                                "category"=>$category,
								"dateOfWriting"=>date("Y-m-d")
							));
						}
						$article = new App\Table\Article();
						echo $article::postingSuccess();
    				}
				}else{
					$app::redirect("index.php");
				}
			}else{
				$app::redirect("index.php");
			}	
    	?>

    	<form id="newpost" name="newpost" method="POST">
			<?php
        		echo $form->input("title","Titre","text");
                echo $form->input("category","Catégorie","text");
        		echo $form->textarea("content","Contenu",10,5);
        		echo $form->submit("submit","Envoyer l'article");
        	?>
        </form>
    <hr>
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
