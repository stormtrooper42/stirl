@extends("app")

@section('content')
<div style="width:720px;margin:0 auto;" class="well">
    {!! Form::open(array('route' => 'postArticle')) !!}
    <h1>Écrire un nouvel article</h1>
    @if (Session::has('error'))
    <div id="alert_message" class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    @if (Session::has('success'))
    <div id="alert_message" class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="form-group">
        {!! Form::label('title', 'Titre:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Catégorie:') !!}
        {!! Form::text('category', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Contenu:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Envoyer', ['class' => 'btn btn-default btn-lg btn-block', 'name' => 'postArticle']) !!}
    </div>
    {!! Form::close() !!}
</div>
<hr>
@endsection

<!-- <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" name="username"  data-validation--message="Entrez votre nom d'utilisateur"> -->