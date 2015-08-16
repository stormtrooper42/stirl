@extends("app")

@section('content')
    <div style="width:760px;margin:0 auto;" class="well">
        {!! Form::open(array('route' => 'postLogin')) !!}
        <h1>Connexion à l'espace d'administration</h1>
        @if (Session::has('error'))
        <div id="alert_message" class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="form-group">
            {!! Form::label('username', 'Nom d\'utilisateur:') !!}
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Mot de passe') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Se connecter', ['class' => 'btn btn-default btn-lg btn-block', 'name' => 'login']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <hr>
@endsection

       <!-- <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" name="username"  data-validation--message="Entrez votre nom d'utilisateur"> -->
