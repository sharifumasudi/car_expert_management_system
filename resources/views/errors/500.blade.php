<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>500 Error</title>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
           <div class="col-8 offset-2">
               <div class="card text-center p-4 mt-5">
                   <h2 class=" font-weight-bold text-danger">
                       500 Error!
                   </h2>
                   <h4>Something Went Wrong, Please Contact System Developer for Further Helps!!</h4>
                   <div class="card-footer">
                       <button type="button" class="btn btn-danger" onclick="history.go(-1)">Go Back</button>
                   </div>
               </div>
           </div>
        </div>
    </div>
</body>
</html>
