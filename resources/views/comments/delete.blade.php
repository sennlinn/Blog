@extends("main")
@section('title','| Delete  Comment')
@auth()
    @section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="container" action="{{ route('comments.destroy',$comment->id) }}"
                      method="post">
                    @method('POST')
                    @csrf
                    <h1>Delete Comment ?</h1>
                    <div class="mb-3 row">
                        <label for="staticName" class="col-sm-2 col-form-label">Name : </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticName"
                                   value={{ $comment -> name }}>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email : </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                   value={{ $comment -> email }}>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label name="comment" class="col-sm-2 col-form-label">Comment:</label>
                        <div class="col-sm-10">
                            <input  type="text" id="staticComent"  readonly
                                   class="form-control-plaintext"> {{ $comment -> comment }} </input>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 d-grid">
                            <button
                               class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
@endauth



