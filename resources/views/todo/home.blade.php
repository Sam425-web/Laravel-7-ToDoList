@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @if (session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h1>TodoList</h1>
                    <p>Get things done, one item at a time.</p>
                    <hr>
                    {{-- ToDos --}}
                    <div class="row">
                        {{-- todolist --}}
                        @foreach($todos as $todo)
                            <div class="col-8">
                                <ul class="list-group mb-3 text-striped">
                                    @if($todo->completed)
                                        <li class="list-group-item list-group-item-secondary">{{ $todo->title }}</li>
                                    @else
                                        <li class="list-group-item">{{ $todo->title }}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col mt-1 ml-1 d-flex">
                                {{-- checkcomplete --}}
                                @if($todo->completed)
                                    <form action="{{ route('todo.incomplete',$todo->id) }}"
                                        class="pr-1" method="post">
                                        @csrf
                                        @method('delete')
                                        <button name="completed" type="submit" class="btn btn-primary">
                                            <span class="fa fa-check "></span>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('todo.complete',$todo->id) }}"
                                        class="pr-1" method="post">
                                        @csrf
                                        @method('put')
                                        <button name="completed" type="submit" class="btn btn-primary">
                                            <span class="fa fa-check "></span>
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('todo.edit', $todo->id) }}"
                                    class="btn  btn-success mb-4">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <form class="float-right pl-1 mr-5"
                                    action="{{ route('todo.destroy', $todo->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger mr-4">
                                        <i class="fa fa-trash"> </i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    {{-- Form --}}
                    <div class="form-group">
                        <form action="{{ route('todo.store') }}" method="post">
                            @csrf
                            <div class="row ">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                                <div class="col">
                                    <button class="btn btn-info " type="submit">Add Task</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
