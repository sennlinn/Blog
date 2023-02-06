@extends("main")
@section('title','| Show Post')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <img src="{{ public_path($post->image) }}" height="400" width="800" alt="image">
            <h1 class="text-truncate">{{ $post->title }}</h1>
            <p class="lead">{!! $post ->body !!}   </p>
            <hr>
            <div class="col-sm-6">
                @foreach( $post->tags as $tag )
                    <span class="badgel text-bg-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>
            <div id="backend-comment" style="margin-top: 50px">
                <h3>Comments <small> {{ $post->comments()->count() }} total</small></h3>
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th></th>
                    </thead>

                    <tbody>
                    @foreach($post ->comments as $comment)
                        <tr>
                            <th>{{ $comment->name }}</th>
                            <td>{{ $comment ->email }}</td>
                            <td>{{ $comment ->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-outline-dark btn-sm " role="button">edit</a>
                                <a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-danger btn-sm " role="button">delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

        <div class="col-sm-4 bg-secondary-subtle">
            <div class="row">
                <dt class="col-sm-5">URL Slug:</dt>
                <dd class="col-sm-7"><a href="{{ url('blog/' . $post->slug) }}">{{ $post->slug }}</a></dd>

                <dt class="col-sm-5">Category:</dt>
                <dd class="col-sm-7">{{ $post->category->name }}</dd>

                <dt class="col-sm-5">Created At :</dt>
                <dd class="col-sm-7">{{ date('M j, Y h: ia',strtotime($post->created_at)) }}</dd>

                <dt class="col-sm-5 ">Last Updated:</dt>
                <dd class="col-sm-7">{{ date('M j, Y h: ia',strtotime($post->updated_at)) }}</dd>

                <hr>

                <div class="row">
                    <div class="col-sm-5 d-grid">
                        <form action="{{ route('posts.index') }}">
                            <button class="btn btn-outline-dark">All Posts</button>
                        </form>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <form action="{{ route('posts.edit',$post->id) }}">
                            <button class="btn btn-outline-dark">Edit</button>
                        </form>
                    </div>

                    <div class="col-sm-4 d-grid">
                        <form method="post" action="{{ route('posts.destroy',$post->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

