<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adm PPG | @yield('title', 'Dashboard')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/logo_upi.png">

    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- My Style -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/dataTables.bootstrap5.min.css"/>

    <!-- Sidebar -->
    <link href="/css/sidebars.css" rel="stylesheet">

    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  </head>
  <body>

    <div class="main-container d-flex">
      <!-- Sidebar -->
      @include('layouts.sidebar')

      <div class="content">
        <!-- Header -->
        @include('layouts.header')

        <div class="dashboard-content px-4 pt-4">
          @yield('container')
        </div>
      </div>
    </div>


    <!-- Bootstrap 5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- My Style -->
    <script src="/js/script.js"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Data Tables -->
    @stack('datatable-js');
    
    <script>
      //datatable
      $(document).ready(function () {
        $('#example').DataTable();
      });

      //sidebar
      $('.open-btn').on('click', function(){
        $('.sidebar').addClass('active');
      });

      $('.close-btn').on('click', function(){
        $('.sidebar').removeClass('active');
      });
    </script>

    <!-- Custom styles for this template -->
    <script src="/js/sidebars.js"></script>

  </body>
</html>