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
            class="absolute top-0 left-0 w-full h-[125vh] sm:h-[225vh] lg:h-[100vh] bg-custom sm:bg-custom"
        ></div>
        <!-- Header -->
        <x-user.layout.partials.header/>
        <!-- End Header -->


        <!-- Content -->
        <main class="text-neutral-800">
            {{ $slot }}
        </main>
        <!-- End Content  -->

        <!-- Footer -->
        <x-user.layout.partials.footer/>
        <!-- End Footer -->
    </div>
</div>

<style>
    .toast-close {
        position: relative;
        top: -0.3em;
        right: -0.6em;
        font-size: 0.8em;
    }

    .toast-close:hover {
        cursor: pointer;
        opacity: 1;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach ($errors->all() as $error)
        Toastify({
            text: "{{ $error }}",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#EF4444",
                borderRadius: "0.7rem",
            },
        }).showToast();
        @endforeach

        @if (session()->has('success'))
        Toastify({
            text: "{{ session()->get('success') }}",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "#19B9A8",
                borderRadius: "0.7rem",
            },
        }).showToast();
        @endif

        const xButton = document.querySelectorAll('.toast-close');
        xButton.forEach((button) => {
            button.innerText = 'X';
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    });
</script>
@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>
