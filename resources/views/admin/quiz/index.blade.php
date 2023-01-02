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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Quiz</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Quiz</h6>
                </nav>
            </div>
        </nav>

        {{-- your actual html start from here here --}}
        <div class="container-fluid">
                <div class="d-flex flex-row-reverse p-3">
                    <a href="{{ route('admin.quiz.create')}}" class="btn btn-primary">Add Quiz</a>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0 p-4" id="usertable">
                                  
                                    <thead>
                                        <tr>
                                            <th class="">ID</th>
                                            <th class="">Subject ID</th>
                                            <th class="">Name</th>
                                            <th class="">Total Marks</th>
                                            <th class="">Passing Marks</th>
                                            <th class="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quiz as $quiz => $data)
                                            <tr>
                                                <td> {{ $data->id }}</td>
                                                <td> {{ $data->subject_id}} </td>
                                                <td> {{ $data->name }} </td>
                                                <td> {{ $data->total_marks }} </td>
                                                <td> {{ $data->passing_marks }} </td>

                                                <td>
                                                    <a href="{{route('admin.question.index',$data->id)}}"
                                                        class="btn btn-primary btn-sm">Add Question</a>
                                                    <a href="{{ route('admin.quiz.edit', $data->id) }}"
                                                        class="btn btn-secondary btn-sm">Edit</a>
                                                    <a href="{{ route('admin.quiz.delete', $data->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('js')
    {{-- paste your all extra scripts here for this page --}}
    <script>
        $(document).ready(function() {
            $('#usertable').DataTable();
        });
    </script>
@endsection
