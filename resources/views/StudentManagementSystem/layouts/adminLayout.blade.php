<!DOCTYPE html>

<html lang="en">

<head>

  <title>@yield('title')</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('StudentManagementSystem/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('StudentManagementSystem/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" integrity="sha384-ejwKkLla8gPP8t2u0eQyL0Q/4ItcnyveF505U0NIobD/SMsNyXrLti6CWaD0L52l" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="{{ asset('StudentManagementSystem/assets/css/style.css') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
    <link href="{{ asset('StudentManagementSystem/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('StudentManagementSystem/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('StudentManagementSystem/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('StudentManagementSystem/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('StudentManagementSystem/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('StudentManagementSystem/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('StudentManagementSystem/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  @yield('content')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('StudentManagementSystem/assets/js/main.js') }} "></script>

  <!-- Vendor JS Files -->
  <script src="{{ asset('StudentManagementSystem/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('StudentManagementSystem/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
  <script src="{{ asset('StudentManagementSystem/assets/vendor/chart.js/chart.min.js') }} "></script>
  <script src="{{ asset('StudentManagementSystem/assets/vendor/echarts/echarts.min.js') }} "></script>
  <script src="{{ asset('StudentManagementSystem/assets/vendor/quill/quill.min.js') }} "></script>
  <script src="{{ asset('StudentManagementSystem/assets/vendor/simple-datatables/simple-datatables.js') }} "></script>
  <script src="{{ asset('StudentManagementSystem/assets/vendor/tinymce/tinymce.min.js') }} "></script>
  <script src="{{ asset('StudentManagementSystem/assets/vendor/php-email-form/validate.js') }} "></script>

  @stack('scripts')

</body>

</html>