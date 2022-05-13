@extends('dashboard')
@section('content')
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <br/>
                    <h2>{{ $event->name }}</h2><br>
                    <p>
                        {{ $event->description }}
                    </p>
                    <br>
                    <hr/>
                   <a href="{{ route('user-details') }}">Invite Friends</a>
                    <hr/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
