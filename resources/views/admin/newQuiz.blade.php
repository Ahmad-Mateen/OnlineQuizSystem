@extends('Admin/adminPanel')
@section('content')
    <div class="page-header min-vh-75">
        <div class="container">
            {{-- <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 d-flex flex-column mx-auto">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient text-center">New Quiz</h3>
                            <p class="mb-0 text-center">Add New Quiz Here</p>
                        </div> --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="font-weight-bolder text-info text-gradient text-center">New Quiz</h3>
                                    <label>Question</label>
                                    <div class="mb-3">
                                        <input type="text" name="question"  class="form-control  @error('question') is-invalid @enderror" placeholder="Question"
                                            aria-label="question" aria-describedby="email-addon">
                                    </div>
                                  
                                </div>
                            </div>
                               <div class="row">
                                <div class="col-6">
                                    <label>Option A</label>
                                    <div class="mb-3">
                                        <input type="text" name="" class="form-control  @error('subject_name') is-invalid @enderror " placeholder="Option A"
                                            aria-label="Option A" aria-describedby="password-addon">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Option B</label>
                                    <div class="mb-3">
                                        <input type="text" name="" class="form-control  @error('subject_name') is-invalid @enderror " placeholder="Option B"
                                            aria-label="Subject Name" aria-describedby="password-addon">
                                    </div>
                                </div>
                               </div>

                               <div class="row">
                                <div class="col-6">
                                    <label>Option C</label>
                                    <div class="mb-3">
                                        <input type="text" name="" class="form-control  @error('subject_name') is-invalid @enderror " placeholder="Option C"
                                            aria-label="Subject Name" aria-describedby="password-addon">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Option D</label>
                                    <div class="mb-3">
                                        <input type="text" name="" class="form-control  @error('subject_name') is-invalid @enderror " placeholder="Option D"
                                            aria-label="Subject Name" aria-describedby="password-addon">
                                    </div>
                                </div>
                               </div>

                               <div class="row">
                                <div class="col-6">
                                    <label>Subject</label>
                                    <div class="mb-3">
                                        <input type="text" name="subject_name" class="form-control  @error('subject_name') is-invalid @enderror " 
                                            aria-label="Subject Name" aria-describedby="password-addon">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Answer</label>
                                    <div class="mb-3">
                                        <input type="text" name="answer" class="form-control  @error('answer') is-invalid @enderror " placeholder="Answer"
                                            aria-label="Answer" aria-describedby="password-addon">
                                    </div>
                                </div>
                               </div>
                              
                                    
                                      
                                      
                                      
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Submit</button>
                                        </div>
                                    
                                </div>

                            </div>
                          
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
