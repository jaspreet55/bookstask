<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elastic Search Demo</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/auth.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin/custom.css')}}">
</head>

<body>
    <div id="auth">
        
<div class="row h-100 w-50 login-auto">
    <div class="col-lg-12 col-12">
        <div id="auth-left text-center">
            @if($errors->has('error'))
                    <div class="alert alert-danger">
                        <h4>{{ $errors->first('error') }} </h4>
                    </div>
                @endif
            <h1 class="auth-title">Log In.</h1>
            <p class="auth-subtitle mb-5">Log in with your credentials</p>

            <form action="{{route('login.create')}}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl" placeholder="Email" name="email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" name="remenber_token">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button  type="submit" class="btn btn-warning btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
           
        </div>
    </div>
</div>

    </div>
</body>

</html>
