@extends('StudentManagementSystem.layouts.adminLayout')

@section('title', 'Admin')

@section('content')

@include('StudentManagementSystem.layouts.adminHeader')

@include('StudentManagementSystem.layouts.adminSidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Student Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Student</li>
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
                        <form class="row g-3" method="POST" action="{{ route('studentCreate') }}">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="age" class="form-label">Age</label>
                                <input type="age" name="age" class="form-control @error('age') is-invalid @enderror" id="age" value="{{ old('age') }}" required>
                                @error('age')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <fieldset class="row mb-3">
                                    <label class="form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="M" @checked(old('gender')) required>
                                            <label class="form-check-label" for="gender1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="F" @checked(old('gender')) required>
                                            <label class="form-check-label" for="gender2">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="form-label">Reporting Teacher</label>
                                    <div class="col-sm-12">
                                        <select name="reportingTeacher" class="form-select" aria-label="Default select example" required>
                                            <option value="">-- Choose a teacher --</option>
                                            @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" @selected(old('reportingTeacher'))>
                                                {{ $teacher->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-info" href="{{ route('studentsListTemplate') }}" role="button">Cancel</a>
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