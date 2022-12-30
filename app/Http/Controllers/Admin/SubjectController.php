<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::get();
        
        return view('admin.subjects.index',compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function save(Request $request)
    {
        $validated=$request->validate([
            'subjectname'=>'required',
        ]);
        if($validated)
        {
            $subject =new Subject();
            $subject->name = $request->subjectname;
            $subject->slug = Str::slug($request->subjectname);
            $subject->save();
            return redirect()->route('admin.subject.index')->with('message','New Subject has been added!');
        }
       
    }

    public function edit($id)
    {

        $subject=Subject::where('id',$id)->first();
       
        return view('admin.subjects.edit',compact('subject','id'));
    }

    public function update(Request $request)
    {

       
        $validated=$request->validate([
            'subjectname'=>'required',
        ]);
        if($validated)
        {
           
            $subject = Subject::where('id', $request->id)->firstOrFail();
        
            $subject->name = $request->subjectname;
            $subject->slug = Str::slug($request->subjectname);
            $rs=$subject->save();
           
            return redirect()->route('admin.subject.index')->with('message','Subject has been updated!');
        }
    }

    public function delete($id)
    {
        Subject::where('id', $id)->delete();
        return redirect()->route('admin.subject.index')->with('message','User has been deleted');
    }
}
