@extends('StudentManagementSystem.layouts.adminLayout')

@section('title', 'Admin')

@section('content')

@include('StudentManagementSystem.layouts.adminHeader')

@include('StudentManagementSystem.layouts.adminSidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Student Mark Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Student Mark</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Form</h5>
                        <!-- Vertical Form -->
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                        @endif
                        <form class="row g-3" method="POST" action="{{ route('studentMarkCreate') }}">
                            @csrf
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="form-label">Name</label>
                                    <div class="col-sm-12">
                                        <select name="student" class="form-select" aria-label="Default select example">
                                            <option>-- Choose a student --</option>
                                            @foreach ($students as $student)
                                            <option value="{{ $student->id }}" @selected(old('student'))>
                                                {{ $student->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <fieldset class="row mb-3">
                                    <label class="form-label">Term selection</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="term" id="term1" value="ONE" @checked(old('term'))>
                                            <label class="form-check-label" for="term1">
                                                ONE
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="term" id="term2" value="TWO" @checked(old('term'))>
                                            <label class="form-check-label" for="term2">
                                                TWO
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <label for="maths" class="form-label">Maths</label>
                                <input type="text" name="maths" class="form-control @error('maths') is-invalid @enderror" id="maths" value="{{ old('maths') }}">
                                @error('maths')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="science" class="form-label">Science</label>
                                <input type="text" name="science" class="form-control @error('science') is-invalid @enderror" id="science" value="{{ old('science') }}">
                                @error('science')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="history" class="form-label">History</label>
                                <input type="text" name="history" class="form-control @error('history') is-invalid @enderror" id="history" value="{{ old('history') }}">
                                @error('history')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-info" href="{{ route('studentsMarkListTemplate') }}" role="button">Cancel</a>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>


</main><!-- End #main -->

@include('StudentManagementSystem.layouts.adminFooter')

@endsection

@push('scripts')
<script>
    window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>
@endpush