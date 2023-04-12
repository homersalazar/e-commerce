@extends('layout.app')

@section('content')
@include('products.product_edit_modal')
    <div class="container">
        <div class="row pb-3 border-b-4 border-blue-500">
            <div class="col-lg-9 col-md-9 col-sm-8">
                <h2 class="text-2xl mt-2">Edit Product</h2>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 mt-1">
                <a class="btn shadow-none text-white bg-gray-400 btn-sm" href="/product">Cancel</a>
                <button class="btn shadow-none text-white bg-blue-600 btn-sm" form="updateProduct" type="submit">Save</button>
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
                    <form action="{{ route('product.update', $row->id) }}" method="post" id="updateProduct">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-5 mt-2">
                                <label for=""><span class="text-danger">*</span> Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control form-control-sm shadow-none mt-1" value="{{ ucwords($row->product_name) }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">Description (HTML)</label>
                                <textarea name="product_desc" id="product_desc" class="form-control form-control-sm shadow-none mt-1" cols="4" rows="10" placeholder="Product Description...">{{ $row->descript }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">URL Slug</label>
                                <input type="text" name="product_url" id="product_url" class="form-control form-control-sm shadow-none mt-1"  value="{{ ucwords($row->url_slug) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for=""><span class="text-danger">*</span> Price</label>
                                <input type="number" name="product_price" id="product_price" class="form-control form-control-sm shadow-none mt-1"  value="{{ $row->product_price }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">RRP</label>
                                <input type="number" name="product_rrp" id="product_rrp" class="form-control form-control-sm shadow-none mt-1"  value="{{ $row->rrp }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for=""><span class="text-danger">*</span> Quantity</label>
                                <input type="number" name="product_qty" id="product_qty" class="form-control form-control-sm shadow-none mt-1"  value="{{ $row->product_quantity }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">Category</label>
                                <select name="product_ctgy" id="product_ctgy" class="form-select form-select-sm shadow-none mt-1">
                                    @foreach ($ctgy as $item)
                                        <option {{ $item->id  == $row->category_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3">
                                <label for="">Weight (lbs)</label>
                                <input type="number" name="product_weight" id="product_weight" class="form-control form-control-sm shadow-none mt-1"  value="{{ $row->product_weight }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 mt-3 mb-5">
                                <label for="">Status</label>
                                    <select name="product_stats" id="product_stats" class="form-select form-select-sm shadow-none mt-1">
                                        <option value="0" {{ $row->stats  == 0 ? 'selected' : '' }}>Enabled</option>
                                        <option value="1" {{ $row->stats  == 1 ? 'selected' : '' }}>Disabled</option>
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
                                            <img src="/storage/images/{{ $item->path }}" width="90" height="90" class="ms-4" id="images-{{ $item->id }}" name="images" alt="{{ $item->title }}">
                                        </td>
                                        <td>
                                            <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit"><i class="text-danger ps-5 fa-lg fa-solid fa-circle-xmark"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <input type="text" name="media_id" id="media_id" form="updateProduct" value="{{ collect($media)->pluck('id')->implode(',') }}">
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

