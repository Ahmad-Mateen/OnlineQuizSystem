@extends('admin.layouts.app')
@section('title', 'Users')
@section('css')
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Quiz Questions</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Questions</h6>
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

                        <div class="card border-0">
                            <div class="card-header p-0 border-0" id="heading-11">
                                <button class="btn btn-link accordion-title border-0 collapse" data-toggle="collapse"
                                    data-target="#collapse-11" aria-expanded="true" aria-controls="#collapse-11"><i
                                        class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>
                                    Write Question here Please!
                                </button>
                            </div>
                            <div id="collapse-11" class="collapse show" aria-labelledby="heading-11"
                                data-parent="#accordion">
                                <div class="card-body accordion-body">
                                    <form action="{{ route('admin.question.save') }}" method="POST">
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
                                                <button type="submit" class="btn btn-primary">Submit Question</button>
                                            </div>

                                        </div>

                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- main row end below --}}
        </div>

    </main>
@endsection
