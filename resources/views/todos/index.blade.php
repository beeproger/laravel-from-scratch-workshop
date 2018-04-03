@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-5">
                <h3>Overzicht</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="10px"></th>
                            <th>Titel</th>
                            <th class="text-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($todos as $todo)
                            <tr>
                                <td>
                                    @if($todo->done)

                                        <a href="{{ route('todos.done', compact('todo')) }}" class="btn btn-lg btn-default"
                                           onclick="event.preventDefault();
                                                   document.getElementById('done-form{{ $todo->id }}').submit();">
                                            <i class="icon ion-android-checkbox-outline"></i>
                                        </a>

                                        <form id="done-form{{ $todo->id }}" action="{{ route('todos.done', compact('todo')) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    @else


                                        <a href="{{ route('todos.done', compact('todo')) }}" class="btn btn-lg btn-default"
                                           onclick="event.preventDefault();
                                                   document.getElementById('done-form{{ $todo->id }}').submit();">
                                            <i class="icon ion-android-checkbox-outline-blank"></i>
                                        </a>

                                        <form id="done-form{{ $todo->id }}" action="{{ route('todos.done', compact('todo')) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    @endif
                                </td>
                                <td>{{ $todo->title }}</td>
                                <td class="text-right">


                                    <a href="{{ route('todos.destroy', compact('todo')) }}" class="btn btn-outline-danger"
                                       onclick="event.preventDefault();
                                               document.getElementById('delete-form{{ $todo->id }}').submit();">
                                        <i class="icon ion-trash-a"></i>
                                    </a>

                                    <form id="delete-form{{ $todo->id }}" action="{{ route('todos.destroy', compact('todo')) }}" method="POST" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Geen todo's.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
            <div class="col-5">
                <h3>Toevoegen</h3>
                <hr>
                @include('todos.create')
            </div>
    </div>
@endsection
