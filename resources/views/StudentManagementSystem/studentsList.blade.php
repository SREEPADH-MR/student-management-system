@extends('StudentManagementSystem.layouts.adminLayout')

@section('title', 'Admin')

@section('content')

@include('StudentManagementSystem.layouts.adminHeader')

@include('StudentManagementSystem.layouts.adminSidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Students</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Students</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Students List</h5>
                        <a class="btn add-user" href="{{ route('studentCreateTemplate') }}" role="button"><i class="bi bi-person-plus"></i></a>
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
                        <!-- Table Students List -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Reporting Teacher</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($studentsList as $student)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->teacher->name }}</td>
                                    <td>
                                        <form action="{{ route('studentDelete', ['studentId' => $student->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn" href="{{ route('studentEditTemplate', ['studentId' => $student->id]) }}" role="button"><i class="bi-pencil-square"></i></a>
                                            <button type="submit" class="btn" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <p>Students Not Found</p>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
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