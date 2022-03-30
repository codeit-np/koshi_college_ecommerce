@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (!empty($setting))
                        <h5>General Setting</h5>
                    @else
                     <a href="/setting/create" class="btn btn-primary">General Setting</a>
                    @endif

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Logo</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if (!empty($setting))
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="{{ asset($setting->logo) }}" width="64" alt=""></td>
                                <td>{{ $setting->name }}</td>
                                <td>{{ $setting->address }}</td>
                                <td>{{ $setting->contact }}</td>
                                <td>

                                    <form action="/setting/{{ $setting->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="/setting/{{ $setting->id }}/edit" class="badge bg-info">Edit</a>
                                    <button type="submit" class="badge btn bg-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
