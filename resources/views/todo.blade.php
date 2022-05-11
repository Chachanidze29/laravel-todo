@php
    $active = \Illuminate\Support\Facades\Route::current()->uri;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <title>Document</title>
</head>
<body>
    <h1>Todos</h1>
    <div id="root">
        <form method="POST" class="form-input" action={{route('addTodo')}}>
            @csrf
            <input type="text" placeholder="What needs to be done" name="todo" autofocus autocomplete="off" value="{{old('todo')}}">
            @error('todo')
            <p class="error">{{$message}}</p>
            @enderror
            <input type="submit" class="submit-button" value="Submit" />
        </form>
        @if($count>0)
            <form class="clear-list-container" method="POST" action="{{route('deleteAll')}}">
                @csrf
                @method('delete')
                <input type="submit" class="clear-list" value="Clear All Todos">
            </form>
        @endif
        <p style="text-align: center"> Items Left: {{ $count }}</p>
        @foreach ($todos as $todo)
            <div class="todo-item">
            {{-- Add completed class conditionally --}}
                <p @class(['item-content','completed'=>$todo->completed])>{{$todo->content}}</p>
                <div class="actions">
                    <form method="POST" action="{{route('deleteTodo',['id'=>$todo->id])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="delete-button" value="Delete Todo">
                    </form>
                    <form method="POST" action="{{route('updateTodo',['id'=>$todo->id])}}">
                        @csrf
                        @method('put')
                        <input type="checkbox"
                               @class(['checked'=>$todo->completed])
                               name="active"
                               onchange="this.form.submit()"
                               {{$todo->completed ? 'checked' : ''}}
                        >
                    </form>
                </div>
            </div>
        @endforeach
        {{-- Filter items by status --}}
        <div class="filter">
            <form method="GET" action="{{route('all')}}">
                <input @class(['active'=>$active=='/']) type="submit" value="All" onchange="this.form.submit()">
            </form>

            <form method="GET" action="{{route('completed')}}">
                <input @class(['active'=>$active=='completed']) type="submit" value="Completed" onchange="this.form.submit()">
            </form>

            <form method="GET" action="{{route('uncompleted')}}">
                <input @class(['active'=>$active=='uncompleted']) type="submit" value="Uncompleted" onchange="this.form.submit()">
            </form>
        </div>
        <div style="text-align: center; margin-top: 0.2rem">
            {{ $todos->links() }}
         </div>
    </div>
</body>
</html>
