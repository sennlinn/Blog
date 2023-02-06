@extends('main')
<?php $titleTag = htmlspecialchars($post->title) ?>
@section('title',"| $titleTag")
<html>
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ public_path($post->image) }}" height="400" width="800" alt="image">
            <h1>{{ $post -> title }}</h1>
            <p> {!! $post -> body !!}  </p>
            <hr>
            <p>Posted In: {{ $post ->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="comments-title">
                <h3 >  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-right-fill" viewBox="0 0 16 16">
                    <path d="M14 0a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                </svg>
                {{ $post->comments()->count() }} Comments
                </h3>
            </div>
            @foreach($post ->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{  "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment->email ) ) ) . "?s=50&d=mm"
 }}" class="author-img">
                        <div class="author-name">
                            <h4> {{ $comment -> name }}</h4>
                            <p class="author-time">{{ $comment->created_at }}</p>
                        </div>
                    </div>
                    <div class="commment-content">
                        {{ $comment -> comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="container" action="{{ route('comments.store',$post->id) }}" method="post">
                @method('POST')
                @csrf
                <div class="form-group">
                    <div class="col-md-4 d-grid">
                        <label name="name">Name :</label>
                        <input id="name" name="name" class="form-control">
                    </div>
                    <div class="col-md-4 d-grid">
                        <label name="email">Email : </label>
                        <input id="email" name="email" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label name="comment">Comment : </label>
                    <textarea id="comment" name="comment" class="form-control">Type your comment here . . .</textarea>
                </div>
                <input type="submit" value="add comment" class="btn btn-dark" style="margin-top: 20px">
            </form>
        </div>
    </div>
</html>
@endsection

