@extends('StudentManagementSystem.layouts.adminLayout')

@section('title', 'Admin')

@section('content')

@include('StudentManagementSystem.layouts.adminHeader')

@include('StudentManagementSystem.layouts.adminSidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
  </section>

</main><!-- End #main -->

@include('StudentManagementSystem.layouts.adminFooter')

@endsection

@push('scripts')
<script>

</script>
@endpush