@extends('layouts.app')

@section('content')

<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="d-flex justify-content-between display-4 my-3 text-{{$group->color}}">
                <span>{{Auth::user()->name}}</span>
                <span>{{count($tasks)}}</span>
            </h2>
            <div class="card">
                <div class="card-header"><h2>Tasks</h2></div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                    @foreach($tasks as $task)
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                            <form class="d-flex align-items-baseline" action="/task/{{$task->id}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="put">            
                                <input type="hidden" name="list" value="{{$group->id}}">
                                @if($task->completed == true)
                                <button name="completed" class="btn text-success" value="{{$task->completed}}" style="box-shadow: none;">
                                    <i class="fas fa-check"></i>
                                </button>
                                <p><s style="opacity: 0.6;">{{$task->description}}</s></p>
                                @else
                                <button name="completed" class="btn" value="{{$task->completed}}" style="box-shadow: none;">
                                    <i class="fas fa-check"></i>
                                </button>
                                <p>{{$task->description}}</p>
                                @endif
                            </form>
                            <form action="/task/{{$task->id}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">                              
                                <input type="hidden" name="list" value="{{$group->id}}">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header"><h3>New Task</h3></div>
                <div class="card-body">
                    <form action="/task" method="post">
                        @csrf
                        <input type="hidden" name="group_id" value="{{$group->id}}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="description" placeholder="Task">
                        </div>
                        <button class="btn btn-{{$group->color}}">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

@endsection
