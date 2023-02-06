@extends('main')
@section('title','| All Categories')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>{{-- end of col-md-6--}}
        @auth()
        <div class="col-md-4 col-md-offset-1">
            <div class="card">
                <h3 class="card-header text-center">New Category</h3>
                <div class="card-body">
                    <form method="POST" >
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="name" id="name" class="form-control" name="name"
                                   autofocus>
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Create New Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endauth
    </div>
    </div>
@endsection
