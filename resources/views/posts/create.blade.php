@extends("main")
@section('title','| Create  Post')
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
            <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
            <script>
                tinymce.init({
                    selector: '#', // Replace this CSS selector to match the placeholder element for TinyMCE
                    plugins: 'code table lists',
                    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
                });
            </script>
        </head>
        <body>
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <form data-parsley-validat class="container" action="{{ route('posts.store') }}" method="POST"
                      enctype="multipart/form-data" >
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <h1>Create Post</h1>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label name="title">Title</label>
                        <input name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label name="category">Category </label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label name="tags">Tags </label>
                        <select class="myselectpicker " multiple id="tags" name="tags[]">
                            @foreach($tags as $tag)
                                <option value='{{ $tag -> id }}'>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 row">
                        <label name="image">Upload Featured Image </label>
                        <div class="col-sm-10">
                       <input class="form-control" type="file" id="featured_image" name="featured_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label name="body">Body </label>
                        <textarea id="body" name="body" class="form-control" required></textarea>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 d-grid">
                            <button type="submit" class="btn btn-outline-success">Create Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </body>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.myselectpicker').selectpicker();
            });
        </script>
        </html>
    @endsection
@endauth

