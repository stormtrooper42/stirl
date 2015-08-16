@extends("app")

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @if (Session::has('success'))
            <div id="alert_message" class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            @foreach ($articles as $article)
            <?php
                $url = str_replace(' ','',$article->title);
                $url = str_replace("'",'',$url);
                $url = strtolower($url."-".$article->id);
            ?>
            <div class="post-preview post-preview2" onclick="location.href='article-{{ $url }}';">
                <a href="article-{{ $url }}">
                    <h2 class="post-title" style="font-size:25px;">
                        {{ $article->title }}
                    </h2>
                    <h5>
                        <span style="font-size:15px" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        {{ $article->category }}
                    </h5>
                    <h3 class="post-subtitle">
                        <?php
                            $lg_max = 300;

                            if($article->content != null){
                                $article->content = str_replace("&lt;br /&gt;", "", $article->content);
                                $article->content = nl2br($article->content);
                            }
                            if (strlen($article->content) > $lg_max)
                            {
                                $article->content = substr($article->content, 0, $lg_max);
                                $last_space = strrpos($article->content, " ");
                                $article->content = substr($article->content, 0, $last_space)."...";
                            }
                            echo $article->content;
                        ?>
                    </h3>
                </a>
                <p class="post-meta"> <?php echo date("d/m/Y", strtotime($article->dateOfWriting)) ?> </p>
            </div>
            @endforeach
            <!-- Pager
            <ul class="pager">
                <li class="next">
                    <a href="#">Articles plus anciens &rarr;</a>
                        </li>
                    </ul>-->
        </div>
    </div>
@endsection