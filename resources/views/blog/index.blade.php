@extends('main')
@section('title','| Blogs')
@section('content')
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{ $post -> title }}</h2>
                <h5>Published: {{ date('M j, Y') ,strtotime($post->created_at)}}</h5>
                <p>{{ substr(strip_tags($post -> body),0,255) }}{{ strlen(strip_tags($post->body)) > 255 ? '...': " " }}</p>
                <a href="{{url('blog/' . $post->slug)}}">Read More</a>
            </div>
        </div>
    @endforeach

@endsection

