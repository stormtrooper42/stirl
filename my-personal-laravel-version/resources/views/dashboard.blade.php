@extends("app")
@section('content')
<h1>Bienvenue dans l'espace d'administration, {{ Session::get('username') }} !</h1>
@include('sidebar')
<div class="well">
    <p>Information: servez-vous du menu ci-dessus pour naviguer dans l'espace.</p>
</div>
@endsection

<!-- <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" name="username"  data-validation--message="Entrez votre nom d'utilisateur"> -->
