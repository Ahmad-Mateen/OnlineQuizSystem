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

        return view('admin.quiz.index', compact('quiz'));
    }

    public function create()
    {
        $subjects = Subject::get();
        return view('admin.quiz.create', compact('subjects'));
    }

    public function save(Request $request)
    {   
        
        $subject=Subject::where('name',$request->subjects)->first();
        $id=$subject->id;
        $validated=$request->validate([
            'quizname'=>'required',
            'totalmarks'=>'required',
            'passingmarks'=>'required',
        ]);
        if($validated)
        {
            $quiz =new Quiz();
            $quiz->subject_id=$id;
            $quiz->name=$request->quizname;
            $quiz->total_marks=$request->totalmarks;
            $quiz->passing_marks=$request->passingmarks;
            $quiz->Save();

            return redirect()->route('admin.subject.index')->with('message','New Quiz has been added!');
        }

    }

    public function edit($id)
    {
        // dd($id);

        $quiz=Quiz::where('id',$id)->first();
        // dd($quiz->id);

        return view('admin.quiz.edit',compact('quiz'));
    }

    public function update(Request $request)
    {
       

        $validated=$request->validate([
            'quizname'=>'required',
            'totalmarks'=>'required',
            'passingmarks'=>'required',
        ]);
        if($validated)
        {

            $quiz = Quiz::where('id', $request->quizid)->firstOrFail();
            
            $quiz->id=$request->quizid;
            $quiz->subject_id=$request->subjectid;
            $quiz->name=$request->quizname;
            $quiz->total_marks=$request->totalmarks;
            $quiz->passing_marks=$request->passingmarks;
            $rs=$quiz->save();
       
     

            return redirect()->route('admin.quiz.index')->with('message','Quiz has been updated!');
        }
    }

    public function delete($id)
    {
        Quiz::where('id', $id)->delete();
        return redirect()->route('admin.quiz.index')->with('message','Quiz has been deleted');
    }
}
