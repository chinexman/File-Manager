
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
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
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
     <div class="container-fluid"> 
      <div class="row">
      
 <div class="col-sm-9 col-md-9 col-lg-9 pull-left">
      <!-- Jumbotron -->
      <div class="jumbotron">
       @foreach($files as $file)
        <h1>{{$file->filename}}</h1>
        <!--<p class="lead">{{$file->description}}</p>-->
        <input type="hidden" name="company_id" value="{{$file->folder_id}}">
        <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
      </div>
      @endforeach
      <!-- Example row of columns -->
      <div  class="pull-right">
             <a class=" btn btn-primary  btn-sm" style="margin-right: 20px" href="/files/create/{{$file->company_id}}" role="button">Add new file</a>
     </div>
     <br/>
 {{--@include('partials.comments')
          
 <form method="POST" action="{{ route('comments.store') }}">


  {{csrf_field()}}
   <input type="hidden" name="commentable_type" value="App\file">
    <input type="hidden" name="commentable_id" value="{{$file->id}}">
  
  <div class="form-group">
    <label class="label" for="comment-content">Comments</label>
    <textarea name="body" placeholder="Enter comment" rows="3" id="comment-content" spellchecks="false"
    class="form-control autosize-target text-left"></textarea>
  </div>
  <div class="form-group">
    <label for="file content">Url proof of work Done (Url/Photos)</label>
    <textarea  name="url" 
    id="company-content"
     placeholder="Enter url or screenshots" 
     rows="3"
      spellchecks="false"
       class="form-control autosize-target text-left"> 
       </textarea>
         </div>
  <div class="form-group">
    <button type="submit" value="submit">submit</button>

  </div>
</form>
      --}}
     {{--    @foreach($files->files as $file)
        <div class="col-lg-4">
          <h2>{{$file->name}}</h2>
         <!-- <p class="text-danger">{{$file->description}}</p>  -->
          
          <p><a class="btn btn-primary" href="/files/{{$file->id}}" role="button">View file</a></p>
        </div>
         @endforeach
         // @include('partials.comments')
     --}}
      
          
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
              <li><a href="/files/{{$file->id}}/edit"> Edit</a></li>
                            <li><a href="/files/create/{{$file->company_id}}"> Create new file</a></li>

              <li><a href="/companies/{{$file->company_id}} ">My file</a></li>

             
              @if($file->user_id ==Auth::user()->id) 

                            <li><a 
                href="#"
                onclick="var result= confirm('Are you sure you wish to delete this file?');
                if(result){
                  event.preventDefault();
                  document.getElementById('delete-file').submit();
                }" 
                >Delete</a>

               <form id="delete-file" action="{{route('files.destroy',[$file->id])}}" method="POST" style="display: none;">
                 <input type="hidden" name="_method" value="delete">
                 {{csrf_field()}};
               </form>
              </li>
              @endif  
              <!-- <li><a href="#">Add new member</a></li> -->
            </ol>
<hr/>
{{--
            <h4>Add members</h4>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12  col-sm-12 ">
              <form id="add-user" action="{{ route('files.adduser') }}"  method="POST" >
                {{ csrf_field() }}
                <div class="input-group"> 
                  <input class="form-control" name = "file_id" id="file_id" value="{{$file->id}}" type="hidden">
                  <input type="text" required class="form-control" id="email"  name = "email" placeholder="Email">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="addMember" >Add!</button>
                  </span>
                </div><!-- /input-group -->
                </form>
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
<br/>
          <div class="sidebar-module">
            <h4>Menbers</h4>
            <ol class="list-unstyled">
              @foreach($file->users as $user)
              <li><a href="#">{{$user->email}}</a></li>
              @endforeach
            </ol>
          </div>
          
             
--}}

</div>
</div>
@endsection

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
