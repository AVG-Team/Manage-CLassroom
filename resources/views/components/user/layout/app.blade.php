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
      <div
        class="absolute top-0 left-0 w-full h-[125vh] sm:h-[225vh] lg:h-[100vh] cover-gradient-2 sm:cover-gradient"
      ></div>
        <!-- Header -->
        <x-user.layout.partials.header />
        <!-- End Header -->

      
        <!-- Content -->
        <main class="text-neutral-800">
            {{ $slot }}
        </main>
        <!-- End Content  -->
    

        <!-- Footer -->
        <x-user.layout.partials.footer />
        <!-- End Footer -->
    </div>
  </div>
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>