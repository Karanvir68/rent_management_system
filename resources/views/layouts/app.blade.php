<!DOCTYPE html>
<html lang="en">
   
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div style="display: flex; min-height: 100vh;">
        
        {{-- Common sidebar --}}
        @include('layouts.sidebar')

        {{-- Page content --}}
        <div style="flex: 1; padding: 20px;">
            @yield('content')
        </div>

    </div>
</body>
</html>
