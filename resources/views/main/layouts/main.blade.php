<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='{{asset("assets/vendors/flag-icon-css/css/flag-icon.min.css")}}'>
    <link rel="stylesheet" href='{{asset ("assets/vendors/font-awesome/css/all.min.css")}}'>
    <link rel="stylesheet" href='{{asset ("assets/vendors/aos/aos.css")}}'>
    <link rel="stylesheet" href='{{asset ("assets/css/style.css")}}'>
    <script src='{{asset ("assets/vendors/jquery/jquery.min.js")}}'></script>
    <script src='{{asset ("assets/js/loader.js")}}'></script>
    @yield('title')
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route ('main.index')}}"><img src="{{(asset('assets/images/logo.svg'))}}" alt="Edica"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('main.index')}}">Blog <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('main.category.index')}}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('main.tag.index')}}">Tags</a>
                    </li>
                </ul>

                @if(isset(auth()->user()->role) && auth()->user()->role->name_role == 'admin')
                    <ul class="navbar-nav mt-2 mt-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link text-success" href="{{ route('admin.main.index') }}">Admin</a>
                        </li>
                    </ul>
                @endif
                @if(auth()->user() == true)
                    <ul class="navbar-nav mt-2 mt-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link text-success" href="{{ route('personal.home') }}">Personal</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <a class="nav-link text-success" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-success" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                @endif


            </div>
        </nav>
    </div>
</header>

@yield('content')

<section class="edica-footer-banner-section pt-5 mb-5">
    <p></p>
</section>
<footer class="edica-footer" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <a href="#" class="footer-brand-wrapper">
                    <img src="{{(asset('assets/images/logo.svg'))}}" alt="edica logo">
                </a>
                <p class="contact-details">hello@edica.com</p>
                <p class="contact-details">+23 3000 000 00</p>
                <nav class="footer-social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#" class="nav-link">Company</a>
                    <a href="#" class="nav-link">Android App</a>
                    <a href="#" class="nav-link">ios App</a>
                    <a href="#" class="nav-link">Blog</a>
                    <a href="#" class="nav-link">Partners</a>
                    <a href="#" class="nav-link">Careers</a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#" class="nav-link">FAQ</a>
                    <a href="#" class="nav-link">Reporting</a>
                    <a href="#" class="nav-link">Block Storage</a>
                    <a href="#" class="nav-link">Tools & Integrations</a>
                    <a href="#" class="nav-link">API</a>
                    <a href="#" class="nav-link">Pricing</a>
                </nav>
            </div>

        </div>
        <div class="footer-bottom-content">
            <nav class="nav footer-bottom-nav">
                <a href="#">Privacy & Policy</a>
                <a href="#">Terms</a>
                <a href="#">Site Map</a>
            </nav>
        </div>
    </div>
</footer>
<script src="https://kit.fontawesome.com/5db38fd61b.js" crossorigin="anonymous"></script>
<script src="{{asset ('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset ('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset ('assets/vendors/aos/aos.js')}}"></script>
<script src="{{asset ('assets/js/main.js')}}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</div>
</body>
</html>

