
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Justified Nav Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-folder-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      @extends('layouts.app')

      @section('content')

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      
      <div class="row">
 <div class="col-sm-9 col-md-9 col-lg-9 pull-left">
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>{{$folder->name}}</h1>
       <!-- <p class="lead">{{$folder->description}}</p>-->
        <p><a class="btn btn-lg btn-success" href="/files/create" role="button">Add new file to this folder</a></p>
      </div>

      <!-- Example row of columns -->
             <a class="pull-right btn btn-primary  btn-sm" href="/files/create" role="button">Add new file to this folder</a>

      <div class="row">
        @foreach($folder->files as $file)
        @if($file==null)
       <p> no files in this folder</p>
        @endif
        <div class="col-lg-8" >
          <p class="text-center">{{$file->filename}}</p>
          <!--<p class="text-danger">{{$file->description}}</p>-->
          
         <!-- <p><a class="btn btn-primary" href="/files/{{$file->id}}" role="button">View file</a></p> -->
          <hr>
        </div>
        <div class="col-lg-4">
          <a href="{{ route('downloadfile',$file) }}" ><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download">download</i></button>
        </a>
        <a href="{{ route('deletefile',$file) }}" ><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-download">delete</i></button>
        </a>
          <!--<p class="text-danger">{{$file->description}}</p>-->
          
         <!-- <p><a class="btn btn-primary" href="/files/{{$file->id}}" role="button">View file</a></p> -->
         
        </div>
         
         @endforeach
     
      </div>
    
  </div>

   <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
        -->
           <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/folders/{{$folder->id}}/edit"> Edit</a></li>
                            <li><a href="/folders/create"> Create new folder</a></li>

              <li><a href="/files/create/{{$folder->id}}">Create new file</a></li>

              <li><a 
                href="#"
                onclick="var result= confirm('Are you sure you wish to delete this folder?');
                if(result){
                  event.preventDefault();
                  document.getElementById('delete-folder').submit();
                }" 
                >Delete</a>

               <form id="delete-folder" action="{{route('folders.destroy',[$folder->id])}}" method="POST" style="display: none;">
                 <input type="hidden" name="_method" value="delete">
                 {{csrf_field()}};
               </form>
              </li>
              <li><a href="#">Add new Menber</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Menbers</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              
            </ol>
          </div>
          
        </div>     


</div>

@endsection

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
