
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


<div class="container text-left">

    <div id="login-form text-center">
       <form method="POST" action="{{ route('folders.store') }}">


  {{csrf_field()}};

            <div class="col-md-12">

                <div class="form-group">
                    <h2 >Folders</h2>                      <h4>Create</h4>
                <hr />
                </div>

                 <div class="form-group">
      <label class="control-label " for="name">Name*</label>           
        <input type="text" class="form-control"   name="name">
     
    </div>

      <div class="form-group">
                    <hr />
                </div>


  </div>

   <div class="col-md-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-danger" name="btn-signup">Save</button>
                </div>

                  </div>

                

          

        </form>

         <form class=" " action="{{ route('users.store') }}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <input type="file" name="image[]" multiple>
        <button type="submit" name="button">upload button</button>
      </form>

    </div>

</div>





     
    
     
     @endsection

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
