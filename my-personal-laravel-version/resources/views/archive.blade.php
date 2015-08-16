@extends("app")

@section('content')
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @foreach ($years as $year)
        <div class="post-preview post-preview2" style="padding-top:0;padding-bottom:25px" onclick="location.href='archive-{{ $year->date_year }}';">
            <a href="archive-{{ $year->date_year }}">
                <h2 class="post-title" style="font-size:25px;">
                    <?php echo $year->date_year; ?>
                </h2>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection