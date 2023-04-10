@extends('layout.app')

@section('content')
@include('products.product_modal')
    <div class="container">
        <div class="row pb-3 border-b-4 border-blue-500">
            <div class="col-lg-9 col-md-9 col-sm-8">
                <h2 class="text-2xl mt-2">Create Product</h2>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 mt-1">
                <a class="btn shadow-none text-white bg-gray-400 btn-sm" href="/category">Cancel</a>
                <button class="btn shadow-none text-white bg-blue-600 btn-sm" form="storeProduct" type="submit">Save</button>
            </div>
        </div>
        <div class="row mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab" aria-controls="media" aria-selected="false">Media</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form action="{{ route('product.store') }}" method="post" id="storeProduct">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5 mt-2">
                                <label for=""><span class="text-danger">*</span> Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control form-control-sm shadow-none mt-1"  placeholder="Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">Description (HTML)</label>
                                <textarea name="product_desc" id="product_desc" class="form-control form-control-sm shadow-none mt-1" cols="4" rows="10" placeholder="Product Description..."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">URL Slug</label>
                                <input type="text" name="product_url" id="product_url" class="form-control form-control-sm shadow-none mt-1"  placeholder="your-product-name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for=""><span class="text-danger">*</span> Price</label>
                                <input type="number" name="product_price" id="product_price" class="form-control form-control-sm shadow-none mt-1"  placeholder="Price" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">RRP</label>
                                <input type="number" name="product_rrp" id="product_rrp" class="form-control form-control-sm shadow-none mt-1"  placeholder="Recommended Retail Price">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for=""><span class="text-danger">*</span> Quantity</label>
                                <input type="number" name="product_qty" id="product_qty" class="form-control form-control-sm shadow-none mt-1"  placeholder="Quantity" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">Category</label>
                                <select name="product_ctgy" id="product_ctgy" class="form-select form-select-sm shadow-none mt-1">
                                    <option selected>Select Category</option>
                                    @foreach ($ctgy as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">Weight (lbs)</label>
                                <input type="number" name="product_weight" id="product_weight" class="form-control form-control-sm shadow-none mt-1"  placeholder="Weight (lbs)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3 mb-5">
                                <label for="">Status</label>
                                    <select name="product_stats" id="product_stats" class="form-select form-select-sm shadow-none mt-1">
                                    <option value="0">Enabled</option>
                                    <option value="1">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <h2 class="p-3 text-xl">Media</h2>
                    @if(isset($media))
                        <table>
                            <tbody>
                                @foreach ($media as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <img src="/storage/images/{{ $item->path }}" class="ms-4" id="images-{{ $item->id }}" name="images" alt="{{ $item->title }}">
                                        </td>
                                        <td>
                                            <form action="{{ route('temp.destroy', $item->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit"><i class="text-danger ps-5 fa-lg fa-solid fa-circle-xmark"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- <input type="text" name="media_id" id="media_id" form="storeProduct" value="{{ implode(',', $media->pluck('id')->toArray()) }}"> --}}
                            </tbody>
                        </table>
                    @else
                        <p>No data found.</p>
                    @endif
                    <button type="button" class="btn shadow-none text-white bg-blue-600 btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#add_media">Add Media</button>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div>
    </div>
@endsection

