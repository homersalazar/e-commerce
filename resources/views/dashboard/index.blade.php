@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-2xl pb-3 border-b-4 border-blue-500">Dashboard</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <p>New Orders</p>
                                <span class="font-medium text-3xl">0</span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 max-sm:hidden">
                                <i class="fa-solid fa-cart-arrow-down text-xl text-blue-900 bg-sky-200 p-3 rounded-full"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <i class="fa-solid fa-repeat"></i> <span>Total orders</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <p>New Sales</p>
                                <span class="font-medium text-3xl">&#8369;0.00</span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 max-sm:hidden">
                                <i class="fa-solid fa-coins text-xl text-blue-900 bg-sky-200 p-3 rounded-full"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <i class="fa-solid fa-repeat"></i> <span>Total earnings</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <p>Total Accounts</p>
                                <span class="font-medium text-3xl">0</span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 max-sm:hidden">
                                <i class="fa-solid fa-users text-xl text-blue-900 bg-sky-200 p-3 rounded-full"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <i class="fa-solid fa-repeat"></i> <span>Total accounts</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <p>Total Products</p>
                                <span class="font-medium text-3xl">0</span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 max-sm:hidden">
                                <i class="fa-solid fa-boxes-stacked text-xl text-blue-900 bg-sky-200 p-3 rounded-full"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <i class="fa-solid fa-repeat"></i> <span>Total products</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-2xl pb-3 border-b-4 border-blue-500 mt-5">Today's Transactions</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4 pb-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer</th>
                            <th class="max-sm:hidden">Email</th>
                            <th class="max-sm:hidden">Products</th>
                            <th>Total</th>
                            <th class="max-sm:hidden">Method</th>
                            <th class="max-sm:hidden">Status</th>
                            <th class="max-sm:hidden">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td class="max-sm:hidden">Otto</td>
                            <td class="max-sm:hidden">@mdo</td>
                            <td>@mdo</td>
                            <td class="max-sm:hidden">@mdo</td>
                            <td class="max-sm:hidden">@mdo</td>
                            <td class="max-sm:hidden">@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
