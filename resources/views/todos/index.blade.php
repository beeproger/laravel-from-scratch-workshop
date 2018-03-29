@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="row">
            <a href="{{ route('todos.create') }}" class="btn btn-primary">Nieuwe todo</a>
        </p>

        <div class="row justify-content-center">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>titel</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>
                                <a href="{{ route('todos.edit', compact('todo')) }}" class="btn btn-dark">edit</a>
                                @if($todo->done)

                                    <a href="{{ route('todos.done', compact('todo')) }}" class="btn btn-primary"
                                       onclick="event.preventDefault();
                                                     document.getElementById('done-form').submit();">
                                        klaar
                                    </a>

                                    <form id="done-form" action="{{ route('todos.done', compact('todo')) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                @else


                                    <a href="{{ route('todos.done', compact('todo')) }}" class="btn btn-primary"
                                       onclick="event.preventDefault();
                                                     document.getElementById('done-form').submit();">
                                        markeer klaar
                                    </a>

                                    <form id="done-form" action="{{ route('todos.done', compact('todo')) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
