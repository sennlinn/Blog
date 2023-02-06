@extends('main')
@section('title','| Forget Password')
@section('content')

    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header text-center">Reset Password</h3>
                    <div class="card-body">

                        <form method="POST" action="{{ route('reset') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email Address" id="email" class="form-control" name="email" required
                                       autofocus>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
