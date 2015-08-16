@extends("app")

@section('content')
<article>
    <?php
    $slug = str_replace(' ','',$article->title);
    $slug = strtolower(str_replace("'",'',$slug));
    $id = $article->id;
    ?>
    <div class="container">
        @if (Session::has('username'))
        <ul class="pager" style="margin-bottom:20px;margin-right: 180px;">
            <li class="next">
                <a href="./delete-article-{!! $slug !!}-{!! $id !!}">Supprimer cet article</a>
            </li>
        </ul>
        @endif
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 article" style="margin-bottom: 20px">
                <h1 style="font-size:25px;"><?php echo $article->title; ?></h1>
                <span style="font-size:15px" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{ $article->category }} - <?php echo date("d/m/Y", strtotime($article->dateOfWriting)) ?>
                <p>
                    <?php
                    $article->content = str_replace("&lt;br /&gt;", "", $article->content);
                    echo nl2br($article->content);
                    ?>
                </p>
            </div>
        </div>
        <div style="margin-left:195px;margin-bottom: 20px">

            <ul class="pager">
                <li class="previous">
                    <a href="./">&larr; Retour à l'accueil</a>
                </li>
                <li class="next">
                    <div id="share-buttons">
                        <b>Partager:</b>
                        <!-- Facebook -->
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo route('article',['slug'=>$slug,'id'=>$id]); ?>" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                        </a>
                        <!-- Twitter -->
                        <a href="https://twitter.com/share?url=<?php echo route('article',['slug'=>$slug,'id'=>$id]); ?>&amp;text={!! $article->title !!}&amp;hashtags=blog,jasonvnm,développeur" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                        </a>
                        <!-- Google+ -->
                        <a href="https://plus.google.com/share?url=<?php echo route('article',['slug'=>$slug,'id'=>$id]); ?>" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                        </a>
                        <!-- Tumblr-->
                        <a href="http://www.tumblr.com/share/link?url=<?php echo route('article',['slug'=>$slug,'id'=>$id]); ?>&amp;title={!! $article->title !!}" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
                        </a>
                        <!-- Print -->
                        <a href="javascript:;" onclick="window.print()">
                            <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
                        </a>


                    </div>
                </li>
            </ul>
        </div>
    </div>
</article>
@endsection

<!-- <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" name="username"  data-validation--message="Entrez votre nom d'utilisateur"> -->
