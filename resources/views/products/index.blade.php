@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-2xl pb-3 border-b-4 border-blue-500">Products</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mt-4">
                <a href="{{ route('product.create') }}" class="btn shadow-none text-white bg-blue-600">Create Product</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4">
                <table class="table category-table">
                    <thead>
                        <tr>
                            <th class="max-sm:hidden">#</th>
                            <th class="max-sm:text-xs">Name</th>
                            <th class="max-sm:text-xs">Price</th>
                            <th class="max-sm:text-xs">Quality</th>
                            <th class="max-sm:hidden">Images</th>
                            <th class="max-sm:hidden">Date Added</th>
                            <th class="max-sm:hidden">Status</th>
                            <th class="max-sm:text-xs"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $products)
                            <tr>
                                <td class="max-sm:hidden">{{ $products->id }}</td>
                                <td class="max-sm:text-xs">{{ ucwords($products->product_name) }}</td>
                                <td class="max-sm:text-xs">&#8369;{{ number_format($products->product_price) }}</td>
                                <td class="max-sm:text-xs">{{ ($products->product_quantity == '' || $products->product_quantity == 0) ? '--' : $products->product_quantity . ' ' . ($products->product_quantity == 1 ? 'Piece' : 'Pieces'); }}</td>
                                {{-- <img src="/storage/images/{{ $products->path }}" width="50" height="50"> --}}

                                <td class="max-sm:hidden"><img src="/storage/images/{{ $products->path }}" width="50" height="50"></td>
                                <td class="max-sm:hidden">{{ (new DateTime($products->created_at))->format('F j, Y'); }}</td>
                                <td class="max-sm:hidden">{{ $products->stats == 0 ? "Enabled" : "Disabled"; }}</td>
                                <td class="max-sm:text-xs"><a href="" class="fa-solid fa-pen-to-square"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.category-table').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false
            } );
        } );
    </script>
@endsection
