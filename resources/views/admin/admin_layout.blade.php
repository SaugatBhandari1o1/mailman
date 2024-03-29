<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link href="{{asset('admin_assets/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('admin_assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</head>

<body>
    @include('admin/partials/navbar')
    @include('admin/partials/sidebar')

    <div class="content">
        @yield('content')
    </div>

    




    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin_assets/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('admin_assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('admin_assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('admin_assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin_assets/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('admin_assets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('admin_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('admin_assets/js/main.js')}}"></script>


 <!-- Toastr Notifications -->
 @if(session('success'))
    <script>
        $(document).ready(function(){
            toastr.success('{{ session('success') }}');
        });
    </script>
@endif

@if(session('error'))
    <script>
        $(document).ready(function(){
            toastr.error('{{ session('error') }}');
        });
    </script>
@endif

</body>

</html>