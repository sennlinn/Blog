@extends("main")
@section('title','| {{$tag->name}} Tag')

@auth()
    @section('content')
        <html>
        <head>

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
            <link rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        </head>
        <body>
        <div class="row">
            <div class="col-md-10">
                <h1>{{ $tag ->name }}</h1>
                <small>{{ $tag->posts()->count() }} Posts</small>
            </div>
            <div class="col-md-2">
                <a href="{{ route('tags.edit',$tag->id)}}" class="btn btn-bg btn-outline-dark btn-h1-spacing"
                   style="margin-top: 30px">Edit</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                        </thead>

                        <tbody>
                        @foreach($tag->posts as $post)
                            <tr>
                                <th>{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>@foreach( $post->tags as $tag )
                                        <span class="badgel text-bg-secondary">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('posts.show',$post->id)}}"
                                       class="btn btn-bg btn-outline-dark">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </body>
        </html>
    @endsection
@endauth



