@extends('layouts.app')

@section('content')
   <div class="jumbotron jumbotron-fluid">
       <div class="container">
           <h1 class="display-3">TodoList</h1>
           <p class="lead">This app is to be more prodcutive.Login to see how's things work.</p>
            <a class="btn btn-primary" href="{{ url('todo/') }}" role="button">to home</a>
       </div>
   </div>
@endsection

