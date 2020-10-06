@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Update Todo</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todo.update',$todo->id) }}" method="post">
                            @csrf
                            @method('put')
                            <input type="text" name="title" value="{{ $todo->title }}" class="form-control mb-3">
                            <button type="submit" class="btn btn-info">Update</button>
                            <a href="{{ route('todo.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection