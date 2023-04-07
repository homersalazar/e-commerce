@extends('partials.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5" id="registration">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center mb-0">Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                            <label for="name">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name">
                            </div>
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
                            <p class="text-center">Already have an account? <a href="/login">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
