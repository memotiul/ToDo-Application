@extends('dashboard')
@section('content')

  <div class="container mt-4">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
    </div>
    <div class="card-body">
       <form action="customadd" method="POST">
       @csrf
        <h4 style="text-align:center">Create Todo</h4>
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <input type="text" id="description" name="description" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <input type="text" id="status" name="status" class="form-control" required="">
        </div>
        <div class="form-group">
           <input type="submit" class="btn btn-success" />
       </div>
      </form>
    </div>
  </div>
</div>  

@endsection



