@extends('admin.layouts.app')
@section('title', 'Users')
@section('css')
    {{-- paste your all extra style here for this page --}}
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

            @if (Session::has('message'))
                <div class="col-sm-4 ">
                    <div class=" alert alert-info alert-dismissible fade show" role="alert">
                        <span class="text-white">{{ Session::get('message') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="row">

                <div class="col-md-6 offset-md-3 mt-5">

                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title text-center">Quiz Questions</h5>


                            <form action="{{ route('admin.question.save') }}" method="POST">
                                @csrf


                                <label>Question</label>
                                <div class="mb-3 ">
                                    <input type="text" class="form-control  @error('question') is-invalid @enderror"
                                        autocomplete="off" placeholder="Question" name="question" aria-label="question"
                                        aria-describedby="question">
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control  @error('option_a') is-invalid @enderror"
                                            autocomplete="off" placeholder="Option A" name="option_a" aria-label="Email"
                                            aria-describedby="email-addon">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control  @error('option_b') is-invalid @enderror"
                                            autocomplete="off" placeholder="Option B" name="option_b" aria-label="option_b"
                                            aria-describedby="email-addon">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control  @error('option_c') is-invalid @enderror"
                                            autocomplete="off" placeholder="Option C" name="option_c" aria-label="option_c"
                                            aria-describedby="email-addon">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control  @error('option_d') is-invalid @enderror"
                                            autocomplete="off" placeholder="Option D" name="option_d" aria-label="Email"
                                            aria-describedby="email-addon">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="text" class="form-control  @error('answer') is-invalid @enderror"
                                            autocomplete="off" placeholder="Answer" name="answer" aria-label="answer"
                                            aria-describedby="email-addon">
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly
                                            class="form-control  @error('quizid') is-invalid @enderror" autocomplete="off"
                                            placeholder="Quiz ID" name="quizid" aria-label="quizid"
                                            value="{{ $id }}" aria-describedby="quizid">
                                    </div>


                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection
