<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jasonvnm</title>

    <!-- Bootstrap Core CSS -->
    <link href="../resources/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../resources/assets/css/clean-blog.min.css" rel="stylesheet">
    <link href="../resources/assets/css/sidebar.css" rel="stylesheet">
    <style>
        #share-buttons {
            margin-top:10px;
            font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
        }
        #share-buttons img {
            width: 35px;
            padding: 5px;
            border: 0;
            box-shadow: 0;
            display: inline;
            cursor:pointer;
            border-radius: 100px;
        }
        #share-buttons img:hover {
            border: 1px solid #2D4162;
        }
        #share-buttons a {
            text-decoration: none;
        }
    </style>
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
            <a class="navbar-brand" href="index.php">Jasonvnm</a>
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

<header class="intro-header" style="background-image: url('../resources/assets/img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Jasonvnm</h1>
                    <hr class="small">
                    <span class="subheading">Blog d'un développeur</span>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-collapse navbar-stirl">
        <ul class="nav navbar-nav">
            <li>
                <a href="./">Accueil</a>
            </li>
            <li class="dropdown">
                <a href="#" class=" dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="./" style="">Toutes</a></li>
                    @foreach($categoriesMenu as $category)
                    <li><a href="./category-{{ $category->name }}" style="">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="archive">Archive</a>
            </li>

            <li>
                <a href="about">A propos</a>
            </li>

            @if (Session::has('username'))
            <li>
                <a href="logout">Se déconnecter</a>
            </li>
            @endif
        </ul>
    </div>
    <!-- /.navbar-collapse -->
    </div>
</header>

<!-- Main Content -->
<div class="container">
    @yield('content')
</div>


<!-- Footer -->
<footer style="margin-top:-50px;border-top:none">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a class="linkcircle" href="https://www.livecoding.tv/jasonvnm/" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitch fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="linkcircle" href="https://github.com/jasonvanmalder/stirl/" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-bitbucket fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="linkcircle" href="login">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa fa-lock fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Jasonvnm 2015</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="../resources/assets/js/jquery.js"></script>
<script type="text/javascript">
    window.setTimeout(function() {
        $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);
</script>
<!-- Bootstrap Core JavaScript -->
<script src="../resources/assets/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->


</body>

</html>