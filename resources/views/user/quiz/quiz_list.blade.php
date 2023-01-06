@extends('user.layouts.app')
@section('title', 'Quiz Lists')
@section('css')

    {{-- paste your all extra style here for this page --}}

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap");

        * {
            box-sizing: border-box;
        }



        input {
            cursor: pointer;
        }

        .quiz-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px 2px rgba(100, 100, 100, 0.1);
        }

        .quiz-header {
            padding: 4rem;
        }

        h2 {
            padding: 1rem;
            text-align: center;
            margin: 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            font-size: 1.2rem;
            margin: 1rem 0;
        }

        button {
            background-color: #781c68;
            color: #fff;
            border: none;
            display: block;
            width: 100%;
            cursor: pointer;
            font-size: 1.1rem;
            font-family: inherit;
            padding: 1.3rem;
        }

        button:hover {
            background-color: #293462;
        }

        button:focus {
            outline: none;
            background-color: #5e3370;
        }
    </style>
    <style>
        @charset "UTF-8";

        [data-toggle=collapse] i:before {
            content: "";
        }

        [data-toggle=collapse].collapsed i:before {
            content: "";
        }

        #accordion .card-header {
            margin-bottom: 8px;
        }

        #accordion .accordion-title {
            position: relative;
            display: block;
            padding: 8px 0 8px 50px;
            background: #213744;
            border-radius: 8px;
            overflow: hidden;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            width: 100%;
            text-align: left;
            transition: all 0.4s ease-in-out;
        }

        #accordion .accordion-title i {
            position: absolute;
            width: 40px;
            height: 100%;
            left: 0;
            top: 0;
            color: #fff;
            background: radial-gradient(rgba(33, 55, 68, 0.8), #213744);
            text-align: center;
            border-right: 1px solid transparent;
        }

        #accordion .accordion-title:hover {
            padding-left: 60px;
            background: #213744;
            color: #fff;
        }

        #accordion .accordion-title:hover i {
            border-right: 1px solid #fff;
        }

        #accordion .accordion-body {
            padding: 40px 55px;
        }

        #accordion .accordion-body ul {
            list-style: none;
            margin-left: 0;
            padding-left: 0;
        }

        #accordion .accordion-body li {
            padding-left: 1.2rem;
            text-indent: -1.2rem;
        }

        #accordion .accordion-body li:before {
            content: "";
            padding-right: 5px;
            font-family: "Flaticon";
            font-size: 16px;
            font-style: normal;
            color: #213744;
        }

        .bg_primary {
            background-color: #243744 !important;
        }

        .bg_primary:hover {
            background-color: #1e2d38 !important;
        }



        /* Quiz Template */
    </style>
@endsection
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- breadcrumb -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm text-dark " aria-current="page">User Dashboard</li>
                        <li class="breadcrumb-item text-sm text-dark " aria-current="page">Quiz List</li>

                    </ol>
                    <h6 class="font-weight-bolder mb-0">List</h6>
                </nav>
            </div>
        </nav>

        {{-- your actual html start from here here --}}

        <div class="row">
            <div class="col-md-2">
                <div id="accordion" class="py-5 mt-2">

                    <div class="card border-0">

                    </div>
                    @foreach ($subjects as $subject)
                        <div class="card-header p-0 border-0" id={{ $subject->id }}>
                            <button class="btn btn-link accordion-title border-0 collapse" data-toggle="collapse"
                                data-target="#collapse-{{ $subject->id }}" aria-expanded="true"
                                aria-controls="#collapse-{{ $subject->id }}"><i
                                    class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>
                                {{ $subject->name }}
                            </button>
                        </div>

                        <div id="collapse-{{ $subject->id }}" class="collapse off"
                            aria-labelledby="heading-{{ $subject->id }}" data-parent="#accordion">
                            <div class="card-body accordion-body">
                                @foreach ($quiz as $data)
                                    @if ($subject->id == $data->subject_id)
                                        <a class="text-center"
                                            href="{{ route('user.quiz.getQuiz', $data->id) }}">{{ $data->name }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            @if (!empty($id))

                @foreach ($quiz as $item)
                    @if ($item->id == $id)
                        <div class="col-9">
                            <div class="card mt-5 text-center ">
                                <div class="card-body">

                                    <div class=" mt-2">
                                        <div class="row justify-content-center">
                                            <strong class="col-2">Quiz Name:</strong><span
                                                class="col-2 text-start">{{ $item->name }}</span>
                                        </div>
                                    </div>
                                    <div class=" mt-2">
                                        <div class="row justify-content-center">
                                            <strong class="col-2">Quiz Marks:</strong><span
                                                class="col-2 text-start">{{ $item->total_marks }}</span>
                                        </div>
                                    </div>
                                    <div class=" mt-2">
                                        <div class="row justify-content-center">
                                            <strong class="col-2">Passing Marks:</strong><span
                                                class="col-2 text-start">{{ $item->passing_marks }}</span>
                                        </div>
                                    </div>
                                    <div class=" mt-2">
                                        <div class="row justify-content-center">
                                            <strong class="col-2">Quiz Type:</strong><span
                                                class="col-2 text-start">MCQS</span>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <a type="submit" class="btn btn-primary bg_primary" onclick="myFunction()">Start
                                            Quiz </a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <h4> Corrected <span id="corrected"></span> </h4>
                            </div>
                            <div class="main_question_container">

                                @foreach ($item->questions as $question)
                                    <div class="quiz-container mt-2 quiz " style="display: none">
                                        <div class="quiz-header">
                                            <h2 id="question"> {{ $question->question_description ?? '' }} </h2>
                                            <ul style="width: 12%;margin: 0 auto;">
                                                <li>
                                                    <input class="answer_input" type="radio" name="answer"
                                                        id="a" />
                                                    <label class="answer" for="a"
                                                        id="a_text">{{ $question->options->option_a }} </label>
                                                </li>
                                                <li>
                                                    <input class="answer_input" type="radio" name="answer"
                                                        id="b" />
                                                    <label class="answer" for="b"
                                                        id="b_text">{{ $question->options->option_b ?? '' }} </label>
                                                </li>
                                                <li>
                                                    <input class="answer_input" type="radio" name="answer"
                                                        id="c" /><label class="answer" for="c"
                                                        id="c_text">
                                                        {{ $question->options->option_c ?? '' }} </label>
                                                </li>
                                                <li>
                                                    <input class="answer_input" type="radio" name="answer"
                                                        id="d" />
                                                    <label class="answer" for="d"
                                                        id="d_text">{{ $question->options->option_d ?? '' }} </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href=""></a><button type="btn" class="submit bg_primary">Next</button>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>






    </main>
@endsection

@section('js')

    <script>
        function myFunction() {
            var x = document.querySelector('.quiz');

            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }


        $('.submit').click(function() {

            let a = $('.answer_input:checked').siblings('label').text();
            // alert(a);

            var url = "{{ route('user.quiz.checkAnswer') }}/" + a;

            $.ajax({
                url: url,
                type: 'GET',
                // data: formData,
                success: function(data) {
                    $('#corrected').html(data.corrected);
                }
            });
            var mhit = $(this);
            var parent = mhit.parent();
            var next = parent.next();
            parent.hide();
            next.show();


        });
    </script>

@endsection
