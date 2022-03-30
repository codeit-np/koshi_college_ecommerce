@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/product" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">
                    <form action="/product" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="sku">SKU *</label>
                        <input id="sku" class="form-control" type="text" name="sku">
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name *</label>
                        <input id="name" class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label for="price">Price *</label>
                        <input id="price" class="form-control" type="text" name="price">
                    </div>

                    <div class="form-group">
                        <label for="discount_percent">Discount Percent *</label>
                        <input id="discount_percent" class="form-control" type="text" name="discount_percent">
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Upload image</label>
                        <input id="image" class="form-control-file" type="file" name="image">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Please Select Product Category</label>
                        <select id="category_id" class="form-control" name="category_id">
                           @foreach ($categories as $item)
                               <option value="{{ $item->id }}">{{ $item->name }}</option>
                           @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
