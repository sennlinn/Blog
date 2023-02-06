@extends("main")
@section('title','| All Posts')

@auth()
@section('content')

<div class="row">
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class="btn btn-bg btn-dark btn-h1-spacing">create </a>
    </div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>Crated At</th>
            <th></th>
            </thead>

            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th >{{ $post->id }}</th>
                    <td >{{ substr($post->title,0,15) }}</td>
                    <td>{{substr($post->body,0,30 ) }} {{strlen($post->body) > 50 ? "...": " "}}</td>
                    <td>{{ $post-> created_at }}</td>
                    <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-light">View</a>
                        <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-light">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!!  $posts ->links(); !!}
        </div>
    </div>
</div>
</div>

@endsection
@endauth

