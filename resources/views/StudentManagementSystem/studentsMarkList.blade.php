@extends('StudentManagementSystem.layouts.adminLayout')

@section('title', 'Admin')

@section('content')

@include('StudentManagementSystem.layouts.adminHeader')

@include('StudentManagementSystem.layouts.adminSidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Students Marks</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Students Mark</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Students Mark List</h5>
                        <a class="btn add-user" href="{{ route('studentMarkCreateTemplate') }}" role="button"><i class="bi bi-person-plus"></i></a>
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
                                    <th scope="col">Maths</th>
                                    <th scope="col">Science</th>
                                    <th scope="col">History</th>
                                    <th scope="col">Term</th>
                                    <th scope="col">Total Marks</th>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($studentsMarkList as $studentMark)
                                <tr>
                                    <th scope="row">{{ $studentMark->id }}</th>
                                    <td>{{ $studentMark->student->name }}</td>
                                    <td>{{ $studentMark->maths }}</td>
                                    <td>{{ $studentMark->science }}</td>
                                    <td>{{ $studentMark->history }}</td>
                                    <td>{{ $studentMark->term }}</td>
                                    <td>{{ $studentMark->total_marks }}</td>
                                    <td>{{ $studentMark->created_at }}</td>
                                    <td>
                                        <form action="{{ route('studentMarkDelete', ['studentMarkId' => $studentMark->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn" href="{{ route('studentMarkEditTemplate', ['studentMarkId' => $studentMark->id]) }}" role="button"><i class="bi-pencil-square"></i></a>
                                            <button type="submit" class="btn" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <p>Students Mark Not Found</p>
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