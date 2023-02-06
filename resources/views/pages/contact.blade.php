@extends("main")
@section('title','| Contact')
@section("content")
    <div class="row">
        <div class="col-md-12">

            <form class="container" action="{{url('contact')}}" method="post" >
                <div class="form-group">
                    <h1>Contact me</h1>
                </div>
                <br>
                <div class="form-group">
                    <label name="emali">Email</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject : </label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="message">Message : </label>
                    <textarea id="message" name="message" class="form-control">Type your message here . . .</textarea>
                </div>
                <input type="submit" value="send message" class="btn btn-outline-dark" style="margin-top: 20px">
            </form>
        </div>
    </div>
@endsection
