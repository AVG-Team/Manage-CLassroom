<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config("app.name"))</title>
    @vite('resources/css/auth.css')
    @stack('styles')
    <style>
        .group[data-twe-input-focused] .group-data-\[twe-input-focused\]\:border-primary {
            border-color: #5AB2FF;
        }

        .group[data-twe-input-focused] .group-data-\[twe-input-focused\]\:border-t-transparent {
            border-top-color: transparent !important;
        }
    </style>
</head>
<body>
<div>
    <section class="h-screen bg-gray-100 flex items-center justify-center">
        <div class="lg:h-[85%] bg-white lg:w-[85%] rounded-3xl py-10 px-10 h-full w-full lg:px-20">
            {{ $slot }}
        </div>
    </section>
</div>
@vite('resources/js/auth.js')
@stack('scripts')
</body>
</html>
