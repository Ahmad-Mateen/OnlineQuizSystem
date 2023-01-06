<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\QuestionOptions;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Subject;

class UserQuizController extends Controller
{

    public function getSubject()
    {
        $subjects = Subject::get();
        $quiz = Quiz::get();
        return view('user.quiz.quiz_list', compact('subjects', 'quiz'));
    }
    public function getQuiz($id)
    {

        $subjects = Subject::get();
        $quiz = Quiz::with('questions', 'questions.options')->get();

        return view('user.quiz.quiz_list', compact('subjects', 'quiz', 'id'));
    }

    public function checkAnswer($id)
    {

        $answer = QuestionOptions::where('answer', $id)->first();


        if (!$answer) {
            $res = [
                'status' => 'success',
                'corrected' => session('answers') ?? 0
            ];

            return response()->json($res);
        } else {

            $correct = session('answers') ?? 0;
            $corr = $correct + 1;
            session()->put('answers', $corr);

            $res = [
                'status' => 'success',
                'corrected' => $corr
            ];

            return response()->json($res);
        }
    }
}
