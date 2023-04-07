@extends('partials.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5" id="login">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center mb-0">Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                            <hr>
                                <p class="text-center">Or login with:</p>
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-light">
                                    <i class="fab fa-google me-2"></i> Sign in with Google
                                </a>
                                <a href="#" class="btn btn-primary">
                                    <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                                </a>
                            </div>
                            <hr>
                            <p class="text-center">Don't have an account? <a href="{{ route('register-user') }}">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
