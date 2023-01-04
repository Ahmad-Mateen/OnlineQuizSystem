<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $quiz = Quiz::get();

        return view('user.quiz.quiz_list', compact('subjects', 'quiz','id'));
    }
}
