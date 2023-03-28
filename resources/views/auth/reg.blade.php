@extends('auth.layout')

@section('content')
<h1 class="d-flex justify-content-center">Registration form</h1>
<div class="row gy-5 d-flex justify-content-center">
  <div class="col-xl-6">
    <div class="p-3 border bg-light">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('reg_user') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                <div id="nameHelp" class="form-text">Enter your name.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="confirmInputPassword1" class="form-label">Confirm password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirmInputPassword1">
            </div>
            <div class="mb-3">
                <a href="{{ route('auth_index') }}" class="link-primary">Authentication</a>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
</div>
@endsection
