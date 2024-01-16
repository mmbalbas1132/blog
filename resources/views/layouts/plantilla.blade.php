<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <title>"@yield('title')"</title>
    <!-- favicon -->
    <!-- estilos -->
    <style>
        .active {
            color: red;
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <!-- header -->
    <!-- nav -->
    
  @include('layouts.partials.header')
  {{-- incluyo el contenido del header desde  layouts.partials.header.blade.php --}}
    @yield('content')

    <!-- footer -->
    @include('layouts.partials.footer')
    <!-- script -->
</body>

</html>
