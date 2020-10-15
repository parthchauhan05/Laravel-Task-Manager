@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="display-4 my-3">{{Auth::user()->name}}'s Lists</h2>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Lists</h2>
                    <h2>{{count($groups)}}</h2>
                </div>
                <div class="card-body">

                    @foreach($groups as $group)
                        
                        <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="/list/edit/{{$group->id}}" class="btn btn-light"><i class="fas fa-pencil-alt"></i></a>
                        <a href="/list/{{$group->id}}" class="btn btn-outline-{{$group->color}} btn-lg btn-block mx-3">{{$group->name}}</a>
                        <form method="post" action="/list/{{$group->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="delete">                            
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>New List</h2></div>
                <div class="card-body">
                    <form method="post" action="/list">
                        @csrf         
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="text" name="name" placeholder="Group Title">
                            </div>
                            <div class="col">
                                <select class="form-control" name="color">
                                    <option>Select a Color</option>
                                    <option value="danger">Red</option>
                                    <option value="primary">Blue</option>
                                    <option value="success">Green</option>
                                    <option value="warning">Orange</option>
                                    <option value="secondary">Purple</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button class="btn btn-success">Create List</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
@endsection
