@extends('admin.layouts.app')
@section('title', 'Questions')
@section('css')
    {{-- paste your all extra style here for this page --}}
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
                        <li class="breadcrumb-item text-sm text-dark " aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Questions</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Quiz Questions</h6>
                </nav>
            </div>
        </nav>

        {{-- your actual html start from here here --}}
        <div class="container-fluid">


            <div class="row">

                <div class="col-md-12 text-center p-5">
                    <h4>{{ 'Quiz : ' . $quiz->name }}</h4>
                </div>

                <div class="col-md-12">
                    <div id="accordion" class="py-5 mt-2">
                        @foreach ($quiz->questions as $question)
                            <div class="card border-0">
                                <div class="card-header p-0 border-0" id="heading-{{ $question->id }}">
                                    <button class="btn btn-link accordion-title border-0 collapse" data-toggle="collapse"
                                        data-target="#collapse-{{ $question->id }}" aria-expanded="true"
                                        aria-controls="#collapse-{{ $question->id }}"><i
                                            class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>
                                        {{ $question->question_description }}
                                    </button>
                                </div>
                                <div id="collapse-{{ $question->id }}" class="collapse off"
                                    aria-labelledby="heading-{{ $question->id }}" data-parent="#accordion">
                                    <div class="card-body accordion-body">
                                        <form action="javascript:void(0)" class="update_questions" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-12 p-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="quetion_description"
                                                            value="{{ $question->question_description }} ">
                                                        <input type="hidden" name="question_id"
                                                            value="{{ $question->id }} ">
                                                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }} ">
                                                    </div>
                                                </div>
                                                @php
                                                    // dd($question->options);
                                                    $options = ['a', 'b', 'c', 'd'];
                                                @endphp
                                                @foreach ($question->options as $option)
                                                    @foreach ($options as $opt)
                                                        <div class="col-md-6 p-2">
                                                            <input type="text" class="form-control"
                                                                name="option_{{ $opt }}"
                                                                value="{{ old('option_' . $opt . '', $option['option_' . $opt]) }} ">
                                                        </div>
                                                    @endforeach


                                                    <div class="col-md-6 p-2">
                                                        <input type="text" class="form-control" name="answer"
                                                            value="{{ old('answer', $option['answer']) }} ">
                                                    </div>
                                                @endforeach


                                                <div class="col-md-12 text-right p-2">

                                                    <a href="" class="btn btn-secondary shadow-lg btnUpdate"
                                                        data-id={{ $question->id }}>Update</a>
                                                    <a href="" class="btn btn-danger shadow-lg btndell"
                                                        data-id={{ $question->id }}>Delete</a>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- new Question Add According --}}

                    <div id="collapseOne" class="collapse">

                        <div class="card border-0">
                            <div>
                                <div class="card-body accordion-body">
                                    <div class="btn btn-block"
                                        style="border-radius: 8px;padding: 10px 0;background-color: #243744;">
                                        <h5 class="mb-0 text-white  text-left pl-4"><strong>-</strong> Write Your answer
                                            here</h1>
                                    </div>
                                    <form action="javascript:void(0)" id='invoiceform' method="POST">
                                        @csrf
                                        <input type="hidden" name="quizid" value="{{ $quiz->id }}">
                                        <div class="row">
                                            <div class="col-md-12 p-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="question"
                                                        placeholder="Question..">

                                                </div>
                                            </div>
                                            <div class="col-md-6 p-2">
                                                <input type="text" name="option_a" placeholder="Option A"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 p-2">
                                                <input type="text" name="option_b" placeholder="Option B"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 p-2">
                                                <input type="text" name="option_c" placeholder="Option C"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 p-2">
                                                <input type="text" name="option_d" placeholder="Option D"
                                                    class="form-control">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 p-2">
                                                <input type="text" name="answer" placeholder="Right Answer"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-12 text-right p-2">
                                                <button class="btn btn-primary" id="submit_question">Submit
                                                    Question</button>
                                            </div>

                                        </div>

                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>


                    {{-- New Question add end --}}
                    <div class="d-flex flex-row-reverse mr-1 mt-3 mb-2 ">
                        <button class="btn btn-info ml-auto collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Add more question
                        </button>
                    </div>
                </div>




                {{-- main row end below --}}
            </div>



        </div>
    </main>
@endsection

@section('js')

    <script>
        // update Questions

        $(document).ready(function() {

            $('body').on("click", ".btnUpdate", function(e) {
                e.preventDefault();
             
                var formData = $(this).closest('.card-body').find('.update_questions').serialize();
                var url = '{{ route('admin.question.update') }}';


                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: formData,
                    success: function(data) {
                        alert(data);

                    }
                });
            });
        });
    </script>

    <script>
        // Delete Question       
        function clearInput() {
            document.getElementById("listform").reset();
        }

        $(document).ready(function() {

            $('body').on("click", ".btndell", function(e) {
                e.preventDefault();
                let a = $(this).attr('data-id');
                var url = "{{ route('admin.question.delete') }}/" + a;

                $.ajax({
                    url: url,
                    type: 'GET',
                    // data: formData,
                    success: function(data) {
                        alert(data);
                        clearInput();

                    }
                });
            });
        });
    </script>

    <script>
        // Save Questions
        function clearInput() {
            document.getElementById("invoiceform").reset();
        }
        $(document).ready(function() {

            $('body').on("click", "#submit_question", function(e) {
                e.preventDefault();
                var formData = $('#invoiceform').serialize();

                var url = '{{ route('admin.question.save') }}';
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        alert(data);
                        clearInput();

                    }
                });
            });
        });
    </script>

@endsection
