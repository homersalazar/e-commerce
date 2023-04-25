@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-2xl pb-3 border-b-4 border-blue-500">Category</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mt-4">
                <a href="{{ route('category.create') }}" class="btn btn-sm shadow-none text-white bg-blue-600">Create Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4">
                <table class="table category-table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ctgy as $row)
                            <tr>
                                <td>|- {{ $row->category_name }}</td>
                                <td>
                                    <a type="button" href="{{ route('category.edit', $row->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
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
