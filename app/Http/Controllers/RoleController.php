<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Psy\Util\Str;

class RoleController extends Controller
{
    public function index(){
        return view('admin.roles.index', ['roles'=> Role::all()]);
    }

    public function store(){
        /*request()->validate([
            'name'=> ['required']
        ]);*/
        Role::create([
            'name'=> request('name'),
            'slug'=>request('name')
        ]);
        return back();

        }

    public function destroy(Role $role){
        $role->delete();
        return back();
    }
}
