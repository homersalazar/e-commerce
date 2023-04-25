@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row pb-3 border-b-4 border-blue-500">
            <div class="col-lg-9 col-md-9 col-sm-8">
                <h2 class="text-2xl mt-2">Create Discount</h2>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 mt-1">
                <a class="btn shadow-none text-white bg-gray-400 btn-sm" href="/discount">Cancel</a>
                <button class="btn shadow-none text-white bg-blue-600 btn-sm" form="storeDiscount" type="submit">Save</button>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('discount.store') }}" method="post" id="storeDiscount">
                @csrf
                <div class="col-lg-4 mt-3">
                    <label><span class="text-danger">*</span> Code</label>
                    <input type="text" name="codes" id="codes" class="form-control form-control-sm shadow-none mt-2" placeholder="Code" autocomplete="off" required autofocus>
                </div>
                <div class="col-lg-4 mt-3">
                    <label>Categories</label>
                    <select class="form-select form-select-sm mt-1" name="ctgy_id" id="ctgy_id">
                        <option selected>Select category</option>
                        @foreach ($ctgy as $ctgys)
                            <option value="{{ $ctgys->id }}">{{ $ctgys->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 mt-3">
                    <label>Products</label>
                    <select class="form-select form-select-sm mt-1" name="prod_id" id="prod_id">
                        <option selected>Select Product</option>
                        @foreach ($prod as $prods)
                            <option value="{{ $prods->id }}">{{ $prods->product_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 mt-3">
                    <label><span class="text-danger">*</span> Types</label>
                    <select class="form-select form-select-sm mt-1" name="discount_types" id="discount_types">
                        <option value="0">Percentage</option>
                        <option value="1">Fixed</option>
                    </select>
                </div>
                <div class="col-lg-4 mt-3">
                    <label><span class="text-danger">*</span> Value</label>
                    <input type="number" name="discount_val" id="discount_val" class="form-control form-control-sm shadow-none mt-2" placeholder="Value" autocomplete="off">
                </div>
                <div class="col-lg-4 mt-3">
                    <label><span class="text-danger">*</span> Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control form-control-sm shadow-none mt-2" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-lg-4 mt-3">
                    <label><span class="text-danger">*</span> End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control form-control-sm shadow-none mt-2" value="{{ date("Y-m-d", strtotime('tomorrow')) }}">
                </div>
            </form>
        </div>
    </div>
@endsection
