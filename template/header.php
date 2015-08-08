<!-- Modal -->
<?php require_once("../template/modal/register.php"); ?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?php echo $app->title; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?php echo $app->title; ?></h1>
                    <hr class="small">
                    <span class="subheading"><?php echo $app->caption; ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-collapse navbar-stirl">
             <ul class="nav navbar-nav">
                <li>
                    <a href="index.php?page=welcome">Accueil</a>
                </li>
                <li class="dropdown">
                  <a href="#" class=" dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?page=welcome" style="">Toutes</a></li>
                    <?php foreach($db->query("SELECT * FROM categories", "App\Table\Categories") as $category): ?>
                        <li style="height:20px;"><a style="padding:0" href="<?php echo $category->getURL(); ?>" style="padding-top:15px;"><?php echo $category->getName(); ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </li>
                <li>
                    <a href="index.php?page=archive">Archive</a>
                </li>
                
                <li>
                    <a href="index.php?page=about">A propos</a>
                </li>

                <?php
                    if(isset($_SESSION['admin'])){
                        ?>
                            <li>
                                <a href="index.php?page=logout">Se déconnecter</a>
                            </li>
                        <?php
                    }
                ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</header>