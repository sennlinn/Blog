@extends("main")
@section('title','| Edit  Comment')
@auth()
    @section('content')
        <div class="row">
            <div class="col-md-8">
                <form class="container" action="{{ route('comments.update',$comment->id) }}"
                     method="post">
                    @method('POST')
                    @csrf
                    <h1>Edit Comment</h1>
                    <div class="mb-3 row">
                        <label for="staticName" class="col-sm-2 col-form-label">Name : </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticName" value={{ $comment -> name }}>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email : </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ $comment -> email }}>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label name="comment" class="col-sm-2 col-form-label">Comment:</label>
                        <div class="col-sm-10">
                        <textarea id="comment" name="comment"
                                  class="form-control"> {{ $comment -> comment }} </textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 d-grid">
                            <a href="{{ route('posts.show',$comment->post->id) }}" type="button"
                               class="btn btn-outline-danger">Cancel</a>
                        </div>
                        <div class="col-sm-6 d-grid">
                            <button type="submit" class="btn btn-outline-success" >Save Changes</button>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    @endsection
@endauth



