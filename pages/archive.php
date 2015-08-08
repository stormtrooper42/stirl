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
    <?php 
        require_once("../template/header.php"); 
    ?>

    
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
            <?php
                
                if(isset($_GET['year']) && $_GET['year'] > 2000){
                    $article = new App\Table\Article();
                    $year = $app::destroyHTML($_GET['year']);
                    $query = $article::getArticlesYears($year);
                    foreach($query as $article): ?>
                        <div class="post-preview post-preview2" onclick="location.href='<?php echo $article->getURL(); ?>';">
                            <a href="<?php echo $article->getURL(); ?>">
                                <h2 class="post-title" style="font-size:25px;">
                                    <?php echo ucfirst($article->title); ?>
                                </h2>
                                <h5>
                                    <span style="font-size:15px" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo ucfirst($article->category); ?>
                                </h5>
                                <h3 class="post-subtitle">
                                    <?php 
                                        echo ucfirst($article->getExtrait());
                                    ?>
                                </h3>
                            </a>
                            <p class="post-meta">Posté le <?php echo $article->getDate(); ?></p>
                        </div>
                    <?php endforeach;
                }else{
                    $query = $db->query("SELECT DISTINCT YEAR(dateOfWriting) AS date_year FROM articles ","App\Table\Article");
                
                    if($query == null){
                        echo "Aucun article trouvé...";
                    }

                    foreach($query as $article): ?>
                        <div class="post-preview post-preview2" style="padding-top:0;padding-bottom:25px" onclick="location.href='index.php?page=archive&year=<?php echo $article->date_year; ?>';">
                            <a href="">
                                <h2 class="post-title" style="font-size:25px;">
                                    <?php echo $article->date_year; ?>
                                </h2>
                            </a>
                        </div>
                    <?php

                    endforeach; 
                }

            ?>
                <!-- Pager 
                <ul class="pager">
                    <li class="next">
                        <a href="#">Articles plus anciens &rarr;</a>
                    </li>
                </ul>-->
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php require_once("../template/footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
   

</body>

</html>
