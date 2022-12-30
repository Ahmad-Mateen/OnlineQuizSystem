@extends('admin.layouts.app')
@section('title', 'Dashboard')
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Subjects</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                
                </nav>
            </div>
        </nav>

        {{-- your actual html start from here here --}}
        <div class="container-fluid py-4">
            
        </div>
    </main>
@endsection

@section('js')
    {{-- paste your all extra scripts here for this page --}}
@endsection
