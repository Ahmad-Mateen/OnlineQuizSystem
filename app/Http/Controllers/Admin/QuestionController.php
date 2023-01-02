<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionOptions;
use App\Models\Quiz;
use Doctrine\DBAL\Driver\Mysqli\Initializer\Options;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($id)
    {
        
        $quiz = Quiz::with('questions','questions.options')->find($id);
      
        return view('admin.question.index', compact('quiz'));
    }

    public function create($id)
    {
        
        return view('admin.question.create',compact('id'));
    }

    public function save(Request $request)
    {   
       
      
        $validated=$request->validate([
            'question'=>'required',
            'option_a'=>'required',
            'option_b'=>'required',
            'option_c'=>'required',
            'option_d'=>'required',
            'answer'=>'required',
        ]);

        if($validated)
        {
          
            $question =new Question();
            $question->quiz_id=$request->quizid;
            $question->question_description=$request->question;
            $question->save();

            if($question)
            {
                 $option = new QuestionOptions();
                 $option->question_id  = $question->id;
                 $option->option_a = $request->option_a;
                 $option->option_b = $request->option_b;
                 $option->option_c = $request->option_c;
                 $option->option_d = $request->option_d;
                 $option->save();
            }
            else
            {
                return back()->with("Something Went Gone Wrong!");
            }

            return redirect()->route('admin.subject.index')->with('message','New Quiz has been added!');
        }

    }

    // public function edit($id)
    // {
    //     // dd($id);

    //     $quiz=Quiz::where('id',$id)->first();
    //     // dd($quiz->id);

    //     return view('admin.quiz.edit',compact('quiz'));
    // }

    // public function update(Request $request)
    // {
       

    //     $validated=$request->validate([
    //         'quizname'=>'required',
    //         'totalmarks'=>'required',
    //         'passingmarks'=>'required',
    //     ]);
    //     if($validated)
    //     {

    //         $quiz = Quiz::where('id', $request->quizid)->firstOrFail();
            
    //         $quiz->id=$request->quizid;
    //         $quiz->subject_id=$request->subjectid;
    //         $quiz->name=$request->quizname;
    //         $quiz->total_marks=$request->totalmarks;
    //         $quiz->passing_marks=$request->passingmarks;
    //         $rs=$quiz->save();
       
     

    //         return redirect()->route('admin.quiz.index')->with('message','Quiz has been updated!');
    //     }
    // }

    // public function delete($id)
    // {
    //     Quiz::where('id', $id)->delete();
    //     return redirect()->route('admin.quiz.index')->with('message','Quiz has been deleted');
    // }
}
