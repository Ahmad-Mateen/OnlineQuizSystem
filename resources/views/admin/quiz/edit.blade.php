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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Quizzes list</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Edit Quiz</h6>
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
                            <h5 class="card-title text-center">Edit  Quiz</h5>
                            <form action="{{route('admin.quiz.update')}}" method="POST">
                              
                                @csrf
                                @method('PUT')
                               
                                <label>Subject ID</label>
                                <div class="mb-3 ">
                                    <input type="text" readonly class="form-control  @error('subjectid') is-invalid @enderror" value="{{$quiz->subject_id}}"
                                        autocomplete="off" placeholder="Quiz Name" name="subjectid" aria-label="subjectid"
                                        aria-describedby="subjectid">
                                </div>
                                <label>Quiz ID</label>
                                <div class="mb-3 ">
                                    <input type="text" readonly class="form-control  @error('quizid') is-invalid @enderror" value="{{$quiz->id}}"
                                        autocomplete="off" placeholder="Quiz Name" name="quizid" aria-label="Email"
                                        aria-describedby="email-addon">
                                </div>
                                <label>Quiz Name</label>
                                <div class="mb-3 ">
                                    <input type="text" class="form-control  @error('quizname') is-invalid @enderror" value="{{$quiz->name}}"
                                        autocomplete="off" placeholder="Quiz Name" name="quizname" aria-label="Email"
                                        aria-describedby="email-addon">
                                </div>
                              
                                <label>Total Marks</label>
                                <div class="mb-3 ">
                                    <input type="text" class="form-control  @error('totalmarks') is-invalid @enderror" value="{{$quiz->total_marks}}" 
                                        autocomplete="off" placeholder="Total Marks" name="totalmarks" aria-label="Email"
                                        aria-describedby="email-addon">
                                </div>
                                <label>Passing Marks</label>
                                <div class="mb-3 ">
                                    <input type="text" class="form-control  @error('passingmarks') is-invalid @enderror" value="{{$quiz->passing_marks}}"
                                        autocomplete="off" placeholder="Passing Marks" name="passingmarks"
                                        aria-label="Email" aria-describedby="email-addon">
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
