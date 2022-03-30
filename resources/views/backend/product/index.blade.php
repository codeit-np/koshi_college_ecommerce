@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                     <a href="/product/create" class="btn btn-primary">Add Product</a>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Image</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Dis(%)</th>
                                <th>Selling Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ asset($item->image) }}" width="24" alt=""></td>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->discount_percent }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>
                                        <a href="/product/{{ $item->id }}/edit" class="badge bg-info">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
