@extends('main')
@section('title','| Homepage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron  bg-body-tertiary">
                <h1>Welcome to my blog</h1>
                <p class="lead">Thanks so much for visiting. This is my test website built with php and lavarel. Please
                    read my popular post.</p>
                <p><a class="btn btn-outline-info btn-lg" href="#" role="button">popular posts</a></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr(strip_tags($post->body),0,100) }}{{strlen(strip_tags($post->body) )> 100 ? "... " : " "}}</p>
                    <a class="btn btn-outline-dark" href="{{ url('blog/'. $post->slug) }}" role="button">Read More</a>
                </div>
                <hr>
                @endforeach
            </div>
<div class="col-md-2 col-md-offset-1" >
<h3>Sidebar</h3>
</div>
        </div>
    </div>
@endsection

