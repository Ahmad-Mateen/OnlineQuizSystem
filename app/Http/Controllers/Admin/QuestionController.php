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

        $quiz = Quiz::with('questions', 'questions.options')->find($id);


        return view('admin.question.index', compact('quiz'));
    }

    public function create($id)
    {
        $quiz = Quiz::with('questions', 'questions.options')->find($id);

        return view('admin.question.create', compact('quiz'));
    }

    public function save(Request $request)
    {

        $validated = $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
        ]);

        if ($validated) {

            $question = new Question();
            $question->quiz_id = $request->quizid;
            $question->question_description = $request->question;
            $question->save();

            if ($question) {
                $option = new QuestionOptions();
                $option->question_id  = $question->id;
                $option->option_a = $request->option_a;
                $option->option_b = $request->option_b;
                $option->option_c = $request->option_c;
                $option->answer = $request->answer;
                $option->save();
                // $this->reset();              
                $res = [
                    'status' => 'Success',
                    'message' => "Success! New Question has been added!",

                ];
                return response()->json($res);

                return back()->with("New Question has been added!");
            } else {
                return back()->with("Something Went Gone Wrong!");
            }
        }
    }



    public function update(Request $request)
    {

        $request->validate([
            'quetion_description' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
        ]);



        $question = Question::where('id', $request->question_id)->first();
      

        $question->quiz_id = $request->quiz_id;
        $question->question_description = $request->quetion_description;
        $question->save();

       

        if ($question) {

            $option = QuestionOptions::where('id', $question->id)->first();
            $option->question_id  = $question->id;
            $option->option_a = $request->option_a;
            $option->option_b = $request->option_b;
            $option->option_c = $request->option_c;
            $option->option_d = $request->option_d;
            $option->answer = $request->answer;
            $option->save();
            return response()->json("Question has been Updated!");
            
        } else {
            return response()->json("Something Went Gone Wrong!");
        }
    }

    public function delete($a = null)
    {

        Question::where('id', $a)->delete();
        $res = [
            'status' => 'Success',
            'message' => "Success! Question has been deleted !",

        ];
        return response()->json($res);

        return back();
    }
}
