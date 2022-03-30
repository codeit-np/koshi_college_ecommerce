@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/setting" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">
                    <form action="/setting" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input id="name" class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" class="form-control" type="text" name="address">
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input id="contact" class="form-control" type="text" name="contact">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook Link</label>
                        <input id="facebook" class="form-control" type="text" name="facebook">
                    </div>

                    <div class="form-group">
                        <label for="logo">Upload Logo</label>
                        <input id="logo" class="form-control-file" type="file" name="logo">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
