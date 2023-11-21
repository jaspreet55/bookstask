<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elastic Search Demo</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin/bootstrap/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/auth.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin/custom.css')}}">
</head>

<body>
    <div id="auth" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto pt-4">
                    <div id="auth-left" class="text-center p-5 bg-white rounded shadow-lg">
                    @if (count($errors) > 0)
                    <div class="auto-close alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <h1 class="auth-title">Log In.</h1>
                        <p class="auth-subtitle mb-4">Log in with your credentials</p>
                        <small>email - <b>admin@gmail.com</b></small><br>
                        <small>password - <b>123456</b></small>
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
    </div>
    <script>
        // Get all elements with class "auto-close"
const autoCloseElements = document.querySelectorAll(".auto-close");

// Define a function to handle the fading and sliding animation
function fadeAndSlide(element) {
  const fadeDuration = 500;
  const slideDuration = 500;
  
  // Step 1: Fade out the element
  let opacity = 1;
  const fadeInterval = setInterval(function () {
    if (opacity > 0) {
      opacity -= 0.1;
      element.style.opacity = opacity;
    } else {
      clearInterval(fadeInterval);
      // Step 2: Slide up the element
      let height = element.offsetHeight;
      const slideInterval = setInterval(function () {
        if (height > 0) {
          height -= 10;
          element.style.height = height + "px";
        } else {
          clearInterval(slideInterval);
          // Step 3: Remove the element from the DOM
          element.parentNode.removeChild(element);
        }
      }, slideDuration / 10);
    }
  }, fadeDuration / 10);
}

// Set a timeout to execute the animation after 5000 milliseconds (5 seconds)
setTimeout(function () {
  autoCloseElements.forEach(function (element) {
    fadeAndSlide(element);
  });
}, 2000);
    </script>
</body>

</html>
