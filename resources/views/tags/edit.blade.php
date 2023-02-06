@extends('main')
@section('title','| Edit Tags')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <form data-parsley-validat class="container" action="{{ route('tags.update',$tag->id) }}"
                  method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label name="name">Name</label>
                    <input name="name" id="name" class="form-control" value={{ $tag-> name }} >
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 d-grid">
                        <form method="post" action="{{ route('tags.destroy',$tag->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <div class="col-sm-4 d-grid">
                        <a href="{{ route('tags.index')}}" type="button"
                           class="btn btn-outline-dark">Cancel</a>
                    </div>
                    <div class="col-sm-4 d-grid">
                        <button type="submit" class="btn btn-outline-success">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>

    </div>


@endsection

