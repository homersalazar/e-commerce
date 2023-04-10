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
                        @foreach ($products as $product)
                            <tr>
                                <td class="max-sm:hidden">{{  $product->id }}</td>
                                <td class="max-sm:text-xs w-20">{{ ucwords($product->product_name) }}</td>
                                <td class="max-sm:text-xs">&#8369;{{ number_format($product->product_price) }}</td>
                                <td class="max-sm:text-xs">{{ ($product->product_quantity == '' || $product->product_quantity == 0) ? '--' : $product->product_quantity . ' ' . ($product->product_quantity == 1 ? 'Piece' : 'Pieces'); }}</td>
                                <td class="max-sm:hidden p-0">
                                    <div class="images-wrapper">
                                        @foreach ($media as $m)
                                            <img class="product-image" src="/storage/images/{{ $m->path }}">
                                        @endforeach
                                    </div>
                                </td>
                                <td class="max-sm:hidden">{{ (new DateTime($product->created_at))->format('F j, Y'); }}</td>
                                <td class="max-sm:hidden">{{ $product->stats == 0 ? "Enabled" : "Disabled"; }}</td>
                                <td class="max-sm:text-xs"><a href="" class="fa-solid fa-pen-to-square"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <script>
        $(function() {
            $('.category-table').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false
            } );
        } );
    </script> --}}
@endsection
