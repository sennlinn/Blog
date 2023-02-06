@extends('main')
@section('title','| All Tags')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>{{-- end of col-md-6--}}
        @auth()
            <div class="col-md-4 col-md-offset-1">
                <div class="card">
                    <h3 class="card-header text-center">New Tag</h3>
                    <div class="card-body">
                        <form method="POST" >
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="name" id="name" class="form-control" name="name"
                                       autofocus>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Create New Tag</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
    </div>
@endsection

