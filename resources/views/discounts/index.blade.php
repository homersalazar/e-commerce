@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-2xl pb-3 border-b-4 border-blue-500">Discounts</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mt-4">
                <a href="{{ route('discount.create') }}" class="btn btn-sm shadow-none text-white bg-blue-600">Create Discount</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4">
                <table class="table discount-table">
                    <thead>
                        <tr>
                            <th class="max-sm:hidden">#</th>
                            <th class="max-sm:text-xs ps-0">Code</th>
                            <th class="max-sm:text-xs ps-0">Active</th>
                            <th class="max-sm:hidden">Categories</th>
                            <th class="max-sm:hidden">Products</th>
                            <th class="max-sm:text-xs ps-0">Type</th>
                            <th class="max-sm:text-xs ps-0">Value</th>
                            <th class="max-sm:hidden">Start Date</th>
                            <th class="max-sm:hidden">End Date</th>
                            <th class="max-sm:text-xs"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($discount as $discounts)
                            <tr>
                                <td class="max-sm:hidden">{{ $discounts->id }}</td>
                                <td class="max-sm:text-xs ps-0">{{ $discounts->codes }}</td>
                                <td class="max-sm:text-xs ps-0">{{ date('Y-m-d') == $discounts->end_dates ? "No" : "Yes"; }}</td>
                                <td class="max-sm:hidden">{{ $discounts->category_name }}</td>
                                <td class="max-sm:hidden">{{ $discounts->product_name }}</td>
                                <td class="max-sm:text-xs ps-0">{{ $discounts->discount_types == 0 ? "Percentage" : "Fixed"; }}</td>
                                <td class="max-sm:text-xs ps-0">{{ number_format($discounts->discount_val,2) }}</td>
                                <td class="max-sm:hidden">{{ $discounts->start_dates }}</td>
                                <td class="max-sm:hidden">{{ $discounts->end_dates }}</td>
                                <td class="max-sm:text-xs ps-0"><a href="{{ route('discount.edit', $discounts->id) }}" class="fa-solid fa-pen-to-square"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.discount-table').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false
            } );
        } );
    </script>
@endsection
