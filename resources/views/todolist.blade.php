@extends('dashboard')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo List</div>
                <div class="card-body">
                   <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td><button onclick="toggle(this)">pending</button></p></td>
                                <td>
                                    <a href="{{ url('todoedit/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                    <td>
                                    <a href="{{ url('qview/'.$item->id) }}" class="btn btn-primary btn-sm">View</a>
                                </td>
                                <td>
                                 <a href="{{ url('destroy/'.$item->id) }}" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function toggle(e) {
  let txt = e.innerText;
  e.innerText = txt == 'pending' ? 'Done' : 'pending';
}
</script>
@endsection
