<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Auth;
class GroupController extends Controller
{
    //
    public function store() {
        $group = new Group;
        $group->name = request('name');
        $group->color = request('color');
        $group->user_id = Auth::user()->id;
        $group->save();

        return redirect('/');
    }

    public function index() {
        $groups = Group::all()->where('user_id', Auth::user()->id);
        return view('list', ['groups' => $groups]);
    }

    public function destroy($id) {
        $group = Group::find($id);
        $group->delete();

        return redirect('/');
    }

    public function edit($id) {
        $group = Group::find($id);

        return view('editGroup', ['group' => $group]);
    }

    public function update($id) {
        $group = Group::find($id);
        $group->name = request('name');
        $group->color = request('color');
        $group->save();
        return redirect('/');
    }
}
