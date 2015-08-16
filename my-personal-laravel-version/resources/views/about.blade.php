@extends("app")

@section('content')
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <h1>À propos de moi</h1>
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object img-circle" src="https://bitbucket.org/account/Jasonvnm/avatar/256/?ts=1438939569" alt="avatar">
                </a>
            </div>
            <div class="media-body">
                <h3 style="margin-top:50px">Salut, je suis Jason.</h3>
                J'ai 18 ans, je vis et j'étudie en Belgique.<br/>
                J'étudie le PHP depuis 5 ans.<br/>
                J'étudie également le JavaScript.<br/>
                On peut discuter sur <a target="_blank" style="color:#577A8D;font-weight:bold" href="https://twitter.com/godsave18">Twitter</a>.
            </div>
        </div>
    </div>
</div>
@endsection

<!-- <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" name="username"  data-validation--message="Entrez votre nom d'utilisateur"> -->
