<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.1/classic/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Laravel CKEditor</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(!$errors->isEmpty())
                <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Uh oh!</h4>
                @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                @endforeach
                </div>
            @endif	
            @if(Session::has('status'))
                <div class="alert alert-success" role="alert">
                    <p>{{ Session::get('message') }}</p>
                </div>	
            @endif
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
