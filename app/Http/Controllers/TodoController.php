<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Auth::user()->todos;

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $todo = Auth::user()
            ->todos()
            ->create($request->only(['title']));

        return redirect(route('todos.index'));
    }


    /**
     * @param Todo $todo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        if($todo->user_id == Auth()->user()->id) {
            $todo->update($request->only(['title']));

            return redirect(route('todos.index'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function done(Request $request, Todo $todo)
    {
        if($todo->user_id == Auth()->user()->id) {

            $todo->update(['done' => !$todo->done]);

            return redirect(route('todos.index'));
        }

    }

    /**
     * @param Todo $todo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Todo $todo)
    {
        if($todo->user_id == Auth()->user()->id) {
            $todo->delete();
            return redirect(route('todos.index'));

        }
    }
}
