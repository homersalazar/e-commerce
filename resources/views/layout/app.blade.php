<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Tailwind CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

        <title>Ecommerce</title>
    </head>
    <body>
        <style>
            .fade-message{
                position: absolute;
                left: 640px;
                top: 0;
                z-index: 1;
                width: 20%;
                text-align: center;
                height: 5%;
                padding: 4px 0px 4px 0px;
            }
        </style>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-blue-900">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline"><i class="fa-solid fa-at fa-md text-red-800"></i> Ecommerce</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link align-middle px-0">
                                    <i class="fas fa-tachometer-alt fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fa-solid text-white fa-cart-shopping fa-lg"></i> <span class="ms-1 d-none text-white d-sm-inline">Orders</span></a>
                            </li>
                            <li>
                                <a href="{{ route('product.index') }}" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-box-open fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Products</span></a>
                            </li>
                            <li>
                                <a href="{{ route('category.index') }}" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-list fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Categories</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-users fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Accounts</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-truck-fast fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Shipping</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-tag fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Discount</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-percent fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Taxes</span></a>
                            </li>
                            <li>
                                <a href="{{ route('media.index') }}" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-images fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Media</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-envelope fa-lg text-white"></i> <span class="ms-1 d-none text-white d-sm-inline">Email Templates</span></a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{-- <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle"> --}}
                                <i class="fa-solid fa-user fa-lg text-white"></i>
                                <span class="d-none d-sm-inline mx-1">user</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="signout">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if(session()->get('success'))
                    <div class="alert alert-success fade-message">
                        {{ session()->get('success') }}
                    </div><br />
                @endif
                <div class="col py-3">
                    @yield('content')
                </div>
            </div>
        </div>
        <script>
            $(function(){
                setTimeout(function() {
                    $('.fade-message').slideUp();
                }, 5000);
            });
        </script>
       <!-- Option 1: Bootstrap Bundle with Popper -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
