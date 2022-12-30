<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

   

    public function edit($id)
    {
    
        $user=User::where('id',$id)->first();
       
        return view('admin.users.edit',compact('user','id'));
    }

    public function update(Request $request)
    {
        
        $validated=$request->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);
        if($validated)
        {
           
            $user = User::where('id', $request->id)->firstOrFail();
        
            $user->id = $request->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
           
            $user->save();
           
            return redirect()->route('admin.user.index')->with('message','User has been updated!');
    }
}

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.subject.index')->with('message','User has been deleted');
    }
}
