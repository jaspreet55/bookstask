@include('admin::layouts/header')
<body>


 @include('admin::layouts/sidebar')
        <div id="main">
        	<header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-content">
                @yield('content')
            </div> 
 @include('admin::layouts/footer')
