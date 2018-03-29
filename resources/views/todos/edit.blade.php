@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form class="form" method="POST" action="{{ route('todos.update', compact('todo')) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}


                <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" name="title" value="{{ $todo->title }}" class="form-control" placeholder="Type tekst">
                </div>

                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>


        </div>
    </div>
@endsection