@extends('dashboard')
@section('content')
<div class="card">
                    <h3 class="card-header text-center">Update </h3>
                    <div class="card-body">
<form action="{{ route('update-todo',$event->id) }}" method="POST">
 {{ csrf_field() }}
{{ method_field('put') }}

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" value="{{ $event->name }}" id="name" class="form-control"
                                    name="name" required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="description" placeholder="Description" value="{{ $event->description}}" id="description" class="form-control"
                                    name="description" required>
                                @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endsection