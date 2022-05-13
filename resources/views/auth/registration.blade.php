@extends('dashboard')
@section('content')
  <div class="container mt-4">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Register
    </div>
    <div class="card-body">
       <form action="{{ route('register.custom') }}" method="POST">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
       <div class="form-group">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="text" id="email" name="email" class="form-control" required="">
        </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input type="password" id="password" name="password" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
@endsection



