<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }

        .subtitle {
            font-size: 48px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Erreur 404</div>
        <div class="subtitle">La page {{ $page }} n'existe pas</div>
        <div class="subtitle">{!! HTML::link('./', "Retour à l'accueil") !!}</div>
    </div>
</div>
</body>
</html>