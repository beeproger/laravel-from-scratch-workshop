
<form class="form" method="POST" action="{{ route('todos.store') }}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="exampleInputEmail1">title</label>
        <input type="text" name="title" class="form-control" placeholder="Type tekst">
    </div>

    <button type="submit" class="btn btn-primary">Opslaan</button>
</form>

