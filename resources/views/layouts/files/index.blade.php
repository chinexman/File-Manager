
@extends('layouts.app')


@section('content')
<div class ="panel panel-primary col-md-6 col-lg-6">

 <div class="panel-heading">files<a class="pull-right btn btn-primary" href="/files/create">Create new </a></div>  

<div class="panel body">

<ul class="list-group">
	@foreach($files as $file)
<li class="list-group-item"><a href="/files/{{$file->id}}">{{$file->name}}</a></li>


@endforeach

</ul>
</div>
</div>
@endsection


