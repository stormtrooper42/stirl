<?php 
    if(isset($_GET['id'])){
        $id = $app::DestroyHTML($_GET['id']);
        $article = new App\Table\Article($id);
    }else{
        $app::redirect("index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $config->get("blog_title"); ?> - <?php echo $article->title; ?></title>

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



    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h1 style="font-size:25px;"><?php echo $article->title; ?></h1>
                    Posté le <?php echo $article->getDate(); ?>
                    <p><?php 
                        echo $article->getContent();
                    ?></p>
                    <ul class="pager">
                        <li class="previous">
                            <a href="index.php?page=welcome">&larr; Revenir à l'accueil</a>
                        </li>

                        <li class="next">
                            <?php 
                                if(isset($_SESSION['admin'])){
                                    if($user::isAdmin($_SESSION['admin'],$_SESSION['uniqId'])){
                                        ?>
                                             <a href="index.php?page=adminpostremove&id=<?php echo $article->id; ?>"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Supprimer l'article</a>
                                        <?php
                                    }
                                } 
                            ?>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </article>

    <hr>

    <!-- Footer -->
    <?php require_once("../template/footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
