@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row pb-3 border-b-4 border-blue-500">
            <div class="col-lg-9 col-md-9 col-sm-8">
                <h2 class="text-2xl mt-1">Edit Category</h2>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 mt-2">
                <a class="btn shadow-none text-white bg-gray-400 btn-sm" href="/category">Cancel</a>
                <button class="btn shadow-none text-white bg-blue-600 btn-sm" form="updateCategory" type="submit">Save</button>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('category.update', $ctgy->id) }}" method="post" id="updateCategory">
                @csrf
                @method('PUT')
                <div class="col-lg-12 mt-3">
                    <label><span class="text-danger">*</span> Name</label>
                </div>
                <div class="col-lg-4 mt-2">
                    <input type="text" name="ctgy_name" id="ctgy_name" value="{{ $ctgy->category_name }}" class="form-control form-control-sm shadow-none" autocomplete="off" required>
                </div>
            </form>
        </div>
    </div>
@endsection
