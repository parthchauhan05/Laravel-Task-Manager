@extends('layouts.app')

@section('content')
<main class="py-4">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="d-flex justify-content-between display-4 my-3 text-{{$group->color}}">{{ $group->name }}</h2>
            <div class="card">
                <div class="card-header"><h2>Edit List</h2></div>
                <div class="card-body">
                    <form method="post" action="/list/{{$group->id}}">
                        @csrf       
                        <input type="hidden" name="_method" value="put">          
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" type="text" name="name" value="{{$group->name}}">
                                </div>
                                <div class="col">
                                    <select class="form-control" name="color">
                                        <option>Select a Color</option>
                                        @if($group->color == "danger")
                                        <option value="danger" selected >Red</option>
                                        @else 
                                        <option value="danger" >Red</option>
                                        @endif
                                        @if($group->color == "primary")
                                        <option value="primary" selected >Blue</option>
                                        @else 
                                        <option value="primary" >Blue</option>
                                        @endif
                                        @if($group->color == "success")
                                        <option value="success" selected >Green</option>
                                        @else 
                                        <option value="success" >Green</option>
                                        @endif
                                        @if($group->color == "warning")
                                        <option value="warning" selected >Orange</option>
                                        @else 
                                        <option value="warning" >Orange</option>
                                        @endif
                                        @if($group->color == "secondary")
                                        <option value="secondary" selected >Purple</option>
                                        @else 
                                        <option value="secondary" >Purple</option>
                                        @endif
                                        
                                    </select>
                                </div>
                            </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button class="btn btn-success">Update List</button>
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
