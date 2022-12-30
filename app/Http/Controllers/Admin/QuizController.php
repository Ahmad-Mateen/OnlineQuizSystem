<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Subject;
class QuizController extends Controller
{
    public function index()
    {
        $quiz = Quiz::get();
       
        return view('admin.quiz.index',compact('quiz'));
    }

    public function create()
    {
        $subject_id = Subject::get();   
        dd($subject_id);
        return view('admin.quiz.create',compact('subject_id'));
    }

    // public function save(Request $request)
    // {
    //     $validated=$request->validate([
    //         'subjectname'=>'required',
    //     ]);
    //     if($validated)
    //     {
    //         $subject =new Subject();
    //         $subject->name = $request->subjectname;
    //         $subject->slug = Str::slug($request->subjectname);
    //         $subject->save();
    //         return redirect()->route('admin.subject.index')->with('message','New Subject has been added!');
    //     }
       
    // }

    // public function edit($id)
    // {

    //     $subject=Subject::where('id',$id)->first();
       
    //     return view('admin.subjects.edit',compact('subject','id'));
    // }

    // public function update(Request $request)
    // {

       
    //     $validated=$request->validate([
    //         'subjectname'=>'required',
    //     ]);
    //     if($validated)
    //     {
           
    //         $subject = Subject::where('id', $request->id)->firstOrFail();
        
    //         $subject->name = $request->subjectname;
    //         $subject->slug = Str::slug($request->subjectname);
    //         $rs=$subject->save();
           
    //         return redirect()->route('admin.subject.index')->with('message','Subject has been updated!');
    //     }
    // }

    // public function delete($id)
    // {
    //     Subject::where('id', $id)->delete();
    //     return redirect()->route('admin.subject.index')->with('message','User has been deleted');
    // }
}
