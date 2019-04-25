@extends('layouts.app')


@section('content')
<div class ="panel panel-primary col-md-9 col-lg-9">
<h4>Folders</h4>

<div class=" text-right"> <a class="pull-center btn btn-primary  btn-sm" href="/folders/create" role="button">Create new folder</a>
</div>
<div class="panel body">

<ul class="list-group">


<div class="container">
	
	@foreach($folders as $folder)


 

  
    <div class="row">
     
      <div class="col-md-6">
        
       <h4> <li class="list-group-item"><a href="/folders/{{$folder->id}}">{{$folder->name}}</a></li></h4>

      </div>
      <br>
      <div class="col-md-4">
       <a type="button" class="btn btn-primary "  href="/folder/{{$folder->id}}/edit">edit</a>
<button type="button" class="btn btn-danger ">delete</button>       
       
      </div>
      <br>
    
  </div>


@endforeach
</div>
@if(($folders)==null)

<div class="">
	<p>No entries in table</p>
</div>


@endif

</ul>
</div>
</div>
@endsection
