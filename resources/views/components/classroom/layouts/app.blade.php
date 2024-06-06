<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
  
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body>
    <div class="relative min-h-screen font-sans antialiased">
    <div class="relative">
        <!-- Header -->
        <x-classroom.layouts.partials.header />
        <!-- End Header -->

      
        <!-- Content -->
        <main class="pt-5">
            {{ $slot }}
        </main>
        <!-- End Content  -->
    

      
    </div>
  </div>
    @vite('resources/js/classroom.js')
</body>
</html>